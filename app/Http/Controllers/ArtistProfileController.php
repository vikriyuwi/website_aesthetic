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
use App\Models\ArtistRating;
use App\Models\SkillMaster;
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
        $carts = null;
        if(Auth::user() != null) {
            $carts = Auth::user()->Carts;
        }

        $user = Auth::guard('MasterUser')->user();
        $artist = Artist::where('ARTIST_ID','=',$ARTIST_ID)->first();

        if($artist == null) {
            return redirect()->route('landing')->withErrors(['message'=>'Artist not found']);
        }

        $artist->addView();

        $portfolios = Art::where('USER_ID',$artist->USER_ID)->where('IS_SALE',false)->get();
        $artWorks = Art::where('USER_ID',$artist->USER_ID)->where('IS_SALE',true)->get();
        $artCategoriesMaster = ArtCategoryMaster::all();
        $posts = Post::where('ARTIST_ID','=',$ARTIST_ID)->get();
        $hire = ArtistHire::where('ARTIST_ID','=',$ARTIST_ID)->first();
        $skillsMaster = SkillMaster::all();

        if ($artist == null) {
            abort(404, 'Artist not found.');
        }
        else{
            $artistItSelf = $user->USER_ID == $artist->USER_ID;
            return view('artists.show', compact('artist','section','artistItSelf','portfolios','artWorks','artCategoriesMaster','posts', 'hire', 'skillsMaster', 'carts')); //ABOUT RENDER
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
        
    public function reviewArtist($id, Request $request)
    {
        $user = Auth::user();
        $artist = Artist::find($id);

        if($artist == null) {
            return redirect()->back()->withErrors(['message'=>'Artist not found!']);
        }

        $review = $artist->ArtistRatings()->create([
            'USER_ID' => $user->USER_ID,
            'USER_RATING' => $request->rating,
            'CONTENT' => $request->content
        ]);

        return redirect()->back()->with('success','Review has been posted!');
    }

    public function destroyArtistReview($id)
    {
        $user = Auth::user();
        $review = ArtistRating::find($id);

        if($review->USER_ID != $user->USER_ID)
        {
            return redirect()->back()->withErrors(['message'=>'Not your review']);
        }

        $review->delete();

        return redirect()->back()->with('status','Review has been deleted!');
    }
    
    public function sendReport($id, Request $request)
    {
        $user = Auth::user();
        $artist = Artist::find($id);

        if($artist == null) {
            return redirect()->back()->withErrors(['message'=>'Artist not found!']);
        }

        $user->ArtistReports()->create([
            'ARTIST_ID' => $artist->ARTIST_ID,
            'CONTENT' => $request->CONTENT
        ]);
        
        return redirect()->back()->with('status','Report to '. $artist->MasterUser->Buyer->FULLNAME .' has been sent !');
    }
}
