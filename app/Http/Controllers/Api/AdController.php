<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\ImageController;
use App\Models\Ad;
use App\Models\AdComment;
use App\Models\AdImage;
use App\Models\AdOffer;
use App\Models\AdOption;
use App\Models\SubCategory;
use App\Models\AdStatistic;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use DB;
class AdController extends ApiController
{
    public function home($id){
        $local = app()->getLocale();
        $ads =Ad::select('ads.id','ads.active','ads.special','ads.special_package')->where('ads.type','product')->where('special',1);
        $adsS =Ad::select('ads.id','ads.active','ads.special','ads.special_package')->where('ads.type','product')->where('special',1);
        if($id != 0){
            $ads->where('ads.category_id',$id);
            $adsS->where('ads.category_id',$id);
        }
        $ads->where('ads.special_package',1)->where('active','actived');
        $ads = $ads->take(9)->get();
        $adsS->where('ads.special_package',2)->where('active','actived');
        $adsS = $adsS->take(6)->get();
         $data = ["spcial"=>$ads,"spcial1"=>$adsS];
        return response()->json([
            'data' => $data,
            'success' => true,
        ],200);
    }
    
    public function index(){
        $local = app()->getLocale();
        $ads =Ad::select('ads.id','ads.name','ads.special','ads.active_at','ads.views','ads.active')->withCount('images')->where('ads.type','product')->whereIn('active', ['actived','sold'])->orderBy('active_at','DESC')->paginate(10);
        return response()->json([
            'data' => $ads,
            'success' => true,
        ],200);
    }

    public function specials(){
        $local = app()->getLocale();
        $ads =Ad::select('ads.id','ads.name','ads.special','ads.active_at','ads.views','ads.active')->where('ads.type','product')->withCount('images')->where('active','actived')->where('special',1)->orderBy('active_at','DESC')->paginate(10);
        return response()->json(['data' => $ads,'success' => true,],200);
    }

