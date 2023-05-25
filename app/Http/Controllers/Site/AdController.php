<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ImageController;
use App\Models\Ad;
use App\Models\Banner;
use App\Models\AdImage;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubCategoryOption;
use App\Models\City;
use App\Models\Favourite;
use App\Models\Town;
use App\Models\AdComment;
use Illuminate\Http\Request;
use App\Http\Requests\site\AdRequest;
use Session;
use DB;


class AdController extends Controller
{
    public function search(Request $request){
        $local = App()->getLocale();

    }

    public function index()
    {
        $local = App()->getLocale();
        $categories = Category::select('id','name_'.$local.' as title','image','slug')->get();
        $ads = Ad::select('ads.id','ads.name','ads.price','ads.type', 'ads.views','ads.user_id','ads.slug','ads.created_at','ads.active_at','ads.special')->where('active','actived')->paginate(12);
        return view('site.ads.index', compact('ads', 'categories'));
    }



    public function show($slug){
         $local = App()->getLocale();
         $bannerOne = Banner::where('position','ad-1')->select('code','image','title','link')->first();
         $ad = Ad::where('ads.slug',$slug)
         ->with(['images','details'=>function ($query) use($local){
             return $query->select('ad_id','options.id','options.name_'.$local.' as name','options.type','option_details.id as details_id','option_details.name_'.$local.' as value','input_value')
             ->join('option_details','option_details.id','=','option_details_id')
             ->join('options','options.id','=','option_id');
         }])
         ->select('ads.id','ads.name','ads.price','ads.user_name as ad_name','ads.type',
         'ads.user_id','ads.desc','ads.mobile','ads.user_name',
         'ads.special','ads.active_at','ads.created_at','ads.views','ads.active','ads.city_id',
         'users.image as user_image',
         'stores.id as store_id','ads.category_id',
         'categories.name_'.$local.' as category_name',
         // 'ads.sub_category_id','sub_categories.name_'.$local.' as subcategory_name',
         'countries.currency as country_currency',
         'cities.name_'.$local.' as city_name',
         // 'ads.town_id','towns.name_'.$local.' as town_name',
         DB::raw('CASE WHEN ads.user_name IS NOT NULL THEN ads.user_name ELSE users.name END AS user_name'),
         DB::raw('CASE WHEN ads.mobile IS NOT NULL THEN ads.mobile ELSE users.mobile END AS mobile'))
         ->withCount('images')
         ->join('users','users.id','=','ads.user_id')
         ->join('countries','countries.id','=','ads.country_id')
         ->join('cities','cities.id','=','ads.city_id')
         // ->join('towns','towns.id','=','ads.town_id')
         ->join('categories','categories.id','=','ads.category_id')
         // ->join('sub_categories','sub_categories.id','=','ads.sub_category_id')
         ->leftJoin('stores','stores.id','=','ads.user_id')->first();


         if($ad->active == 'actived'){
             $ad->update(['views'=> $ad->views+1 ]);
         }



        return view('site.ads.show',compact('ad','bannerOne'));
    }


    public function filter(request $request){
        $local = app()->getLocale();
        $ads =Ad::select('ads.id','ads.name','ads.price','ads.type','ads.user_id','users.image as user_image','categories.name_'.$local.' as category_name','countries.currency as country_currency','ads.special','ads.active_at','ads.created_at','ads.views','ads.reason','ads.active')->withCount('images')->where('ads.type','product')->where('active','actived')->join('users','users.id','=','ads.user_id')->join('countries','countries.id','=','ads.country_id')->join('categories','categories.id','=','ads.category_id');

        if($request->sort_by == 'price_lowest') {
            $ads->orderBy('price', 'asc');
        }

        if($request->sort_by == 'price_highest') {
            $ads->orderBy('price', 'desc');
        }

        if($request->sort_by == 'added_new') {
            $ads->orderBy('created_at', 'desc');
        }

        if($request->sort_by == 'more_viewd') {
            $ads->orderBy('views', 'desc');
        }


        $ads = $ads->paginate(10);
        return response()->json($ads, 200,);;
    }

    public function create(){
        $local = App()->getLocale();
        $categories = Category::select('id','name_'.$local.' as title','image')->get();
        $subcategories = SubCategory::select('id','name_'.$local.' as title','slug')
           ->where('parent_id',null)->get();
        $cities = City::select('id','name_'.$local.' as title')->where('country_id',1)->get();
        return view('site.ads.create',compact('categories','cities','subcategories'));
    }

    public function getSub(Request $request)
    {
        $local = App()->getLocale();
        $subcategories  = SubCategory::where('category_id', $request->cat_id)->select('name_'.$local.' as title', 'id')->get();
        return response()->json($subcategories);
    }


    public function getSubOptions($id){
        $data=SubCategoryOption::where('sub_category_id',$id)->with(['option' => function($query) {
            $name = 'name_'.app()->getLocale();
            $query->select('id',$name.' as name','type');
        }])->with('option_details')->get();
       return $data;
    }



    public function getTown($id)
    {
        $local = App()->getLocale();
        $towns  = Town::where('city_id',$id)->select('name_'.$local.' as title', 'id')->get();
        return $towns;
    }



