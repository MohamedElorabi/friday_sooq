<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\Category;
use App\Http\Controllers\ImageController;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Requests\site\CategoryRequest;
use Illuminate\Support\Facades\Session;


class CategoryController extends Controller
{
    public function index()
    {
        $local = App()->getLocale();
        $categories = Category::select('categories.id','categories.name_'.$local.' as title', 'categories.image', 'categories.slug')->get();
        return view('site.category.index', compact('categories'));
    }


    public function create()
    {
        return view('site.category.create');
    }


    public function store(CategoryRequest $request)
    {
        $data=$request->all();
        if ($request->hasFile('image')) {
            $data['image'] = ImageController::upload_single($request->image,storage_path().'/app/public/category');
        }
        $create = Category::create($data);

        Session::flash('success','تمت الاضافة بنجاح');
        return redirect()->back();
    }



    public function show($slug){
        $local = App()->getLocale();
        $category = Category::select('categories.id','categories.name_'.$local.' as title')
        ->where('slug',$slug)->first();
        $subcategories = SubCategory::select('id','name_'.$local.' as title','slug')->where('category_id',$category->id)->where('parent_id',null)->get();
        $ads = Ad::select('ads.id','ads.name','ads.price','ads.type', 'ads.views','ads.active_at','ads.special','ads.user_id','ads.slug','users.image as user_image','categories.name_'.$local.' as category_name','countries.currency as country_currency','countries.name_'.$local.' as country_name')
        ->where('active','actived')
        ->join('users','users.id','=','ads.user_id')
        ->join('countries','countries.id','=','ads.country_id')
        ->join('categories','categories.id','=','ads.category_id')
        ->where('category_id',$category->id)
        ->orderBy('active_at','DESC')->paginate(12);
        return view('site.category.show',compact('category','ads','subcategories'));
    }

 public function sub($id){
        $local = App()->getLocale();
        $category = SubCategory::select('sub_categories.id','sub_categories.name_'.$local.' as title')->where('id',$id)->first();
        $subcategories = SubCategory::select('id','name_'.$local.' as title','slug')->where('parent_id',$category->id)->get();
        $dim_ads = Ad::select('ads.id','ads.name','ads.price','ads.type','ads.user_id','ads.slug','users.image as user_image','categories.name_'.$local.' as category_name','countries.currency as country_currency','countries.name_'.$local.' as country_name','ads.active_at','ads.special')->where('active','actived')->join('users','users.id','=','ads.user_id')->join('countries','countries.id','=','ads.country_id')->join('categories','categories.id','=','ads.category_id')->where('category_id',$category->id)->orderBy('active_at','DESC')->paginate(10);

        if(!$subcategories->isEmpty()){
            $sub = SubCategory::where('parent_id',$category->id)->pluck('id');
            $subLimtCategory = SubCategory::whereIn('parent_id',$sub->all())->pluck('id');
            if(!$subLimtCategory->isEmpty()){
                $sub = SubCategory::whereIn('parent_id',$subLimtCategory->all())->pluck('id');
                $all = array_merge($subLimtCategory->all(),$sub->all(),$subcategories->pluck("id")->all());
                $ads_count = Ad::where('active','actived')->whereIn('sub_category_id',$all)->orderBy('active_at','DESC')->count();
                $ads = Ad::select('ads.id','ads.name','ads.price','ads.type','ads.user_id','ads.slug','users.image as user_image','categories.name_'.$local.' as category_name','countries.currency as country_currency','countries.name_'.$local.' as country_name','ads.active_at','ads.special')->where('active','actived')->join('users','users.id','=','ads.user_id')->join('countries','countries.id','=','ads.country_id')->join('categories','categories.id','=','ads.category_id')->whereIn('sub_category_id',$all)->orderBy('active_at','DESC')->paginate(12);
            }else{
                $ads_count = Ad::where('active','actived')->whereIn('sub_category_id',$sub->all())->count();
                $ads = Ad::select('ads.id','ads.name','ads.price','ads.type','ads.user_id','ads.slug','users.image as user_image','categories.name_'.$local.' as category_name','countries.currency as country_currency','countries.name_'.$local.' as country_name','ads.active_at','ads.special')->where('active','actived')->join('users','users.id','=','ads.user_id')->join('countries','countries.id','=','ads.country_id')->join('categories','categories.id','=','ads.category_id')->whereIn('sub_category_id',$sub->all())->orderBy('active_at','DESC')->paginate(12);
            }
        }else{
            $ads_count = Ad::where('active','actived')->where('sub_category_id',$category->id)->count();
            $ads = Ad::select('ads.id','ads.name','ads.price','ads.type','ads.user_id','ads.slug','users.image as user_image','categories.name_'.$local.' as category_name','countries.currency as country_currency','countries.name_'.$local.' as country_name','ads.active_at','ads.special')->where('active','actived')->join('users','users.id','=','ads.user_id')->join('countries','countries.id','=','ads.country_id')->join('categories','categories.id','=','ads.category_id')->where('sub_category_id',$category->id)->orderBy('active_at','DESC')->paginate(12);
        }
        return view('site.category.subcategory',compact('category','ads','dim_ads','subcategories','ads_count'));
    }
}
