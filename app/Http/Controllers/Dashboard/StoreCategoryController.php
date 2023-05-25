<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\Store;
use App\Models\StoreCategory;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\dashboard\StoreCategoryRequest;
use App\Http\Controllers\IMAGE_CONTROLLER;
use Session;


class StoreCategoryController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = StoreCategory::select('store_categories.id','store_categories.name_ar','stores.name as store')->join('stores','stores.id','=','store_categories.store_id')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="storecategory/'.$row->id.'/edit" data-id="'.$row->id.'" class="edit btn btn-info btn-sm edit-ad">Edit</a>';
                     $btn = $btn.'<form action="https://tsawqsale.com/admin/storecategory/delete/'.$row->id.'" method="POST">
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
        $stores = Store::all();
        return view('dashboard.storecategory.create',compact('stores'));
    }


    public function store(StoreCategoryRequest $request)
    {
        $data=$request->all();
        if ($request->hasFile('image')) {
            $data['image'] = IMAGE_CONTROLLER::upload_single($request->image,storage_path().'/app/public/storecategory');
        }
        $create = StoreCategory::create($data);

        Session::flash('success','تمت الاضافة بنجاح');
        return redirect()->back();
    }



    public function edit($id)
    {
        $stores = Store::all();
        $info = StoreCategory::find($id);
        return view('dashboard.storecategory.edit',compact('info','stores'));
    }


    public function update(StoreCategoryRequest $request,$id)
    {
        $data=$request->all();
        if ($request->hasFile('image')) {
            
               $sub = StoreCategory::select('image as img')->where('id',$id)->first();
              $file_path = storage_path().'/app/public/storecategory/'.$sub['img'];
               unlink($file_path); //delete from storage
            $data['image'] = IMAGE_CONTROLLER::upload_single($request->image,storage_path().'/app/public/storecategory');
        }
        StoreCategory::find($id)->update($data);
        Session::flash('success','تم تعديل البيانات بنجاح');
        return redirect()->back();
    }
    public function destroy($id){
       $sub = StoreCategory::select('image as img')->where('id',$id)->first();
        $file_path = storage_path().'/app/public/storecategory/'.$sub['img'];
        unlink($file_path); //delete from storage
          StoreCategory::destroy($id);
        Session::flash('success','تم حذف الخدمه بنجاح..');
        return redirect()->back();
    }

}
