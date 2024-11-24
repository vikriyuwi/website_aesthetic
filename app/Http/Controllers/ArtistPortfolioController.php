<?php

namespace App\Http\Controllers;

use App\Models\Art;
use App\Models\ArtCategory;
use App\Models\ArtImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class ArtistPortfolioController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validate request
            $validated = Validator::make($request->all(), [
                'portfolioTitle' => 'required|string|max:255',
                'portfolioDescription' => 'required|string',
                'category_art' => 'required|array|min:1|max:6',
                'category_art.*' => 'integer|exists:ART_CATEGORY_MASTER,ART_CATEGORY_MASTER_ID',
                'imageOption' => 'required|string|in:file,link',
                'collectionImageUpload' => 'nullable|required_if:imageOption,file|image|mimes:jpeg,png,jpg,gif|max:2048',
                'collectionImageLink' => 'nullable|required_if:imageOption,link|url',
            ], [
                'portfolioTitle.required' => '* The portfolio title is required.',
                'portfolioDescription.required' => '* The portfolio description is required.',
                'category_art.required' => '* Please select at least one category.',
                'collectionImageUpload.required_if' => '* Please upload an image file when "Upload from File" is selected.',
                'collectionImageLink.required_if' => '* Please provide a valid URL when "Upload by Link" is selected.',
            ]);

            if ($validated->fails()) {
                return response()->json(['errors' => $validated->errors()], 422);
            }

            // Process the data (insert into database)
            $categories = $request->category_art;
            $imagePath = null;

            if ($request->imageOption === 'file') {
                $imagePath = $request->file('collectionImageUpload')->store('uploads', ['disk' => 'public']);
                $imagePath = '/storage/' . $imagePath;
            } elseif ($request->imageOption === 'link') {
                $imagePath = $request->collectionImageLink;
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
                'ART_TITLE' => $request->portfolioTitle,
                'DESCRIPTION' => $request->portfolioDescription,
                'VIEW' => 0,
                'IS_SALE' => false,
                'PRICE' => 0,
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
}
