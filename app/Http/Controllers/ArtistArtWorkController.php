<?php

namespace App\Http\Controllers;

use App\Models\Art;
use App\Models\Artist;
use App\Models\ArtCategory;
use App\Models\ArtCollection;
use App\Models\ArtImage;
use App\Models\ArtLike;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ArtistArtWorkController extends Controller
{
    public function showAllArtwork($ARTIST_ID)
    {
        // Example data for the artworks
        $artworks =  DB::table('ART')
                    ->select(
                        'ART.ART_ID', 
                        'ART.ART_TITLE', 
                        'ART_IMAGE.IMAGE_PATH', 
                        'MASTER_USER.USERNAME',
                        'ART.IS_SALE', 
                        DB::raw("FORMAT(ART.PRICE, 'N0') as ART_PRICE"), 
                        DB::raw("YEAR(ART.CREATED_AT) as ART_YEAR")
                    )
                    ->join('ART_IMAGE', 'ART.ART_ID', '=', 'ART_IMAGE.ART_ID')
                    ->join('ARTIST', 'ARTIST.ARTIST_ID', '=', 'ART.ARTIST_ID')
                    ->join('MASTER_USER', 'MASTER_USER.USER_ID', '=', 'ARTIST.USER_ID')
                    ->where('ART.ARTIST_ID', '=', $ARTIST_ID)
                    ->orderBy('ART.CREATED_AT', 'desc')
                    ->get(); 
                            
        $artistId = $ARTIST_ID;

        $artistUser = DB::table('ARTIST')
                    ->select('USER_ID')
                    ->where('ARTIST_ID', '=', $artistId)
                    ->first();
                
        $artistUserId = $artistUser ? $artistUser->USER_ID : null;
        
        $totalArtWorks = DB::table('ART')
                        ->select('*')
                        ->where('ARTIST_ID','=',$ARTIST_ID)
                        ->count();

        $artCategoryMaster = DB::table('ART_CATEGORY_MASTER')
                            ->select('*')
                            ->get();

        return view('artists.sections.all-artworks', compact('artworks', 'artistId','totalArtWorks','artCategoryMaster', 'artistUserId'));
    }

    public function addArtWork(Request $request)
    {
        $user = Auth::guard('MasterUser')->user();
        $artist = Artist::where('ARTIST_ID','=',$user->Artist->ARTIST_ID)->first();

        $validated = Validator::make($request->all(), [
            'artworkTitle' => 'required',
            'artworkDescription' => 'required',
            'artworkPrice' => 'required',
        ], [
            'collectionTitle.required' => '* The Artwork title is required.',
            'collectionDescription.required' => '* The Artwork description is required.',
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withError($validated->error());
        }

        $art = $user->Arts()->create([
            'ART_TITLE' => $request->artworkTitle,
            'DESCRIPTION' => $request->artworkDescription,
            'IS_SALE' => true,
            'PRICE' => $request->artworkPrice
        ]);

        if($request->category_art != null) {
            foreach ($request->category_art as $categoryId) {
                $art->ArtCategories()->create([
                    'ART_CATEGORY_MASTER_ID' => $categoryId,
                ]);
            }
        }

        $imagePath = null;

        // If URL is provided
        if ($request->filled('artworkImageLink')) {
            $imagePath = $request->input('artworkImageLink');
        }

        // If file is uploaded
        if ($request->hasFile('artworkImageUpload')) {
            $uploadedFile = $request->file('artworkImageUpload');
            $imagePath = $uploadedFile->store('images/art', 'public'); // Save file in the `storage/app/public/images/art` directory
        }

        $art->ArtImages()->create([
            'IMAGE_PATH' => $imagePath
        ]);
        
        return redirect()->back()->with('status','New artwork has been added!');
    }

    public function deleteArtWork($artworkId){
        try {
            $artCollection = ArtCollection::where('ART_ID', $artworkId)->get();

            $artLike = ArtLike::where('ART_ID', $artworkId)->get();

            $artCategory = ArtCategory::where('ART_ID', $artworkId)->get();
         
            foreach ($artCollection as $artInCollection) {
                $artInCollection->delete();
            }

            foreach ($artCategory as $artCategories) {
                $artCategories->delete();
            }

            foreach ($artLike as $artLiked) {
                $artLiked->delete();
            }

            $artImage = ArtImage::findOrFail($artworkId);
            $artImage->delete();
    
            // Now delete the post itself
            $art = Art::findOrFail($artworkId);
            $art->delete();
    
            return response()->json(['success' => 'Collection deleted successfully.']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Collection not found.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }
    }
}
