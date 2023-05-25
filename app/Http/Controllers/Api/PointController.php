<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\PointPackage;
use Illuminate\Http\Request;

class PointController extends Controller
{

    public function index()
    {
        $local = app()->getLocale();
        $point_packages = PointPackage::select('point_packages.id','point_packages.name_'.$local.' as name','price','points')->get();
        return response()->json([
            'data' => $point_packages,
            'success' => true,
        ],200);
    }

    public function replace(Request $request)
    {
        $data = $request->validate([
            'points' => 'required',
        ]);
        $user = User::where('id',auth()->user()->id)->first();
        if($user->points >= $data['points']){
            $user->decrement('points', $data['points']);
            $user->increment('balance', $data['points'] / 20);
            return response()->json([
                    'message' => "تم تحويل النقاط",
                    'success' => true,
                ],200);
        }else{
            return response()->json([
                    'message' => "you don't have enough points",
                    'success' => false,
                ],200);
        }
    }

    
    

    public function send(Request $request)
    {
        $data = $request->validate([
            'mobile' => 'required',
            'points' => 'required'
        ]);
        $user = User::where('id',auth()->user()->id)->first();
        $object = User::where('mobile',$data['mobile'])->first();
        if($object){
            if($user->points >= $data['points']){
            $user->decrement('points', $data['points']);
            $object->increment('points', $data['points']);
            return response()->json([
                    'message' => "تم تحويل النقاط",
                    'success' => true,
                ],200);
            }else{
                return response()->json([
                        'message' => "you don't have enough points",
                        'success' => false,
                    ],200);
            }
        }else{
            return response()->json([
                        'message' => "رقم خطأ",
                        'success' => false,
                    ],200);
        }
    }
    
    
    public function buy(Request $request)
    {
        $data = $request->validate([
            'id' => 'required',
            
        ]);

        $user = User::where('id',auth()->user()->id)->first();
        
        $point_packages = PointPackage::where('id', $data['id'])->first();


        $user->increment('points', $point_packages->points);
        
        return response()->json([
            'message' => "تم شراء النقاط",
            'success' => true,
        ],200);
                
    }
    
}
