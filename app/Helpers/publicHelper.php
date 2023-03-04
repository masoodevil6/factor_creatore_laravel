<?php

use Morilog\Jalali\Jalalian;

function setTimeStampMiladi($years="1400" , $month=1 , $day=1){
    if ($month < 10){
        $month = "0".$month;
    }

    if ($day < 10){
        $day = "0".$day;
    }
    return date("Y-m-d H:i:s" ,Jalalian::fromFormat('Y-m-d H:i:s', $years."-".$month."-".$day." 00:00:00")->getTimestamp());
}

function setTimeStampMiladiDate($date="1400-1-1 00:00:00"){

    return date("Y-m-d H:i:s" ,Jalalian::fromFormat('Y-m-d H:i:s', $date)->getTimestamp());
}

function jalaliDate($date , $format = "%A, %d %B %y"){
    return Jalalian::forge($date)->format($format);
}

function getArrayJaliliDate($date){
    $date = Jalalian::forge($date);
    return [
        "year" => $date->getYear(),
        "month" => $date->getMonth(),
        "day" => $date->getDay()
    ];
}

function getYearFromTimeStamp($timeStamp){
    return ceil($timeStamp/(60*60*24*30*12));
}
function getMouthFromTimeStamp($timeStamp){
    return ceil($timeStamp/(60*60*24*30));
}
function getDayFromTimeStamp($timeStamp){
    return ceil($timeStamp/(60*60*24));
}
function getHourFromTimeStamp($timeStamp){
    return ceil($timeStamp/(60*60));
}
function getMinuteFromTimeStamp($timeStamp){
    return ceil($timeStamp/(60));
}



function persianPriceFormat($price){
    $price = number_format($price , 0 , "/" , ",");
    $price = convertEnglishToPersian($price);
    return $price;
}

///======================================================

function randomNumFromBetweenNumber($minNum=10 , $maxNum=10000){
    return rand($minNum,$maxNum);
}

function getMimeFile($file){
    $mime = \Illuminate\Support\Facades\Storage::mimeType($file);

    if ($mime == "image/png"){
        return ".png";
    }
    else if ($mime == "image/jpeg"){
        return ".jpeg";
    }
    else if ($mime == "image/jpg"){
        return ".jpg";
    }
}

///======================================================
function convertPersianToEnglish($number){

    $number = str_replace("۰" , "0" , $number);
    $number = str_replace("۱" , "1" , $number);
    $number = str_replace("۲" , "2" , $number);
    $number = str_replace("۳" , "3" , $number);
    $number = str_replace("۴" , "4" , $number);
    $number = str_replace("۵" , "5" , $number);
    $number = str_replace("۶" , "6" , $number);
    $number = str_replace("۷" , "7" , $number);
    $number = str_replace("۸" , "8" , $number);
    $number = str_replace("۹" , "9" , $number);

    return $number;
}

function convertArabicToEnglish($number){
    $number = str_replace("۰" , "0" , $number);
    $number = str_replace("۱" , "1" , $number);
    $number = str_replace("۲" , "2" , $number);
    $number = str_replace("۳" , "3" , $number);
    $number = str_replace("۴" , "4" , $number);
    $number = str_replace("۵" , "5" , $number);
    $number = str_replace("۶" , "6" , $number);
    $number = str_replace("۷" , "7" , $number);
    $number = str_replace("۸" , "8" , $number);
    $number = str_replace("۹" , "9" , $number);

    return $number;
}

function convertEnglishToPersian($number){

    $number = str_replace("0" ,"۰" ,  $number);
    $number = str_replace("1" ,"۱" ,  $number);
    $number = str_replace("2" ,"۲" ,  $number);
    $number = str_replace("3" ,"۳" ,  $number);
    $number = str_replace("4" ,"۴" ,  $number);
    $number = str_replace("5" ,"۵" ,  $number);
    $number = str_replace("6" ,"۶" ,  $number);
    $number = str_replace("7" ,"۷" ,  $number);
    $number = str_replace("8" ,"۸" ,  $number);
    $number = str_replace("9" ,"۹" ,  $number);

    return $number;
}


function convertStandardTextUrl($text){
    $text = join("_" , explode(' ' , $text) );
    $text = join("_" , explode('-' , $text));
    return $text;
}
///=====================================================

