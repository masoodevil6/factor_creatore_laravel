<?php

namespace App\Http\Controllers\Admin\Factor;

use App\Http\Controllers\Admin\MainAdminController;
use App\Http\Requests\Admin\Factor\FormFactorAdminRequest;
use App\Http\Services\Forms\BaseFormToolService;
use App\Http\Services\Forms\FactorService;
use App\Models\Factors\Factor;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FactorAdminController extends MainAdminController
{

    function __construct()
    {
        parent::__construct(route("admin.factors.factor.index"));
    }



    public function index(){
        $nav = [
            "part"=> "بخش مدیریت فاکتورها",
            "navigation" =>[
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "لیست فاکتورها"
                ]
            ]
        ];

        $factors= ContextRepository::FactorRepository()->getPaginateResult();

        return view("admin.factor.factor.index" , compact("nav" , "factors"));
    }






    public function show(Factor $factor){
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت فاکتورها",
            "navigation" =>[
                [
                    "route" => "admin.factors.factor.index" ,
                    "current" => 0,
                    "title" => "لیست فاکتورها"
                ],
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "مشاهده فاکتور"
                ]
            ]
        ];

        $dataFactor = new BaseFormToolService($factor);
        $factorInfo = $dataFactor->getFactorModel();
        $products = $dataFactor->getProducts();
        $totalPrice = $dataFactor->getTotalPrice();

        $forms = ContextRepository::FormRepository()->getAllResult();

        return view("admin.factor.factor.show" , compact("nav" , "factor"  , "factorInfo" , "products"  , "totalPrice" ,"forms"));
    }

    public function changeForm(FormFactorAdminRequest $request , FactorService $factorService , Factor $factor){
        $input = $request->all();
        ContextRepository::FactorRepository()->updateResult($factor , $input);

        $result = $factorService->generateFactor($factor);

        if (!empty($result)){
            return $this ->redirectIndex("فرم فاکتور با موفقیت تغییر یافت");
        }

        return $this ->redirectIndex("مشکلی در استخراج فایل فاکتور رخ داده است");
    }






    public function destroy(Factor $factor){
        ContextRepository::FactorRepository()->deleteResult($factor);
        return $this ->redirectIndex("فاکتور با موفقیت حذف شد");
    }


    public function status(Factor $factor){
        $result = ContextRepository::FactorRepository()->changeStatusResult($factor);
        if ($result["status"]){
            return $result["exp"];
        }
    }



    public function download(Factor $factor){
        $location = "users/".$factor->user_id."/factors/".$factor->res_num.".pdf";
        if (Storage::exists($location)){
            return Storage::download($location);
        }
        return abort(404);
    }

}