    public function store(AdRequest $request)
    {
        $data = $request->all();
        $data['country_id'] = '1';
        $data['user_id'] = auth()->user()->id;
        if($request->status == 'draft'){
            $data['actived'] = 'draft';
        }
        $ad =   Ad::create($data);
        if ($request->hasFile('image')) {
            foreach ($request->image as  $image) {
                $ad_image['image'] = ImageController::upload_with_water_mark($image,storage_path().'/app/public/ad');
                $ad_image['ad_id']=$ad->id;
                AdImage::create($ad_image);
            }
        }

        Session::flash('success','تمت الاضافة بنجاح');

        return redirect()->back();
    }




     public function toggle_like($id)
    {
        $is_like=Favourite::where('user_id',auth()->user()->id)->where('ad_id',$id)->first();
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
        $like=new Favourite();
        $like->user_id=auth()->user()->id;
        $like->ad_id=$id;
        $like->save();
        return true;

    }

    public function _UnLike($id)
    {
        $like=Favourite::where('user_id',auth()->user()->id)->where('ad_id',$id)->first();
        $like->delete();
        return true;
    }

    public function addComment(Request $request){
        $data = $request->validate([
            'comment' => 'required',
        ]);
        $data=$request->all();
        $create = AdComment::create([
            'ad_id' => $request->ad_id,
            'comment' =>$request->comment,
            'user_id'=> auth()->user()->id
            ]);

        Session::flash('success','تمت الاضافة بنجاح');
        return redirect()->back();
    }


    public function adCommentDelete($id)
    {
        $comment=AdComment::find($id);
        $comment->delete();
        return back();

        Session::flash('success','تم الحذف بنجاح');
        return redirect()->back();
    }


   public function edit($id){
        $ad = Ad::find($id);
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $cities = City::all();
        return view('site.ads.edit',compact('ad','categories','cities'));
    }

     public function update(Request $request,$id)
    {

       $ad= Ad::find($id);
         $data = [
            'type' => $request->type,
            'mobile' => $request->mobile,
            'name' => $request->name,
            'desc' => $request->desc,
            'price' => $request->price,
            'category_id'=> $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'city_id' => $request->city_id,
            'whatsapp' => $request->whatsapp??0,
            'call' => $request->call??0,
            'active' => 'waiting',
            'active_at' => null
        ];


        if($request->hasFile('image')){
        foreach($request->image as $file)
        {
            $image_new_name = time() . $file->getClientOriginalName();
            $file->move(storage_path().'/app/public/ad', $image_new_name);
            $projectimages = new AdImage();
            $projectimages->ad_id = $ad->id ;
            $projectimages->image = $image_new_name;
            $projectimages->save();
        }
        }

        $ad->update($data);

        Session::flash('success','تم تعديل البيانات بنجاح');

        return redirect()->back();

    }


    public function getSpecialAdPage()
    {
        return view('site.ads.upgrade-ad');
    }


    public function changeAdSold($id)
    {
        $ad = Ad::find($id);
        if($ad->active != 'sold')
        {
            $ad->update(['active' => 'sold' ]);
        }
        Session::flash('success','تم تمييز الاعلان كمباع');
        return redirect()->back();
    }


    public function changeAdArchifed($id)
    {
        $ad = Ad::find($id);
        if($ad->active != 'archived')
        {
            $ad->update(['active' => 'archived' ]);
        }
        Session::flash('success','تم إيقاف الاعلان ');
        return redirect()->back();
    }

    public function statistics($id)
    {
        $ad = Ad::find($id);
        return view('site.ads.statistics',compact('ad'));
    }


    public function statistic_details($id)
    {
        return view('site.ads.statistic-details');
    }


    public function destroy($id){
        $ad = Ad::find($id);
       $images = AdImage::where('ad_id',$id)->select('image as img','id')->get();

       foreach($images as $image){
           if(is_file(storage_path('app/public/ad/'.$image->img))){
           unlink(storage_path('app/public/ad/'.$image->img));
           }
           $image->destroy($image->$id);
       }
        $ad->destroy($id);

        Session::flash('success','تم حذف الإعلان  بنجاح');
        return redirect()->back();

    }





    /////////////////////////////////////////////////////////
    // public function wishlists_ads()
    // {
    //     $wishlist = WishList::where('user_id', Auth::id())->get();
    //     $userSponsersIds = $wishlist->pluck('ad_id');
    //     $sponsors = Ad::whereNotIn('id', $userSponsersIds->all())->get();
    //     return view('front.ads.wishlist')
    //         ->withSponsors($sponsors)
    //         ->withUsersponsor($wishlist);
    // }

    // public function update_wishlist(Request $request)
    // {
    //     if($request->ajax()){
    //         $data = $request->all();
    //         $countWishlist = WishList::countWishlist($data['ad_id']);
    //         $wishlist = new WishList();
    //         if($countWishlist == 0){
    //             $wishlist->ad_id = $data['ad_id'];
    //             $wishlist->user_id = $data['user_id'];
    //             $wishlist->save();
    //             return response()->json(['action'=>'add', 'status'=> 'تم إضافة الإعلان إلى المفضلة']);
    //         } else {
    //             WishList::where(['user_id' => Auth::user()->id, 'ad_id'=> $data['ad_id']])->delete();
    //             return response()->json(['action' => 'remove', 'status'=> 'تم حذف الإعلان من المفضلة']);
    //         }
    //     }
    // }


}
