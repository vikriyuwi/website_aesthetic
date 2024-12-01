<?php

namespace App\Http\Controllers;

use App\Models\Art;
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
        $totalArtWorks = DB::table('ART')
                        ->select('*')
                        ->where('ARTIST_ID','=',$ARTIST_ID)
                        ->count();

        $artCategoryMaster = DB::table('ART_CATEGORY_MASTER')
                            ->select('*')
                            ->get();

        return view('artists.sections.all-artworks', compact('artworks', 'artistId','totalArtWorks','artCategoryMaster'));
    }

    public function addArtWork(Request $request){

        try {
            // Validate request
            $validated = Validator::make($request->all(), [
                'artWorkTitle' => 'required|string|max:255',
                'artWorkDescription' => 'required|string',
                'artWorkPrice' => 'required|numeric',
                'category_art' => 'required|array|min:1|max:6',
                'category_art.*' => 'integer|exists:ART_CATEGORY_MASTER,ART_CATEGORY_MASTER_ID',
                'imageOption' => 'required|string|in:file,link',
                'artWorkImageUpload' => 'nullable|required_if:imageOption,file|image|mimes:jpeg,png,jpg,gif|max:2048',
                'artWorkImageLink' => 'nullable|required_if:imageOption,link|url',
            ], [
                'artWorkTitle.required' => '* The ArtWork title is required.',
                'artWorkDescription.required' => '* The ArtWork description is required.',
                'artWorkPrice'=> '* Please Enter the correct input for the price',
                'category_art.required' => '* Please select at least one category.',
                'artWorkImageUpload.required_if' => '* Please upload an image file when "Upload from File" is selected.',
                'artWorkImageLink.required_if' => '* Please provide a valid URL when "Upload by Link" is selected.',
            ]);

            if ($validated->fails()) {
                return response()->json(['errors' => $validated->errors()], 422);
            }

             // Process the data (insert into database)
             $categories = $request->category_art;
             $imagePath = null;
 
             if ($request->imageOption === 'file') {
                 $imagePath = $request->file('artWorkImageUpload')->store('uploads', ['disk' => 'public']);
                 $imagePath = '/storage/' . $imagePath;
             } elseif ($request->imageOption === 'link') {
                 $imagePath = $request->artWorkImageLink;
             }
 
             // Fetch artist ID
             $artist = DB::table('ARTIST')
                 ->select('ARTIST_ID')
                 ->where('USER_ID', Auth::id())
                 ->first();
 
             if (!$artist) {
                 return response()->json(['errors' => ['error' => 'Artist not found.']], 422);
             }
 
             $artistId = $artist->ARTIST_ID;
 
             // Insert data
             $art = Art::create([
                 'ARTIST_ID' => $artistId,
                 'ART_TITLE' => $request->artWorkTitle,
                 'DESCRIPTION' => $request->artWorkDescription,
                 'VIEW' => 0,
                 'IS_SALE' => true,
                 'PRICE' => $request->artWorkPrice,
             ]);
 
             ArtImage::create([
                 'ART_ID' => $art->ART_ID,
                 'IMAGE_PATH' => $imagePath,
             ]);
 
             foreach ($categories as $categoryMasterId) {
                 ArtCategory::create([
                     'ART_ID' => $art->ART_ID,
                     'ART_CATEGORY_MASTER_ID' => $categoryMasterId,
                 ]);
             }

            // Return a success response
            return response()->json(['success' => 'Portfolio added successfully!'], 200);
        } catch (\Exception $e) {
            // Log exception and return error
            return response()->json(['errors' => ['error' => 'An unexpected error occurred.']], 500);
        }
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
