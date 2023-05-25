<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\StoreCategory;
use App\Models\Store;
use App\Models\StoreProduct;
use App\Models\StoreProductImage;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\dashboard\StoreProductRequest;
use Session;


class StoreProductController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = StoreProduct::select('store_products.id','store_products.name_ar','stores.name as store')->join('stores','stores.id','=','store_products.store_id')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="storeproduct/'.$row->id.'/edit" data-id="'.$row->id.'" class="edit btn btn-info btn-sm edit-ad">Edit</a>';
                     $btn = $btn.'<form action="https://tsawqsale.com/admin/storeproduct/delete/'.$row->id.'" method="POST">
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
        $storecategories = StoreCategory::all();
        return view('dashboard.storeproduct.create',compact('stores','storecategories'));
    }


    public function store(StoreProductRequest $request)
    {
        $data=$request->all();

        $create = StoreProduct::create($data);
        
        foreach($request->image as $file)
        {
//            dd($image);
            $image_new_name = time() . $file->getClientOriginalName();
            $file->move(storage_path().'/app/public/storeproduct', $image_new_name);
            $productimages = new StoreProductImage();
            $productimages->product_id = $create->id ;
            $productimages->image = $image_new_name;
            $productimages->save();
        }

        Session::flash('success','تمت الاضافة بنجاح');
        return redirect()->back();
    }



    public function edit($id)
    {
        $stores = Store::all();
        $storecategories = StoreCategory::all();
        $info = StoreProduct::find($id);
        return view('dashboard.storeproduct.edit',compact('info','stores','storecategories'));
    }


    public function update(StoreProductRequest $request,$id)
    {
        $data=$request->all();

        StoreProduct::find($id)->update($data);
         foreach($request->image as $file)
        {
//            dd($image);
            $image_new_name = time() . $file->getClientOriginalName();
            $file->move(storage_path().'/app/public/storeproduct', $image_new_name);
            $productimages = new StoreProductImage();
            $productimages->product_id = $id ;
            $productimages->image = $image_new_name;
            $productimages->save();
        }
        
        Session::flash('success','تم تعديل البيانات بنجاح');
        return redirect()->back();
    }
    
     public function destroy($id){
       
          StoreProduct::destroy($id);
        Session::flash('success','تم حذف الخدمه بنجاح..');
        return redirect()->back();
    }

}
