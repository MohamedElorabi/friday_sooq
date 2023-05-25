<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;


use App\Models\StoreType;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\dashboard\StoreTypeRequest;
use App\Http\Controllers\IMAGE_CONTROLLER;
use Session;

class StoreTypeController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = StoreType::select('id','.name_ar')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="storetype/'.$row->id.'/edit" data-id="'.$row->id.'" class="edit btn btn-info btn-sm edit-ad">Edit</a>';
                     $btn = $btn.'<form action="https://tsawqsale.com/admin/storetype/delete/'.$row->id.'" method="POST">
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
        return view('dashboard.storetype.create');
    }


    public function store(StoreTypeRequest $request)
    {
        $data=$request->all();
         if ($request->hasFile('image')) {
            $data['image'] = IMAGE_CONTROLLER::upload_single($request->image,storage_path().'/app/public/storetype');
        }

        $create = StoreType::create($data);

        Session::flash('success','تمت الاضافة بنجاح');
        return redirect()->back();
    }



    public function edit($id)
    {
        $info = StoreType::find($id);
        return view('dashboard.storetype.edit',compact('info'));
    }


    public function update(StoreTypeRequest $request,$id)
    {
        $data=$request->all();
         if ($request->hasFile('image')) {
                $sub = StoreType::select('image as img')->where('id',$id)->first();
            $file_path = storage_path().'/app/public/storetype/'.$sub['img'];
               unlink($file_path); //delete from storage
            $data['image'] = IMAGE_CONTROLLER::upload_single($request->image,storage_path().'/app/public/storetype');
        }
        StoreType::find($id)->update($data);
        Session::flash('success','تم تعديل البيانات بنجاح');
        return redirect()->back();
    }
     public function destroy($id){
       $sub = StoreType::select('image as img')->where('id',$id)->first();
        $file_path = storage_path().'/app/public/storetype/'.$sub['img'];
        unlink($file_path); //delete from storage
          StoreType::destroy($id);
        Session::flash('success','تم حذف الخدمه بنجاح..');
        return redirect()->back();
    }

}
