<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Carbon\Carbon;


class ApiController extends Controller{
    
    function __construct(Request $request){
        $this-> Set_Request_Language($request);
    }
    
    public $lang;
    function Set_Request_Language($request)
    {
        if ($request->header('lang')) {
            if ($request->header('lang') == "ar") {
                $this->lang = "ar";
            } else {
                $this->lang = "en";
            }
        } else {
            $this->lang = "ar";
        }
        App::setLocale($this->lang);
        Carbon::setLocale($this->lang);
    }
}