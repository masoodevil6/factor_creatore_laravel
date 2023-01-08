<?php
namespace App\Repositories\ModelRepositories\Factors;

use App\Models\Factors\TemplateFactorProduct;
use App\Repositories\ContextRepository;
use App\Repositories\InterFaceRepositories\Factors\ITemplateFactorProductRepository;
use App\Repositories\ModelRepositories\BaseRepository;
use function JmesPath\search;
use function League\Flysystem\delete;
use function Symfony\Component\Console\Helper\render;

class TemplateFactorProductRepository extends BaseRepository implements ITemplateFactorProductRepository {

    public function __construct()
    {
        parent::__construct(new TemplateFactorProduct());
    }



    function GetInfoFactorProduct($templateFactorProductId = null)
    {
        $factorProduct=null;
        if ($templateFactorProductId != null){
            $templateFactor = $this->getMainTemplateFactor();

            if (!empty($templateFactor)){
                $factorProduct =
                    $this->model
                        ->select("template_factor_products.*")
                        ->join('template_factors' , function ($join)  use ($templateFactor){
                            $join->on("template_factors.id" , "=" , "template_factor_products.template_factor_id")
                                ->where("template_factors.user_id" , ContextRepository::UserRepository()->GetUserAuthId())
                                ->where("template_factors.id" , $templateFactor->id);
                        })
                        ->where("template_factor_products.id" , $templateFactorProductId)
                        ->first();
            }
        }

        if (empty($factorProduct)){
            $factorProduct = new TemplateFactorProduct();
        }

        return $factorProduct;
    }


    function DeleteFactorProduct($templateFactorProductId)
    {
        $productFactor = $this->GetInfoFactorProduct($templateFactorProductId);
        if (isset($productFactor->id)){
            $this->deleteResult($productFactor);
        }
    }


    function AddFactorProduct($dataProduct)
    {
        $data=[
            "name" => $dataProduct["name"] ,
            "num" => $dataProduct["num"] ,
            "unit" => $dataProduct["unit"] ,
            "off" => $dataProduct["off"] ,
            "price" => $dataProduct["price"]
        ];

        if (isset($dataProduct["id"])){
            $product =  $this->GetInfoFactorProduct($dataProduct["id"]);
            $this->updateResult($product , $data);
        }
        else{
            $templateFactor = $this->getMainTemplateFactor();
            if (!empty($templateFactor)){
                $data["template_factor_id"] = $templateFactor->id ;
                $this->addResult($data);
            }
        }

    }


    ///// -------------------------------------------

    protected function getMainTemplateFactor(){
        return ContextRepository::TemplateFactorRepository()->GetInfoTemplateFactor();
    }

}