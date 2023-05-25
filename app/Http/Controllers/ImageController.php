<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Image;
use File;

class ImageController extends Controller
{
        public static function upload_single($file, $path)
        {
                $name = (time() * rand(1, 99)) . '.' . $file->getClientOriginalExtension();
                Image::make($file)->save($path  . "/" . $name);
                return $name;
        }
        
    public static function upload_with_water_mark($file, $path){
        $name = (time() * rand(1, 99)) . '.' . $file->getClientOriginalExtension();
        $img = Image::make($file)->resize(800, 500);
        $thumb = Image::make($file)->resize(175, 185);
        // $img->insert(\URL::to('/')."/public/wb/imgs/logo.png", 'bottom-right', 10, 10);
        $img->save($path  . "/" . $name);
        $thumb->save($path . '/159x186' . "/" . $name);
        $img->encode($file->getClientOriginalExtension());
        $thumb->encode($file->getClientOriginalExtension());
        return $name;
    }
}
