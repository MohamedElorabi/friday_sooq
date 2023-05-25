<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\User;
use App\Models\Favourite;
use App\Models\Follow;
use App\Models\StoreLike;
use App\Models\Store;
use App\Models\StoreProduct;
use App\Models\ProductFavourite;



use App\Http\Controllers\ImageController;
use Session;

class UserController extends Controller
{

    public function edit($id){
        $user = User::find($id);
        return view('site.user.edit', compact('user'));
    }

    public function myAds($type){

        $local = app()->getLocale();
        if($type){
            $ads = Ad::select('ads.id','ads.name','ads.price','ads.type','ads.user_id','ads.category_id','ads.desc','ads.city_id','ads.sub_category_id','users.image as user_image','categories.name_'.$local.' as category_name','cities.name_'.$local.' as city_name','countries.currency as country_currency','ads.special','ads.active_at', 'ads.slug','ads.created_at','ads.views','ads.active','ads.reason')->withCount('images')->with(['images','comments'=>function ($query) use($local){
            $query->select('ad_comments.comment','ad_comments.id','ad_comments.ad_id','users.name as comment_user','users.image as comment_image','ad_comments.user_id')->join('users','users.id','=','ad_comments.user_id')->get();
        }])->where('ads.user_id',auth()->user()->id)->join('users','users.id','=','ads.user_id')->join('countries','countries.id','=','ads.country_id')->join('cities','cities.id','=','ads.city_id')->join('categories','categories.id','=','ads.category_id')->orderBy('active_at','DESC')->paginate(9);
        }else{
            $ads =Ad::select('ads.id','ads.name','ads.desc','ads.price','ads.type','ads.user_id','ads.category_id','ads.city_id','ads.sub_category_id','users.image as user_image','cities.name_'.$local.' as city_name','categories.name_'.$local.' as category_name','countries.currency as country_currency','ads.special','ads.slug','ads.active_at','ads.created_at','ads.views','ads.active','ads.reason')->with(['images','comments'=>function ($query) use($local){
            $query->select('ad_comments.comment','ad_comments.id','ad_comments.ad_id','users.name as comment_user','users.image as comment_image','ad_comments.user_id')->join('users','users.id','=','ad_comments.user_id')->get();
        }])->withCount('images')->where('ads.user_id',auth()->user()->id)->where('active',$type)->join('users','users.id','=','ads.user_id')->join('cities','cities.id','=','ads.city_id')->join('countries','countries.id','=','ads.country_id')->join('categories','categories.id','=','ads.category_id')->orderBy('active_at','DESC')->paginate(config('server.pagination_number'));
        }


        return view('site.user.myads',compact('ads'));
        
    }

    
    

    public function show($id){
        $user = User::where('id',$id)->first();
        $local = App()->getLocale();
        $ads = Ad::select('ads.id','ads.name','ads.price','ads.active_at','ads.user_id','ads.slug','users.image as user_image','categories.name_'.$local.' as category_name','countries.currency as country_currency')->where('active','actived')->where('ads.user_id',$id)->join('users','users.id','=','ads.user_id')->join('countries','countries.id','=','ads.country_id')->join('categories','categories.id','=','ads.category_id')->orderBy('active_at','DESC')->paginate(6);
        return view('site.user.myprofile',compact('user','ads'));
    }

    public function myfavs(){
        $local = App()->getLocale();
        $favs = Favourite::where('user_id',auth()->user()->id)->pluck('ad_id');
        $favStore = StoreLike::where('user_id',auth()->user()->id)->pluck('store_id');
        $favProduct = ProductFavourite::where('user_id',auth()->user()->id)->pluck('product_id');

        $ads = Ad::select('ads.id','ads.name','ads.price','ads.created_at','ads.active_at','ads.views','ads.user_id','ads.slug','users.image as user_image','categories.name_'.$local.' as category_name')
        ->whereIn('ads.id',$favs)->join('users','users.id','=','ads.user_id')
        ->join('categories','categories.id','=','ads.category_id')
        ->orderBy('active_at','DESC')->paginate(12);

        $stores = Store::select('stores.id','stores.name','stores.avatar','stores.user_id','users.image as user_image','store_types.name_'.$local.' as type_name')
        ->whereIn('stores.id',$favStore)->join('users','users.id','=','stores.user_id')
        ->join('store_types','store_types.id','=','stores.type_id')
        ->paginate(12);

        $products = StoreProduct::select('store_products.id','store_products.name_'.$local.' as name','store_products.store_id')
        ->whereIn('store_products.id',$favProduct)
        ->paginate(12);
        return view('site.user.myfavs',compact('ads', 'stores', 'products'));
    }




    public function followers($type){
        $local = App()->getLocale();
        if($type == 'followers'){
            $followers = Follow::where('user_id',auth()->user()->id)->pluck('follower_id');
        }elseif($type == 'followings'){
            $followers = Follow::where('follower_id',auth()->user()->id)->pluck('user_id');
        }
        $users = User::whereIn('id',$followers)->paginate(12);
        return view('site.user.followers',compact('users'));
    }

    public function changeFollow($id){
        $follow = Follow::where('follower_id',$id)->where('user_id',auth()->user()->id)->first();
        if($follow){
           $follow->delete();
           return false;
        }else{
            Follow::create(['user_id'=>auth()->user()->id,'follower_id'=>$id]);
            return true;
        }
    }


    public function latestSeen(Request $request){
        $data = $request->all();
        $local = app()->getLocale();
        $ads_str = $request->ads;
        $ads = explode(",",$ads_str);
        $categories = Category::select('id','name_'.$local.' as title','image','slug')->get();
        $ads =Ad::select('ads.id','ads.name','ads.special','ads.active_at','ads.views','ads.active')->withCount('images')->where('ads.type','product')->whereIn('ads.id',$ads)->where('active','actived')->join('users','users.id','=','ads.user_id')->join('countries','countries.id','=','ads.country_id')->join('categories','categories.id','=','ads.category_id')->orderBy('active_at','DESC')->paginate(config('server.pagination_number'));
        return view('site.ads.recent-viewed', compact('ads', 'categories'));

    }

     public function update(Request $request,$id)
    {
        $user= User::find($id);
        $data=$request->all();
       if ($request->hasFile('image')) {
            $data['image'] = ImageController::upload_single($request->image,storage_path().'/app/public/user');
        }
        if($request->follow == 1)
        {
            $user->update(['follow'=> 1]);

        } elseif ($request->follow == 0)
        {
            $user->update(['follow'=> 0]);
        }

        $user->update($data);
        Session::flash('success','تم تعديل البيانات بنجاح');
        return redirect()->back();
    }


    // public function addFavourite()
    // {
    //     $is_Favourite   =  Favourite::where('user_id',auth()->user()->id)->where('ad_id',$id)->first();
    //     if (is_null($is_Favourite)){
    //         $this->_DoFavourite($id);
    //         $message = 'Added to your favourites list';
    //     }else{
    //         $this->_UnFavourite($id);
    //         $message = 'Removed from your favourites list';
    //     }
    //     $this->data['success'] = true;
    //     $this->data['message'] = $message;
    //     return response()->json($this->data, 200);
    // }

    public function addFavourite($id){
        $Favourite= new Favourite();
        $Favourite->user_id = auth()->user()->id;
        $Favourite->ad_id = $id;
        $Favourite->save();
        return true;
    }

    public function _UnFavourite($id){
        $Favourite= Favourite::where('user_id',auth()->user()->id)->where('ad_id',$id)->first();
        $Favourite->delete();
        return true;
    }


}
