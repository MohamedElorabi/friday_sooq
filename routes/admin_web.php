<?php

use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\CountryController;
use App\Http\Controllers\Dashboard\CityController;
use App\Http\Controllers\Dashboard\TownController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\SubCategoryController;
use App\Http\Controllers\Dashboard\AdController;
use App\Http\Controllers\Dashboard\OptionController;
use App\Http\Controllers\Dashboard\StoreController;
use App\Http\Controllers\Dashboard\StoreCategoryController;
use App\Http\Controllers\Dashboard\StoreFlyerController;
use App\Http\Controllers\Dashboard\StoreTypeController;
use App\Http\Controllers\Dashboard\StoreProductController;
use App\Http\Controllers\Dashboard\AdPackageController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\BannerController;
use App\Http\Controllers\Dashboard\ViewController;
use App\Http\Controllers\Dashboard\ChatController;
use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\NotificationController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/login', '\App\Http\Controllers\Dashboard\AuthController@get_admin_login')->name('adminLogin');
Route::post('admin/post-login', '\App\Http\Controllers\Dashboard\AuthController@post_admin_login')->name('post-login');



Route::group(['middleware'=>['check-auth-admin'],'prefix' => 'admin'],function(){

    Route::get('/logout','\App\Http\Controllers\Dashboard\AuthController@logout')->name('logout');
    Route::get('/','\App\Http\Controllers\Dashboard\MainController@main')->name('admin');
	Route::get('users-ajax', [UserController::class, 'index'])->name('users.index');
    Route::view('users', 'dashboard.user.index')->name('users');
    Route::get('countries-ajax', [CountryController::class, 'index'])->name('countries.index');
    Route::view('countries', 'dashboard.country.index')->name('countries');
    Route::get('cities-ajax', [CityController::class, 'index'])->name('cities.index');
    Route::view('cities', 'dashboard.city.index')->name('cities');
    Route::get('banners-ajax', [BannerController::class, 'index'])->name('banners.index');
    Route::view('banners', 'dashboard.banner.index')->name('banners');
    Route::get('towns-ajax', [TownController::class, 'index'])->name('towns.index');
    Route::view('towns', 'dashboard.town.index')->name('towns');
    Route::get('categories-ajax', [CategoryController::class, 'index'])->name('categories.index');
    Route::view('categories', 'dashboard.category.index')->name('categories');
    Route::get('subcategories-ajax', [SubCategoryController::class, 'index'])->name('subcategories.index');
    Route::view('subcategories', 'dashboard.subcategory.index')->name('subcategories');
    Route::get('ads-ajax/{type}', [AdController::class, 'index'])->name('ads.index');
    Route::view('ads/{type}', 'dashboard.ad.index')->name('ads');
    Route::get('options-ajax', [OptionController::class, 'index'])->name('options.index');
    Route::view('options', 'dashboard.option.index')->name('options');
    Route::get('stores-ajax', [StoreController::class, 'index'])->name('stores.index');
    Route::view('stores', 'dashboard.store.index')->name('stores');
    Route::delete('store/delete/{id}', '\App\Http\Controllers\Dashboard\StoreController@destroy')->name('stores.destroy');
    Route::get('store-categories-ajax', [StoreCategoryController::class, 'index'])->name('storecategories.index');
    Route::view('storecategories', 'dashboard.storecategory.index')->name('storecategories');
    Route::get('store-flyers-ajax', [StoreFlyerController::class, 'index'])->name('storeflyers.index');
    Route::view('storeflyers', 'dashboard.storeflyer.index')->name('storeflyers');
    Route::get('store-products-ajax', [StoreProductController::class, 'index'])->name('storeproducts.index');
    Route::view('storeproducts', 'dashboard.storeproduct.index')->name('storeproducts');
    Route::get('store-types-ajax', [StoreTypeController::class, 'index'])->name('storetypes.index');
    Route::view('storetypes', 'dashboard.storetype.index')->name('storetypes');
    Route::get('admins-ajax', [AdminController::class, 'index'])->name('admins.index');
    Route::view('admins', 'dashboard.admin.index')->name('admins');
     Route::get('views-ajax', [ViewController::class, 'index'])->name('views.index');
    Route::view('views', 'dashboard.view.index')->name('views');
    Route::get('chats-ajax', [ChatController::class, 'index'])->name('chats.index');
    Route::view('chats', 'dashboard.chat.index')->name('chats');
     Route::get('ad-package-ajax', [AdPackageController::class, 'index'])->name('adpackages.index');
    Route::view('adpackages', 'dashboard.adpackage.index')->name('adpackages');
    Route::resource('roles', \App\Http\Controllers\Dashboard\RoleController::class);
    Route::get('country/create', '\App\Http\Controllers\Dashboard\CountryController@create')->name('countries.create');
    Route::post('country/store', '\App\Http\Controllers\Dashboard\CountryController@store')->name('countries.store');
    Route::get('country/{id}/edit', '\App\Http\Controllers\Dashboard\CountryController@edit')->name('countries.edit');
    Route::put('country/{id}/update', '\App\Http\Controllers\Dashboard\CountryController@update')->name('countries.update');
    Route::delete('country/delete/{id}', '\App\Http\Controllers\Dashboard\CountryController@destroy')->name('countries.destroy');
     Route::get('store/create', '\App\Http\Controllers\Dashboard\StoreController@create')->name('stores.create');
    Route::post('store/store', '\App\Http\Controllers\Dashboard\StoreController@store')->name('stores.store');
     Route::get('store/{id}/edit', '\App\Http\Controllers\Dashboard\StoreController@edit')->name('stores.edit');
    Route::put('store/{id}/update', '\App\Http\Controllers\Dashboard\StoreController@update')->name('stores.update');
    Route::get('city/create', '\App\Http\Controllers\Dashboard\CityController@create')->name('cities.create');
    Route::post('city/store', '\App\Http\Controllers\Dashboard\CityController@store')->name('cities.store');
    Route::get('city/{id}/edit', '\App\Http\Controllers\Dashboard\CityController@edit')->name('cities.edit');
    Route::put('city/{id}/update', '\App\Http\Controllers\Dashboard\CityController@update')->name('cities.update');
    Route::delete('city/delete/{id}', '\App\Http\Controllers\Dashboard\CityController@destroy')->name('cities.destroy');
     Route::get('banner/create', '\App\Http\Controllers\Dashboard\BannerController@create')->name('banners.create');
    Route::post('banner/store', '\App\Http\Controllers\Dashboard\BannerController@store')->name('banners.store');
     Route::get('banner/{id}/edit', '\App\Http\Controllers\Dashboard\BannerController@edit')->name('banners.edit');
    Route::put('banner/{id}/update', '\App\Http\Controllers\Dashboard\BannerController@update')->name('banners.update');
    Route::delete('banner/delete/{id}', '\App\Http\Controllers\Dashboard\BannerController@destroy')->name('banners.destroy');
    Route::get('storecategory/create', '\App\Http\Controllers\Dashboard\StoreCategoryController@create')->name('storecategories.create');
    Route::post('storecategory/store', '\App\Http\Controllers\Dashboard\StoreCategoryController@store')->name('storecategories.store');
    Route::get('storecategory/{id}/edit', '\App\Http\Controllers\Dashboard\StoreCategoryController@edit')->name('storecategories.edit');
    Route::put('storecategory/{id}/update', '\App\Http\Controllers\Dashboard\StoreCategoryController@update')->name('storecategories.update');
    Route::delete('storecategory/delete/{id}', '\App\Http\Controllers\Dashboard\StoreCategoryController@destroy')->name('storecategories.destroy');
    Route::get('storeflyer/create', '\App\Http\Controllers\Dashboard\StoreFlyerController@create')->name('storeflyers.create');
    Route::post('storeflyer/store', '\App\Http\Controllers\Dashboard\StoreFlyerController@store')->name('storeflyers.store');
    Route::get('storeflyer/{id}/edit', '\App\Http\Controllers\Dashboard\StoreFlyerController@edit')->name('storeflyers.edit');
    Route::put('storeflyer/{id}/update', '\App\Http\Controllers\Dashboard\StoreFlyerController@update')->name('storeflyers.update');
    Route::delete('storeflyer/delete/{id}', '\App\Http\Controllers\Dashboard\StoreFlyerController@destroy')->name('storeflyers.destroy');
    Route::get('storeproduct/create', '\App\Http\Controllers\Dashboard\StoreProductController@create')->name('storeproducts.create');
    Route::post('storeproduct/store', '\App\Http\Controllers\Dashboard\StoreProductController@store')->name('storeproducts.store');
    Route::get('storeproduct/{id}/edit', '\App\Http\Controllers\Dashboard\StoreProductController@edit')->name('storeproducts.edit');
    Route::put('storeproduct/{id}/update', '\App\Http\Controllers\Dashboard\StoreProductController@update')->name('storeproducts.update');
    Route::delete('storeproduct/delete/{id}', '\App\Http\Controllers\Dashboard\StoreProductController@destroy')->name('storeproducts.destroy');
    Route::get('storetype/create', '\App\Http\Controllers\Dashboard\StoreTypeController@create')->name('storetypes.create');
    Route::post('storetype/store', '\App\Http\Controllers\Dashboard\StoreTypeController@store')->name('storetypes.store');
    Route::get('storetype/{id}/edit', '\App\Http\Controllers\Dashboard\StoreTypeController@edit')->name('storetypes.edit');
    Route::put('storetype/{id}/update', '\App\Http\Controllers\Dashboard\StoreTypeController@update')->name('storetypes.update');
    Route::delete('storetype/delete/{id}', '\App\Http\Controllers\Dashboard\StoreTypeController@destroy')->name('storetypes.destroy');
    Route::get('category/create', '\App\Http\Controllers\Dashboard\CategoryController@create')->name('categories.create');
    Route::post('category/store', '\App\Http\Controllers\Dashboard\CategoryController@store')->name('categories.store');
    Route::get('category/{id}/edit', '\App\Http\Controllers\Dashboard\CategoryController@edit')->name('categories.edit');
    Route::put('category/{id}/update', '\App\Http\Controllers\Dashboard\CategoryController@update')->name('categories.update');
    Route::delete('category/delete/{id}', '\App\Http\Controllers\Dashboard\CategoryController@destroy')->name('categories.destroy');
    Route::get('subcategory/create', '\App\Http\Controllers\Dashboard\SubCategoryController@create')->name('subcategories.create');
    Route::post('subcategory/store', '\App\Http\Controllers\Dashboard\SubCategoryController@store')->name('subcategories.store');
    Route::get('subcategory/{id}/edit', '\App\Http\Controllers\Dashboard\SubCategoryController@edit')->name('subcategories.edit');
    Route::put('subcategory/{id}/update', '\App\Http\Controllers\Dashboard\SubCategoryController@update')->name('subcategories.update');
    Route::delete('subcategory/delete/{id}', '\App\Http\Controllers\Dashboard\SubCategoryController@destroy')->name('subcategories.destroy');
    Route::get('town/create', '\App\Http\Controllers\Dashboard\TownController@create')->name('towns.create');
    Route::post('town/store', '\App\Http\Controllers\Dashboard\TownController@store')->name('towns.store');
    Route::get('town/{id}/edit', '\App\Http\Controllers\Dashboard\TownController@edit')->name('towns.edit');
    Route::put('town/{id}/update', '\App\Http\Controllers\Dashboard\TownController@update')->name('towns.update');
    Route::delete('town/delete/{id}', '\App\Http\Controllers\Dashboard\TownController@destroy')->name('towns.destroy');
    Route::get('ad/{id}/edit', '\App\Http\Controllers\Dashboard\AdController@edit')->name('ads.edit');
    Route::put('ad/{id}/update', '\App\Http\Controllers\Dashboard\AdController@update')->name('ads.update');
    Route::get('ad/create', '\App\Http\Controllers\Dashboard\AdController@create')->name('ads.create');
    Route::post('ad/store', '\App\Http\Controllers\Dashboard\AdController@store')->name('ads.store');
    Route::delete('ad/delete/{id}', '\App\Http\Controllers\Dashboard\AdController@destroy')->name('ads.destroy');
     Route::get('adpackage/create', '\App\Http\Controllers\Dashboard\AdPackageController@create')->name('adpackages.create');
    Route::post('adpackage/store', '\App\Http\Controllers\Dashboard\AdPackageController@store')->name('adpackages.store');
    
    Route::get('admin/create', '\App\Http\Controllers\Dashboard\AdminController@create')->name('admins.create');
    Route::post('admin/store', '\App\Http\Controllers\Dashboard\AdminController@store')->name('admins.store');
    Route::get('admin/{id}/edit', '\App\Http\Controllers\Dashboard\AdminController@edit')->name('admins.edit');
    Route::put('admin/{id}/update', '\App\Http\Controllers\Dashboard\AdminController@update')->name('admins.update');
    Route::delete('admin/delete/{id}', '\App\Http\Controllers\Dashboard\AdminController@destroy')->name('admins.destroy');
    
    
      Route::get('user/create', '\App\Http\Controllers\Dashboard\UserController@create')->name('users.create');
    Route::post('user/store', '\App\Http\Controllers\Dashboard\UserController@store')->name('users.store');
    Route::get('user/{id}/edit', '\App\Http\Controllers\Dashboard\UserController@edit')->name('users.edit');
    Route::put('user/{id}/update', '\App\Http\Controllers\Dashboard\UserController@update')->name('users.update');
    Route::delete('user/delete/{id}', '\App\Http\Controllers\Dashboard\UserController@destroy')->name('users.destroy');
    Route::delete('option/delete/{id}', '\App\Http\Controllers\Dashboard\OptionController@destroy')->name('options.destroy');
     Route::get('notification/create', '\App\Http\Controllers\Dashboard\NotificationController@create')->name('notifications.create');
    Route::post('notification/store', '\App\Http\Controllers\Dashboard\NotificationController@store')->name('notifications.store');
    
     Route::resource('roles', RoleController::class);
    
    
    Route::get('messages-ajax', [ContactController::class, 'index'])->name('messages.index');
    Route::view('messages', 'dashboard.contact.index')->name('messages');
     Route::get('message/{id}', [ContactController::class, 'show'])->name('massege.show');
     


    Route::get('get-sub/{id}','\App\Http\Controllers\Dashboard\CategoryController@getSub');
    Route::get('get-main-sub/{id}','\App\Http\Controllers\Dashboard\CategoryController@getMainSub');
    Route::get('get-cities/{id}','\App\Http\Controllers\Dashboard\CountryController@getCity');
    Route::get('get-towns/{id}','\App\Http\Controllers\Dashboard\CityController@getTown');
    Route::post('status/{id}','\App\Http\Controllers\Dashboard\AdController@status')->name('status');
     Route::post('special/{id}','\App\Http\Controllers\Dashboard\AdController@special')->name('special');
    Route::post('status-store/{id}','\App\Http\Controllers\Dashboard\StoreController@status')->name('status_store');
});

