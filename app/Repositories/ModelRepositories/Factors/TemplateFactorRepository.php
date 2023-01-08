<?php
namespace App\Repositories\ModelRepositories\Factors;

use App\Models\Factors\TemplateFactor;
use App\Repositories\ContextRepository;
use App\Repositories\InterFaceRepositories\Factors\ITemplateFactorRepository;
use App\Repositories\ModelRepositories\BaseRepository;
use function JmesPath\search;

class TemplateFactorRepository extends BaseRepository implements ITemplateFactorRepository {

    public function __construct()
    {
        parent::__construct(new TemplateFactor());
    }


    function GetInfoTemplateFactor()
    {
        $templateFactor =
            $this->model
                ->where("user_id" , ContextRepository::UserRepository()->GetUserAuthId())
                ->orderby("id" , "desc")
                ->first();

        if (empty($templateFactor)){
            $templateFactor= new TemplateFactor();
        }
        return $templateFactor;
    }





    function SubmitInfoTemplateFactor($data)
    {
        $dataExp = [
            "description" =>  $data["description"],
            "store_name" =>  $data["store_name"],
            "store_phone" =>  $data["store_phone"],
            "store_address" =>  $data["store_address"],
            "customer_name" =>  $data["customer_name"],
            "customer_phone" =>  $data["customer_phone"],
            "customer_address" =>  $data["customer_address"]
        ];

        $templateFactor= $this->GetInfoTemplateFactor();
        if (isset($templateFactor->id)){
            $this->updateResult($templateFactor , $dataExp);
        }
        else{
            $dataExp["user_id"] = ContextRepository::UserRepository()->GetUserAuthId();
            $this->addResult($dataExp);
        }
    }





}