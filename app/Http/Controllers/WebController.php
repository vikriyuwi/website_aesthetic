<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\Buyer;
use App\Models\MasterUser;
use App\Models\Art;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class WebController extends Controller
{
    public function resetpassword(Request $request)
    {
        return view('resetpassword'); 
    }

    public function showArtist($id, $section = 'home')
{
    $artists = [
        1 => ['name' => 'Devin Jatho', 'bio' => 'Graphic Designer', 'location' => 'Anywhere', 'image' => 'artist1.jpg'],
        // other artists...
    ];

    if (!isset($artists[$id])) {
        abort(404, 'Artist not found.');
    }

    $artist = $artists[$id];
    $artistId = $id; // Set artistId for use in the view

    return view('artists.show', compact('artist', 'section', 'artistId'));
}
 
    public function listArtists()
{
    $artists = [
        ['id' => 1, 'name' => 'Devin Jatho', 'job' => 'Graphic Designer', 'location' => 'Anywhere', 'image' => 'melody2.jpg', 'posted_at' => '2 days ago'],
        ['id' => 2, 'name' => 'Make Relish', 'job' => 'Production Coordinator', 'location' => 'Anywhere', 'image' => 'melody.webp', 'posted_at' => '3 days ago'],
        ['id'=>  3, 'name'=> 'Geri Walker',  'job'  => 'Web Designer', 'location' => 'America', 'image' => 'artist2.jpg', 'posted_at' => '4 days ago'],
        ['id'=>  4, 'name'=> 'Paul Vane',  'job'  => 'Illustrator', 'location' => 'America', 'image' => 'artist2.jpg', 'posted_at' => '4 days ago'],
        ['id'=>  5, 'name'=> 'Steve James',  'job'  => 'Production Coordinator', 'location' => 'America', 'image' => 'artist2.jpg', 'posted_at' => '4 days ago'],
        ['id'=>  6, 'name'=> 'Diu South',  'job'  => 'Graphic Designer', 'location' => 'America', 'image' => 'artist2.jpg', 'posted_at' => '4 days ago'],
        ['id'=>  7, 'name'=> 'Luminous Ror',  'job'  => 'Production Coordinator', 'location' => 'America', 'image' => 'artist2.jpg', 'posted_at' => '4 days ago'],
        ['id'=>  8, 'name'=> 'Gemini',  'job'  => 'Production Coordinator', 'location' => 'America', 'image' => 'artist2.jpg', 'posted_at' => '4 days ago'],
        ['id'=>  9, 'name'=> 'Scorpio',  'job'  => 'Production Coordinator', 'location' => 'America', 'image' => 'artist2.jpg', 'posted_at' => '4 days ago'],
    ];

    return view('artists.index', compact('artists'));
}
        public function explore(Request $request)
    {
        return view('explore');
    }

    public function landing(Request $request)
    {
        $carts = null;
        if(Auth::user() != null) {
            $carts = Auth::user()->Carts;
        }
        return view('landing', compact('carts'));
    }

    public function landing2(Request $request)
    {
        return view('landing2');
    }

    public function home(Request $request)
    {
        return view('Home.home');
    }

    private function getArtworksByCategory($category)
    {
        $allArtworks = [
            'all' => [
                ['title' => 'Artwork 1', 'artist' => 'Artist 1', 'price' => '$5,000', 'image' => 'artwork1.jpg'],
                ['title' => 'Artwork 2', 'artist' => 'Artist 2', 'price' => '$3,500', 'image' => 'artwork2.jpg'],
            ],
            'featured' => [
                ['title' => 'Featured Artwork', 'artist' => 'Artist 2', 'price' => '$3,500', 'image' => 'featured1.jpg'],
            ],
            'anime' => [
                ['title' => 'Anime Artwork', 'artist' => 'Artist 3', 'price' => '$2,500', 'image' => 'anime1.jpg'],
            ],
        ];

        return $allArtworks[$category] ?? [];
    }

    public function showArtwork($id)
    {
        $artwork = Art::where('ART_ID',$id)->first();
        $moreArtWorks = Art::where('USER_ID',$artwork->USER_ID)->where('ART_ID', '!=', $artwork->ART_ID)->get();
    
        if (!isset($artwork)) {
            abort(404, 'Artwork not found.');
        }

        $carts = null;
        if(Auth::user() != null) {
            $carts = Auth::user()->Carts;
        }
    
        // // Calculate the aspect ratio
        // $aspectRatio = $image->height() / $image->width();
        // $imageClass = '';
    
        // if ($aspectRatio > 1) {
        //     // Vertical image
        //     $imageClass = 'h-auto w-full object-contain';
        // } elseif ($aspectRatio < 1) {
        //     // Horizontal image
            
        // } else {
        //     // Square image
        //     $imageClass = 'h-full w-full object-cover';
        // }
    
        $imageClass = 'h-full w-full object-cover';

        return view('artists.sections.artwork-detail', compact('artwork', 'imageClass','moreArtWorks','carts'));
    }    
public function showCategory($category)
{
    // Logic to fetch artworks based on the category
    $artworks = $this->getArtworksByCategory($category);

    return view('artists.sections.collection-detail', compact('artworks', 'category'));
}
public function orderSummary()
{
    return view('layouts.order-summary');
}

    public function orderHistory()
    {
        return view('profile.order-history');
    }
    public function likeHistory()
    {
        return view('profile.like-history');
    }

    public function folloProfile()
    {
        return view('profile.follo-profile');
    }

    public function followers()
    {
        return view('artists.followers-sidebar');
    }

public function following()
{
    return view('artists.following-sidebar');
}
public function cartProfile()
{
    return view('profile.cart-profile');
}

public function aboutUs()
{
    return view('footer.about-us');
}

public function joinArtist()
{
    $user = Auth::guard('MasterUser')->user();

    return view('profile.join-artist', [
        'USER' => $user,
        'ROLE' => $user->USER_LEVEL,
        'BUYER_DATA' => session('BUYER_DATA'),
    ]);
}

public function registerArtist(Request $request)
{
    $validator = Validator::make($request->all(), [
        'location' => 'required',
        'role' => 'required',
        'bio' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator);
    }

    $user = Auth::guard('MasterUser')->user();

    $artist = new Artist();
    $artist->USER_ID = $user->USER_ID;
    $artist->LOCATION = $request->location;
    $artist->ROLE = $request->role;
    $artist->BIO = $request->bio;
    $artist->ABOUT = $request->bio;
    $artist->save();

    return redirect()->back()->with('status','success');
}

public function insightArtist()
{
    return view('profile.insight');
}

public function blog()
{
    return view('footer.blog');
}

public function blogDetail()
{
    return view('footer.blog-detail');
}

public function contactUs()
{
    return view('footer.contact-us');
}

public function collectionDetails()
{
    return view('artists.sections.all-artworks');
}


public function buyerProfile(){
    return view('buyer.profile');
}

}
