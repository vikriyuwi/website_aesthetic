<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class WebController extends Controller
{
    public function login(Request $request)
    {
        return view('login');
    }

    public function register(Request $request)
    {
        return view('register');
    }

    public function showArtist($id)
    {
        // Dummy data 
        $artists = [
            1 => ['name' => 'Devin Jatho', 'bio' => 'Graphic Designer', 'location' => 'Anywhere', 'image' => 'artist1.jpg'],
            2 => ['name' => 'Make Relish', 'bio' => 'Production Coordinator', 'location' => 'Anywhere', 'image' => 'artist2.jpg'],
            3 => ['name' => 'Geri Walker', 'bio' => 'Web Designer', 'location' => 'America', 'image' => 'artist3.jpg'],
        ];
    
        // Find artist by ID
        if (!isset($artists[$id])) {
            abort(404, 'Artist not found.');
        }
    
        $artist = $artists[$id];
    
        return view('artists.show', compact('artist'));
    }
     
    public function listArtists()
{
    $artists = [
        ['id' => 1, 'name' => 'Devin Jatho', 'job' => 'Graphic Designer', 'location' => 'Anywhere', 'image' => 'artist1.jpg', 'posted_at' => '2 days ago'],
        ['id' => 2, 'name' => 'Make Relish', 'job' => 'Production Coordinator', 'location' => 'Anywhere', 'image' => 'artist2.jpg', 'posted_at' => '3 days ago'],
        ['id'=>  3, 'name'=> 'Geri Walker',  'job'  => 'Web Designer', 'location' => 'America', 'image' => 'artist2.jpg', 'posted_at' => '4 days ago'],
        ['id'=>  4, 'name'=> 'Paul Vane',  'job'  => 'Illustrator', 'location' => 'America', 'image' => 'artist2.jpg', 'posted_at' => '4 days ago'],
        ['id'=>  5, 'name'=> 'Steve James',  'job'  => 'Production Coordinator', 'location' => 'America', 'image' => 'artist2.jpg', 'posted_at' => '4 days ago'],
        ['id'=>  6, 'name'=> 'Diu South',  'job'  => 'Graphic Designer', 'location' => 'America', 'image' => 'artist2.jpg', 'posted_at' => '4 days ago'],
        ['id'=>  7, 'name'=> 'Luminous Ror',  'job'  => 'Production Coordinator', 'location' => 'America', 'image' => 'artist2.jpg', 'posted_at' => '4 days ago'],
    ];

    return view('artists.index', compact('artists'));
}

    
    public function explore(Request $request)
    {
        return view('explore');
    }

    public function landing(Request $request)
    {
        return view('landing');
    }

    public function landing2(Request $request)
    {
        return view('landing2');
    }

    public function home(Request $request)
    {
        return view('Home.home');
    }

}
