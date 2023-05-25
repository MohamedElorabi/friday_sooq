<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\dashboard\CountryRequest;
use App\Http\Controllers\IMAGE_CONTROLLER;
use Session;


class CountryController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = Country::select('id','name_ar')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="country/'.$row->id.'/edit" data-id="'.$row->id.'" class="edit btn btn-info btn-sm edit-ad">Edit</a>';
                     $btn = $btn.'<form action="https://tsawqsale.com/admin/country/delete/'.$row->id.'" method="POST">
                    '.csrf_field().'
                    '.method_field("DELETE").'
                    <button type="submit" class="delete btn btn-danger btn-sm"
                        onclick="return confirm(\'Are You Sure Want to Delete?\')"
                        >Delete</button>
                    </form>
                ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('users');
    }


    public function create()
    {
     return view('dashboard.country.create');
    }

    public function store(CountryRequest $request)
    {
        $data=$request->all();
        if ($request->hasFile('image')) {
            $data['image'] = IMAGE_CONTROLLER::upload_single($request->image,storage_path().'/app/public/country');
        }
        $create = Country::create($data);

        Session::flash('success','تمت الاضافة بنجاح');
        return redirect()->back();
    }

    public function edit($id)
    {
        $info = Country::find($id);
        return view('dashboard.country.edit',compact('info'));
    }


    public function update(CountryRequest $request,$id)
    {
        $data=$request->all();
        if ($request->hasFile('image')) {
            
               $sub = Country::select('image as img')->where('id',$id)->first();
            $file_path = storage_path().'/app/public/country/'.$sub['img'];
               unlink($file_path); //delete from storage
            $data['image'] = IMAGE_CONTROLLER::upload_single($request->image,storage_path().'/app/public/country');
        }
        Country::find($id)->update($data);
        Session::flash('success','تم تعديل البيانات بنجاح');
        return redirect()->back();
    }

    public function getCity($id)
    {
        $cities  = City::where("country_id",$id )->select('name_ar', 'id')->get();
        return $cities;
    }
    
     public function destroy($id){
       $sub = Country::select('image as img')->where('id',$id)->first();
        $file_path = storage_path().'/app/public/country/'.$sub['img'];
        unlink($file_path); //delete from storage
          Country::destroy($id);
        Session::flash('success','تم حذف الخدمه بنجاح..');
        return redirect()->back();
    }


}