    public function offers(){
        $local = app()->getLocale();
        $ads =Ad::select('ads.id','ads.name','ads.type','ads.mobile','users.image as user_image','ads.views','ads.link','users.name as user_name')->withCount('favourites')->where('active','actived')->where('ads.type','service')->join('users','users.id','=','ads.user_id')->orderBy('active_at','DESC')->paginate(10);
        return response()->json(['data' => $ads,'success' => true,],200);
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required|string',
            'desc' => 'required|string',
            'country_id' => 'required|string',
            'city_id' => 'nullable|string',
            'town_id' => 'nullable|string',
            'category_id' => 'required|string',
            'sub_category_id' => 'required|string',
            'whatsapp' => 'required|string',
            'call' => 'required|string',
            'price' => 'nullable|string',
        ]);
        
        $data['user_id'] = auth()->user()->id;
        if($request->status == 'draft'){
            $data['actived'] = 'draft';
        }
        $ad = Ad::create($data);
        
        if($request->hasFile('image')) {
            foreach ($request->image as  $image) {
                $ad_image['image'] = ImageController::upload_with_water_mark($image,storage_path().'/app/public/ad');
                $ad_image['ad_id']=$ad->id;
                AdImage::create($ad_image);
            }
        }
        
        return response()->json([
            'data' => $ad,
            'success' => true,
        ],200);
    }
    
    public function updateAd(Request $request , $id){
        $data = $request->except(['category_id']);
        $ad = Ad::find($id);
        if($ad->user_id != auth()->user()->id){
            return response()->json([
                'message' => 'لا يوجد لديك الصلاحيات',
                'success' => false,
            ],442);
        }else{
            if ($request->hasFile('image')) {
                foreach ($request->image as  $image) {
                    $ad_image['image'] = ImageController::upload_with_water_mark($image,storage_path().'/app/public/ad');
                    $ad_image['ad_id']=$id;
                    AdImage::create($ad_image);
                }
            }
            //select data
            $data['active'] ='waiting';
            $ad->update($data);
            
            return response()->json([
                'data' => $ad,
                'success' => true,
            ],200);
        }
        
    }

    public function show($id){
        $local = app()->getLocale();
        
        $ad = Ad::where('ads.id',$id)->with(['images','comments'=>function ($query) use($local){
            $query->select('ad_comments.comment','ad_comments.id','ad_comments.ad_id','users.name as comment_user','users.image as comment_image','ad_comments.user_id')->join('users','users.id','=','ad_comments.user_id')->get();
        }])->select('ads.id','ads.name','ads.price','ads.type','ads.user_id','ads.desc','users.image as user_image','ads.category_id','categories.name_'.$local.' as category_name','ads.sub_category_id','sub_categories.name_'.$local.' as subcategory_name','countries.currency as country_currency','ads.special','ads.call','ads.whatsapp','ads.slug','ads.active_at','ads.created_at','ads.views','ads.active','ads.city_id','cities.name_'.$local.' as city_name','ads.town_id','towns.name_'.$local.' as town_name','users.name as user_name','users.mobile as user_mobile','ads.lat','ads.lng')->withCount('images')->join('users','users.id','=','ads.user_id')->join('countries','countries.id','=','ads.country_id')->join('cities','cities.id','=','ads.city_id')->join('towns','towns.id','=','ads.town_id')->join('categories','categories.id','=','ads.category_id')->join('sub_categories','sub_categories.id','=','ads.sub_category_id')->first();
        if($ad->active == 'actived'){
            $ad->update(['views'=> $ad->views+1 ]);
        }
        return response()->json([   
            'data' => $ad,
            'success' => true,
        ],200);
    }

    public function byCat($type,$id, Request $request){
        $special = $request->special;

        $local = app()->getLocale();
        if($type == 'sub'){
            $category = SubCategory::where('id',$id)->first();
            $subCategory = SubCategory::where('parent_id',$id)->get();
        
        if(!$subCategory->isEmpty()){
            $sub = SubCategory::where('parent_id',$category->id)->pluck('id');
            $subLimtCategory = SubCategory::whereIn('parent_id',$sub->all())->pluck('id');
            if(!$subLimtCategory->isEmpty()){
                $sub = SubCategory::whereIn('parent_id',$subLimtCategory->all())->pluck('id');
                // dd();
                $all = array_merge($subLimtCategory->all(),$sub->all(),$subCategory->pluck("id")->all());
            $ads = Ad::whereIn('sub_category_id',$all)->select('ads.id','ads.name','ads.special','ads.active_at','ads.views','ads.active')->withCount('images')->where('ads.type','product')->where('active','actived');
            }else{
                $ads = Ad::whereIn('sub_category_id',$sub->all())->select('ads.id','ads.name','ads.special','ads.active_at','ads.views','ads.active')->withCount('images')->where('ads.type','product')->where('active','actived');
            }

        }else{
            $ads = Ad::where('sub_category_id',$id)->select('ads.id','ads.name','ads.special','ads.active_at','ads.views','ads.active')->withCount('images')->where('ads.type','product')->where('active','actived');
        }
            
            
            
        }else{
            $ads = Ad::where('category_id',$id)->select('ads.id','ads.name','ads.special','ads.active_at','ads.views','ads.active')->withCount('images')->where('ads.type','product')->where('active','actived');
        }
        
        if ($request->has('special')) {
            if($special = 'true'){
                $ads->where('special',1);
            }
        }
        
        $ads = $ads->orderBy('active_at','DESC')->paginate(10);
        return response()->json([
            'data' => $ads,
            'success' => true,
        ],200);
    }

    public function search(request $request){
        $local = app()->getLocale();
        $name = $request->name;
        $ads =Ad::select('ads.id','ads.name','ads.special','ads.active_at','ads.views','ads.active')->withCount('images')->where('ads.type','product')->where('active','actived')->where('ads.name','LIKE',"%{$name}%")->orderBy('active_at','DESC')->paginate(10);
        return response()->json([
            'data' => $ads,
            'success' => true,
        ],200);
    }
    
    public function filter(request $request){
        $local = app()->getLocale();
        $ads =Ad::select('ads.id','ads.name','ads.price','ads.type','ads.user_id','users.image as user_image','categories.name_'.$local.' as category_name','countries.currency as country_currency','ads.special','ads.active_at','ads.created_at','ads.views','ads.reason','ads.active')->withCount('images')->where('ads.type','product')->where('active','actived')->join('users','users.id','=','ads.user_id')->join('countries','countries.id','=','ads.country_id')->join('categories','categories.id','=','ads.category_id');
        $option_details_str = $request->ids;
        $option_details = explode(",",$option_details_str);
        $ids = AdOption::whereIn('option_details_id',$option_details)->pluck('ad_id');
        if($request->sub_category != '') {
            $ads->where('ads.sub_category_id',$request->sub_category);
        }
        if($request->ids != '') {
              $ads->whereIn('id',$ids);
        }
        if($request->price_from = ''){
            $ads->where('ads.price','>=',$request->price_to);
        }
        if($request->price_to = ''){
            $ads->where('ads.price','<=',$request->price_to);
        }
        if($request->with_price=='true') {
            $ads->where('ads.price','!=',0);
        }
        if($request->with_images=='true') {
            $ads->whereHas('images');
        }
        if($request->with_special=='true') {
            $ads->where('special',true);
        }
        if($request->sort=="recent") {
            $ads->latest();
        }elseif($request->sort=="low") {
            $ads->orderBy('price', 'asc');
        }elseif($request->sort=="high") {
            $ads->orderBy('price', 'desc');
        }else{
            $ads->orderBy('active_at','DESC');
        }
        
        $ads = $ads->paginate(10);
        return response()->json([
            'data' => $ads,
            'success' => true,
        ],200);
    }

    public function postOffer(Request $request){
        $data = $request->validate([
            'ad_id' => 'required|exists:ads,id',
            'offer_ad_id' => 'required|exists:ads,id',
        ]);
        $offer_user = Ad::select('ads.user_id')->where('ads.id',$request->offer_ad_id)->first();
        $data['user_id'] = auth()->user()->id;
        $data['offer_user_id'] = $offer_user->user_id;
        $ad = AdOffer::create($data);

        return response()->json([
            'data' => $ad,
            'success' => true,
        ],201);
    }

    public function adComments($id){
        $comments = AdComment::where('ad_id',$id)->select('ad_comments.id','ad_comments.comment','ad_comments.user_id','users.name as user_name','users.image as user_image')->join('users','users.id','=','ad_comments.user_id')->get();
        return response()->json([
            'data' => $comments,
            'success' => true,
        ],200);
    }

    public function postComment(Request $request){
        $data = $request->validate([
            'ad_id' => 'required|exists:ads,id',
            'comment' => 'required',
        ]);
        $data['user_id'] = auth()->user()->id;
        $comment = AdComment::create($data);

        return response()->json([
            'data' => $comment,
            'success' => true,
        ],201);
    }
    
    public function destoryComment($id){
        $comment = AdComment::find($id);
        if($comment->user_id ==auth()->user()->id){
            $comment->delete();
            return response()->json([
                'message' => 'تم الحذف',
                'success' => true,
            ],200);
        }else{
            return response()->json([
                'message' => 'لا يوجد لديك الصلاحيات',
                'success' => false,
            ],442);
        }
    }

    public function destoryAd($id){
        $ad = Ad::find($id);
        if($ad->user_id ==auth()->user()->id){
            $ad->delete();
            return response()->json([
                'message' => 'تم الحذف',
                'success' => true,
            ],200);
        }else{
            return response()->json([
                'message' => 'لا يوجد لديك الصلاحيات',
                'success' => false,
            ],442);
        }
    }

    public function updateStatus(Request $request){
        $ad_id = $request->ad_id;
        $ad = Ad::findOrFail($ad_id);
        if($ad->user_id == auth()->user()->id){
            $ad->update(array('active' => $request->status));
            return response()->json([
                'message' => 'تم تغير حالة الاعلان',
                'success' => true,
            ],200);
        }else{
            return response()->json([
                'message' => 'لا يوجد لديك الصلاحيات',
                'success' => false,
            ],442);
        }
    }
    
    public function adStat($id,$type){
        AdStatistic::hit($id,$type);
        return response()->json([
            'success' => true,
            ],200);
    }
    
    
    public function adStatistics($id,$type){
        $stats = AdStatistic::where('ad_id',$id)->get();
        $gerDataAnalytics = AdStatistic::query();
        $gerDataAnalytics = $gerDataAnalytics->select(
            DB::raw("DATE_FORMAT(date, '%M %d, %Y') as label"),
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
        if($type == 'daily'){
        $daysOfMonth = collect(
               CarbonPeriod::create(
                $dateArrFrom,
                $dateArrTo
            )
        )
            ->map(function ($gerDataAnalytics) {
                return [
                    'label' => $gerDataAnalytics->format('F d, Y'),
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
            
        }elseif($type == 'weekly'){
        $daysOfMonth = collect(
                CarbonPeriod::create(
                $dateArrFrom,
                $dateArrTo
            )->filter(function (Carbon $date) {
        return $date->isFriday();
    })
        )
            ->map(function ($gerDataAnalytics) {
                return [
                    'label' => $gerDataAnalytics->format('F d, Y'),
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
        }elseif($type == 'monthly'){
            $daysOfMonth = collect(
                CarbonPeriod::create(
                '2022-01-01',
                '2022-12-30'
            )->filter(function (Carbon $date) {
                return $date->lastofMonth();
            })
        )
            ->map(function ($gerDataAnalytics) {
                return [
                    'label' => $gerDataAnalytics->format('M'),
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
        }

        $returnData['label'] = [];
        // $returnData['dataSum'] = [];

        foreach ($daysOfMonth as $value) {
            $returnData['label'][] = $value['label'];
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

}
