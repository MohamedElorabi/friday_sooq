<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Town;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\dashboard\TownRequest;
use Session;

class TownController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = Town::select('towns.id','towns.name_ar','cities.name_ar as city')->join('cities','cities.id','=','towns.city_id')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="town/'.$row->id.'/edit" data-id="'.$row->id.'" class="edit btn btn-info btn-sm edit-ad">Edit</a>';
                    $btn = $btn.'<form action="https://tsawqsale.com/admin/town/delete/'.$row->id.'" method="POST">
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
        $cities = City::all();
        return view('dashboard.town.create',compact('cities'));
    }


    public function store(TownRequest $request)
    {
        $data=$request->all();

        $create = Town::create($data);

        Session::flash('success','تمت الاضافة بنجاح');
        return redirect()->back();
    }



    public function edit($id)
    {
        $cities = City::all();
        $info = Town::find($id);
        return view('dashboard.town.edit',compact('info','cities'));
    }


    public function update(TownRequest $request,$id)
    {
        $data=$request->all();

        Town::find($id)->update($data);
        Session::flash('success','تم تعديل البيانات بنجاح');
        return redirect()->back();
    }
     public function destroy($id){
       
          Town::destroy($id);
        Session::flash('success','تم حذف الخدمه بنجاح..');
        return redirect()->back();
    }



}
