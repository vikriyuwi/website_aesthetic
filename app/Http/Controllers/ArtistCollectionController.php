<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\ArtCollection;
use App\Models\ArtistCollection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class ArtistCollectionController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::guard('MasterUser')->user();
        $artist = Artist::where('ARTIST_ID','=',$user->Artist->ARTIST_ID)->first();

        $validated = Validator::make($request->all(), [
            'collectionTitle' => 'required',
            'collectionDescription' => 'required',
        ], [
            'collectionTitle.required' => '* The Collection title is required.',
            'collectionDescription.required' => '* The Collection description is required.',
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withError($validated->error());
        }

        $artist->Collections()->create([
            'COLLECTION_NAME' => $request->collectionTitle,
            'COLLECTION_DESCR'=> $request->collectionDescription
        ]);

        return redirect()->back()->with('status','New collection has been added!');
    }

    public function update(Request $request, $id)
    {
        $user = Auth::guard('MasterUser')->user();
        $artist = Artist::where('ARTIST_ID', '=', $user->Artist->ARTIST_ID)->first();

        // Validate the input
        $validated = Validator::make($request->all(), [
            'collectionTitle' => 'required',
            'collectionDescription' => 'required',
        ], [
            'collectionTitle.required' => '* The Collection title is required.',
            'collectionDescription.required' => '* The Collection description is required.',
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated->errors());
        }

        // Find the specific collection by its ID
        $collection = ArtistCollection::where('ARTIST_COLLECTION_ID', $id)->first();

        if (!$collection) {
            return redirect()->back()->withErrors(['error' => 'Collection not found.']);
        }

        // Update the collection details
        $collection->update([
            'COLLECTION_NAME' => $request->collectionTitle,
            'COLLECTION_DESCR' => $request->collectionDescription,
        ]);

        return redirect()->back()->with('status', 'Collection has been updated successfully!');
    }

    public function destroy($collectionId){

        // Find the specific collection by its ID
        $collection = ArtistCollection::where('ARTIST_COLLECTION_ID', $id)->first();

        if (!$collection) {
            return redirect()->back()->withErrors(['error' => 'Collection not found.']);
        }
        
        $collection->delete();

        return redirect()->route('artists.show', ['id' => $id, 'section' => 'collection'])->with('status', 'Collection has been updated successfully!');
    }

    public function addArtToCollection(Request $request)
    {
        try {
            // Validate request
            $request->validate([
                'artworks' => 'required|array',
                'artworks.*' => 'exists:art,ART_ID',
                'collection_id' => 'required|exists:ART_COLLECTION,ARTIST_COLLECTION_ID'
            ]);

            $collectionId = $request->input('collection_id');

            foreach ($request->artworks as $artId) {
                ArtCollection::updateOrCreate(
                    ['ART_ID' => $artId, 'ARTIST_COLLECTION_ID' => $collectionId],
                    []
                );
            }

            return response()->json([
                'success' => true,
                'message' => 'Artworks successfully added to the collection.'
            ]);
        } catch (\Exception $e) {
            Log::error('Error adding artworks to collection:', ['error' => $e->getMessage()]);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while adding artworks to the collection.'
            ], 500);
        }
    }
}
