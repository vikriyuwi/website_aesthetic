<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Art;
use App\Models\MasterUser;
use App\Models\Artist;
use App\Models\Buyer;
use App\Models\ArtCategory;

class AdminController extends Controller
{
    public function index()
    {
        $totalBuyer = MasterUser::where('USER_LEVEL','!=','3')->count();
        $totalArtist = MasterUser::has('ARTIST')->count();
        $totalCategory = ArtCategory::count();
        $totalArtwork = Art::where('IS_SALE',true)->count();
        return view('admin.dashboard', [
            'totalBuyers' => $totalBuyer, 
            'totalArtists' => $totalArtist, 
            'totalCategories' => $totalCategory, 
            'totalSkills' => 35, 
            'totalArtworks' => $totalArtwork
        ]);
    }

    public function buyer()
    {
        $buyers = Buyer::all();
        return view('admin.buyers', compact('buyers'));
    }

    public function activateBuyer($id)
    {
        $result = "";
        $buyer = Buyer::find($id);
        if ($buyer->isActive()) {
            $buyer->IS_ACTIVE = 0;
            $result = "deactivated";
        } else {
            $buyer->IS_ACTIVE = 1;
            $result = "activated";
        }
        $buyer->save();
        return redirect()->back()->with('status','Buyer '.$buyer->FULLNAME.' is '.$result);
    }

    public function artist()
    {
        $artists = Artist::all();
        return view('admin.artists', compact('artists'));
    }

    public function activateArtist($id)
    {
        $result = "";
        $artist = Artist::find($id);
        if ($artist->isActive()) {
            $artist->IS_ACTIVE = 0;
            $result = "deactivated";
        } else {
            $artist->IS_ACTIVE = 1;
            $result = "activated";
        }
        $artist->save();
        return redirect()->back()->with('status','Artist '.$artist->MasterUser->Buyer->FULLNAME.' is '.$result);
    }
}
