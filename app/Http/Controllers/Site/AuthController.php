<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ImageController;
use App\Models\Ad;
use App\Models\Category;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\site\LoginRequest;
use Illuminate\Support\Facades\Validator;
use Session;
use Auth;
use Redirect;

class AuthController extends Controller
{
    public function loginPage(){
        $local = App()->getLocale();
        $country_code = Country::select('countries.id', 'countries.name_'.$local.' as name' , 'countries.country_code')->get();
        return view('site.auth.login', compact('country_code'));

    }


    public function login(Request $request){


//        dd($request->all());
//        dd($request->country_code.$request->mobile);
        $request->validate([
                'mobile'=>'required',
            ]);
        $mobile = $request->mobile;
        $country_code = $request->country_code;
        $code = mt_rand(1000,9999);
        $message="Yor code is " .$code;
        $username = "fridays";
        $password='Oredo@4321';
        $sender = "FridaySooq";
        $url = "https://www.kwtsms.com/API/send";
        $stringToPost = "username=".$username."&password=".$password."&sender=".$sender."&mobile=".$mobile."&lang=3&message=".$message;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $stringToPost);
        $result = curl_exec($ch);
        if($result){
            //session()->put(['code' => $code, 'mobile'=>$country_code.$mobile]);
            session()->put(['code' => 4444, 'mobile'=>12345678]);
            Session::flash('success','code sent');
            return redirect()->route('verifyCodePage');
        }
         
    }

    

  public function verifyCodePage()
  {
      return view('site.auth.confirm_code');
  }


  public function verifyCode(Request $request){

        $data = $request->validate([
            'code' => 'required|numeric',
        ]);

     //dd($request->all(), session()->all());
      if(session()->get('code') == $request->code)
        {
            Session::flash('success','succefully');
            //$user = User::where('mobile', $request->country_code.$request->mobile)->first();
            $user = User::where('mobile', session()->get('mobile'))->first();
            
            if($user)
            {
                Auth::login($user);
                Session::flash('success','Logged in succefully');
                return redirect(route('index'));

            } else {


                return redirect(route('register'));
            }

    } else{
        Session::flash('error','invalid code');
        return redirect()->back();
    }

    }


    public function register()
    {
        return view('site.auth.register');

    }


    public function registerPost(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'image'=>'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->mobile = session()->get('mobile');
        $user->type = 'user';
        $user->wallet_number = mt_rand(10000000000000,99999999999999);

        if ($request->hasFile('image')) {

            $user->image = ImageController::upload_single($request->image,storage_path().'/app/public/user');
        }

        $user->save();
        
        Auth::login($user);
        Session::flash('success','Logged in succefully');
        return redirect(route('index'));

    }





    public function logout(Request $request)
    {
       Auth::logout();
      return Redirect::to('login');
    }
}
