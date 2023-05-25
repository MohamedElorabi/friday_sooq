<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Models\UserPackage;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use DB;
class UserPackageController extends ApiController
{
    public function index(){
        $local = app()->getLocale();
        $adpackages =UserPackage::select('user_packages.id','user_packages.name_'.$local.' as package_name','user_packages.price','user_packages.period')->with(['userPackageItems' => function ($query) use ($local) {
        $query->select('id','package_id', 'content_'.$local.' as title');
    }])->get();
        return response()->json([
            'data' => $adpackages,
            'success' => true,
        ],200);
    }

  

}
