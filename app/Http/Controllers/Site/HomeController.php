<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\Category;
use App\Models\Banner;
use App\Models\Store;
use App\Models\Tracker;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class HomeController extends Controller
{
    public function index(Request $request){
        Tracker::hit();
         $ads = Ad::query();
          if($request->filled('search')){
            $ads = Ad::where(function ($q)use ($request){
                $q->where('name', $request->search);
            });
          }

          if($request->filled('country')){
            $ads = Ad::where(function ($q)use ($request){
                $q->where('city_id', $request->country);
            });
          }
          
          if($request->filled('category')){
            $ads = Ad::where(function ($q)use ($request){
                $q->where('category_id', $request->category);
            });
        }
       
        
        
        $local = App()->getLocale();
        $categories = Category::select('id','name_'.$local.' as title','image','slug')->get();
        $bannerOne = Banner::where('position','home-1')->select('code','image','title','link')->first();
        $bannerTwo = Banner::where('position','home-2')->select('code','image','title','link')->first();
        $ads = $ads->select('ads.id','ads.name','ads.price','ads.type','ads.user_id','ads.slug','users.image as user_image','categories.name_'.$local.' as category_name','countries.currency as country_currency','countries.name_'.$local.' as country_name','ads.active_at','ads.special')->where('active','actived')->join('users','users.id','=','ads.user_id')->join('countries','countries.id','=','ads.country_id')->join('categories','categories.id','=','ads.category_id')->where('special',true)->orderBy('active_at','DESC')->take(6)->get();
        $stores = Store::select('stores.id','stores.name','stores.avatar','stores.user_id','store_types.name_'.$local.' as type_name')->withCount('ads')->join('store_types','store_types.id','=','stores.type_id')->where('status',1)->take(10)->get();
        return view('site.home',compact('categories','ads','bannerOne','bannerTwo','stores'));
    }



    public function search(Request $request){

        $data = Ad::select('id','name as text', 'slug')->where('ads.name', 'LIKE', '%'.$request->input('search').'%')->get();
         return response()->json([
            'data' => $data,
            'success' => true,
        ],200);
   
    }
}
