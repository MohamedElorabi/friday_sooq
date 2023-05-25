<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Models\Store;
use App\Models\StoreFlyer;
use App\Models\StoreProduct;
use App\Models\StoreCategory;
use App\Models\StoreType;
use App\Models\StoreWorkTime;
use App\Models\StoreLike;
use App\Models\ProductFavourite;
use App\Models\StoreStatistic;
use App\Models\StoreCoupon;
use App\Models\StoreStatues;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Carbon\CarbonPeriod;
use App\Http\Controllers\ImageController;


class StoreController extends ApiController
{
    
    public function index(){
        $local = app()->getLocale();
        $store = Store::select('stores.id','stores.name','stores.avatar','stores.user_id','store_types.name_'.$local.' as type_name')->join('store_types','store_types.id','=','stores.type_id')->where('status',1)->paginate(config('server.pagination_number'));
        return response()->json([   
            'data' => $store,
            'success' => true,
        ],200);
    }
    
    public function popular(){
        $local = app()->getLocale();
        $store = Store::select('stores.id','stores.name','stores.avatar','stores.user_id','store_types.name_'.$local.' as type_name')->join('store_types','store_types.id','=','stores.type_id')->where('status',1)->paginate(config('server.pagination_number'));
        return response()->json([   
            'data' => $store,
            'success' => true,
        ],200);
    }
    
    public function types(){
        $local = app()->getLocale();
        $types = StoreType::select('store_types.id','store_types.name_'.$local.' as name')->get();
        return response()->json([   
            'data' => $types,
            'success' => true,
        ],200);
    }
    
    public function storeByType($id){
        $local = app()->getLocale();
        $store = Store::select('stores.id','stores.name','stores.avatar','stores.user_id','store_types.name_'.$local.' as type_name')->withCount('ads')->join('store_types','store_types.id','=','stores.type_id')->where('status',1)->where('type_id',$id)->paginate(config('server.pagination_number'));
        
        return response()->json([   
            'data' => $store,
            'success' => true,
        ],200);
    }

    public function show($id){
        $local = app()->getLocale();
        $store = Store::select('stores.id','stores.name','stores.avatar','stores.cover','stores.user_id','store_types.name_'.$local.' as type_name','stores.address','stores.description','stores.phone','stores.website','stores.views','stores.created_at','stores.twitter','stores.facebook','stores.instagram','stores.youtube','stores.status', 'stores.latitude', 'stores.Longitude')->withCount(['ads','followers','likes'])->join('store_types','store_types.id','=','stores.type_id')->where('stores.status',1)->where('stores.id',$id)->first();
        $store->update(['views'=> $store->views+1 ]);
        
        return response()->json([   
            'data' => $store,
            'success' => true,
        ],200);
    }

    public function flyers($type,$id){
        $local = app()->getLocale();
        if($type == 'all'){
            $flyers = StoreFlyer::select('id','store_flyers.name_'.$local.' as name','store_flyers.type','store_flyers.expire_date')->with('images')->where('store_id',$id)->paginate(config('server.pagination_number'));
        }else{
            $flyers = StoreFlyer::select('store_flyers.id','store_flyers.name_'.$local.' as name','store_flyers.type','store_flyers.expire_date')->with('images')->where('type',$type)->where('store_id',$id)->paginate(config('server.pagination_number'));
        }
        return response()->json([   
            'data' => $flyers,
            'success' => true,
        ],200);
    }
    
    public function products(){
        $local = app()->getLocale();
        $flyers = StoreProduct::select('store_products.id','store_products.name_'.$local.' as name','store_products.quantity','store_products.store_id','store_products.price','store_products.sale_price','store_products.shipping_cost')->paginate(config('server.pagination_number'));
        return response()->json([   
            'data' => $flyers,
            'success' => true,
        ],200);
    }
    
