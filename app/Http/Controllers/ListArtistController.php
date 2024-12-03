<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Artist;

class ListArtistController extends Controller
{
    public function viewListArtist()
    {
        $countArtist = Artist::where('IS_ACTIVE',true)->count();

        $listArtist = Artist::where('IS_ACTIVE',true)->get();

        // DB::table('ARTIST')
        //             ->select('ARTIST.ARTIST_ID', DB::raw('DATEDIFF(day, ARTIST.JOIN_DATE, GETDATE()) AS JOINED'), 'MASTER_USER.USERNAME', 'ARTIST.LOCATION', 'ARTIST.ROLE','ARTIST.BIO', 'MASTER_USER.PROFILE_IMAGE_PATH')
        //             ->join('MASTER_USER', 'ARTIST.USER_ID', '=', 'MASTER_USER.USER_ID')
        //             ->get();

        return view('artists.index', compact('countArtist','listArtist'));

    }

}
