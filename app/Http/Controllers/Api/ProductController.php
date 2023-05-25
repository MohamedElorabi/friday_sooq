<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OrderProduct;
use App\Models\OrderProductImage;
use App\Models\StoreCoupon;
use App\Models\StoreOrder;
use App\Models\StoreProduct;
use App\Models\StoreOrderItem;
use App\Http\Controllers\ImageController;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function search(request $request){
        $local = app()->getLocale();
        $name = $request->name;
        $products =StoreProduct::select('store_products.id','store_products.name_'.$local.' as name','store_products.quantity','store_products.store_id','store_products.price','store_products.sale_price','store_products.shipping_cost')->where('store_products.name_'.$local,'LIKE',"%{$name}%")->paginate(10);
        return response()->json([
            'data' => $products,
            'success' => true,
        ],200);
    }
    
    // Make Order
    public function order(Request $request){
        $data = $request->validate([
            'store_id' => 'required|exists:stores,id',
            'address_id' => 'required|string',
            'coupon_id' => 'nullable',
            'sub_total' => 'required|string',
            'total' => 'required|string',
            'shipping_cost' => 'required|string',
            'payment_method' => 'required|string'
        ]);
        
        $data['user_id'] = auth()->user()->id;
        $order = StoreOrder::create($data);
        
        $products =json_decode($request->product_ids);
        $quantitys=json_decode($request->quantitys);
        $prices   =json_decode($request->prices);
        
        foreach ($products as $key=>$value)
        {

            $product = StoreProduct::where('id',$value)->first();
            if(!$product){
                throw new Exception('No Products found with that id '.$value);
            }
            if($product->quantity==0){
                throw new Exception('this product quantity is zero ');
            }

            if($product->quantity<$quantitys[$key]){

                throw new Exception('this product quantity is less than order quantity ');
            }
             StoreOrderItem::create([
                 'order_id' => $order->id,
                'product_id'    =>  $product->id,
                'quantity'      => $quantitys[$key],
                'price'         => $prices[$key],
            ]);
            $product->decrement('quantity', $quantitys[$key]);
           
        }
        
        return response()->json([
            'data' => $order,
            'success' => true,
        ],200);
    }
    
    // Make Product Order
    public function orderProduct(Request $request){
        $data = $request->validate([
            'fullname' => 'required|string',
            'email' => 'nullable|string',
            'phone' => 'required|string',
            'name' => 'required|string',
            'description' => 'required|string',
        ]);
        
        $data['user_id'] = auth()->user()->id;
        $ad = OrderProduct::create($data);
        
        if($request->hasFile('image')) {
            foreach ($request->image as  $image) {
                $ad_image['image'] = ImageController::upload_with_water_mark($image,storage_path().'/app/public/ad');
                $ad_image['order_product_id']=$ad->id;
                OrderProductImage::create($ad_image);
            }
        }
        
        return response()->json([
            'data' => $ad,
            'success' => true,
        ],200);
    }
    
    // Check Coupon
    public function checkCoupon(Request $request){
        $data = $request->validate([
            'store_id' => 'required|exists:stores,id',
            'coupon' => 'required|string',
        ]);
        
        $coupon = StoreCoupon::where('store_id',$data['store_id'])->where('code',$data['coupon'])->first();
        
        if($coupon){
            return response()->json([
                'data' =>$coupon,
                'success' => true,
            ],200);
        }else{
            return response()->json([
                'success' => false,
            ],200);
        }
    }
    
    
}