    public function productsByCats($id){
        $local = app()->getLocale();
        $flyers = StoreProduct::select('store_products.id','store_products.name_'.$local.' as name','store_products.quantity','store_products.store_id','store_products.price','store_products.sale_price','store_products.shipping_cost')->where('store_products.store_category_id',$id)->paginate(config('server.pagination_number'));
        return response()->json([   
            'data' => $flyers,
            'success' => true,
        ],200);
    }
    
    public function productShow($id){
        $local = app()->getLocale();
        $flyers = StoreProduct::where('store_products.id',$id)->select('store_products.id','store_products.name_'.$local.' as name','store_products.store_id','store_products.desc_'.$local.' as desc','store_products.quantity','store_products.price','store_products.sale_price','store_products.shipping_cost','store_categories.name_'.$local.' as category_name')->with('images')->join('store_categories','store_categories.id','=','store_products.store_category_id')->first();
        return response()->json([   
            'data' => $flyers,
            'success' => true,
        ],200);
    }
    
    public function storeCategories($id){
        $local = app()->getLocale();
        $flyers = StoreCategory::select('store_categories.name_'.$local.' as category_name','store_categories.image','store_categories.id')->where('store_categories.store_id',$id)->paginate(config('server.pagination_number'));
        return response()->json([   
            'data' => $flyers,
            'success' => true,
        ],200);
    }
    
    public function storeProducts($id){
        $local = app()->getLocale();
        $flyers = StoreProduct::select('store_products.id','store_products.name_'.$local.' as name','store_products.quantity','store_products.store_id','store_products.price','store_products.sale_price','store_products.shipping_cost')->where('store_products.store_id',$id)->paginate(config('server.pagination_number'));
        return response()->json([   
            'data' => $flyers,
            'success' => true,
        ],200);
    }
    
    public function toggle_Favourite($id){
        $is_Favourite   =  ProductFavourite::where('user_id',auth()->user()->id)->where('product_id',$id)->first();
        if (is_null($is_Favourite)){
            $this->_DoFavourite($id);
            $message = 'Added to your favourites list';
        }else{
            $this->_UnFavourite($id);
            $message = 'Removed from your favourites list';
        }
        $this->data['success'] = true;
        $this->data['message'] = $message;
        return response()->json($this->data, 200);
    }

    public function _DoFavourite($id){
        $Favourite= new ProductFavourite();
        $Favourite->user_id = auth()->user()->id;
        $Favourite->product_id = $id;
        $Favourite->save();
        return true;
    }
    
    public function _UnFavourite($id){
        $Favourite= ProductFavourite::where('user_id',auth()->user()->id)->where('product_id',$id)->first();
        $Favourite->delete();
        return true;
    }
    
    
    public function toggle_Like($id){
        $is_Favourite   =  StoreLike::where('user_id',auth()->user()->id)->where('store_id',$id)->first();
        if (is_null($is_Favourite)){
            $this->_DoLike($id);
            $message = 'Added to your favourites list';
        }else{
            $this->_UnLike($id);
            $message = 'Removed from your favourites list';
        }
        $this->data['success'] = true;
        $this->data['message'] = $message;
        return response()->json($this->data, 200);
    }

    public function _DoLike($id){
        $Favourite= new StoreLike();
        $Favourite->user_id = auth()->user()->id;
        $Favourite->store_id = $id;
        $Favourite->save();
        return true;
    }
    
    public function _UnLike($id){
        $Favourite= StoreLike::where('user_id',auth()->user()->id)->where('store_id',$id)->first();
        $Favourite->delete();
        return true;
    }

    public function favourites(){
        $local = app()->getLocale();
            $ids=ProductFavourite::where('user_id',auth()->user()->id)->pluck('product_id');
            $products = StoreProduct::select('store_products.id','store_products.name_'.$local.' as name','store_products.quantity','store_products.store_id','store_products.price','store_products.sale_price','store_products.shipping_cost')->whereIn('store_products.id',$ids)->paginate(config('server.pagination_number'));
            return response()->json([
            'data' => $products,
            'success' => true,
            ],200);
    }
    
