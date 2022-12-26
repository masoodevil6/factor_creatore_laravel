<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Image Driver
    |--------------------------------------------------------------------------
    |
    | Intervention Image supports "GD Library" and "Imagick" to process images
    | internally. You may choose one of them according to your PHP
    | configuration. By default PHP's "GD Library" implementation is used.
    |
    | Supported: "gd", "imagick"
    |
    */

    'driver' => 'gd' ,


    'index-image-sizes' => [
        'large' => [
            "width" => 1500 ,
            "height" => 1200
        ],
        'medium' => [
            "width" => 750 ,
            "height" => 600
        ],
        'small' => [
            "width" => 250 ,
            "height" => 200
        ],
    ],


    'default-current-index-image' => 'medium' ,




    'cache-image-sizes' => [
        'large' => [
            "width" => 1500 ,
            "height" => 1200
        ],
        'medium' => [
            "width" => 750 ,
            "height" => 600
        ],
        'small' => [
            "width" => 250 ,
            "height" => 200
        ],
    ],

    'default-current-cache-image' => 'medium',
    'image-cache-life-time' => 10 ,
    'image-not-found' => '' ,


];
