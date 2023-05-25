<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Country;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\dashboard\UserRequest;
use Session;
use App\Http\Controllers\IMAGE_CONTROLLER;

class UserController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = User::select('id','name','mobile')->withCount('dailyads')->get();
            return DataTables::of($data)
            ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="user/'.$row->id.'/edit" data-id="'.$row->id.'" class="edit btn btn-info btn-sm edit-ad">Edit</a>';
                    $btn = $btn.'<form action="https://tsawqsale.com/admin/user/delete/'.$row->id.'" method="POST">
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
        return view('dashboard.user.create',compact('countries'));
    }
    
      public function edit($id)
    {
        $countries = Country::all();
        $info = User::find($id);
        return view('dashboard.user.edit',compact('info','countries'));
    }
    
    public function store(UserRequest $request)
    {
        $data=$request->all();
         if ($request->hasFile('image')) {
            $data['image'] = IMAGE_CONTROLLER::upload_single($request->image,storage_path().'/app/public/user');
        }

        User::create($data);
        Session::flash('success','تم تعديل البيانات بنجاح');
        return redirect()->back();
    }

    public function update(UserRequest $request,$id)
    {
        $data=$request->all();
         if ($request->hasFile('image')) {
                $sub = User::select('image as img')->where('id',$id)->first();
            $file_path = storage_path().'/app/public/user/'.$sub['img'];
               unlink($file_path); //delete from storage
            $data['image'] = IMAGE_CONTROLLER::upload_single($request->image,storage_path().'/app/public/user');
        }

        User::find($id)->update($data);
        Session::flash('success','تم تعديل البيانات بنجاح');
        return redirect()->back();
    }
    
     public function destroy($id){
       $sub = User::select('image as img')->where('id',$id)->first();
        $file_path = storage_path().'/app/public/user/'.$sub['img'];
        unlink($file_path); //delete from storage
          User::destroy($id);
        Session::flash('success','تم حذف الخدمه بنجاح..');
        return redirect()->back();
    }

    
}
