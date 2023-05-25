<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Models\Category;
use App\Models\SubCategoryOption;
use App\Models\SubCategory;
use App\Models\OptionDetails;
use Illuminate\Http\Request;

class CategoryController extends ApiController
{

    public function index(){
        $local = app()->getLocale();
        $categories = Category::select('id','name_'.$local.' as title','image')->get();
        return response()->json([
            'data' => $categories,
            'success' => true,
        ],200);
    }
    
    public function search(Request $request){
        $local = app()->getLocale();
        $name = $request->name;
        $categories = Category::select('id','name_'.$local.' as title','image')->where('name_ar','LIKE',"%{$name}%")->get();
        return response()->json([
            'data' => $categories,
            'success' => true,
        ],200);
    }

    public function show($id){
        $local = app()->getLocale();
        $categories = SubCategory::where('id',$id)->select('id','name_'.$local.' as title','image')->get();
        return response()->json([
            'data' => $categories,
            'success' => true,
        ],200);
    }

    public function catsWithSub(){
        $local = app()->getLocale();
        $categories = Category::select('id','name_'.$local.' as title','image')->with('subCategories',function ($query) use($local){
            $query->select('id','name_'.$local.' as title','category_id');
        })->get();
        return response()->json(['data' => $categories,'success' => true,],200);
    }

    public function catsWithMulti(){
        $local = app()->getLocale();
        $categories = Category::select('id','name_'.$local.' as title','image')->with('subCategories',function ($query) use($local){
            $query->select('id','name_'.$local.' as title','category_id','image','parent_id')->where('parent_id',null)->with('parents',function ($q) use($local){
                $q->select('id','name_'.$local.' as title','category_id','image','parent_id')->with('parents',function ($n) use($local){
                    $n->select('id','name_'.$local.' as title','category_id','image','parent_id')->with('parents',function ($d) use($local){
                        $d->select('id','name_'.$local.' as title','category_id','image','parent_id');
                    });
                });
            });
        })->get();
        return response()->json([
            'data' => $categories,
            'success' => true,
        ],200);
    }
    
    
     public function subOptions($id){
         $local = app()->getLocale();
        $SubCategoryOption=SubCategoryOption::select('sub_category_options.id','sub_category_options.option_id','options.name_'.$local.' as name','options.type')->join('options','options.id','=','sub_category_options.option_id')->where('sub_category_id',$id)->with('option_details', function($q) use($local){
             $q->select('name_'.$local.' as name','id','sub_category_option_id');
        })->get();

        return response()->json([
            'data' => $SubCategoryOption,
            'success' => true,
        ],200);
        
    }

}
