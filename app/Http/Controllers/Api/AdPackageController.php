<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Models\AdPackage;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use DB;
class AdPackageController extends ApiController
{
    public function index(){
        $local = app()->getLocale();
        $adpackages =AdPackage::select('ad_packages.id','ad_packages.name_'.$local.' as package_name','ad_packages.price','ad_packages.period','ad_packages.image')->with(['adPackageItems' => function ($query) use ($local) {
        $query->select('id','package_id', 'content_'.$local.' as title');
    }])->get();
        return response()->json([
            'data' => $adpackages,
            'success' => true,
        ],200);
    }

  

}
