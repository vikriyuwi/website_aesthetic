<?php

namespace App\Http\Controllers;

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
        $validated = Validator::make($request->all(), [
            'collectionTitle' => 'required',
            'collectionDescription' => 'required',
        ], [
            'collectionTitle.required' => '* The Collection title is required.',
            'collectionDescription.required' => '* The Collection description is required.',
        ]);

        if ($validated->fails()) {
            // Return validation errors as JSON
            return response()->json(['errors' => $validated->errors()], 422);
        }

        ArtistCollection::create([
            'COLLECTION_NAME' => $request->collectionTitle,
            'COLLECTION_DESCR'=> $request->collectionDescription,
            'USER_ID'=> Auth::id(),
            ]);

        // Save the collection (replace this with actual save logic)
        // Collection::create([...]);

        return response()->json(['success' => 'Collection added successfully!']);
    }

    public function destroy($collectionId){
        try {
            // Fetch the associated media for the post
            $artCollection = ArtCollection::where('ARTIST_COLLECTION_ID', $collectionId)->get();
            
            // Delete all associated post media
            foreach ($artCollection as $artColl) {
                $artColl->delete();
            }
    
            // Now delete the post itself
            $artistCollection = ArtistCollection::findOrFail($collectionId);
            $artistCollection->delete();
    
            return response()->json(['success' => 'Collection deleted successfully.']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Collection not found.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }
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
