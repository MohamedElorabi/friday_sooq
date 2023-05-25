<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        
        $project_title = '| تسوق سيل';
        
        if (\Cookie::get('lang') !== null){
            $lang = \Cookie::get('lang');
            App::setLocale($lang);
        }else{
            $lang = 'ar';
            App::setLocale($lang);

        }
        View::share(['title'=> $project_title,'current_lang'=>$lang]);
    }
}
