<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\AdImage;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\SubCategory;
use App\Models\Town;
use App\Models\User;
use App\Models\Notification;
use App\Http\Controllers\FirebaseController;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\dashboard\AdRequest;
use Session;
use Carbon\Carbon;
use App\Http\Controllers\ImageController;

class AdController extends Controller
{
    public function index(Request $request,$type){
        if ($request->ajax()) {
            if($type=='actived'){
            $data = Ad::select('ads.id','ads.name','ads.slug','ads.active','ads.special','users.name as user','categories.name_ar as category','sub_categories.name_ar as subcategory')->join('users','users.id','=','ads.user_id')->join('categories','categories.id','=','ads.category_id')->join('sub_categories','sub_categories.id','=','ads.sub_category_id')->where('active','actived')->get();
            }
            elseif($type=='waiting'){
            $data = Ad::select('ads.id','ads.name','ads.slug','ads.active','ads.special','users.name as user','categories.name_ar as category','sub_categories.name_ar as subcategory')->join('users','users.id','=','ads.user_id')->join('categories','categories.id','=','ads.category_id')->join('sub_categories','sub_categories.id','=','ads.sub_category_id')->where('active','waiting')->get();
            }
            elseif($type=='refused'){
            $data = Ad::select('ads.id','ads.name','ads.slug','ads.active','ads.special','users.name as user','categories.name_ar as category','sub_categories.name_ar as subcategory')->join('users','users.id','=','ads.user_id')->join('categories','categories.id','=','ads.category_id')->join('sub_categories','sub_categories.id','=','ads.sub_category_id')->where('active','refused')->get();
            }
            elseif($type=='archived'){
            $data = Ad::select('ads.id','ads.name','ads.slug','ads.active','ads.special','users.name as user','categories.name_ar as category','sub_categories.name_ar as subcategory')->join('users','users.id','=','ads.user_id')->join('categories','categories.id','=','ads.category_id')->join('sub_categories','sub_categories.id','=','ads.sub_category_id')->where('active','archived')->get();
            }
            elseif($type=='sold'){
            $data = Ad::select('ads.id','ads.name','ads.slug','ads.active','ads.special','users.name as user','categories.name_ar as category','sub_categories.name_ar as subcategory')->join('users','users.id','=','ads.user_id')->join('categories','categories.id','=','ads.category_id')->join('sub_categories','sub_categories.id','=','ads.sub_category_id')->where('active','sold')->get();
            }
            
            
            elseif($type=='daily-actived'){
            $data = Ad::select('ads.id','ads.name','ads.slug','ads.active','ads.special','users.name as user','categories.name_ar as category','sub_categories.name_ar as subcategory')->join('users','users.id','=','ads.user_id')->join('categories','categories.id','=','ads.category_id')->join('sub_categories','sub_categories.id','=','ads.sub_category_id')->where('active','actived')->whereDate('ads.created_at', Carbon::today())->get();
            }
            elseif($type=='daily-waiting'){
            $data = Ad::select('ads.id','ads.name','ads.slug','ads.active','ads.special','users.name as user','categories.name_ar as category','sub_categories.name_ar as subcategory')->join('users','users.id','=','ads.user_id')->join('categories','categories.id','=','ads.category_id')->join('sub_categories','sub_categories.id','=','ads.sub_category_id')->where('active','waiting')->whereDate('ads.created_at', Carbon::today())->get();
            }
            elseif($type=='daily-refused'){
            $data = Ad::select('ads.id','ads.name','ads.slug','ads.active','ads.special','users.name as user','categories.name_ar as category','sub_categories.name_ar as subcategory')->join('users','users.id','=','ads.user_id')->join('categories','categories.id','=','ads.category_id')->join('sub_categories','sub_categories.id','=','ads.sub_category_id')->where('active','refused')->whereDate('ads.created_at', Carbon::today())->get();
            }
            elseif($type=='daily-archived'){
            $data = Ad::select('ads.id','ads.name','ads.slug','ads.active','ads.special','users.name as user','categories.name_ar as category','sub_categories.name_ar as subcategory')->join('users','users.id','=','ads.user_id')->join('categories','categories.id','=','ads.category_id')->join('sub_categories','sub_categories.id','=','ads.sub_category_id')->where('active','archived')->whereDate('ads.created_at', Carbon::today())->get();
            }
            elseif($type=='daily-sold'){
            $data = Ad::select('ads.id','ads.name','ads.slug','ads.active','ads.special','users.name as user','categories.name_ar as category','sub_categories.name_ar as subcategory')->join('users','users.id','=','ads.user_id')->join('categories','categories.id','=','ads.category_id')->join('sub_categories','sub_categories.id','=','ads.sub_category_id')->where('active','sold')->whereDate('ads.created_at', Carbon::today())->get();
            }
            
            
            return DataTables::of($data)->addIndexColumn()->addColumn('active',function($row){

                $select = '<select class="status" name="{{'.$row->active.'}}" data-active="'.$row->active.'" data-id="'.$row->id.'">';
                $select = $select.'<option value="actived"';
                if($row->active == 'actived'){
                    $select = $select.'selected >مفعل</option>';
                }else{
                    $select = $select.'>مفعل</option>';
                }
                $select = $select.'<option value="archived"';
                if($row->active == 'archived'){
                    $select = $select.'selected>مؤرشف</option>';
                }else{
                    $select = $select.'>مؤرشف</option>';
                }
                $select = $select.'<option value="waiting"';
                if($row->active == 'waiting'){
                    $select = $select.'selected>قيد الانتظار</option>';
                }else{
                    $select = $select.'>قيد الانتظار</option>';
                }
                $select = $select.'<option value="refused"';
                if($row->active == 'refused'){
                    $select = $select.'selected>مرفوض</option>';
                }else{
                    $select = $select.'>مرفوض</option>';
                }
                $select = $select.'<option value="sold"';
                if($row->active == 'sold'){
                    $select = $select.'selected>مباع</option>';
                }else{
                    $select = $select.'>مباع</option>';
                }
                $select = $select.'</select>';

                return $select;
            })
            
            
            ->addColumn('special',function($row){

                $select = '<select class="special" name="special" data-special="'.$row->special.'" data-id="'.$row->id.'">';
                $select = $select.'<option value="0"';
                if($row->special == "0"){
                    $select = $select.'selected >غير مميز</option>';
                }else{
                    $select = $select.'>غير مميز</option>';
                }
                $select = $select.'<option value="1"';
                if($row->special == "1"){
                    $select = $select.'selected>مميز</option>';
                }else{
                    $select = $select.'>مميز</option>';
                }
              $select = $select.'</select>';

                return $select;
            })
            
                ->addColumn('action', function($row){
               
                    $btn = '<a href="ad/'.$row->id.'/edit" data-id="'.$row->id.'" class="edit btn btn-info btn-sm edit-ad">Edit</a>';
                    $btn = '<a href="'.route('ad.show',[$row->slug]).'" target="_blank" data-id="'.$row->id.'" class="edit btn btn-success btn-sm edit-ad">Show</a>';
                    $btn = $btn.'<form action="https://tsawqsale.com/admin/ad/delete/'.$row->id.'" method="POST">
                    '.csrf_field().'
                    '.method_field("DELETE").'
                    <button type="submit" class="delete btn btn-danger btn-sm"
                        onclick="return confirm(\'Are You Sure Want to Delete?\')"
                        >Delete</button>
                    </form>
                ';
                return $btn;
               
                    
                })
                ->rawColumns(['active','special','action'])
                ->make(true);
        }

        return view('users');
    }