function filterPhoneNumber($phone){
    $phone = ltrim($phone , 0);
    $phone = substr($phone, 0 , 2) == '98' ?  substr($phone , 2) : $phone;
    $phone = str_replace("+98" , "" , $phone );

    return $phone;
}
///=====================================================

function validateNationalCode($nationalCode){

    $nationalCode = trim($nationalCode , " .");
    $nationalCode = convertArabicToEnglish($nationalCode);
    $nationalCode = convertPersianToEnglish($nationalCode);

    $bannedArray = [
        "0000000000" , "1111111111" , "2222222222" , "3333333333" , "4444444444" , "55555555555" , "6666666666" , "77777777777", "8888888888", "9999999999"
    ];

    if (empty($nationalCode)){
        return false;
    }
    else if(count(str_split($nationalCode)) != 10){
        return false;
    }
    else if(in_array($nationalCode , $bannedArray)){
        return false;
    }
    else{
        $sum = 0;
        for ($i = 0 ; $i<9 ; $i++){
            $sum += (int) $nationalCode[$i]* (10 - $i);
        }

        $dividedRemaining = $sum%11;

        if ($dividedRemaining < 2){
            $lastDigit = $dividedRemaining;
        }
        else{
            $lastDigit = 11 - $dividedRemaining;
        }

        if ((int) $nationalCode[9] == $lastDigit){
            return true;
        }
        else{
            return false;
        }
    }

}

function checkPhoneGet($phone){;
    if(preg_match("/^(\+98|98|0)9\d{9}$/" , $phone)){
        return filterPhoneNumber($phone);
    }
    else{
        return "";
    }
}

function checkEmailGet($email){
    if (filter_var($email,FILTER_VALIDATE_EMAIL)){
        return $email;
    }
    else{
        return "";
    }
}

///=====================================================

function getLocationLogoSite(){
    $dir = "images/site/site";
    if(file_exists($dir.".webp")){
        return asset($dir.".webp");
    }
    else if(file_exists($dir.".png")){
        return asset($dir.".png");
    }
    else if(file_exists($dir.".jpg")){
        return asset($dir.".jpg");
    }
    else if(file_exists($dir.".jpeg")){
        return asset($dir.".jpeg");
    }
    return "";
}

function getLocationIconSite(){
    $dir = "images/site/site";
    if(file_exists($dir.".ico")){
        return asset($dir.".ico");
    }
    return "";
}

//=======================================================
function readyNumPage($page , $maxPage){
    if ($page<1){
        return 1;
    }
    else if ($page>$maxPage){
        return (int) $maxPage;
    }
    return (int) $page;
}

function readyPageinate($PageTotal , $pageSelected){

    if ($pageSelected < 1){
        $pageSelected = 1;
    }
    else if ($pageSelected > $PageTotal){
        $pageSelected = $PageTotal;
    }


    $startSeparate = true;
    $endSeparate = true;
    $min = 1;
    $minPager = $pageSelected - 2;
    $maxPager = $pageSelected + 2;
    $max = $PageTotal;
    if ($min >= $minPager){
        $minPager = $min;
        $startSeparate = false;
    }
    if ($max <= $maxPager){
        $maxPager = $max;
        $endSeparate = false;
    }


    $resultExp = [
        "pagers" => [] ,
        "pageSelected" => $pageSelected
    ];

    if ($startSeparate){
        array_push($resultExp["pagers"] , [1]);
    }

    $res = [];
    for ($i=$minPager ; $i<=$maxPager ; $i++){

        array_push($res , $i);
    }
    array_push($resultExp["pagers"] , $res);

    if ($endSeparate){
        array_push($resultExp["pagers"] , [$PageTotal]);
    }

    //dd($minPager , $maxPager , $res);


    return $resultExp;
}



function ConvertToHtmlForWPF($content){
    return
        '<!doctype html>
        <html lang="en">
        <head>
            <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

            <style>
                  @font-face{
                        font-family: Vazir;
                        src: url("/public/fonts/Vazir-Regular.ttf") format("truetype");
                   }
                  *{
                        direction: rtl;
                        text-align: right;
                        font-family:  Vazir , Sans-serif;
                        text-align: justify;
                   }
            </style>
        </head>
        <body oncontextmenu="return false; "  >
      
        '.$content.'
        </body>
        </html>
        ';
}