    public function CartProducts(Request $request){
        $data = $request->all();
        $local = app()->getLocale();
        $ads_str = $request->products;
        $ids = explode(",",$ads_str);
        $ads =StoreProduct::select('store_products.id','store_products.name_'.$local.' as name','store_products.quantity','store_products.price','store_products.sale_price','store_products.shipping_cost')->whereIn('store_products.id',$ids)->where('quantity','!=',0)->get();
        return response()->json([
            'data' => $ads,
            'success' => true,
            ],200);
    }
    
    public function storeStat($id,$type){
        StoreStatistic::hit($id,$type);
        return response()->json([
            'success' => true,
            ],200);
    }
    
    public function storeStatistics($id,$type){
        $stats = StoreStatistic::where('store_id',$id)->get();
        $gerDataAnalytics = StoreStatistic::query();
        $gerDataAnalytics = $gerDataAnalytics->select(
            DB::raw("DATE_FORMAT(date, '%M %d, %Y') as label"),
            DB::raw("count(CASE WHEN type  = 'profile' THEN 1 ELSE null end) as profile"),
            DB::raw("count(CASE WHEN type  = 'view' THEN 1 ELSE null end) as views"),
            DB::raw("count(CASE WHEN type  = 'call' THEN 1 ELSE null end) as calls"),
            DB::raw("count(CASE WHEN type  = 'whatsapp' THEN 1 ELSE null end) as whatsapp"),
            DB::raw("count(CASE WHEN type  = 'chat' THEN 1 ELSE null end) as chat"),
            DB::raw("count(CASE WHEN type  = 'sms' THEN 1 ELSE null end) as sms"),
            DB::raw("count(CASE WHEN type  = 'search' THEN 1 ELSE null end) as search")
            
        );
        $dateArrFrom =  Carbon::parse(Carbon::now()->firstOfMonth())->startOfDay();
        $dateArrTo =  Carbon::parse(Carbon::now()->lastOfMonth())->endOfDay();
        $gerDataAnalytics = $gerDataAnalytics->whereBetween('date', [$dateArrFrom, $dateArrTo]);
        $gerDataAnalytics = $gerDataAnalytics->groupBy('date');
        $gerDataAnalytics = $gerDataAnalytics->get();
        // Generate date with CarbonPeriod
        $daysOfMonth = collect(
            CarbonPeriod::create(
                $dateArrFrom,
                $dateArrTo
            )
        )
            ->map(function ($gerDataAnalytics) {
                return [
                    'label' => $gerDataAnalytics->format('F d, Y'),
                    'profile' => 0,
                    'views' => 0,
                    'calls' => 0,
                    'whatsapp' => 0,
                    'chat' => 0,
                    'sms' => 0,
                    'search' => 0,
                ];
            })
            ->keyBy('label')
            ->merge(
                $gerDataAnalytics->keyBy('label')
            )
            ->values();

        $returnData['label'] = [];
        $returnData['products'] = StoreProduct::where('store_id',$id)->count();
        $returnData['likes'] = StoreLike::where('store_id',$id)->count();
        $returnData['images'] = 0;
        // $returnData['dataSum'] = [];

        foreach ($daysOfMonth as $value) {
            $returnData['label'][] = $value['label'];
            $returnData['profile'][] = (int)$value['profile'];
            $returnData['views'][] = (int)$value['views'];
            $returnData['calls'][] = (int)$value['calls'];
            $returnData['whatsapp'][] = (int)$value['whatsapp'];
            $returnData['chat'][] = (int)$value['chat'];
            $returnData['sms'][] = (int)$value['sms'];
            $returnData['search'][] = (int)$value['search'];
        }
        

        return response()->json([
            'data' => $returnData,
            'success' => true,
            ],200);
        
    }
    
