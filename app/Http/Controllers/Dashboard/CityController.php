<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Town;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\dashboard\CityRequest;
use Session;

class CityController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = City::select('cities.id','cities.name_ar','countries.name_ar as country')->join('countries','countries.id','=','cities.country_id')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="city/'.$row->id.'/edit" data-id="'.$row->id.'" class="edit btn btn-info btn-sm edit-ad">Edit</a>';
                     $btn = $btn.'<form action="https://tsawqsale.com/admin/city/delete/'.$row->id.'" method="POST">
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
        $countries = Country::all();
        return view('dashboard.city.create',compact('countries'));
    }


    public function store(CityRequest $request)
    {
        $data=$request->all();

        $create = City::create($data);

        Session::flash('success','تمت الاضافة بنجاح');
        return redirect()->back();
    }



    public function edit($id)
    {
        $countries = Country::all();
        $info = City::find($id);
        return view('dashboard.city.edit',compact('info','countries'));
    }


    public function update(CityRequest $request,$id)
    {
        $data=$request->all();

        City::find($id)->update($data);
        Session::flash('success','تم تعديل البيانات بنجاح');
        return redirect()->back();
    }

    public function getTown($id)
    {
        $towns  = Town::where("city_id",$id )->select('name_ar', 'id')->get();
        return $towns;
    }
    
    public function destroy($id){
       
          City::destroy($id);
        Session::flash('success','تم حذف الخدمه بنجاح..');
        return redirect()->back();
    }


}
