<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ImageController;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\StoreFlyer;
use App\Models\StoreType;
use App\Models\StoreProduct;
use App\Models\Category;
use App\Models\StoreRating;
use App\Models\StoreWorkTime;
use App\Models\StoreLike;
use App\Models\StoreCoupon;
use App\Models\StoreCategory;
use App\Models\Ad;
use App\Models\UserPackage;
use App\Models\Follow;



use Session;

class StoreController extends Controller
{
    public function index(){
        $local = App()->getLocale();
        $types = StoreType::select('id','name_'.$local.' as name')->get();
        $stores = Store::select('stores.id','stores.name','stores.avatar','stores.user_id','store_types.name_'.$local.' as type_name', 'stores.views')->withCount('ads')->join('store_types','store_types.id','=','stores.type_id')->where('status',1)->paginate(6);

        return view('site.stores.index',compact('stores','types'));
    }


    public function popular_stores()
    {
        $local = App()->getLocale();

        $popular_stores = Store::select('stores.id','stores.name','stores.avatar','stores.user_id', 'stores.views')->where('views','>=', 100)->paginate(6);
        return view('site.stores.popular_stores',compact('popular_stores'));
    }

    public function show($id){
        $local = app()->getLocale();
        $store = Store::select('stores.id','stores.name','stores.avatar','stores.cover','stores.user_id','store_types.name_'.$local.' as type_name','stores.address','stores.description','stores.phone','stores.website','stores.views','stores.created_at')->withCount('ads')->join('store_types','store_types.id','=','stores.type_id')->where('stores.status',1)->where('stores.id',$id)->first();
        $types = StoreType::select('id','name_'.$local.' as name')->get();
        $store_work = StoreWorkTime::select('store_work_times.id','store_work_times.day','store_work_times.start', 'store_work_times.end','store_id')->where('store_id',$store->id)->first();
        $store_rate = StoreRating::select('store_ratings.id','store_ratings.store_id', 'store_ratings.user_id', 'store_ratings.rate')->where('store_id',$store->id)->get();
        $flyers = StoreProduct::select('store_products.id','store_products.name_'.$local.' as name','store_products.quantity','store_products.store_id','store_products.price','store_products.sale_price','store_products.shipping_cost','store_products.store_id')->where('store_id',$store->id)->paginate(config('server.pagination_number'));
        $offers =StoreFlyer::select('id','store_flyers.name_'.$local.' as name','store_flyers.type','store_flyers.expire_date')->where('store_id',$id)->get();
        $store_categories = StoreCategory::where('store_categories.store_id',$id)->select('store_categories.id','store_categories.name_'.$local.' as store_category_name', 'image')->get();
        $store->update(['views'=> $store->views+1 ]);
        
        return view('site.stores.show',compact('store','types','store_categories', 'store_rate','flyers','offers'));

    }



    public function showStore($id){

        $local = app()->getLocale();
        $types = StoreType::select('id','name_'.$local.' as name')->get();
        $stores = Store::where('type_id',$id)->select('stores.id','stores.name','stores.avatar','stores.cover','stores.user_id','store_types.name_'.$local.' as type_name','stores.address','stores.description','stores.phone','stores.website','stores.views','stores.created_at')->where('status',1)->withCount('ads')->join('store_types','store_types.id','=','stores.type_id')->paginate(10);
        return view('site.storetype.show',compact('stores','types'));
    }


    public function show_category_products($id){
        $local = app()->getLocale();
        $products = StoreProduct::where('store_products.store_category_id',$id)->with(['images'])
        ->select('store_products.id','store_products.name_'.$local.' as name','store_products.quantity','store_products.store_id','store_products.price','store_products.sale_price','store_products.shipping_cost')
        ->paginate(config('server.pagination_number'));

        return view('site.stores.category_products', compact('products'));
    }


    public function create()
    {
        return view('site.stores.upgrade_store');
    }



    public function storeStore(Request $request){
    $data = $request->validate([
       'name' =>'required',
       'description'=> 'required',
       'avatar'=> 'nullable|file',
       'cover'=> 'nullable|file',
       'address'=> 'nullable',
       'coordinates'=> 'nullable',
       'phone'=> 'nullable',
       'website'=> 'nullable',
       //'type_id'=> 'required|exists:store_types,id',

   ]);

    $data['user_id'] = auth()->user()->id;

    if ($request->hasFile('avatar')) {
    $data['avatar'] = ImageController::upload_single($request->avatar,storage_path().'/app/public/store');
    }
    if ($request->hasFile('cover')) {
    $data['cover'] = ImageController::upload_single($request->cover,storage_path().'/app/public/store');
    }


    // $store = Store::create($data);    
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
    
   Session::flash('success','تم إنشاء بيانات المتجر بنجاح');
   return redirect(route('store.package'));



   }


   public function coupons()
   {
        $coupons = StoreCoupon::all();
        return view('site.stores.coupons', compact('coupons'));  
    }


   public function toggle_like($id)
   {
       $is_like=StoreLike::where('user_id',auth()->user()->id)->where('store_id',$id)->first();
       if (is_null($is_like)){
           $this->_DoLike($id);
           $message=true;
       }else{
           $this->_UnLike($id);
           $message=false;
       }
       return response()->json(['like' => $message],200);

   }

   public function _DoLike($id)
   {
       $like=new StoreLike();
       $like->user_id=auth()->user()->id;
       $like->store_id=$id;
       $like->save();
       return true;

   }

   public function _UnLike($id)
   {
       $like=StoreLike::where('user_id',auth()->user()->id)->where('store_id',$id)->first();
       $like->delete();
       return true;
   }




   


    public function create_offer()
    {
        return view('site.stores.offer.create');
    }


    public function store_offer(Request $request)
    {
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

        Session::flash('success','تم إنشاء بيانات العرض بنجاح');
        return redirect(route('site.stores'));
       
    }

    




   public function clients()
   {
     return view('site.stores.clients.index');
   }




   public function changeStoreFollow($id){
    $follow = Follow::where('follower_id',$id)->where('user_id',auth()->user()->id)->first();
    if($follow){
       $follow->delete();
       return false;
    }else{
        Follow::create(['user_id'=>auth()->user()->id,'follower_id'=>$id]);
        return true;
    }
}




    ///  store packages
    public function store_package()
    {
        $local = app()->getLocale();
        $packages =UserPackage::select('user_packages.id','user_packages.name_'.$local.' as package_name','user_packages.price','user_packages.period')->with(['userPackageItems' => function ($query) use ($local) {
        $query->select('id','package_id', 'content_'.$local.' as title');
        }])->get();
        return view('site.stores.store_packages', compact('packages'));
    }
    



}

