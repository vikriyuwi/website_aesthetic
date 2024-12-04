<?php

namespace App\Http\Controllers;

use App\Models\Art;
use App\Models\Artist;
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
        $user = Auth::guard('MasterUser')->user();
        $artist = Artist::where('ARTIST_ID','=',$user->Artist->ARTIST_ID)->first();

        $validated = Validator::make($request->all(), [
            'portfolioTitle' => 'required',
            'portfolioDescription' => 'required',
        ], [
            'collectionTitle.required' => '* The Collection title is required.',
            'collectionDescription.required' => '* The Collection description is required.',
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withError($validated->error());
        }

        $art = $user->Arts()->create([
            'ART_TITLE' => $request->portfolioTitle,
            'DESCRIPTION' => $request->portfolioDescription,
            'IS_SALE' => false
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
        if ($request->filled('portfolioImageLink')) {
            $imagePath = $request->input('portfolioImageLink');
        }

        // If file is uploaded
        if ($request->hasFile('portfolioImageUpload')) {
            $uploadedFile = $request->file('portfolioImageUpload');
            $imagePath = $uploadedFile->store('images/art', 'public'); // Save file in the `storage/app/public/images/art` directory
        }

        $art->ArtImages()->create([
            'IMAGE_PATH' => $imagePath
        ]);
        
        return redirect()->back()->with('status','New portfolio has been added!');
    }
}
