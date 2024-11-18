<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


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

    public function showCollection($category)
{
    // Example data for the artworks
    $artworks = [
        [
            'id' => 1,  // Add 'id' field for each artwork
            'artist' => 'Something4U',
            'title' => 'ROmantic Evening',
            'year' => '2024',
            'gallery' => 'Oily Art',
            'price' => 'US$5,800',
            'image' => 'paintingart.jpg',
            'interest' => true
        ],
        [
            'id' => 2,  // Add 'id' field for each artwork
            'artist' => 'Something4U',
            'title' => 'Artwork 2',
            'year' => '2024',
            'gallery' => 'Painting Art',
            'price' => 'US$4,200',
            'image' => 'painting2.webp',
            'interest' => false
        ],
        3 => [
            'id' => 3,
            'artist' => 'Something4U',
            'title' => 'Indian Creature',
            'year' => '2024',
            'gallery' => 'Lilienthal Gallery',
            'price' => 'US$5,500',
            'image' => 'indianart.webp',
            'interest' => false
        ],
        4 => [
            'id' => 4,
            'artist' => 'Something4U',
            'title' => 'Sweety Night',
            'year' => '2023',
            'gallery' => 'Lilienthal Gallery',
            'price' => 'US$5,500',
            'image' => 'painting2.webp',
            'interest' => false
        ],
        5 => [
            'id' => 5,
            'artist' => 'Something4U',
            'title' => 'Sweet Painting',
            'year' => '2025',
            'gallery' => 'Lilienthal Gallery',
            'price' => 'US$5,500',
            'image' => 'paintingart4.png',
            'interest' => false
        ],
    ];

    return view('artists.sections.collection-detail', compact('artworks', 'category'));
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
        $artworks = [
            1 => [
                'id' => 1,
                'artist' => 'Something4U',
                'title' => 'Romantic Evening',
                'medium' => 'Oil',
                'price' => 'Rp. 454.000',
                'year' => '2024',
                'gallery' => 'Lilienthal Gallery',
                'image' => 'paintingart3.png',
                'image_width' => 1200, // Add width
                'image_height' => 1600, // Add height
                'description' => 'In this painting, I sought to capture an intimate moment of affection...',
                'dimensions' => 'W 20" x H 16" x D 0.75"',
                'style' => 'Impressionistic',
                'subject' => 'People',
                'category' => 'Oil',
            ],
            2 => [
                'id' => 2,
                'artist' => 'Something4U',
                'title' => 'Romantic Evening',
                'medium' => 'Oil',
                'price' => 'Rp. 1.300.000',
                'year' => '2024',
                'gallery' => 'Lilienthal Gallery',
                'image' => 'homepage3.jpeg',
                'image_width' => 1600,
                'image_height' => 1200,
                'description' => 'In this painting, I sought to capture an intimate moment of affection...',
                'dimensions' => 'W 20" x H 16" x D 0.75"',
                'style' => 'Impressionistic',
                'subject' => 'People',
                'category' => 'Oil',
            ],
            3 => [
                'id' => 3,
                'artist' => 'Something4U',
                'title' => 'Romantic Evening',
                'medium' => 'Oil',
                'price' => 'Rp. 1.300.000',
                'year' => '2024',
                'gallery' => 'Lilienthal Gallery',
                'image' => 'paintingart.jpg',
                'image_width' => 1600,
                'image_height' => 1200,
                'description' => 'In this painting, I sought to capture an intimate moment of affection...',
                'dimensions' => 'W 20" x H 16" x D 0.75"',
                'style' => 'Impressionistic',
                'subject' => 'People',
                'category' => 'Oil',
            ],
            // Add more artworks as needed
        ];
    
        if (!isset($artworks[$id])) {
            abort(404, 'Artwork not found.');
        }
    
        $artwork = $artworks[$id];
    
        // Calculate the aspect ratio
        $aspectRatio = $artwork['image_height'] / $artwork['image_width'];
        $imageClass = '';
    
        if ($aspectRatio > 1) {
            // Vertical image
            $imageClass = 'h-auto w-full object-contain';
        } elseif ($aspectRatio < 1) {
            // Horizontal image
            $imageClass = 'h-auto w-full object-cover';
        } else {
            // Square image
            $imageClass = 'h-full w-full object-cover';
        }
    
        return view('artists.sections.artwork-detail', compact('artwork', 'imageClass'));
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
    return view('profile.join-artist');
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

}