    public function storeStore(Request $request){
         $data = $request->validate([
        'name' =>'required',     
        'first_name'=> 'required',
        'last_name'=> 'required',
        'description'=> 'required',
        'avatar'=> 'nullable|file',
        'cover'=> 'nullable|file',
        'address'=> 'nullable',
        'coordinates'=> 'nullable',
        'phone'=> 'nullable',
        'website'=> 'nullable',
        'facebook'=> 'nullable',
        'twitter'=> 'nullable',
        'instagram'=> 'nullable',
        'snapchat'=> 'nullable',
        'youtube'=> 'nullable',
        'type_id'=> 'required|exists:store_types,id',
        'latitude' => 'required',
        'Longitude' => 'required',
        
    ]);

   $data['user_id'] = auth()->user()->id;
   if ($request->hasFile('avatar')) {
   $data['avatar'] = ImageController::upload_single($request->avatar,storage_path().'/app/public/store');
   }
   if ($request->hasFile('cover')) {
   $data['cover'] = ImageController::upload_single($request->cover,storage_path().'/app/public/store');
   }

   $store = Store::create($data);
    $days = explode(',', substr($request->days, 1, -1));
    $starts= explode(',', substr($request->starts, 1, -1));
    $ends= explode(',', substr($request->ends, 1, -1));
    
    

    if($request->days){
        foreach ($days as $key=>$value)
        {
           $times = StoreWorkTime::create([
                'store_id' => $store->id,
                'day' => $value,
                'start' => $starts[$key],
                'end' => $ends[$key]
            ]);
        }
    }
        return response()->json([
            'data' => $store,
            'success' => true,
        ],200);

    
    }
    
    public function updateStore($id,Request $request){
         $data = $request->validate([
        'name' =>'required',
        'first_name'=> 'required',
        'last_name'=> 'required',
        'description'=> 'required',
        'avatar'=> 'nullable|file',
        'cover'=> 'nullable|file',
        'address'=> 'nullable',
        'phone'=> 'nullable',
        'website'=> 'nullable',
        'type_id'=> 'required|exists:store_types,id',
        
    ]);

   $data['user_id'] = auth()->user()->id;
   $data['avatar'] = ImageController::upload_single($request->avatar,storage_path().'/app/public/store');
   $data['cover'] = ImageController::upload_single($request->cover,storage_path().'/app/public/store');
   $store = Store::find($id);
   $store->update($data);
    $days =json_decode($request->days);
    $starts=json_decode($request->starts);
    $ends=json_decode($request->ends);
    
    if($days){
             foreach ($days as $key=>$value)
                {
                    StoreWorkTime::where('store_id',$id)->update([
                        'store_id' => $store->id,
                        'day' => $value,
                        'start' => $starts[$key],
                        'end' => $ends[$key]
                        ]);
                }
    }
        return response()->json([
            'data' => $store,
            'success' => true,
            'msg' => "Store Updated Successfly"
        ],200);
    }
    
    public function storeCoupon(Request $request){
        
         $data = $request->validate([
        'name' =>'required',     
        'description'=> 'required',
        'coupon_rate'=> 'required',
        'start_date'=> 'required',
        'end_date'=> 'required',
        'image'=> 'required|file',
        'store_id'=> 'required|exists:stores,id',
        
    ]);
    $data['code'] =  mt_rand(1000,9999);
   $data['image'] = ImageController::upload_single($request->image,storage_path().'/app/public/store');
   $store = StoreCoupon::create($data);

        return response()->json([
            'data' => $store,
            'success' => true,
        ],200);

    
    }
    
    public function coupons(){
        $coupons = StoreCoupon::all();
        return response()->json([
            'data' => $coupons,
            'success' => true,
            ],200);
    }




    public function storeStatus($id){
        $statues = StoreStatues::where('store_id',$id)->first();
        return response()->json([
            'data' => $statues,
            'success' => true,
            ],200);
    }
}
