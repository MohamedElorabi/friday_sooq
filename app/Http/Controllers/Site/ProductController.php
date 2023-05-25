<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StoreProduct;
use App\Models\Category;
use App\Models\StoreCategory;
use App\Models\OrderProduct;
use App\Models\StoreType;
use App\Models\OrderProductImage;
use DB;
use Session;

class ProductController extends Controller
{
    public function index()
    {
        $local = app()->getLocale();
        $products = StoreProduct::select('id','name_'.$local.' as name', 'price')->get();
        $types = StoreType::select('id','name_'.$local.' as name')->get();
        return view('site.stores.products.index', compact('products', 'types'));
    }
    
    public function show($id){
        $local = App()->getLocale();
        $product = StoreProduct::where('store_products.id',$id)->with(['images'])
        ->select('store_products.id','store_products.name_'.$local.' as name', 'store_products.desc_'.$local.' as desc', 'store_products.price','store_products.quantity','store_products.shipping_cost','store_products.sale_price')->first();
        
        return view('site.stores.products.show',compact('product'));
    }

    public function create()
    {
        $local = App()->getLocale();
        $store_categories = StoreCategory::select('store_categories.id','store_categories.name_'.$local.' as title', 'store_categories.image', 'store_categories.store_id')->get();
        return view('site.stores.products.create', compact('store_categories'));
    }



    
    public function addToCart($id)
    {
        $local = App()->getLocale();

        $product = StoreProduct::findOrFail($id);

          
        $cart = session()->get('cart', []);
        dd($cart);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name_ar" => $product->name_ar,
                "quantity" => $product->quantity,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
          
        
        session()->put('cart', $cart);
        
        return redirect()->route('cart')->with('success', 'Product added to cart successfully!');
    }


    public function cart()
    {
        
        $cart = session()->get('cart', []);
        return view('site.stores.products.cart.index');
    }





    public function product_order()
    {
     return view('site.stores.products.product_order');
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
        
        
        Session::flash('success','تمت الاضافة بنجاح');

        return redirect()->route('site.stores');
    }
    

}

