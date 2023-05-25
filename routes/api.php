<?php
use App\Http\Controllers\Api\Store\StoreAppController;
use App\Http\Controllers\Api\AdController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\StoreController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\ContactUsController;
use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\AdPackageController;
use App\Http\Controllers\Api\ChatController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserPackageController;
use App\Http\Controllers\Api\PointController;
use App\Http\Controllers\Api\StoreRatingController;
use App\Http\Controllers\Api\UserRatingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/test',[AuthController::class, 'test']);
Route::prefix('auth')->group(function () {
    Route::post('/login',[AuthController::class, 'login']);
});

Route::get('/home/{id}',[AdController::class, 'home']);

Route::get('/categories',[CategoryController::class, 'index']);
Route::post('/categories/search',[CategoryController::class, 'search']);
Route::get('/category/{id}',[CategoryController::class, 'show']);
Route::get('/category-with-sub',[CategoryController::class, 'catsWithSub']);
Route::get('/category-with-multi',[CategoryController::class, 'catsWithMulti']);
Route::get('sub-options/{id}',[CategoryController::class, 'subOptions']);

Route::get('/countries',[CountryController::class, 'index']);
Route::get('/country/{id}',[CountryController::class, 'show']);
Route::get('/country-with-city',[CountryController::class, 'countryWithCity']);

Route::get('/banners',[BannerController::class, 'index']);
Route::get('/banner/{type}',[BannerController::class, 'show']);

Route::get('/ads',[AdController::class, 'index']);
Route::get('/specials',[AdController::class, 'specials']);
Route::get('/ad/{id}',[AdController::class, 'show']);
Route::get('/bycat/{type}/{id}',[AdController::class, 'byCat']);

Route::post('/search',[AdController::class, 'search']);
Route::get('/offers',[AdController::class, 'offers']);
Route::get('/ad-comments/{id}',[AdController::class, 'adComments']);
Route::post('/filter',[AdController::class, 'filter']);
Route::get('/user/ads/{id}',[UserController::class, 'userAds']);
Route::get('/user/{id}',[UserController::class, 'show']);
Route::get('/stores/types',[StoreController::class, 'types']);
Route::get('/stores',[StoreController::class, 'index']);
Route::get('/stores/{id}',[StoreController::class, 'storeByType']);
Route::get('/store/{id}',[StoreController::class, 'show']);
Route::get('/store/{id}/products',[StoreController::class, 'storeProducts']);
Route::get('/store/{id}/categoreis',[StoreController::class, 'storeCategories']);
Route::get('/flyers/{type}/{id}',[StoreController::class, 'flyers']);
Route::post('/products/search',[ProductController::class, 'search']);
Route::get('/products',[StoreController::class,'products']);
Route::get('/products-by-cats/{id}',[StoreController::class,'productsByCats']);
Route::get('/popular/stores',[StoreController::class,'popular']);
Route::get('/product/{id}',[StoreController::class,'productShow']);
Route::post('/cart-products',[StoreController::class,'CartProducts']);
Route::get('page/{id}', [PageController::class, 'page']);
Route::post('contact-us', [ContactUsController::class, 'contact_us']);
Route::get('contact_us',[ContactUsController::class, 'list']);
Route::get('/adpackages',[AdPackageController::class, 'index']);
Route::get('/userpackages',[UserPackageController::class, 'index']);
Route::get('/store-stat/{id}/{type}',[StoreController::class,'storeStat']); 
Route::get('/store/statistics/{id}/{type}',[StoreController::class,'storeStatistics']); 
Route::get('/user-stat/{id}/{type}',[UserController::class,'userStat']); 
Route::get('/user/statistics/{id}/{type}',[UserController::class,'userStatistics']); 
Route::get('/store-ratings/{id}',[StoreRatingController::class,'show']);
Route::get('/user-ratings/{id}',[UserRatingController::class,'show']);
Route::get('/getquestions',[UserController::class, 'getQuestions']);
Route::get('/coupons',[StoreController::class,'coupons']);

