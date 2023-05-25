<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserRating;
use Illuminate\Http\Request;

class UserRatingController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'rate' => 'required',
            'object_id' => 'required'
        ]);
        $data['user_id'] = auth()->user()->id;
        $rate = UserRating::create($data);
        
        return response()->json([
            'rate' => $rate,
            'success' => true,
        ],200);
    }
    
    public function show($id)
    {
        $rate = UserRating::where('object_id',$id)->get();
        if($rate->count() != 0){
        return response()->json([
            'total' => $rate->count(),
            'rate' => $rate->sum('rate')/$rate->count(),
            '5-stars' => $rate->where('rate',5)->count() / $rate->count() * 100,
            '4-stars' => $rate->where('rate',4)->count()/ $rate->count() * 100,
            '3-stars' => $rate->where('rate',3)->count()/ $rate->count() * 100,
            '2-stars' => $rate->where('rate',2)->count()/ $rate->count() * 100,
            '1-stars' => $rate->where('rate',1)->count()/ $rate->count() * 100,
            'success' => true,
        ],200);
        }else{
           return response()->json([
            'total' => 0,
            'rate' => 0,
            '5-stars' => 0,
            '4-stars' => 0,
            '3-stars' => 0,
            '2-stars' => 0,
            '1-stars' => 0,
            'success' => true,
        ],200); 
        }
    }
}
