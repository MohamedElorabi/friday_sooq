<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\StoreFlyer;
use App\Models\Store;
use App\Models\StoreFlyerImage;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\dashboard\StoreFlyerRequest;
use App\Http\Controllers\IMAGE_CONTROLLER;
use Session;
use App\Http\Controllers\ImageController;

class StoreFlyerController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {

            $data = StoreFlyer::select('store_flyers.id','store_flyers.name_ar','stores.name as store')->join('stores','stores.id','=','store_flyers.store_id')->get();

            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="storeflyer/'.$row->id.'/edit" data-id="'.$row->id.'" class="edit btn btn-info btn-sm edit-ad">Edit</a>';
                     $btn = $btn.'<form action="https://tsawqsale.com/admin/storeflyer/delete/'.$row->id.'" method="POST">
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
        return view('dashboard.storeflyer.create',compact('stores'));
    }


    public function store(StoreFlyerRequest $request)
    {
        
        $data=$request->all();
        
    
        if ( $request->hasFile('file')  ) {
            $image = $request->file;
//            dd($image);
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move(storage_path().'/app/public/storeflyer', $image_new_name);
            $data['file'] = $image_new_name;

        }
        
        
        
        $create = StoreFlyer::create($data);
        if ($request->hasFile('image')) {
            foreach ($request->image as  $image) {
                $ad_image['image'] = ImageController::upload_with_water_mark($image,storage_path().'/app/public/storeflyer');
                $ad_image['flyer_id']=$create->id;
                StoreFlyerImage::create($ad_image);
            }
        }

        Session::flash('success','تمت الاضافة بنجاح');
        return redirect()->back();
    }



    public function edit($id)
    {
        $stores = Store::all();
        $info = StoreFlyer::find($id);
        return view('dashboard.storeflyer.edit',compact('info','stores'));
    }


    public function update(StoreFlyerRequest $request,$id)
    {
        $data=$request->all();
        if ($request->hasFile('file')) {
              $sub = StoreFlyer::select('file as img')->where('id',$id)->first();
            $file_path = storage_path().'/app/public/storeflyer/'.$sub['img'];
               unlink($file_path); //delete from storage
            $data['file'] = IMAGE_CONTROLLER::upload_single($request->file,storage_path().'/app/public/storeflyer');
        }
        StoreFlyer::find($id)->update($data);
        
         foreach($request->image as $file)
        {
//            dd($image);
            $image_new_name = time() . $file->getClientOriginalName();
            $file->move(storage_path().'/app/public/storeflyer', $image_new_name);
            $productimages = new StoreFlyerImage();
            $productimages->flyer_id = $id ;
            $productimages->image = $image_new_name;
            $productimages->save();
        }
        Session::flash('success','تم تعديل البيانات بنجاح');
        return redirect()->back();
    }
    
    public function destroy($id){
       
          StoreFlyer::destroy($id);
        Session::flash('success','تم حذف الخدمه بنجاح..');
        return redirect()->back();
    }


}
