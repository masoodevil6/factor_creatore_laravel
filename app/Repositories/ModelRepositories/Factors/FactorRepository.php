<?php
namespace App\Repositories\ModelRepositories\Factors;

use App\Models\Factors\Factor;
use App\Repositories\ContextRepository;
use App\Repositories\InterFaceRepositories\Factors\IFactorRepository;
use App\Repositories\ModelRepositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use function JmesPath\search;

class FactorRepository extends BaseRepository implements IFactorRepository {

    private $passPrice = " ریـال";

    public function __construct()
    {
        parent::__construct(new Factor());
    }



    public function GetStandardPassPrice()
    {
        return $this->passPrice;
    }




    function GetUserFactors(int $userId)
    {
        return $this->model->where("user_id" , $userId)->get();
    }





    function SearchFactors(string $userName="" , $resNum="" , $numInPage=15)
    {

        if ($userName != ""){
            $this->model = $this->model->join('users', function($join) use ($userName){

                $join->on('factors.user_id', "=", 'users.id');

                $join
                    ->where(DB::raw("CONCAT(users.`name`, ' ', users.`family`)")  , "like" , $userName."%")
                    ->orWhere(DB::raw("CONCAT(users.`name`, ' ', users.`family`)")  , "like" , "%".$userName)
                    ->orWhere(DB::raw("CONCAT(users.`name`, ' ', users.`family`)")  , "like" , "%".$userName."%")
                    ->orWhere(DB::raw("CONCAT(users.`name`, ' ', users.`family`)")  , "like" , $userName);
            });
        }
        if ($resNum != ""){
            $this->model = $this->addSearcher("res_num" , $resNum);
        }

        return $this->model->paginate($numInPage);
    }





    function GetFactorAuthAuthUser($numInPage = 8)
    {
        if (isset($_GET["search"])){
            $this->model = $this->addSearcher("res_num" , $_GET["search"]);
        }

        $this->model = $this->model->where("user_id" , ContextRepository::UserRepository()->GetUserAuthId());

        $this->model = $this->model->orderby("id" , "desc");

        if ($numInPage > 0){
            return $this->model->paginate($numInPage);
        }
        else{
            return $this->model->get();
        }
    }





    function GetInfoSelectedFactorAuthUser($resNum)
    {
        return $this->model
            ->where("user_id" , ContextRepository::UserRepository()->GetUserAuthId())
            ->where("res_num" , $resNum)
            ->first();
    }



    function DeleteSelectedFactorAuthUser($resNum)
    {
        $factor = $this->GetInfoSelectedFactorAuthUser($resNum);
        if (!empty($factor)){
            $this->deleteResult($factor);
        }
    }





    function GenerateUniqueResNumFactor()
    {
        $resNum = randomNumFromBetweenNumber();

        $factors = $this->model->where("res_num" , $resNum)->get();
        if (sizeof($factors) > 0){
            return $this->GenerateUniqueResNumFactor();
        }

        return $resNum;
    }






    function GenerateFactorFromTemplateFactor()
    {
        $templateFactor = ContextRepository::TemplateFactorRepository()->GetInfoTemplateFactor();

        if (isset($templateFactor->id) && $templateFactor->form_id>0){

            $form = ContextRepository::FormRepository()->SetStateActiveFromFormId($templateFactor->form_id);

            if ($form -> active){

                $resNum =  $this->GenerateUniqueResNumFactor();

                $dataFactor = [
                    "res_num" => $resNum,
                    "description" => $templateFactor->description,
                    "size" => $templateFactor->size,

                    "store_name" => $templateFactor->store_name,
                    "store_phone" => $templateFactor->store_phone,
                    "store_address" => $templateFactor->store_address,

                    "customer_name" => $templateFactor->customer_name,
                    "customer_phone" => $templateFactor->customer_phone,
                    "customer_address" => $templateFactor->customer_address,

                    "form_id" => $templateFactor->form_id,
                    "user_id" => $templateFactor->user_id,
                    "status" => 1,
                ];


                if ($templateFactor->type_logo ==0){
                    $dataFactor["logo_name"] = ContextRepository::UserRepository()->CopyFileLogoNameToDirectory();
                }
                else if($templateFactor->type_logo ==1){
                    $dataFactor["logo_name"] = $templateFactor->logo_name;
                }


                if ($templateFactor->type_mohr ==0){
                    $dataFactor["mohr_name"] = ContextRepository::UserRepository()->CopyFileMohrNameToDirectory();
                }
                else if($templateFactor->type_mohr ==1){
                    $dataFactor["mohr_name"] = $templateFactor->mohr_name;
                }


                $factor = $this->addResult($dataFactor);


                foreach ($templateFactor->products as $itemProduct){
                    ContextRepository::FactorProductRepository()->addResult([
                        "name" => $itemProduct-> name ,
                        "num" => $itemProduct-> num ,
                        "unit" => $itemProduct-> unit ,
                        "price" => $itemProduct-> price ,
                        "off" => $itemProduct-> off ,
                        "factor_id" => $factor->id ,
                    ]);
                }

                ContextRepository::TemplateFactorRepository()->deleteResultById($templateFactor->id);

                return $factor;

            }

        }

        return null;
    }




    //// =====================





}