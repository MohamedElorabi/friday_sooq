<?php

use App\Http\Controllers\Site\AdController;
use App\Http\Controllers\Site\CategoryController;
use App\Http\Controllers\Site\Contact_usController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\AuthController;
use App\Http\Controllers\Site\StoreController;
use App\Http\Controllers\Site\StoreRatingController;
use App\Http\Controllers\Site\ReportController;
use App\Http\Controllers\Site\PageController;
use App\Http\Controllers\Site\ProductController;
use App\Http\Controllers\Site\SearchController;
use App\Http\Controllers\Site\PointsController;
use App\Http\Controllers\Site\NotificationController;
use App\Http\Controllers\Site\StoreFlyerController;
use App\Http\Controllers\Site\UserController;
use App\Http\Controllers\Site\WalletController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

@include_once('admin_web.php');

Route::get('/', [HomeController::class, 'index'])->name('index');
// Route::post('/offer/{id}', [StoreFlyerController::class, 'offerDestroy'])->name('offer.delete');
 // contact-us
 Route::get('/contact-us', [Contact_usController::class, 'index'])->name('contact-us');
 Route::post('/contact-us/store', [Contact_usController::class, 'store'])->name('contact-us.store');

 
Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/cat/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/cat/{slug}', [CategoryController::class, 'show'])->name('category.show');
    
    Route::get('/sub/{id}', [CategoryController::class, 'sub'])->name('site.subcategory.show');
});

Route::get('/ad/{slug}', [AdController::class, 'show'])->name('ad.show');



// search
Route::get('/search', [SearchController::class, 'search_home'])->name('search.home');
Route::get('/search_category', [SearchController::class, 'search_category'])->name('search.category');


Route::get('/search_myads', [SearchController::class, 'search_myads'])->name('search.myads');

Route::get('/result/search_myads/{id}', [SearchController::class, 'result_search_myads'])->name('result.search.myads');

Route::get('/search_store', [SearchController::class, 'search_store'])->name('search.store');


Route::get('/search_products', [SearchController::class, 'search_products'])->name('search.products');



Route::get('/filter',[AdController::class, 'filter'])->name('filter');


Route::get('store/type/{id}', [StoreController::class, 'showStore'])->name('site.store.type.show');
 
Route::prefix('stores')->group(function () {
     Route::get('/', [StoreController::class, 'index'])->name('site.stores');
     Route::get('/popular_stores', [StoreController::class, 'popular_stores'])->name('popular.stores');

     Route::get('/create', [StoreController::class, 'create'])->name('site.stores.create');
     Route::post('/create/store', [StoreController::class, 'storeStore'])->name('site.stores.store');
     Route::get('/store/toggle_like/{id}',[StoreController::class, 'toggle_like'])->name('store.toggle_like');
     Route::get('/popular/stores',[StoreController::class,'popular'])->name('stores.popular');
     Route::get('/show/{id}', [StoreController::class, 'show'])->name('site.store.show');
     Route::get('/store-category-products/{id}', [StoreController::class, 'show_category_products'])->name('show-category-products');
     Route::get('/offer', [StoreController::class, 'create_offer'])->name('create.offer');
     Route::post('/store-offer', [StoreController::class, 'store_offer'])->name('store.offer');
     Route::get('/coupons', [StoreController::class, 'coupons'])->name('store.coupons');

     
    // products
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('store.products');
        Route::get('/product-details/{id}', [ProductController::class, 'show'])->name('product.details');
        Route::get('/create/product', [ProductController::class, 'create'])->name('store.product.create');
        Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/product_order', [ProductController::class, 'product_order'])->name('product_order');
        Route::post('/product_order/store', [ProductController::class, 'orderProduct'])->name('product_order.store');

    });

    // store packages
    Route::get('/packages', [StoreController::class, 'store_package'])->name('store.package');


    // clients
    Route::get('/clients', [StoreController::class, 'clients'])->name('clients');


     // add to cart
     Route::get('cart', [ProductController::class, 'cart'])->name('cart');
     Route::post('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
     Route::patch('update-cart', [ProductController::class, 'update'])->name('update.cart');
     Route::delete('remove-from-cart', [ProductController::class, 'remove'])->name('remove.from.cart');

 });

 Route::prefix('loyalty_program')->group(function () {
    Route::get('/', [PointsController::class, 'index'])->name('loyalty_program.index');
    Route::get('/buy_points', [PointsController::class, 'buy_points'])->name('buy.points');
    
    Route::get('/send_points', [PointsController::class, 'send_points'])->name('send.points');
    Route::post('/send', [PointsController::class, 'send'])->name('send');

    Route::get('/replace_points', [PointsController::class, 'replace_points'])->name('replace.points');
    Route::post('/replace', [PointsController::class, 'replace'])->name('replace');

    Route::get('/earn_points', [PointsController::class, 'earn_points'])->name('earn.points');
    Route::post('/earn', [PointsController::class, 'earn'])->name('earn');
});


