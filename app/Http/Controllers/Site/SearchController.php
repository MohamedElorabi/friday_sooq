<?php

namespace App\Http\Controllers\Site;
use App\Models\Ad;
use App\Models\Store;
use App\Models\StoreProduct;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class SearchController extends Controller
{


   public function search_home(Request $request){

        $data = Ad::select('id','name as text', 'slug')->where('ads.name', 'LIKE', '%'.$request->input('search').'%')->get();
         return response()->json([
            'data' => $data,
            'success' => true,
        ],200);
   
    }



    public function search_category(Request $request){
        $category = Category::select('categories.id','categories.name_'.$local.' as title')
        ->where('slug',$slug)->first();

        $data = Ad::select('id','name as text', 'slug','category_id')->where('category_id',$category->id)->where('ads.name', 'LIKE', '%'.$request->input('search').'%')->get();
         return response()->json([
            'data' => $data,
            'success' => true,
        ],200);
   
    }


    public function search_myads(Request $request){

        $data = Ad::select('ads.id','ads.name as text', 'ads.slug')->where('ads.user_id',auth()->user()->id)->join('users','users.id','=','ads.user_id')->where('ads.name', 'LIKE', '%'.$request->input('search').'%')->get();
         return response()->json([
            'data' => $data,
            'success' => true,
        ],200);
   
    }


    public function search_store(Request $request){

        $data = Store::select('id','name as text', 'status')->where('status',1)->where('stores.name', 'LIKE', '%'.$request->input('search').'%')->get();
         return response()->json([
            'data' => $data,
            'success' => true,
        ],200);
   
    }

   
    public function search_products(Request $request){

        $data = StoreProduct::select('id','name_ar as text')->where('store_products.name_ar', 'LIKE', '%'.$request->input('search').'%')->get();
         return response()->json([
            'data' => $data,
            'success' => true,
        ],200);
   
    }


}
