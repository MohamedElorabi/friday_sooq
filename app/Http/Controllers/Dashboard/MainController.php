<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use DataTables;
use App\Models\Ad;
use App\Models\View;
use App\Models\User;
use App\Models\Report;
use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;

class MainController extends Controller
{
public function main(Request $request){

if($request->daterange){
    $dates = explode(' - ', $request->daterange);
    $dateFrom =date('Y-m-d',strtotime($dates[0]));
     $dateTo =date('Y-m-d',strtotime($dates[1]));

    // dd($dateFrom->format('y-m-d'));
    $ads = Ad::whereDate('created_at','<=',$dateTo)->whereDate('created_at','>=',$dateFrom)->count();
    $views = View::whereDate('created_at','<=',$dateTo)->whereDate('created_at','>=',$dateFrom)->count();
    $ss = View::whereDate('created_at','<=',$dateTo)->whereDate('created_at','>=',$dateFrom)->sum('hits');
    $users = User::whereDate('created_at','<=',$dateTo)->whereDate('created_at','>=',$dateFrom)->count();
     $activeads = Ad::whereDate('created_at','<=',$dateTo)->whereDate('created_at','>=',$dateFrom)->where('active','actived')->count();
    $waitingeads = Ad::whereDate('created_at','<=',$dateTo)->whereDate('created_at','>=',$dateFrom)->where('active','waiting')->count();
    $refusedads = Ad::whereDate('created_at','<=',$dateTo)->whereDate('created_at','>=',$dateFrom)->where('active','refused')->count();
    $soldads = Ad::whereDate('created_at','<=',$dateTo)->whereDate('created_at','>=',$dateFrom)->where('active','sold')->count();
    $reports = Report::whereDate('created_at','<=',$dateTo)->whereDate('created_at','>=',$dateFrom)->count();
        $siteUsers = User::whereDate('created_at','<=',$dateTo)->whereDate('created_at','>=',$dateFrom)->where('device_type','site')->count();
    $appUsers = User::whereDate('created_at','<=',$dateTo)->whereDate('created_at','>=',$dateFrom)->where('device_type','app')->count();
    $googleUsers = User::whereDate('created_at','<=',$dateTo)->whereDate('created_at','>=',$dateFrom)->where('provider','google')->count();
    $fbUsers = User::whereDate('created_at','<=',$dateTo)->whereDate('created_at','>=',$dateFrom)->where('provider','facebook')->count();
    $appleUsers = User::whereDate('created_at','<=',$dateTo)->whereDate('created_at','>=',$dateFrom)->where('provider','apple')->count();
    $mobileUsers = User::whereDate('created_at','<=',$dateTo)->whereDate('created_at','>=',$dateFrom)->Where('provider',null)->count();

}
else{
    $ads = Ad::whereDate('created_at',Carbon::today())->count();
    $views = View::whereDate('created_at',Carbon::today())->count();
    $ss = View::whereDate('created_at',Carbon::today())->sum('hits');
    $users = User::whereDate('created_at',Carbon::today())->count();
    $activeads = Ad::whereDate('created_at',Carbon::today())->where('active','actived')->count();
    $waitingeads = Ad::whereDate('created_at',Carbon::today())->where('active','waiting')->count();
    $refusedads = Ad::whereDate('created_at',Carbon::today())->where('active','refused')->count();
    $soldads = Ad::whereDate('created_at',Carbon::today())->where('active','sold')->count();
    $reports = Report::whereDate('created_at',Carbon::today())->count();
    $siteUsers = User::whereDate('created_at',Carbon::today())->where('device_type','site')->count();
    $appUsers = User::whereDate('created_at',Carbon::today())->where('device_type','app')->count();
    $googleUsers = User::whereDate('created_at',Carbon::today())->where('provider','google')->count();
    $fbUsers = User::whereDate('created_at',Carbon::today())->where('provider','facebook')->count();
    $appleUsers = User::whereDate('created_at',Carbon::today())->where('provider','apple')->count();
    $mobileUsers = User::whereDate('created_at',Carbon::today())->Where('provider',null)->count();
}

   return view('dashboard.index',compact('ads','views','ss','users','activeads','waitingeads','refusedads','soldads','reports','siteUsers' ,'appUsers','googleUsers','fbUsers','appleUsers','mobileUsers'));
}
}
