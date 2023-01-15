<?php
$metric="mm";
function convertMmToPxForCenter($mm){
    return (($mm * 3.779528) - 100)."px" ;
}


///// =============================================
/// paper A4
/// ===============================================
$info_A4=[
    "width" => 210 ,
    "height" => 297
];
$A4_Size = [
    "name" => "A4" ,
    "width" => $info_A4["width"].$metric ,
    "height" => $info_A4["height"].$metric ,
];
$center_A4_width =convertMmToPxForCenter($info_A4["width"]);
$center_A4_height =convertMmToPxForCenter($info_A4["height"]);

///// =============================================
/// paper A5
/// ===============================================
$info_A5=[
    "width" => 148 ,
    "height" => 210
];
$A5_Size = [
    "name" => "A5",
    "width" => $info_A5["width"].$metric ,
    "height" => $info_A5["height"].$metric ,
];
$center_A5_width =convertMmToPxForCenter($info_A5["width"]);
$center_A5_height =convertMmToPxForCenter($info_A5["height"]);


///// =============================================
/// paper A6
/// ===============================================
$info_A6=[
    "width" => 105 ,
    "height" => 148
];
$A6_Size = [
    "name" => "A6",
    "width" => $info_A6["width"].$metric ,
    "height" => $info_A6["height"].$metric ,
];
$center_A6_width =convertMmToPxForCenter($info_A6["width"]);
$center_A6_height =convertMmToPxForCenter($info_A6["height"]);


///// =============================================
/// papers
/// ===============================================
$sizes = [
    [
        "name" => "size-A4" ,
        "value" => $A4_Size["name"] ,
        "width" => $A4_Size["width"] ,
        "height" => $A4_Size["height"] ,
    ],
    [
        "name" => "size-A5" ,
        "value" => $A5_Size["name"],
        "width" => $A5_Size["width"] ,
        "height" => $A5_Size["height"] ,
    ],
    [
        "name" => "size-A6" ,
        "value" => $A6_Size["name"] ,
        "width" => $A6_Size["width"] ,
        "height" => $A6_Size["height"] ,
    ]
];



///================================================
return [

    "form_class"=> [
        [
            "name" => "Normal",
            "name_fa" => "نرمال",
            "namespace" => \App\Http\Services\Forms\Forms\NormalForm::class ,
        ],
        [
            "name" => "Receipt",
            "name_fa" => "رسید نرمال",
            "namespace" => \App\Http\Services\Forms\Forms\ReceiptNormal::class ,
        ],
    ],





    "size_A4"=> $A4_Size,
    "center_A4_width"=> $center_A4_width,
    "center_A4_height"=> $center_A4_height,

    "size_A5"=> $A5_Size,
    "center_A5_width"=> $center_A5_width,
    "center_A5_height"=> $center_A5_height,

    "size_A6"=> $A6_Size,
    "center_A6_width"=> $center_A6_width,
    "center_A6_height"=> $center_A6_height,

    "sizes" => $sizes,





    "vertical" => "p"  , /// amodi
    "Landscape" => "L" , /// ofogi
];