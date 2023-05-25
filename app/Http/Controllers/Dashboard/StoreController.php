<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\StoreType;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\dashboard\StoreRequest;
use App\Http\Controllers\IMAGE_CONTROLLER;
use DataTables;
use Session;

class StoreController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = Store::select('id','name','status')->get();
            return DataTables::of($data)->addIndexColumn()
            ->addColumn('status',function($row){

                $select = '<select class="status" name="{{'.$row->status.'}}" data-status="'.$row->status.'" data-id="'.$row->id.'">';
                $select = $select.'<option value="1"';
                if($row->status == '1'){
                    $select = $select.'selected >مفعل</option>';
                }else{
                    $select = $select.'>مفعل</option>';
                }
                $select = $select.'<option value="0"';
                if($row->status == '0'){
                    $select = $select.'selected>غير مفعل</option>';
                }else{
                    $select = $select.'>غير مفعل</option>';
                }
                $select = $select.'</select>';

                return $select;
            })
                ->addColumn('action', function($row){
                    $btn = '<a href="store/'.$row->id.'/edit" data-id="'.$row->id.'" class="edit btn btn-info btn-sm edit-ad">Edit</a>';
                     $btn = $btn.'<form action="https://tsawqsale.com/admin/store/delete/'.$row->id.'" method="POST">
                    '.csrf_field().'
                    '.method_field("DELETE").'
                    <button type="submit" class="delete btn btn-danger btn-sm"
                        onclick="return confirm(\'Are You Sure Want to Delete?\')"
                        >Delete</button>
                    </form>
                ';
                    return $btn;
                })
                 ->rawColumns(['status','action'])
                ->make(true);
        }

        return view('users');
    }
    
     public function create()
    {
        $storetypes = StoreType::all();
        $users = User::all();
        return view('dashboard.store.create',compact('storetypes','users'));
    }


    public function store(StoreRequest $request)
    {
        $data=$request->all();
        if ($request->hasFile('avatar')) {
            $data['avatar'] = IMAGE_CONTROLLER::upload_single($request->avatar,storage_path().'/app/public/store');
        }
        if ($request->hasFile('cover')) {
            $data['cover'] = IMAGE_CONTROLLER::upload_single($request->cover,storage_path().'/app/public/store');
        }
        $create = Store::create($data);

        Session::flash('success','تمت الاضافة بنجاح');
        return redirect()->back();
    }
    
     public function edit($id)
    {
        $storetypes = StoreType::all();
        $users = User::all();
        $info = Store::find($id);
        return view('dashboard.store.edit',compact('info','storetypes','users'));
    }


    public function update(StoreRequest $request,$id)
    {
        $data=$request->all();
       if ($request->hasFile('avatar')) {
              $sub = Store::select('avatar as img')->where('id',$id)->first();
            $file_path = storage_path().'/app/public/store/'.$sub['img'];
               unlink($file_path); //delete from storage
            $data['avatar'] = IMAGE_CONTROLLER::upload_single($request->avatar,storage_path().'/app/public/store');
        }
        if ($request->hasFile('cover')) {
               $sub = Store::select('cover as img')->where('id',$id)->first();
            $file_path = storage_path().'/app/public/store/'.$sub['img'];
               unlink($file_path); //delete from storage
            $data['cover'] = IMAGE_CONTROLLER::upload_single($request->cover,storage_path().'/app/public/store');
        }
        Store::find($id)->update($data);
        
        Session::flash('success','تم تعديل البيانات بنجاح');
        return redirect()->back();
    }
    
    
    public function destroy($id){
       $sub = Store::select('image as img')->where('id',$id)->first();
        $file_path = storage_path().'/app/public/store/'.$sub['img'];
        unlink($file_path); //delete from storage
          Store::destroy($id);
        Session::flash('success','تم حذف الخدمه بنجاح..');
        return redirect()->back();
    }
    

      public function status(Request $request){
//        dd($request->all());

     $store=Store::find($request->id);
        $store->update(['status'=>$request->status]);
        Session::flash('success','تم  تغيير حاله  الاعلان  بنجاح..'  );

        return redirect()->back();
    }

}
