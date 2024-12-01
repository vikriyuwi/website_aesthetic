<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ListArtistController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\ArtGalleryController;
use App\Http\Controllers\ArtistArtWorkController;
use App\Http\Controllers\ArtistCollectionController;
use App\Http\Controllers\ArtistPortfolioController;
use App\Http\Controllers\ArtistPostController;
use App\Http\Controllers\ArtistProfileController;
use App\Http\Controllers\CheckoutController;

Route::get('/', function () {
    return redirect('/login');
});


Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('register');

Route::get('/landing', [App\Http\Controllers\WebController::class, 'landing'])->name('landing');

Route::post('/login', [App\Http\Controllers\AuthController::class, 'loginPost'])->name('login');
Route::post('/register', [App\Http\Controllers\AuthController::class, 'registerPost'])->name('register');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\WebController::class, 'home'])->name('home');

Route::get('/resetpassword', [WebController::class, 'resetpassword']);

// Route::get('/artists', [App\Http\Controllers\WebController::class, 'listArtists'])->name('artist.list');
Route::get('/artists',[App\Http\Controllers\ListArtistController::class, 'viewListArtist']);


Route::get('/artists/{id}/{section?}', [ArtistProfileController::class, 'showArtist'])->name('artist.show');





Route::get('/category/{category}', [WebController::class, 'showCategory'])->name('category.show');

Route::get('/artwork/{id}', [WebController::class, 'showArtwork'])->name('artwork.show');

Route::get('/explore', [App\Http\Controllers\WebController::class, 'explore']);

// Route::get('/landing', [App\Http\Controllers\WebController::class, 'landing']);

Route::get('/art-gallery', function () {
    return view('art-gallery');
});

Route::get('/art-gallery/{id}', [ArtGalleryController::class, 'show'])->name('art-gallery.show');

Route::get('/favorites/follows', [WebController::class, 'follows'])->name('favorites.follows');

Route::get('/favorites/likes', [WebController::class, 'likes'])->name('favorites.likes');

Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout');

Route::get('/order-summary', [WebController::class, 'orderSummary'])->name('order.summary');

Route::get('/order-history', [WebController::class, 'orderHistory'])->name('order.history');

Route::get('/landing2', [App\Http\Controllers\WebController::class, 'landing2']);

Route::get('/home', [App\Http\Controllers\WebController::class, 'home'])->name('Home.home');

Route::get('/like-history', [WebController::class, 'likeHistory'])->name('like.history');

Route::get('/follows', [WebController::class, 'folloProfile'])->name('follo.profile');

Route::get('/followers', [WebController::class, 'followers'])->name('followers');

Route::get('/following', [WebController::class, 'following'])->name('following');


#REGION BUYER
//------------------------------------------------------------------BUYER------------------------------------------------------------------

Route::get('buyer/profile',[WebController::class,'buyerProfile'])->name('buyer.showProfile');

//---------------------------------------------------------------ENDBUYER------------------------------------------------------------------

#ENDREGION

#REGION ARTIST PROFILE

//------------------------------------------------------------------ARTIST PROFILE SIDE BAR------------------------------------------------------------------
//GET ARTIST PROFILE
Route::get('/artist/profile/{artistId}', [ArtistProfileController::class, 'getArtistProfile'])->name('artist.getArtistProfile');

//UPDATE ARTIST PROFILE
Route::post('/artist/profile/update/{artistId}', [ArtistProfileController::class,'updateArtistProfile'])->name('artist.updateArtistProfile');

//--------------------------------------------------------------END ARTIST PROFILE SIDE BAR------------------------------------------------------------------

//Portfolio
//Store the portfolio
Route::post('/portfolio/add', [ArtistPortfolioController::class, 'store'])->name('portfolio.store');

//------------------------------------------------------------------COLLECTION------------------------------------------------------------------

//VIEW ART INSIDE COLLECTION
Route::get('/artists/{artistId}/collection/{collectionId}', [ArtistProfileController::class, 'showCollection'])->name('collection.show');

//ADD COLLECTION
Route::post('/collection/add', [ArtistCollectionController::class, 'store'])->name('collection.store');

//DELETE COLLECTION
Route::post('/collection/delete/{collectionId}', [ArtistCollectionController::class, 'destroy'])->name('collection.delete');

//ADD ART INTO COLLECTION
Route::post('/collection/addArt',[ArtistCollectionController::class, 'addArtToCollection'])->name('collection.addArt');

//---------------------------------------------------------------ENDCOLLECTION------------------------------------------------------------------

//------------------------------------------------------------------POST------------------------------------------------------------------
//ADD POST
Route::post('post/add',[ArtistPostController::class,'addPost'])->name('post.store');

//DELETE POST
Route::post('post/delete/{postId}',[ArtistPostController::class,'deletePost'])->name('post.destroy');

//LIKE POST TOGGLE
Route::post('post/like/{postId}', [ArtistPostController::class, 'togglePostLike'])->name('post.likeToggle');

//GET COMMENT FROM ARTIST POST
Route::get('/comments/{postId}', [ArtistPostController::class, 'getPostComments']);

//ADD COMMENT FROM ARTIST POST
Route::post('/comments/{postId}', [ArtistPostController::class, 'addPostComment']);
//------------------------------------------------------------------ENDPOST----------------------------------------------------------------


//------------------------------------------------------------------ARTWORK------------------------------------------------------------------
//VIEW ALL ARTWORK
Route::get('/artworks/{artistId}/', [ArtistArtWorkController::class, 'showAllArtwork'])->name('all-artwork.show');

//ADD ARTWORK
Route::post('artworks/add',[ArtistArtWorkController::class,'addArtWork'])->name('artwork.store');

//DELETE ARTWORK
Route::post('artworks/delete/{artworkId}',[ArtistArtWorkController::class,'deleteArtWork'])->name('artwork.destroy');

//---------------------------------------------------------------ENDARTWORK------------------------------------------------------------------

#ENDREGION

Route::get('/favorites/cart', [WebController::class, 'cartProfile'])->name('cart.profile');

Route::get('/about-us', [WebController::class, 'aboutUs'])->name('about-us');

Route::get('/join-artist', [WebController::class, 'joinArtist'])->name('join-artist');

Route::get('/insight-artist', [WebController::class, 'insightArtist'])->name('insight-artist');

Route::get('/blog', [WebController::class, 'blog'])->name('blog');

Route::get('/blog-detail', [WebController::class, 'blogDetail'])->name('blog-detail');

Route::get('/contact-us', [WebController::class, 'contactUs'])->name('contact-us');

Route::get('/colection/detail', [WebController::class, 'collectionDetails'])->name('collection-details');