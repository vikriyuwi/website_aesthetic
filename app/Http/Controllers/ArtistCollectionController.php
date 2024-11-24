<?php

namespace App\Http\Controllers;

use App\Models\ArtistCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
}
