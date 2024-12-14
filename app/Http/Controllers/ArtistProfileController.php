<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Buyer;
use App\Models\Art;
use App\Models\MasterUser;
use App\Models\ArtCollection;
use App\Models\ArtistCollection;
use App\Models\ArtistHire;
use App\Models\ArtCategoryMaster;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ArtistProfileController extends Controller
{
    public function showArtist($ARTIST_ID, $section = 'home')
    {
        $user = Auth::guard('MasterUser')->user();
        $artist = Artist::where('ARTIST_ID','=',$ARTIST_ID)->first();

        $artist->addView();

        $portfolios = Art::where('USER_ID',$artist->USER_ID)->where('IS_SALE',false)->get();
        $artWorks = Art::where('USER_ID',$artist->USER_ID)->where('IS_SALE',true)->get();
        $artCategoriesMaster = ArtCategoryMaster::all();
        $posts = Post::where('ARTIST_ID','=',$ARTIST_ID)->get();
        $hire = ArtistHire::where('ARTIST_ID','=',$ARTIST_ID)->first();

        if ($artist == null) {
            abort(404, 'Artist not found.');
        }
        else{
            $artistItSelf = $user == $artist->MasterUser;
            return view('artists.show', compact('artist','section','artistItSelf','portfolios','artWorks','artCategoriesMaster','posts', 'hire')); //ABOUT RENDER
        }
    }
    
    public function showCollection($artistId, $ARTIST_COLLECTION_ID)
    {
        $collection = ArtistCollection::where('ARTIST_COLLECTION_ID',$ARTIST_COLLECTION_ID)->first();
        $artsCount = $collection->ArtistCollections->count();

        $artist = Artist::where('ARTIST_ID',$artistId)->first();
        $artsWithoutCollections = $artist->MasterUser->Arts()->doesntHave('ArtCollection')->get();

        return view('artists.sections.collection-detail', compact('collection', 'artsCount', 'artist','artsWithoutCollections'));
    }

    public function getArtistProfile($artistId){

        // Fetch the artist and related user data
        $artist = Artist::where('ARTIST_ID',$artistId)->first();

        // Check if artist exists
        if (!$artist) {
            return response()->json(['error' => 'Artist not found'], 404);
        }

        return response()->json($artist);
    }

    public function updateArtistProfile(Request $request, $id)
    {
        $artist = Artist::where('ARTIST_ID',$id)->first();

        if ($artist == null) {
            abort(404, 'Artist not found.');
        }

        $buyer = Buyer::where('USER_ID',$artist->USER_ID)->first();

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'bio' => 'required',
            'location' => 'required',
            'role' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $artist->BIO = $request->bio;
        $artist->ABOUT = $request->bio;
        $artist->LOCATION = $request->location;
        $artist->ROLE = $request->role;
        $artist->save();

        $buyer->FULLNAME = $request->name;

        $imagePath = $buyer->PROFILE_IMAGE_URL;

        if ($request->hasFile('picture')) {
            $uploadedFile = $request->file('picture');
            if($uploadedFile != null) {

                $imagePath = $uploadedFile->store('images/artist', 'public'); // Save file in the `storage/app/public/images/art` directory

                if($buyer->PROFILE_IMAGE_URL != null) {
                    $filePath = $buyer->PROFILE_IMAGE_URL; // Relative to the storage/app directory
                    Storage::disk('public')->delete($filePath);
                }
            }
        }

        $buyer->PROFILE_IMAGE_URL = $imagePath;
        $buyer->save();

        return redirect()->back()->with('success','Profile has been updated successfully');
    }
        
}
