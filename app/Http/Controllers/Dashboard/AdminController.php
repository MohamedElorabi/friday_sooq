<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Country;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\dashboard\AdminRequest;
use App\Http\Controllers\IMAGE_CONTROLLER;
use Session;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class AdminController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = Admin::select('id','name')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="admin/'.$row->id.'/edit" data-id="'.$row->id.'" class="edit btn btn-info btn-sm edit-ad">Edit</a>';
                     $btn = $btn.'<form action="https://tsawqsale.com/admin/admin/delete/'.$row->id.'" method="POST">
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
        $roles = Role::all();
     return view('dashboard.admin.create',compact('roles'));
    }

    public function store(AdminRequest $request)
    {
        $data=$request->all();
        $data['password']=Hash::make($request->password);

        $create = Admin::create($data);
        $create->assignRole($request->input('roles'));

        Session::flash('success','تمت الاضافة بنجاح');
        return redirect()->back();
    }
//
    public function edit($id)
    {
        $info = Admin::find($id);
        $userRole = $info->roles->pluck('name','name')->all();
        return view('dashboard.admin.edit',compact('info','userRole'));
    }


    public function update(AdminRequest $request,$id)
    {
        $input = $request;
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
            $data=$input->all();
        }else{
            $data =$input->except('password');
        }
//        $data=$request->all();

        Admin::find($id)->update($data);
        Session::flash('success','تم تعديل البيانات بنجاح');
        return redirect()->back();
    }
    
     public function destroy($id){
       
          Admin::destroy($id);
        Session::flash('success','تم حذف الخدمه بنجاح..');
        return redirect()->back();
    }

}