Route::get('/page/{slug}', [PageController::class, 'show'])->name('site.page.show');

Route::get('/toggle_like/{id}',[AdController::class, 'toggle_like'])->name('toggle_like');
// Route::get('ajax/notifications', [NotificationController::class, 'ajax']);

Route::post('/ad-comment/store', [AdController::class, 'addComment'])->name('ad.comment.store');

Route::delete('/ad-comment/destroy/{id}', [AdController::class, 'adCommentDelete'])->name('ad.comment.delete');




//  Auth User
Route::get('login',[AuthController::class, 'loginPage'])->name('login_page');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('verifyCode',[AuthController::class, 'verifyCodePage'])->name('verifyCodePage');
 Route::post('verifyCode',[AuthController::class, 'verifyCode'])->name('verifyCode');
 Route::get('register', [AuthController::class, 'register'])->name('register_page');
 Route::post('/register', [AuthController::class, 'registerPost'])->name('register');


// share store to social
 Route::get('/social-media-share', [SocialShareButtonsController::class,'ShareWidget']);

 

 Route::get('complete_register',[AuthController::class, 'complete_register'])->name('complete_register');
 Route::post('complete_register',[AuthController::class, 'complete_registerPost'])->name('complete_registerPost');

 Route::get('/ads', [AdController::class, 'index'])->name('ad.index');
 Route::get('/ads/recent-viewed', [AdController::class, 'recent-viewed'])->name('ad.recent-viewed');


 Route::group(['middleware'=>['auth']],function(){
     Route::get('logout',[AuthController::class, 'logout'])->name('logout_web');
     Route::get('/ads/create', [AdController::class, 'create'])->name('ad.create');

     Route::post('/ads/sub_gategory', [AdController::class, 'getSub'])->name('ad.getSubCtegory');

     
     Route::post('/ads/subsub_gategory', [AdController::class, 'getSubSub'])->name('ad.getSubSubCtegory');
     Route::post('/ads/store', [AdController::class, 'store'])->name('ad.store');

     Route::get('/ads/edit/{id}', [AdController::class, 'edit'])->name('ad.edit');
     Route::post('/ads/update/{id}', [AdController::class, 'update'])->name('ad.update');
     Route::post('/ads/delete/{id}', [AdController::class, 'destroy'])->name('ad.destroy');
     Route::get('/ads/updrade-ad/{id}', [AdController::class, 'getSpecialAdPage'])->name('updrade-ad');
     Route::post('/ads/change-ad-sold/{id}', [AdController::class, 'changeAdSold'])->name('change-ad-sold');
     Route::post('/ads/change-ad-archifed/{id}', [AdController::class, 'changeAdArchifed'])->name('change-ad-archifed');
     Route::get('/ads/statistics/{id}', [AdController::class, 'statistics'])->name('ad.statistics');
     Route::get('/ads/statistic-details/{id}', [AdController::class, 'statistic_details'])->name('ad.statistics.details');

     
     
     
     Route::get('/profile/{id}', [UserController::class, 'show'])->name('site.user.show');

     Route::get('/myads/{type}', [UserController::class, 'myads'])->name('site.myads.show');
     
     

     Route::post('/addfav', [UserController::class, 'addFavourite'])->name('site.addfavourite');

     Route::get('user/myfavs/', [UserController::class, 'myfavs'])->name('site.myfavs.show');

     
     Route::get('/recent-viewed', [UserController::class, 'latestSeen'])->name('site.recent-viewed');


     Route::get('/edit/profile/{id}', [UserController::class, 'edit'])->name('site.profile.edit');
//     Route::get('/user/{type}', [UserController::class, 'followers'])->name('site.profile.followers');
     Route::post('/update/profile/{id}', [UserController::class, 'update'])->name('site.profile.update');

     Route::get('/wallet',[WalletController::class, 'index'])->name('wallet');


     Route::get('/store/edit', [StoreController::class, 'edit'])->name('site.store.edit');
     Route::get('/follow/{id}', [StoreController::class, 'changeStoreFollow'])->name('change.follow.unfollow');

     Route::post('/post-report',[ReportController::class, 'store'])->name('report.store');;



     // rate store
     Route::post('/store-rate',[StoreRatingController::class, 'store'])->name('store.rate');

     

    //  Route::get('/follow/{id}', [UserController::class, 'changeFollow'])->name('follow.unfollow');

     Route::get('/ajax/subcats/{id}', [AdController::class, 'getSub'])->name('ajax-sub');
     Route::get('/ajax/subsubcats/{id}', [AdController::class, 'getSubSub'])->name('ajax-sub-sub');
//     Route::get('/ajax/suboptions/{id}', [AdController::class, 'getSubOptions'])->name('ajax-sub-options');
//     Route::get('/ajax/towns/{id}', [AdController::class, 'getTown'])->name('ajax-towns');

 });
