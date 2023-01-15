<?php

$A4_Size = "A4";
$A5_Size = "A5";
$A6_Size = "A6";


$sizes = [
    [
        "name" => "size-A4" ,
        "value" => $A4_Size
    ],
    [
        "name" => "size-A5" ,
        "value" => $A5_Size
    ],
    [
        "name" => "size-A6" ,
        "value" => $A6_Size
    ]
];



return [

    "form_class"=> [
        [
            "name" => "Normal",
            "name_fa" => "نرمال",
            "namespace" => \App\Http\Services\Forms\Forms\NormalForm::class ,
        ]
    ],



    "size_A4"=> $A4_Size,
    "size_A5"=> $A5_Size,
    "size_A6"=> $A6_Size,

    "sizes" => $sizes,


    "vertical" => "p"  , /// amodi
    "Landscape" => "L" , /// ofogi
];