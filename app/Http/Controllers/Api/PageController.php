<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends ApiController
{
   
 public function page($id){
        $local = app()->getLocale();
              $page =Page::select('name_'.$local.' as page_name','content_'.$local.' as content')->where('id',$id)->first();
              $page['content']=strip_tags(html_entity_decode($page['content']));
            return response()->json([   
            'data' => $page,
            'success' => true,
        ],200);
    }

}
