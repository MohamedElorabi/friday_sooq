<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends ApiController
{
    public function index(){
        $banners = Banner::select('id','link','image','position')->where('position','top-app')->get();
        return response()->json([
            'data' => $banners,
            'success' => true,
        ],200);
    }

    public function show($type){
        if($type == 'home'){
            $banner1 = Banner::select('id','link','image','position')->where('position','1')->first();
            $banner2 = Banner::select('id','link','image','position')->where('position','3')->first();
            $banner3 = Banner::select('id','link','image','position')->where('position','5')->first();
            $banner4 = Banner::select('id','link','image','position')->where('position','7')->first();
            $data = [$banner1,$banner2,$banner3,$banner4];
        }else{
             $data = Banner::select('id','link','image','position')->where('position','category')->get();
        }
        return response()->json(['data' => $data,'success' => true,],200);
    }
  



}