Route::get('/ad-stat/{id}/{type}',[AdController::class,'adStat']); 
Route::get('/ad/statistics/{id}/{type}',[AdController::class,'adStatistics']); 
 
Route::get('/store-statues/{id}',[StoreController::class,'storeStatus']);


Route::middleware('auth:sanctum')->group(function(){
    
    Route::prefix('store-app')->group(function () {
        Route::post('/create-coupon',[StoreController::class,'storeCoupon']);
        Route::post('/create-status',[StoreAppController::class,'storeStatus']);
        Route::post('/create-product',[StoreAppController::class,'storeProduct']);
        Route::post('/create-category',[StoreAppController::class,'storeCategory']);
    });
    
    Route::prefix('auth')->group(function () {
        Route::post('/verify',[AuthController::class, 'verify']);
        Route::post('/register',[AuthController::class, 'register']);
    });
    
    Route::get('/user/getfollow/{name}',[UserController::class, 'getfollow']);
    Route::get('follow/{id}',[UserController::class, 'toggle_follow']);
    Route::get('delfollow/{id}',[UserController::class, 'DelFollow']);
    Route::post('/logout',[AuthController::class, 'logout']);
    Route::post('/post-ad',[AdController::class, 'store']);
    Route::delete('/delete/ad-image',[AdController::class, 'destroyImage']);
    Route::post('/update-ad/{id}',[AdController::class, 'updateAd']);
    Route::post('/post-offer',[AdController::class,'postOffer']);
    Route::post('/post-comment',[AdController::class,'postComment']);
    Route::post('/update-status',[AdController::class,'updateStatus']);
    Route::delete('/delete/comment/{id}',[AdController::class, 'destoryComment']);
    Route::delete('/delete/ad/{id}',[AdController::class, 'destoryAd']);
    
    Route::get('/favourites',[UserController::class, 'favourites']);
    Route::get('/favourite/{id}',[UserController::class,'toggle_Favourite']);
    Route::get('/notifications',[UserController::class, 'userNotification']);
    Route::get('/myads/{type}',[UserController::class, 'myAds']);
    Route::post('/update/profile',[UserController::class, 'updateProfile']);
    Route::post('/latestSeen',[UserController::class, 'latestSeen']);
    Route::post('/post-address',[UserController::class, 'storeAddress']);
    Route::get('/user-addresses',[UserController::class, 'getAddresses']);
    Route::post('/post-report',[ReportController::class, 'store']);
    Route::post('/remove-address',[UserController::class, 'removeAddress']);
    
    Route::post('/store-store',[StoreController::class,'storeStore']);
    Route::post('/update-store/{id}',[StoreController::class,'updateStore']);
    
    Route::get('/product-favourites',[StoreController::class,'favourites']);
    Route::get('/product-favourite/{id}',[StoreController::class,'toggle_Favourite']);
    Route::get('/store-like/{id}',[StoreController::class,'toggle_Like']);
    Route::post('/store-rate',[StoreRatingController::class,'store']);
    
    Route::post('/user-rate',[UserRatingController::class,'store']);
    Route::post('/order',[ProductController::class,'order']);
    Route::post('/order-product',[ProductController::class,'orderProduct']);
    Route::post('/check-coupon',[ProductController::class,'checkCoupon']);
    
    Route::get('/myorders',[UserController::class,'myorders']);
    
    Route::post('/transfer',[UserController::class,'transer']);
    Route::get('/transactions',[UserController::class,'transaction']);
    
    
    Route::get('/chats',[ChatController::class, 'chats']);
    Route::post('/chat',[ChatController::class, 'post']);
    

    Route::get('/points',[PointController::class, 'index']);
    Route::post('/buy-points',[PointController::class, 'buy']);
    Route::post('/replace-points',[PointController::class, 'replace']);
    Route::post('/send-points',[PointController::class, 'send']);
    
    
});