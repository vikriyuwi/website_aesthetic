<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ListArtistController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\ArtGalleryController;
use App\Http\Controllers\ArtistArtWorkController;
use App\Http\Controllers\ArtistCollectionController;
use App\Http\Controllers\ArtCollectionController;
use App\Http\Controllers\ArtistPortfolioController;
use App\Http\Controllers\ArtistPostController;
use App\Http\Controllers\ArtistProfileController;
use App\Http\Controllers\ArtistHireController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\Authorization;
use App\Http\Middleware\Role;
use App\Http\Middleware\ActiveBuyer;
use App\Http\Middleware\ActiveArtist;
use App\Http\Middleware\AdminAuth;

Route::get('/', function () {
    return redirect('/landing');
});

// Route::middleware(ActiveBuyer::class)->group(function() {
//     Route::get('/', function() {
//         return "hai";
//     });
// });

// Auth user not allowed to open this
Route::middleware(Authorization::class.':false')->group(function() {
    Route::get('/login', [AuthController::class, 'login']);
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
});

Route::middleware([Authorization::class.':true'])->group(function() {
    Route::get('/resetpassword', [WebController::class, 'resetpassword']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware([ActiveBuyer::class])->group(function() {
        Route::get('/join-artist', [WebController::class, 'joinArtist'])->name('join-artist');
        Route::post('/join-artist', [WebController::class, 'registerArtist'])->name('register-artist');

        // CART
        Route::prefix('cart')->name('cart.')->group(function() {
            Route::get('/{id}', [CartController::class, 'addToCart'])->name('add');
            Route::get('/{id}/remove', [CartController::class, 'removeFromCart'])->name('remove');
        });

        // PORTFOLIO
        Route::get('/portfolio/{id}/like',[ArtistArtWorkController::class,'like'])->name('portfolio.like');
        Route::get('/artwork/{id}/like',[ArtistArtWorkController::class,'like'])->name('artwork.like');

        // ARTIST REVIEW
        Route::prefix('artist')->name('artist.')->group(function () {
            Route::put('/{id}/review', [ArtistProfileController::class, 'reviewArtist'])->name('review');
            Route::get('/review/{id}/delete', [ArtistProfileController::class, 'destroyArtistReview'])->name('review.delete');
        });

        // ORDER
        Route::prefix('order')->name('order.')->group(function() {
            Route::get('/', [OrderController::class, 'index'])->name('my');
            Route::get('/chekcout',[OrderController::class, 'checkout'])->name('checkout');
            Route::get('/history', [OrderController::class, 'history'])->name('history');
            Route::prefix('address')->name('address.')->group(function() {
                Route::get('/', [AddressController::class, 'index'])->name('show');
                Route::get('/add', [AddressController::class, 'add'])->name('add');
                Route::post('/add', [AddressController::class, 'store'])->name('store');
                Route::get('/{id}/delete', [AddressController::class, 'destroy'])->name('destroy');
                Route::get('/{id}/activate', [AddressController::class, 'active'])->name('activate');
            });
            Route::get('/{id}/summary', [OrderController::class, 'show'])->name('summary');
        });
    });

    Route::middleware([ActiveArtist::class])->group(function() {

        // PROFILE
        Route::put('/artist/{artistId}/update/', [ArtistProfileController::class,'updateArtistProfile'])->name('artist.update');

        // COLLECTION
        Route::prefix('collection')->name('collection.')->group(function () {
            Route::post('/add', [ArtistCollectionController::class, 'store'])->name('store');
            Route::put('/{collectionId}/update', [ArtistCollectionController::class, 'update'])->name('update');
            Route::put('/{collectionId}/addArt', [ArtistCollectionController::class, 'addArtToCollection'])->name('addArt');
            Route::get('/delete/{collectionId}', [ArtistCollectionController::class, 'destroy'])->name('delete');
        });

        Route::prefix('art-collection')->name('artCollection.')->group(function () {
            Route::get('/{artCollectionId}/delete',[ArtCollectionController::class,'destroy'])->name('delete');
        });

        // PORATFOLIO
        Route::prefix('portfolio')->name('portfolio.')->group(function () {
            Route::post('/add', [ArtistPortfolioController::class, 'store'])->name('store');
            Route::get('/{portfolioId}/delete/',[ArtistPortfolioController::class,'deletePortfolio'])->name('destroy');
        });

        // ARTWORK
        Route::prefix('artwork')->name('artwork.')->group(function () {
            Route::post('/add',[ArtistArtWorkController::class,'addArtWork'])->name('store');
            Route::get('/{artworkId}/delete/',[ArtistArtWorkController::class,'deleteArtWork'])->name('destroy');
        });

        // POST
        Route::prefix('post')->name('post.')->group(function () {
            Route::post('/add',[ArtistPostController::class,'store'])->name('store');
            Route::get('/{postId}/delete',[ArtistPostController::class,'deletePost'])->name('destroy');
        });

        // HIRE
        Route::prefix('hire')->name('hire.')->group(function() {
            Route::post('/add', [ArtistHireController::class, 'store'])->name('store');
            Route::get('/{hireId}/delete', [ArtistHireController::class, 'destroy'])->name('destroy');
            Route::put('/{hireId}/update', [ArtistHireController::class, 'update'])->name('update');
        });

        // INSIGHT
        Route::get('/insight-artist', [WebController::class, 'insightArtist'])->name('insight-artist');
    });

    Route::middleware([AdminAuth::class])->group(function() {
        Route::prefix('admin')->name('admin.')->group(function() {
            Route::get('/', [AdminController::class, 'index'])->name('dashboard');
            
            Route::get('/buyer', [AdminController::class, 'buyer'])->name('buyer');
            Route::get('/buyer/{id}/active-toggle', [AdminController::class, 'activateBuyer'])->name('buyer.activate');
            Route::get('/artist', [AdminController::class, 'artist'])->name('artist');
            Route::get('/artist/{id}/active-toggle', [AdminController::class, 'activateArtist'])->name('artist.activate');
            
            Route::prefix('category')->name('category.')->group(function() {
                Route::get('/', [AdminController::class, 'category'])->name('show');
                Route::post('/', [AdminController::class, 'addCategory'])->name('store');
                Route::get('/{id}/delete', [AdminController::class, 'deleteCategory'])->name('destroy');
            });

            Route::prefix('skill')->name('skill.')->group(function() {
                Route::get('/', [AdminController::class, 'skill'])->name('show');
                Route::post('/', [AdminController::class, 'addSkill'])->name('store');
                Route::get('/{id}/delete', [AdminController::class, 'deleteSkill'])->name('destroy');
            });
            
            Route::get('/login', function () {
                return view('admin.login');
            })->name('login');
        });
    });
});

Route::get('/landing', [App\Http\Controllers\WebController::class, 'landing'])->name('landing');
Route::get('/home', [App\Http\Controllers\WebController::class, 'home'])->name('home');

// Route::get('/artists', [App\Http\Controllers\WebController::class, 'listArtists'])->name('artist.list');
Route::get('/artists',[App\Http\Controllers\ListArtistController::class, 'viewListArtist']);
Route::get('/artists/{id}/{section?}', [ArtistProfileController::class, 'showArtist'])->name('artist.show');
Route::get('/category/{category}', [WebController::class, 'showCategory'])->name('category.show');

//VIEW ART INSIDE COLLECTION
Route::get('/artists/{artistId}/collection/{collectionId}', [ArtistProfileController::class, 'showCollection'])->name('collection.show');

Route::prefix('artwork')->name('artwork.')->group(function () {
    Route::get('/{id}', [WebController::class, 'showArtwork'])->name('show');
});

Route::prefix('art-gallery')->name('artGallery.')->group(function () {
    Route::get('/', [ArtGalleryController::class, 'index'])->name('index');
    Route::get('/{id}', [ArtGalleryController::class, 'show'])->name('show');
});

Route::prefix('post')->name('post.')->group(function () {
    Route::get('/{id}', [PostController::class, 'postDetails'])->name('detail');
    Route::put('/{id}/comment', [PostController::class, 'addComment'])->name('comment');
    Route::get('/comment/{id}/delete', [PostController::class, 'destroyComment'])->name('comment.delete');
});

Route::get('/explore', [App\Http\Controllers\WebController::class, 'explore']);

// Route::get('/landing', [App\Http\Controllers\WebController::class, 'landing']);



Route::get('/favorites/follows', [WebController::class, 'follows'])->name('favorites.follows');

Route::get('/favorites/likes', [WebController::class, 'likes'])->name('favorites.likes');

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

//--------------------------------------------------------------END ARTIST PROFILE SIDE BAR------------------------------------------------------------------

//Portfolio
//Store the portfolio


//------------------------------------------------------------------COLLECTION------------------------------------------------------------------



//---------------------------------------------------------------ENDCOLLECTION------------------------------------------------------------------

//------------------------------------------------------------------POST------------------------------------------------------------------

//DELETE POST


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

//DELETE ARTWORK


//---------------------------------------------------------------ENDARTWORK------------------------------------------------------------------

#ENDREGION

Route::get('/favorites/cart', [WebController::class, 'cartProfile'])->name('cart.profile');

Route::get('/about-us', [WebController::class, 'aboutUs'])->name('about-us');

Route::get('/blog', [WebController::class, 'blog'])->name('blog');

Route::get('/blog-detail', [WebController::class, 'blogDetail'])->name('blog-detail');

Route::get('/contact-us', [WebController::class, 'contactUs'])->name('contact-us');

Route::get('/colection/detail', [WebController::class, 'collectionDetails'])->name('collection-details');