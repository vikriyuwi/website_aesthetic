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
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


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

    public function deletePortfolio($portfolioId){
        $user = Auth::guard('MasterUser')->user();

        $artist = Artist::where('ARTIST_ID','=',$user->Artist->ARTIST_ID)->first();
        if($artist == null) {
            abort(404, 'You are not artist');
        }

        $portfolio = Art::find($portfolioId);

        if($portfolio->USER_ID != $user->USER_ID) {
            abort(404, 'You are not owner of this hiring');
        }

        if($portfolio->ArtImages->count() > 0) {
            foreach($portfolio->ArtImages as $image) {
                if ($image->IMAGE_PATH != null) {
                    if(Str::startsWith($image->IMAGE_PATH, 'images/art/')) {
                        $filePath = $image->IMAGE_PATH;
                        Storage::disk('public')->delete($filePath);
                    }
                }
            }
        }

        $portfolio->delete();

        return redirect()->route('artist.show', ['id' => $artist->ARTIST_ID, 'section' => 'portfolio'])->with('status', 'Portfolio has been deleted successfully!');
    }
}
