<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\Notification;
use App\Models\StoreType;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\dashboard\NotificationRequest;
use App\Http\Controllers\IMAGE_CONTROLLER;
use App\Http\Controllers\FirebaseController;
use DataTables;
use Session;

class NotificationController extends Controller
{
   
     public function create()
    {
       
        return view('dashboard.notification.create');
    }


    public function store(Request $request)
    {
        $users = array();
        $notification  =  array('name'=>$request->title,'body'=>$request->body);
        $notification_data= array('type'=>$request->type,'click_action'=>'FLUTTER_NOTIFICATION_CLICK','id'=>$request->id);
        $notify = FirebaseController::sendMultiNotify($users,$notification,$notification_data,'all'); 
        Session::flash('success','تم ارسال الاشعار....'); 
        return redirect()->back();
     
    }
    
    

}
