<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Contact;
use Validator;
class ContactUsController extends ApiController
{


public function contact_us(Request $request){
	$data=$request->all();
	  $validator = Validator::make($data, [
        'name'=>'required',
         'email'=>'required',
          'subject'=>'required',
          'massege'=>'required',
      ]);
    if($validator->fails()){
      return response()->json(['status'=>'0','errors'=>$validator->errors()->all()]);
    }
        $page=Contact::create($data)->get();
            $this->data['status'] = "ok";
            return response()->json($this->data, 200);
    }
    
    
     public function list(){
        $page=Setting::select('phone','email','facebook','twitter','instagram','snapchat','youtube','tiktok')->where('id', 1)->get();
            $data['data'] =  $page;
            $data['status'] = "ok";
            return response()->json($data, 200);
    }

    
    
}
