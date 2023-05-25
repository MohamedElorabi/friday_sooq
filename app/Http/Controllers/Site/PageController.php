<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function show($slug){
        $local = App()->getLocale();
        $page = Page::select('pages.id','pages.name_'.$local.' as name','pages.content_'.$local.' as content')->where('slug',$slug)->first();
        return view('site.core.page',compact('page'));
    }
}
