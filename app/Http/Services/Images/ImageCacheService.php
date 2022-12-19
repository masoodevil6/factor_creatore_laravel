<?php

namespace App\Http\Services\Images;

use function file_exists;
use Illuminate\Support\Facades\Config;
use function imagefill;
use function in_array;
use Intervention\Image\Facades\Image;
use function public_path;

class ImageCacheService{

    public function cache($imagePath , $size = ''){

        // set image size
        $imageSize = Config::get("image.cache-image-sizes");
        $imageCacheLifeTime = Config::get("image.image-cache-life-time");

        if (!isset($imageSize[$size])){
            $size =  Config::get("image.default-current-cache-image");
        }
        $width = $imageSize[$size]["width"];
        $height = $imageSize[$size]["height"];

        //cache image
        if (file_exists($imagePath)){
            $img = Image::cache(function ($image) use($imagePath , $width , $height){
                return $image->make($imagePath)->fit($width , $height);
            } , $imageCacheLifeTime , true);

            return $img->response();
        }
        else{
            $img = Image::canvas($width , $height , '#cdcdcd')
                ->text("image not found --404" , $width/2 , $height/2 , function ($font){
                    $font -> color("#333333");
                    $font -> align("center");
                    $font -> valign("center");
                   // $font -> file(public_path("admin-assets/fonts/IRANSans/IRANSansWeb.woff"));
                    $font -> file(5);
                    $font -> size(24);
                });
            return $img->response();
        }
    }

}