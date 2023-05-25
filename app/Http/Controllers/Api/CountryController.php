<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends ApiController
{
    public function index(){
        $local = app()->getLocale();
        $countries = Country::select('id','name_'.$local.' as title','code')->get();
        return response()->json([
            'data' => $countries,
            'success' => true,
        ],200);
    }

    public function show($id){
        $local = app()->getLocale();
        $cities = City::where('country_id',$id)->select('id','name_'.$local.' as title')->with('towns',function ($query) use($local){
            $query->select('id','name_'.$local.' as title','city_id');
        })->get();
        return response()->json([
            'data' => $cities,
            'success' => true,
        ],200);
    }

    public function countryWithCity(){
        $local = app()->getLocale();
        $countries = Country::select('id','name_'.$local.' as title','code')->with('cities',function ($query) use($local){
            $query->select('id','name_'.$local.' as title','country_id');
        })->get();
        return response()->json([
            'data' => $countries,
            'success' => true,
        ],200);
    }



}
