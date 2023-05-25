<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\ImageController;
use App\Models\Ad;
use App\Models\UserStatistic;
use App\Models\Favourite;
use App\Models\Notification;
use App\Models\User;
use App\Models\Follow;
use App\Models\StoreOrder;
use App\Models\UserAddress;
use App\Models\Transfer;
use Illuminate\Http\Request;
use App\Http\Resources\FollowersCollection;
use App\Http\Resources\FollowingCollection;
use Carbon\Carbon;
use DB;
use Carbon\CarbonPeriod;
use App\Models\Question;

class UserController extends ApiController
{
    public function show($id){
        $user=User::where('id',$id)->withCount(['followers','following'])->first();
        return response()->json([
            'data' => $user,
            'success' => true,
        ],200);
    }

    public function userNotification(){
        $local = app()->getLocale();
        $notifications = Notification::where('user_id',auth()->user()->id)->select('notifications.id','notifications.value_'.$local.' as value','notifications.sender_id','notifications.type','notifications.created_at')->paginate(config('server.pagination_number'));
        return response()->json([
            'data' => $notifications,
            'success' => true,
        ],200);
    }

    public function myAds($type){
        $local = app()->getLocale();
        if($type == 'all'){
            $ads =Ad::select('ads.id','ads.name','ads.price','ads.type','ads.user_id','ads.category_id','ads.desc','ads.city_id','ads.sub_category_id','users.image as user_image','categories.name_'.$local.' as category_name','cities.name_'.$local.' as city_name','countries.currency as country_currency','ads.special','ads.active_at','ads.created_at','ads.views','ads.active','ads.reason')->withCount('images')->with(['images','comments'=>function ($query) use($local){
            $query->select('ad_comments.comment','ad_comments.id','ad_comments.ad_id','users.name as comment_user','users.image as comment_image','ad_comments.user_id')->join('users','users.id','=','ad_comments.user_id')->get();
        }])->where('ads.user_id',auth()->user()->id)->join('users','users.id','=','ads.user_id')->join('countries','countries.id','=','ads.country_id')->join('cities','cities.id','=','ads.city_id')->join('categories','categories.id','=','ads.category_id')->orderBy('active_at','DESC')->paginate(config('server.pagination_number'));
        }else{
            $ads =Ad::select('ads.id','ads.name','ads.desc','ads.price','ads.type','ads.user_id','ads.category_id','ads.city_id','ads.sub_category_id','users.image as user_image','cities.name_'.$local.' as city_name','categories.name_'.$local.' as category_name','countries.currency as country_currency','ads.special','ads.active_at','ads.created_at','ads.views','ads.active','ads.reason')->with(['images','comments'=>function ($query) use($local){
            $query->select('ad_comments.comment','ad_comments.id','ad_comments.ad_id','users.name as comment_user','users.image as comment_image','ad_comments.user_id')->join('users','users.id','=','ad_comments.user_id')->get();
        }])->withCount('images')->where('ads.user_id',auth()->user()->id)->where('active',$type)->join('users','users.id','=','ads.user_id')->join('cities','cities.id','=','ads.city_id')->join('countries','countries.id','=','ads.country_id')->join('categories','categories.id','=','ads.category_id')->orderBy('active_at','DESC')->paginate(config('server.pagination_number'));
        }
        return response()->json([
            'data' => $ads,
            'success' => true,
        ],200);
    }

    public function userAds($id){
        $local = app()->getLocale();
        $ads =Ad::select('ads.id','ads.name','ads.price','ads.type','ads.user_id','users.image as user_image','categories.name_'.$local.' as category_name','countries.currency as country_currency','ads.special','ads.active_at','ads.created_at','ads.views','ads.reason')->where('ads.user_id',$id)->where('active','actived')->join('users','users.id','=','ads.user_id')->join('countries','countries.id','=','ads.country_id')->join('categories','categories.id','=','ads.category_id')->orderBy('active_at','DESC')->paginate(config('server.pagination_number'));
        return response()->json([
            'data' => $ads,
            'success' => true,
        ],200);
    }

    public function updateProfile(Request $request){
       $data = $request->validate([
            'name' => 'nullable|string',
            'image' => 'nullable|image',
            'follow' => 'nullable'
        ]);
        
        if($request->hasfile('image')){
            $data['image'] = ImageController::upload_single($request->image,storage_path().'/app/public/user');
        }
        $user = auth()->user();
       $user->update($data);
        return response($user,201);
    }



    public function favourites(){
        $local = app()->getLocale();
            $ids=Favourite::where('user_id',auth()->user()->id)->pluck('ad_id');
            $ads =Ad::select('ads.id','ads.name','ads.special','ads.active_at','ads.views','ads.active')->withCount('images')->where('ads.type','product')->whereIn('ads.id',$ids)->where('active','actived')->join('users','users.id','=','ads.user_id')->join('countries','countries.id','=','ads.country_id')->join('categories','categories.id','=','ads.category_id')->orderBy('active_at','DESC')->paginate(config('server.pagination_number'));
            return response()->json([
            'data' => $ads,
            'success' => true,
            ],200);
    }
    
    public function latestSeen(Request $request){
        $data = $request->all();
        $local = app()->getLocale();
        $ads_str = $request->ads;
        $ads = explode(",",$ads_str);
        $ads =Ad::select('ads.id','ads.name','ads.special','ads.active_at','ads.views','ads.active')->withCount('images')->where('ads.type','product')->whereIn('ads.id',$ads)->where('active','actived')->join('users','users.id','=','ads.user_id')->join('countries','countries.id','=','ads.country_id')->join('categories','categories.id','=','ads.category_id')->orderBy('active_at','DESC')->paginate(config('server.pagination_number'));
        return response()->json([
            'data' => $ads,
            'success' => true,
            ],200);
    }

