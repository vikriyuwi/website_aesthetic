<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Art;
use App\Models\MasterUser;
use App\Models\ArtistCollection;
use App\Models\ArtCategoryMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ArtistProfileController extends Controller
{
    public function showArtist($ARTIST_ID, $section = 'home')
    {
        $user = Auth::guard('MasterUser')->user();
        $artist = Artist::where('ARTIST_ID','=',$ARTIST_ID)->first();
        $portfolios = Art::where('USER_ID',$artist->USER_ID)->where('IS_SALE',false)->get();
        $artWorks = Art::where('USER_ID',$artist->USER_ID)->where('IS_SALE',true)->get();
        $artCategoriesMaster = ArtCategoryMaster::all();

        if ($artist == null) {
            abort(404, 'Artist not found.');
        }
        else{
            $artistItSelf = $user == $artist->MasterUser;
            return view('artists.show', compact('artist','section','artistItSelf','portfolios','artWorks','artCategoriesMaster')); //ABOUT RENDER
        }
    }
    
    public function showCollection($artistId, $ARTIST_COLLECTION_ID)
    {
        $collection = ArtistCollection::where('ARTIST_COLLECTION_ID',$ARTIST_COLLECTION_ID)->first();
        $artsCount = $collection->ArtCollections->count();

        $artist = Artist::where('ARTIST_ID',$artistId)->first();
        $artsWithoutCollections = $artist->MasterUser->Arts()->where('IS_SALE',true)->doesntHave('ArtCollection')->get();

        return view('artists.sections.collection-detail', compact('collection', 'artsCount', 'artist','artsWithoutCollections'));
    }

    public function getArtistProfile($artistId){

        // Fetch the artist and related user data
        $artist = DB::table('ARTIST')
                ->join('MASTER_USER', 'ARTIST.USER_ID', '=', 'MASTER_USER.USER_ID')
                ->where('ARTIST.ARTIST_ID', '=', $artistId)
                ->select(
                    'MASTER_USER.USERNAME as name',
                    'MASTER_USER.EMAIL as email',
                    'MASTER_USER.PROFILE_IMAGE_PATH as profile_image',
                    'ARTIST.LOCATION as location',
                    'ARTIST.BIO as bio',
                    'ARTIST.JOIN_DATE as join_date',
                    'ARTIST.ROLE as role'
                )
                ->first();

        // Check if artist exists
        if (!$artist) {
            return response()->json(['error' => 'Artist not found'], 404);
        }

        return response()->json($artist);
    }

    public function updateArtistProfile(Request $request)
    {
        try {
            // Get the artist ID from the request
            $artistId = $request->input('artistId');
            $artist = Artist::findOrFail($artistId);
            $userId = $artist->USER_ID;

            // Validate the input
            $validated = $request->validate([
                'name' => [
                    'required',
                    'string',
                    'max:20',
                    Rule::unique('MASTER_USER', 'USERNAME')->ignore($userId, 'USER_ID'),
                ],
                'bio' => 'nullable|string|max:255',
                'headline' => 'nullable|string|max:255',
                'location' => 'nullable|string|max:100',
                'profile_picture' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
            ], [
                'name.required' => '* The username field is required.',
                'name.max' => '* The username must not exceed 20 characters.',
                'name.unique' => '* This username is already taken.',
                'bio.max' => 'The bio must not exceed 255 characters.',
                'headline.max' => 'The headline must not exceed 255 characters.',
                'location.max' => 'The location must not exceed 100 characters.',
                'profile_picture.mimes' => '* Please upload a valid image (jpeg, png, jpg, gif).',
            ]);

            // Update the user table
            $user = MasterUser::findOrFail($userId);
            $user->USERNAME = $validated['name'];

            // Process profile picture if uploaded
            if ($request->hasFile('profile_picture')) {
                $imagePath = $request->file('profile_picture')->store('uploads', ['disk' => 'public']);
                $user->PROFILE_IMAGE_PATH = '/storage/' . $imagePath;
            }

            $user->save();

            // Update the artist table
            $artist->BIO = $validated['bio'] ?? $artist->BIO;
            $artist->ROLE = $validated['headline'] ?? $artist->ROLE;
            $artist->LOCATION = $validated['location'] ?? $artist->LOCATION;
            $artist->save();

            return response()->json(['message' => 'Profile updated successfully!']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }
    }
        
}
