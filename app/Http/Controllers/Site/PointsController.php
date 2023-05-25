<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\PointPackage;
use App\Models\Question;
use Illuminate\Http\Request;
use Session;

class PointsController extends Controller
{

    public function index()
    {
        
        return view('site.loyalty_program.index');
    }


    public function buy_points()
    {
        $local = app()->getLocale();
        $user = User::where('id',auth()->user()->id)->first();
        $point_packages = PointPackage::select('point_packages.id','point_packages.name_'.$local.' as name','price','points')->get();
        return view('site.loyalty_program.buy_points', compact('point_packages', 'user'));
    }


    public function replace_points()
    {
        return view('site.loyalty_program.replace_points');
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

            Session::flash('success','تم استبدال النقاط');
            return redirect()->back();
        
        }else{
            Session::flash('success','لا يوجد لديك نقاط كافية');
            return redirect()->back();
        }
    }
    

    public function send_points()
    {
        return view('site.loyalty_program.send_points');
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
                Session::flash('success','تم تحويل النقاط');
                return redirect()->back();
            }else{
                Session::flash('success','لا يوجد لديك نقاط كافية');
                return redirect()->back();
            }
        }else{

            Session::flash('success','خطأ');
            return redirect()->back();
        }
    }
    
    
    public function buy(Request $request)
    {
        $data = $request->validate([
            'id' => 'required',
            
        ]);

        $user = User::where('id',auth()->user()->id)->first();
        
        $point_packages = PointPackage::select('point')->where('id', $data['id']);


        $user->increment($point_packages->point, $user->points);
        
        return response()->json([
            'message' => "تم شراء النقاط",
            'success' => true,
        ],200);
                
        
    }

    public function earn_points()
    {
        $questions = Question::all();
        return view('site.loyalty_program.earn_points', compact('questions'));

    }
    
    
}
