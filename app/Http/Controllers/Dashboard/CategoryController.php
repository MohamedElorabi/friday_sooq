<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\dashboard\CategoryRequest;
use App\Http\Controllers\IMAGE_CONTROLLER;
use Session;

class CategoryController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = Category::select('id','name_ar')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn ='<a href="category/'.$row->id.'/edit" data-id="'.$row->id.'" class="edit btn btn-info btn-sm edit-ad">Edit</a>';
                  $btn = $btn.'<form action="category/delete/'.$row->id.'" method="POST">
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
        return view('dashboard.category.create');
    }

    public function store(CategoryRequest $request)
    {
        $data=$request->all();
        if ($request->hasFile('image')) {
            $data['image'] = IMAGE_CONTROLLER::upload_single($request->image,storage_path().'/app/public/category');
        }
        $create = Category::create($data);

        Session::flash('success','تمت الاضافة بنجاح');
        return redirect()->back();
    }

    public function edit($id)
    {
        $info = Category::find($id);
        return view('dashboard.category.edit',compact('info'));
    }


    public function update(CategoryRequest $request,$id)
    {
        $data=$request->all();
        if ($request->hasFile('image')) {
            
            
               $sub = Category::select('image as img')->where('id',$id)->first();
            $file_path = storage_path().'/app/public/category/'.$sub['img'];
               unlink($file_path); //delete from storage
            $data['image'] = IMAGE_CONTROLLER::upload_single($request->image,storage_path().'/app/public/category');
        }
        Category::find($id)->update($data);
        Session::flash('success','تم تعديل البيانات بنجاح');
        return redirect()->back();
    }

    public function getSub($id)
    {
        $subcategories  = SubCategory::where("category_id",$id )->select('name_ar', 'id')->get();

        return $subcategories;
    }

    public function getMainSub($id)
    {
        $subcategories  = SubCategory::where("category_id",$id )->where('parent_id',null)->select('name_ar', 'id')->get();

        return $subcategories;
    }
    
     public function destroy($id){
         $sub = Category::select('image as img')->where('id',$id)->first();
        $file_path = storage_path().'/app/public/category/'.$sub['img'];
        unlink($file_path); //delete from storage
          Category::destroy($id);
        Session::flash('success','تم حذف الخدمه بنجاح..');
        return redirect()->back();
    }
}
