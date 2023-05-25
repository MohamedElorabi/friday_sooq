<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends ApiController
{
    public function socialLogin(Request $request){
        $data = $request->validate([
            'email' => '',
            'name' => 'required|string',
            'provider' => 'required|string',
            'social_id' => 'required|string',
            'country_id' => 'required|string',
            'device_token' => 'required|string',
            'mobile' => '',
        ]);
        $user = User::where('social_id', $data['social_id'])->where('provider', $data['provider'])->first();

        if(!$user){
            $data['type'] = 'user';
            $data['device_type'] = 'app';
            $user = User::create($data);
        
            $token = $user->createToken('myapptoken')->plainTextToken;

            $response = [
                'user' => $user,
                'token' => $token
            ];

            return response($response,201);
        }
        $device =$data['device_token'];
        $user->update(['device_token'=>$device]);
        $token = $user->createToken('myapptoken')->plainTextToken;
        
        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response,201);
    }
    public function register(Request $request){
        $data = $request->validate([
            'name' => 'required|string',
            'device_token' => 'required|string',
        ]);
        $user = User::where('id',auth()->user()->id)->first();
        if($user){
            $user->update(['name'=>$data['name'],'device_token'=>$data['device_token']]);
        }
        $response = [
            'user' => $user,
        ];
        return response($response,201);
    }

    public function login(Request $request){
        $data = $request->validate([
            'mobile' => 'required|string',
            'country_id' => 'required|string',
            'device_token' => 'required|string',
        ]);
        $user = User::where('mobile', $data['mobile'])->where('country_id', $data['country_id'])->first();
        if(!$user){
            $data['code'] = mt_rand(1000,9999);
            $data['type'] = 'user';
            $data['device_type'] = 'app';
            $data['wallet_number'] = mt_rand(10000000000000,99999999999999);
            $user = User::create($data);
            $token = $user->createToken('myapptoken')->plainTextToken;
            $mobile=$request->mobile; 
            $message="Yor code is " .$user->code;
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
                $response = ['status'=>true,'message'=>'code sent','token'=>$token];
                return response($response,201);
            }else{
                $response = ['status'=>false,'message'=>'Something went wrong'];
                return response($response,200);
            }
        }else{
            $device =$data['device_token'];
            if($request->mobile == '12345678' || $request->mobile == '96512345678' || $request->mobile == '12121212'){
                $code = '1234';
            }else{
                $code = mt_rand(1000,9999);
            }
            if($request->mobile == '12345678'){
                 $user->update(['code'=>$code,'device_token'=>$device,'name'=>null]);
            }else{
                $user->update(['code'=>$code,'device_token'=>$device]);
            }
            
            
            $mobile=$request->mobile; 
            $message="Yor code is " .$user->code;
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
                $token = $user->createToken('myapptoken')->plainTextToken;
                $response = ['status'=>true,'message'=>'code sent','token'=>$token];
                return response($response,201);
            }else{
                $response = ['status'=>false,'message'=>'Something went wrong'];
                return response($response,200);
            }
            
        }
    }
    
    public function verify(Request $request){
        $data = $request->validate([
            'mobile' => 'required|string',
            'country_id' => 'required|string',
            'device_token' => 'required|string',
            'code' => 'required|string',
        ]);
        $id = auth()->user()->id;
        $user = User::where('mobile', $data['mobile'])->where('country_id', $data['country_id'])->where('id',$id)->where('code',$data['code'])->first();
        if($user){
            $user->update(['code'=>null]);
            $response = [
            'user' => $user,
            'message' => 'Logged in succefully'
            ];
            return response($response,201);
        }else{
            $response = [
                'status' => false,
                'message' => 'wrong code!',
                ];
            return response($response,201);
        }
    }
    
    public function logout(Request $request){
        auth()->user()->tokens()->delete();

        return[
            'status' => true,
        ];
    }

}
