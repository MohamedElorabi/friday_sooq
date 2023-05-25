<?php

namespace App\Http\Controllers\Api\Store;

use App\Http\Controllers\ApiController;
use App\Models\Store;
use App\Models\StoreStatues;
use App\Models\StoreProduct;
use App\Models\StoreProductImage;
use App\Models\StoreCategory;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Carbon\CarbonPeriod;
use App\Http\Controllers\ImageController;


class StoreAppController extends ApiController
{
    public function storeStatus(Request $request){
        $data = $request->validate([
            'title' =>'required',     
            'status'=> 'required',
            'store_id'=> 'required|exists:stores,id',
            
        ]);
        $store = StoreStatues::create($data);
    
        return response()->json([
                'data' => $store,
                'success' => true,
            ],200);
    }
    public function storeProduct(Request $request){
        $data = $request->validate([
            'name_ar' => 'required|string',
            'desc_ar' => 'required|string',
            'store_category_id' => 'required|exists:store_categories,id',
            'quantity' => 'required|string',
            'price' => 'required|string',
            'sale_price' => 'nullable|string',
            'store_id' => 'required|exists:stores,id',
        ]);
        $data['name_en'] = $data['name_ar'];
        $ad = StoreProduct::create($data);
        if($request->hasFile('image')) {
            foreach ($request->image as  $image) {
                $ad_image['image'] = ImageController::upload_with_water_mark($image,storage_path().'/app/public/storeproduct');
                $ad_image['product_id']=$ad->id;
                StoreProductImage::create($ad_image);
            }
        }
        
        return response()->json([
            'data' => $ad,
            'success' => true,
        ],200);
    }
    public function storeCategory(Request $request){
        $data = $request->validate([
            'name_ar' =>'required',     
            'store_id'=> 'required|exists:stores,id',
        ]);
        $data['name_en'] = $data['name_ar'];
        $data['image'] = ImageController::upload_single($request->image,storage_path().'/app/public/storecategory');
        $store = StoreCategory::create($data);

        return response()->json([
            'data' => $store,
            'success' => true,
        ],200);
    }
}