    public function create()
    {
       
        $users = User::select('id','name')->get();
        $countries = Country::select('id','name_ar')->get();
        $cities = City::select('id','name_ar')->get();
        $towns = Town::select('id','name_ar')->get();
        $categories = Category::select('id','name_ar')->get();
        $subcategories = SubCategory::select('id','name_ar')->get();
        return view('dashboard.ad.create',compact('users','countries','cities','towns','categories','subcategories'));
    }

    public function store(AdRequest $request)
    {
        $data=$request->all();
        $create = Ad::create($data);
        
         foreach($request->image as $file)
        {
//            dd($image);
            $image_new_name = time() . $file->getClientOriginalName();
            $file->move(storage_path().'/app/public/ad', $image_new_name);
            $productimages = new AdImage();
            $productimages->ad_id = $create->id ;
            $productimages->image = $image_new_name;
            $productimages->save();
        }


        Session::flash('success','تمت الاضافة بنجاح');
        return redirect()->back();
    }



    public function edit($id)
    {
        $users = User::select('id','name')->get();
        $countries = Country::select('id','name_ar')->get();
        $cities = City::select('id','name_ar')->get();
        $towns = Town::select('id','name_ar')->get();
        $categories = Category::select('id','name_ar')->get();
        $subcategories = SubCategory::select('id','name_ar')->get();
        $info = Ad::find($id);
        return view('dashboard.ad.edit',compact('info','cities','users','countries','towns','categories','subcategories'));
    }


    public function update(AdRequest $request,$id)
    {
        $data=$request->all();

        Ad::find($id)->update($data);
         foreach($request->image as $file)
        {
//            dd($image);
            $image_new_name = time() . $file->getClientOriginalName();
            $file->move(storage_path().'/app/public/ad', $image_new_name);
            $productimages = new AdImage();
            $productimages->ad_id = $id ;
            $productimages->image = $image_new_name;
            $productimages->save();
        }
        Session::flash('success','تم تعديل البيانات بنجاح');
        return redirect()->back();
    }

