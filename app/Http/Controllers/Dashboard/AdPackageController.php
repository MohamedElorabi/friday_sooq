<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\AdPackage;
use App\Models\Country;
use App\Models\AdPackageItem;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\dashboard\AdPackageRequest;
use App\Http\Controllers\IMAGE_CONTROLLER;
use Session;

class AdPackageController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = AdPackage::select('id','name_ar','price')->get();
            return DataTables::of($data)->addIndexColumn()
                ->make(true);
        }

        return view('users');
    }

    public function create()
    {
        return view('dashboard.adpackage.create');
    }

    public function store(AdPackageRequest $request)
    {
        $data=$request->all();
        $create = AdPackage::create($data);
        
        
            foreach ($request->content_ar as $key => $value) {
            $create1 = AdPackageItem::create([
                'package_id' =>$create->id,
                'content_ar' => $value,
                'content_en' =>$request->content_en[$key],

            ]);
        }


        Session::flash('success','تمت الاضافة بنجاح');
        return redirect()->back();
    }

  
}
