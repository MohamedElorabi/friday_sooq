<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
     public function ajax(){
        $name='value_'.app()->getLocale();
        $cities=Notification::where('user_id',auth()->user()->id)->where('seen',0)->select('id', 'type', 'user_id', 'sender_id',$name.' as value', 'type', 'seen', 'created_at')->take(10)->latest()->get();
        Notification::where('user_id', auth()->user()->id)->update(['seen' => 1]);
        return $cities;
    }
}
