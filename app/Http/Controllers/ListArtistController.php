<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListArtistController extends Controller
{
    public function viewListArtist()
    {
        $countArtist = DB::table('ARTIST')->count();

        $listArtist = DB::table('ARTIST')
                    ->select('ARTIST.ARTIST_ID', DB::raw('DATEDIFF(day, ARTIST.JOIN_DATE, GETDATE()) AS JOINED'), 'MASTER_USER.USERNAME', 'ARTIST.LOCATION', 'ARTIST.ROLE')
                    ->join('MASTER_USER', 'ARTIST.USER_ID', '=', 'MASTER_USER.USER_ID')
                    ->get();

        return view('artists.index', compact('countArtist','listArtist'));

    }

}
