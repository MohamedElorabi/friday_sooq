<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Contact;
use App\Models\City;
use App\Models\Page;
use App\Models\Notification;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $local = app()->getLocale();
        View::composer('layouts.default-layout.partials.header', function($view){
            $view->with(['messages' => Contact::take(5)->get(),'notifications' => Notification::take(5)->get()]);
        });
        View::composer('site.partials.header', function ($view) use($local) {
            if(auth()->user()){
                $notify_count   =  Notification::where('user_id',auth()->user()->id)->where('seen',0)->count();
                $notifications = Notification::where('user_id',auth()->user()->id)->take(5)->get();
            }else{
                $notifications = [];
                $notify_count = 0;
            }
            
            $view->with(['maincategories'=> Category::select('id','name_'.$local.' as title')->get(),'cities'=> City::select('id','name_'.$local.' as title')->get(),'notifications' => $notifications,'notify_count'=>$notify_count]);
        });
        View::composer('site.partials.footer', function ($view) use($local) {
            $view->with(['footercats'=> Category::select('slug','name_'.$local.' as title')->get(),'pages'=> Page::select('slug','name_'.$local.' as title')->get()]);
        });
        
        
    }
}
