<?php
namespace App\Repositories\ModelRepositories\Factors;

use App\Http\Services\Forms\FactorService;
use App\Models\Factors\Factor;
use App\Repositories\ContextRepository;
use App\Repositories\InterFaceRepositories\Factors\IFactorRepository;
use App\Repositories\ModelRepositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use function JmesPath\search;

class FactorRepository extends BaseRepository implements IFactorRepository {

    public function __construct()
    {
        parent::__construct(new Factor());
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
        $factorService = new FactorService();
        $factorService->deleteFactor($factor);

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





    function GenerateFactorFromApiFactor($factorTemplate , $imageLogo , $imageMohr)
    {

        $logoName = "";
        if ($imageLogo != null){
            $logoName = ContextRepository::UserRepository()->uploadUserImageServer($imageLogo , "logo" , true);
        }

        $MohrName = "";
        if ($imageMohr != null){
            $MohrName = ContextRepository::UserRepository()->uploadUserImageServer($imageMohr , "mohr" , true);
        }


        $dataImages = [
            "logo_name" => $logoName ,
            "mohr_name" => $MohrName ,
        ];

        return $this->GenerateFactorFromData(
            $factorTemplate ,
            $factorTemplate["products"] ,
            $dataImages
            );
    }


    function GenerateFactorFromTemplateFactor()
    {
        $templateFactor = ContextRepository::TemplateFactorRepository()->GetInfoTemplateFactor();
        if (isset($templateFactor->id)){
            $dataImages = [
                "logo_name" => "" ,
                "mohr_name" => "" ,
            ];
            if ($templateFactor->type_logo ==0){
                $dataImages["logo_name"] = ContextRepository::UserRepository()->CopyFileLogoNameToDirectory();
            }
            else if($templateFactor->type_logo ==1){
                $dataImages["logo_name"] = $templateFactor->logo_name;
            }

            if ($templateFactor->type_mohr ==0){
                $dataImages["mohr_name"] = ContextRepository::UserRepository()->CopyFileMohrNameToDirectory();
            }
            else if($templateFactor->type_mohr ==1){
                $dataImages["mohr_name"] = $templateFactor->mohr_name;
            }

            return $this->GenerateFactorFromData($templateFactor , $templateFactor->products , $dataImages , $templateFactor->user_id);
        }

        return null;
    }




    //// =====================

    private function GenerateFactorFromData($dataFactor , $products , $images , $userId=0){

        if (!empty($dataFactor) && $dataFactor["form_id"]>0){

            if ($userId == 0){
                $userId = ContextRepository::UserRepository()->GetUserAuthId();
            }

            $form = ContextRepository::FormRepository()->SetStateActiveFromFormId($dataFactor["form_id"]);

            if ($form -> active){

                $resNum =  $this->GenerateUniqueResNumFactor();

                $dataFactor = [
                    "res_num" => $resNum,
                    "description" => $dataFactor["description"],
                    "size" => $dataFactor["size"],

                    "store_name" => $dataFactor["store_name"],
                    "store_phone" => $dataFactor["store_phone"],
                    "store_address" => $dataFactor["store_address"],

                    "customer_name" => $dataFactor["customer_name"],
                    "customer_phone" => $dataFactor["customer_phone"],
                    "customer_address" => $dataFactor["customer_address"],

                    "logo_name" => $images["logo_name"],
                    "mohr_name" => $images["mohr_name"],

                    "form_id" => $dataFactor["form_id"],
                    "user_id" => $userId,
                    "status" => 1,
                ];

                $factor = $this->addResult($dataFactor);


                foreach ($products as $itemProduct){
                    ContextRepository::FactorProductRepository()->addResult([
                        "name" => $itemProduct["name"] ,
                        "num" => $itemProduct["num"] ,
                        "unit" => $itemProduct["unit"] ,
                        "price" => $itemProduct["price"] ,
                        "off" => $itemProduct["off"] ,
                        "factor_id" => $factor["id"] ,
                    ]);
                }

                return $factor;
            }
        }
        return null;
    }



}