    public function toggle_Favourite($id)
    {
        $is_Favourite   =  Favourite::where('user_id',auth()->user()->id)->where('ad_id',$id)->first();
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
    
     public function getfollow($name){
               $user = auth()->user();
            if($name == 'Followers'){

                $data = Follow::where('user_id',$user->id)->select('followers.user_id','followers.follower_id as follower_id','users.image as user_image','users.name as user_name')->join('users','users.id','=','followers.follower_id')->paginate(config('server.pagination_number'));

            }elseif($name == 'Followings'){
                
                $data = Follow::where('follower_id',$user->id)->select('followers.user_id','followers.user_id as follower_id','users.image as user_image','users.name as user_name')->join('users','users.id','=','followers.user_id')->paginate(config('server.pagination_number'));
               
                
            }
             return response()->json([
            'data' => $data,
            'success' => true,
        ],200);
    }
    
    public function toggle_follow($id){
         $user = auth()->user();
        $is_follow=Follow::where('user_id',$user->id)->where('follower_id',$id)->first();
        if (is_null($is_follow)){
            $this->_DoFollow($id);
            $message='follow_successful';
        }else{
            $this->_UnFollow($id);
            $message='unfollow_successful';
        }
        $this->data['status'] = "ok";
        $this->data['message'] = $message;
        return response()->json($this->data, 200);
    }
    
    public function _DoFollow($id){
         $user = auth()->user();
        $follow=new Follow();
        $follow->user_id=$user->id;
        $follow->follower_id=$id;
        $follow->save();
        return true;
    }
    
    public function _UnFollow($id){
         $user = auth()->user();
        $follow=Follow::where('user_id',$user->id)->where('follower_id',$id)->first();
        $follow->delete();
        return true;
    }
    
    public function DelFollow($id){
        $user = auth()->user();
        $follow=Follow::where('follower_id',$id)->where('user_id',$user->id)->first();
        $follow->delete();
        $message='delete_successful';
        $this->data['status'] = "ok";
        $this->data['message'] = $message;
        return response()->json($this->data, 200);
    }
    
    public function storeAddress(Request $request){
        $data = $request->validate([
            'first_name' => 'required',
            'second_name' => 'required',
            'place' => 'required',
            'phone' => 'required',
            
        ]);
        
        $data['user_id'] = auth()->user()->id;
        $address = UserAddress::create($data);
        
          return response()->json([
            'address' => $address,
            'success' => true,
        ],200);
    }
    
    public function getAddresses(){
       
        $addresses = UserAddress::select('id','first_name','second_name','place','phone')->where('user_id',auth()->user()->id)->get();
        
          return response()->json([
            'data' => $addresses,
            'success' => true,
        ],200);
    }
    
    public function userStat($id,$type){
        UserStatistic::hit($id,$type);
        return response()->json([
            'success' => true,
            ],200);
    }
    public function myorders(){
        $local = app()->getLocale();
        $orders =StoreOrder::select('store_orders.id','store_orders.total','store_orders.created_at as created_at','store_orders.status')->where('store_orders.user_id',auth()->user()->id)->paginate(config('server.pagination_number'));
        return response()->json([
            'data' => $orders,
            'success' => true,
        ],200);
    }
    
    public function userStatistics($id,$type){
        $stats = UserStatistic::where('user_id',$id)->get();
        $gerDataAnalytics = UserStatistic::query();
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
        }

        $returnData['label'] = [];
        $returnData['ads'] = Ad::where('user_id',$id)->count();
        $returnData['likes'] = 0;
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
    
    public function transer(Request $request){
        $data = $request->validate([
            'amount' => 'required',
            'type' => 'required',
            'object_id' => 'required',
            'message' => 'nullable'
        ]);
        $data['user_id'] = auth()->user()->id;
        $user = User::where('id',auth()->user()->id)->first();
        
        if($data['type'] == 'add-balance'){
            $user->update(['balance'=> $user->balance+$data['amount'] ]);
        }elseif($data['type'] = 'send-balance'){
            if($user->balance >= $data['amount']){
                $object = User::where('mobile',$data['object_id'])->first();
                $user->update(['balance'=> $user->balance-$data['amount']]);
                $object->update(['balance'=> $object->balance+$data['amount']]);
                $data['object_id'] = $object->id;
            }else{
                return response()->json([
                    'message' => "you don't have enough balance",
                    'success' => false,
                ],200);
            }
        }
        $address = Transfer::create($data);
        
        return response()->json([
            'transfer' => $address,
            'success' => true,
        ],200);
    }
    
    public function transaction(){
        $transactions = Transfer::where('user_id',auth()->user()->id)->get();
        return response()->json([
            'transfer' => $transactions,
            'success' => true,
        ],200);
    }
    
    public function removeAddress(Request $request)
    {
       $id = $request->id;  
       $address = UserAddress::where(['id'=>$id,'user_id'=>auth()->user()->id])->first();
       $address->delete();
       
       return response()->json([
            'message' => "Address Deleted Successfully",
            'success' => true
        ],200);
    }
    
    
    public function getQuestions()
    {
        $local = app()->getLocale();
         $questions = Question::select('name_'.$local.' as title','answer_'.$local.' as answer')->get();
          return response()->json([
              'questions' => $questions,
              'success' => true
        ],200);
    }
    
}
