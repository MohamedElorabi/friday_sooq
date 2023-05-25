<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\dashboard\SubCategoryRequest;
use App\Http\Controllers\IMAGE_CONTROLLER;
use Session;
use Illuminate\Support\Facades\Storage;

class SubCategoryController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = SubCategory::select('id','name_ar')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="subcategory/'.$row->id.'/edit" data-id="'.$row->id.'" class="edit btn btn-info btn-sm edit-ad">Edit</a>';
                     $btn = $btn.'<form action="https://tsawqsale.com/admin/subcategory/delete/'.$row->id.'" method="POST">
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
        $categories = Category::all();
        return view('dashboard.subcategory.create',compact('categories'));
    }


    public function store(SubCategoryRequest $request)
    {

        $data=$request->all();

        if ($request->hasFile('image')) {
            $data['image'] = IMAGE_CONTROLLER::upload_single($request->image,storage_path().'/app/public/subcategory');
        }
        SubCategory::create($data);
        Session::flash('success','تمت الاضافة بنجاح');
        return redirect()->back();
    }



    public function edit($id)
    {
        $categories = Category::all();
        $subcategories = SubCategory::where('parent_id',null)->get();
        $info = SubCategory::find($id);
        return view('dashboard.subcategory.edit',compact('info','categories','subcategories'));
    }


    public function update(SubCategoryRequest $request,$id)
    {
        $data=$request->all();
        

        if ($request->hasFile('image')) {
            
             $sub = SubCategory::select('image as img')->where('id',$id)->first();
            $file_path = storage_path().'/app/public/subcategory/'.$sub['img'];
               unlink($file_path); //delete from storage

            $data['image'] = IMAGE_CONTROLLER::upload_single($request->image,storage_path().'/app/public/subcategory');
        }
        SubCategory::find($id)->update($data);
        Session::flash('success','تم تعديل البيانات بنجاح');
        return redirect()->back();
    }
    public function destroy($id){
       $sub = SubCategory::select('image as img')->where('id',$id)->first();
        $file_path = storage_path().'/app/public/subcategory/'.$sub['img'];
        unlink($file_path); //delete from storage
          SubCategory::destroy($id);
        Session::flash('success','تم حذف الخدمه بنجاح..');
        return redirect()->back();
    }



}
