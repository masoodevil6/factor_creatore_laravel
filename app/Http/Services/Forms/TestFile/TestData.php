<?php
namespace App\Http\Services\Forms\TestFile;

use App\Models\Factors\Factor;
use App\Models\Factors\FactorProduct;
use App\Repositories\ContextRepository;

class TestData
{
    protected $product = [
        "name" => "کالا",
        "num" => 1,
        "unit" => "عدد ",
        "price" => 1000,
        "off" => 500,
        "factor_id" => null,
    ];

    protected $factorInfo = [
        "res_num" => "12345",
        "description" => "توضیحات تکمیلی" ,
        "status" => 1 ,

        "store_name" => "عنوان فروشگاه" ,
        "store_phone" => "09301110000" ,
        "store_address" => "آدرس فروشگاه" ,

        "customer_name" => "نام مشتری" ,
        "customer_phone" => "09300001111" ,
        "customer_address" => "آدرس مشتری" ,

        "user_id" => "" ,
        "form_id" => "" ,

        "logo_name" => "" ,
        "mohr_name" => "" ,
    ];

    public function __construct(){
        $this->factorInfo["logo_name"] = ContextRepository::UserRepository()->getFileTestLogo();
        $this->factorInfo["mohr_name"] = ContextRepository::UserRepository()->getFileTestMohr();
    }


    protected function readyFactorModel($form , $num){
        $factor = new Factor();

        $factor-> form_id = $form["id"];
        $factor-> user_id = 0;

        $factor-> res_num = $this->factorInfo["res_num"];
        $factor-> description = $this->factorInfo["description"];

        $factor-> store_name = $this->factorInfo["store_name"];
        $factor-> store_phone = $this->factorInfo["store_phone"];
        $factor-> store_address = $this->factorInfo["store_address"];

        $factor-> customer_name = $this->factorInfo["customer_name"];
        $factor-> customer_phone = $this->factorInfo["customer_phone"];
        $factor-> customer_address = $this->factorInfo["customer_address"];

        $factor-> logo_name = $this->factorInfo["logo_name"];
        $factor-> mohr_name = $this->factorInfo["mohr_name"];

        $factor-> products = $this->readyListProductModel($num);

        return $factor;
    }



    protected function readyListProductModel($num){
        $products = [];
        for ($i=0; $i< $num; $i++){
            $product = new FactorProduct();

            $product->name = $this->product["name"]." ".($i+1);
            $product->num = ($this->product["num"] + $i);
            $product->unit = $this->product["unit"];
            $product->price = ($this->product["price"]+($this->product["price"]*$i));
            $product->off = ($this->product["off"]+($this->product["off"]*$i));

            array_push($products , $product);
        }
        return $products;
    }





}