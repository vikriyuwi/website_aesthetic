<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Art;
use App\Models\Artist;
use App\Models\ArtCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ArtGalleryController extends Controller
{
    public function index()
    {
        $portfolios = Art::where('IS_SALE',false)->get();

        return view('art-gallery',compact('portfolios'));
    }

    public function show($id)
    {
        $portfolio = Art::find($id);

        $morePortfolios = Art::where('USER_ID',$portfolio->USER_ID)->where('IS_SALE',false)->where('ART_ID', '!=', $portfolio->ART_ID)->limit(4)->get();

        if ($portfolio == null) {
            abort(404);
        }

        return view('art-gallery-detail',compact('portfolio','morePortfolios'));
    }

}
