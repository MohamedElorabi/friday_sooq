<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\dashboard\BannerRequest;
use Session;
use App\Http\Controllers\IMAGE_CONTROLLER;

class BannerController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = Banner::select('id','title','link')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="banner/'.$row->id.'/edit" data-id="'.$row->id.'" class="edit btn btn-info btn-sm edit-ad">Edit</a>';
                     $btn = $btn.'<form action="https://tsawqsale.com/admin/banner/delete/'.$row->id.'" method="POST">
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
      
        return view('dashboard.banner.create');
    }


    public function store(BannerRequest $request)
    {
        $data=$request->all();
        if ($request->hasFile('image')) {
            $data['image'] = IMAGE_CONTROLLER::upload_single($request->image,storage_path().'/app/public/banner');
        }

        $create = Banner::create($data);

        Session::flash('success','تمت الاضافة بنجاح');
        return redirect()->back();
    }



    public function edit($id)
    {
        $info = Banner::find($id);
        return view('dashboard.banner.edit',compact('info'));
    }


    public function update(BannerRequest $request,$id)
    {
        $data=$request->all();
         if ($request->hasFile('image')) {
                $sub = Banner::select('image as img')->where('id',$id)->first();
            $file_path = storage_path().'/app/public/banner/'.$sub['img'];
               unlink($file_path); //delete from storage

            $data['image'] = IMAGE_CONTROLLER::upload_single($request->image,storage_path().'/app/public/banner');
        }

        Banner::find($id)->update($data);
        Session::flash('success','تم تعديل البيانات بنجاح');
        return redirect()->back();
    }
    
     public function destroy($id){
        $sub = Banner::select('image as img')->where('id',$id)->first();
        $file_path = storage_path().'/app/public/banner/'.$sub['img'];
        unlink($file_path); //delete from storage
          Banner::destroy($id);

        Session::flash('success','تم حذف الخدمه بنجاح..');
        return redirect()->back();
    }


  


}
