<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Ad;
use App\Models\Notification;
use App\Models\User;
use App\Http\Controllers\FirebaseController;
use Carbon\Carbon;

class status_ad extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ad:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'ad change active every 5 minutes automaticly ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $ads = Ad::where('active','waiting')->where('active_at', null)->get();

        $badWords = array('sex','سكس','جنسية','جنس','شواذ','السمو','سياسة','gay','sexy','مجلس الأمة');

        $matches = array();
        foreach($ads as $ad){
             $matchFound = preg_match_all("/(*UTF8)\b(" . implode('|', $badWords) . ")\b/iu", $ad->name, $matches);
             if($matchFound){
                $ad->update(['active'=>'refused','reason'=>'المحتوى مخالف لشروط الاستخدام']);
                Notification::create(['user_id'=>$ad->user_id,'sender_id'=>$ad->id,'value_ar'=>'تم رفض اعلانك '.$ad->name.'','value_en'=>'Your Ad '.$ad->name.' has been refused','value_ur'=>'Your Ad '.$ad->name.' has been refused','value_hi'=>'Your Ad '.$ad->name.' has been refused','value_fil'=>'Your Ad '.$ad->name.' has been refused','type'=>'ad']);           
                $notification  =  array('name'=>"تسوق سيل",'body'=>'تم رفض اعلانك '.$ad->name.'');
                $notification_data= array('type'=>"ad",'click_action'=>'FLUTTER_NOTIFICATION_CLICK','id'=>$ad->id);
                $get_token = User::where('id',$ad->user_id)->first();
                if($get_token != null){
                    $notify = FirebaseController::sendNotify($get_token->device_token,$notification,$notification_data); 
                }
             }else{
                $ad->update(['active'=>'actived','active_at'=>\Carbon\Carbon::now()->toDateTimeString()]);
                Notification::create(['user_id'=>$ad->user_id,'sender_id'=>$ad->id,'value_ar'=>'تم الموافقة على اعلانك '.$ad->name.'','value_en'=>'Your Ad '.$ad->name.' has been approved','value_ur'=>'Your Ad '.$ad->name.' has been approved','value_hi'=>'Your Ad '.$ad->name.' has been approved','value_fil'=>'Your Ad '.$ad->name.' has been approved','type'=>'ad']);           
                $notification  =  array('name'=>"تسوق سيل",'body'=>'تم تفعيل اعلانك '.$ad->name.'');
                $notification_data= array('type'=>"ad",'click_action'=>'FLUTTER_NOTIFICATION_CLICK','id'=>$ad->id);
                $get_token = User::where('id',$ad->user_id)->first();
                if($get_token != null){
                    $notify = FirebaseController::sendNotify($get_token->device_token,$notification,$notification_data); 
                }
             }
        }
        
    }
}