    public function status(Request $request){
        $ad=Ad::find($request->id);
        if ($request->active =="actived"){
            $ad->update(['active'=>$request->active,'active_at'=>Carbon::now()->toDateTimeString()]);
            Notification::create([
                'value_ar'=>'تم الموافقة على اعلانك'.$ad->name.'',
                'value_en'=>'Your AD '.$ad->name.' has been approved',
                'value_ur'=>'Your AD '.$ad->name.' has been approved',
                'value_hi'=>'Your AD '.$ad->name.' has been approved',
                'value_fil'=>'Your AD '.$ad->name.' has been approved',
                'type'=>'ad',
                'user_id' => $ad->user->id,
                'sender_id' => $ad->id,
                ]);
            $notification  =  array('name'=>"تسوق سيل",'body'=>'تم الموافقة على اعلانك '.$ad->name.'');
        }
        if ($request->active =="waiting"){
            $ad->update(['active'=>$request->active]);
            Notification::create([
                'value_ar'=>'تم نقل اعلانك الى قائمة الانتظار'.$ad->name.'',
                'value_en'=>'Your AD '.$ad->name.' has been added on waiting list',
                'value_ur'=>'Your AD '.$ad->name.' has been added on waiting list',
                'value_hi'=>'Your AD '.$ad->name.' has been added on waiting list',
                'value_fil'=>'Your AD '.$ad->name.' has been added on waiting list',
                'type'=>'ad',
                'user_id' => $ad->user->id,
                'sender_id' => $ad->id,
                ]);
            $notification  =  array('name'=>"تسوق سيل",'body'=>'تم نقل اعلانك الى قائمة الانتظار '.$ad->name.'');
        }
        
        if ($request->active =="refused"){
            $ad->update(['active'=>$request->active]);
            Notification::create([
                'value_ar'=>'تم رفض اعلانك '.$ad->name.'',
                'value_en'=>'Your AD '.$ad->name.' has been refused',
                'value_ur'=>'Your AD '.$ad->name.' has been refused',
                'value_hi'=>'Your AD '.$ad->name.' has been refused',
                'value_fil'=>'Your AD '.$ad->name.' has been refused',
                'type'=>'ad',
                'user_id' => $ad->user->id,
                'sender_id' => $ad->id,
                ]);
            $notification  =  array('name'=>"تسوق سيل",'body'=>'تم رفض اعلانك '.$ad->name.'');
        }
        
        if ($request->active =="archived"){
            $ad->update(['active'=>$request->active]);
            Notification::create([
                'value_ar'=>'تم ارشفة اعلانك '.$ad->name.'',
                'value_en'=>'Your AD '.$ad->name.' has been added to archived list',
                'value_ur'=>'Your AD '.$ad->name.' has been added to archived list',
                'value_hi'=>'Your AD '.$ad->name.' has been added to archived list',
                'value_fil'=>'Your AD '.$ad->name.' has been added to archived list',
                'type'=>'ad',
                'user_id' => $ad->user->id,
                'sender_id' => $ad->id,
                ]);
            $notification  =  array('name'=>"تسوق سيل",'body'=>'تم ارشفة اعلانك '.$ad->name.'');
        }
        
         if ($request->active =="sold"){
            $ad->update(['active'=>$request->active]);
            Notification::create([
                'value_ar'=>'تم بيع اعلانك '.$ad->name.'',
                'value_en'=>'Your AD '.$ad->name.' has been added to sold list',
                'value_ur'=>'Your AD '.$ad->name.' has been added to sold list',
                'value_hi'=>'Your AD '.$ad->name.' has been added to sold list',
                'value_fil'=>'Your AD '.$ad->name.' has been added to sold list',
                'type'=>'ad',
                'user_id' => $ad->user->id,
                'sender_id' => $ad->id,
                ]);
            $notification  =  array('name'=>"تسوق سيل",'body'=>'تم بيع اعلانك '.$ad->name.'');
        }
        $notification_data= array('type'=>"ad",'click_action'=>'FLUTTER_NOTIFICATION_CLICK','id'=>$ad->id);
        $get_token = User::where('id',$ad->user_id)->first();
        if($get_token != null){
            $notify = FirebaseController::sendNotify($get_token->device_token,$notification,$notification_data); 
        }
        Session::flash('success','تم  تغيير حاله  الاعلان  بنجاح..'  );
        return redirect()->back();
    }
    

    public function special(Request $request){

        $ad=Ad::find($request->id);

        if ($request->special =='0'){
            $ad->update(['special'=>0]);
        }
        if ($request->special =='1'){
            $ad->update(['special'=>true,'special_at'=>Carbon::now()->toDateTimeString()]);
        }
      
        Session::flash('success','تم  تغيير حاله  الاعلان  بنجاح..'  );
        return redirect()->back();
    }
    
    

    public function destroy($id){
       
          Ad::destroy($id);
        Session::flash('success','تم حذف الخدمه بنجاح..');
        return redirect()->back();
    }
    
   




}
