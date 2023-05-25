<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\StoreFlyer;
use App\Models\StoreFlyerImage;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\File; 

class StoreFlyerController extends Controller
{
    public function offerDestroy($id)
    {
        $offer = StoreFlyer::find($id);
       $images = StoreFlyerImage::where('flyer_id',$id)->select('image as img','id')->get();
      foreach($images as $image){
         if( is_file(storage_path('app/public/storeflyer/'.$image->img))){
           unlink(storage_path('app/public/storeflyer/'.$image->img));  
          }
           $image->destroy($image->id);
       }
        $offer->destroy($id);
        Session::flash('test',['status'=>'failed','message'=>'تم حذف البيانات  بنجاح']);
        return redirect()->back();
     
   }
}