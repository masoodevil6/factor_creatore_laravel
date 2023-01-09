<?php
namespace App\Repositories\ModelRepositories\Factors;

use App\Models\Factors\TemplateFactor;
use App\Repositories\ContextRepository;
use App\Repositories\InterFaceRepositories\Factors\ITemplateFactorRepository;
use App\Repositories\ModelRepositories\BaseRepository;
use Illuminate\Support\Facades\Storage;
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



    function SetFormTemplateFactor($formId)
    {
        $templateFactor= $this->GetInfoTemplateFactor();

        if (isset($templateFactor->id)){
            $this->updateResult($templateFactor , ["form_id" => $formId]);
        }
        else{
            $this->addResult([
                "user_id" => ContextRepository::UserRepository()->GetUserAuthId() ,
                "form_id" => $formId,
            ]);
        }
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





    function CheckExistTemplateImageUserLogo()
    {
        $templateFactor= $this->GetInfoTemplateFactor();
        if (isset($templateFactor->id) && !empty($templateFactor->logo_name) && Storage::exists($templateFactor->logo_name) ){
            return $templateFactor->logo_name;
        }
        return null;
    }

    function GetTemplateImageUserLogo()
    {
        $imageName = $this->CheckExistTemplateImageUserLogo();
        if (!empty($imageName)){
            return Storage::download($imageName);
        }
        return null;
    }

    function UploadTemplateImageUserLogo($LogoFile)
    {
        $templateFactor= $this->GetInfoTemplateFactor();
        if (isset($templateFactor->id)){
            $resultFile = ContextRepository::UserRepository()->uploadUserImageServer($LogoFile , "logo");
            if (!empty($resultFile)){
                $this->updateResult(
                    $templateFactor ,
                    ["logo_name" => $resultFile]
                );
                ContextRepository::UserRepository()->DeleteUserFolderInPublicDirectory();
            }
        }
    }

    function DeleteTemplateImageUserLogo()
    {
        $templateFactor= $this->GetInfoTemplateFactor();
        if (isset($templateFactor->id) && !empty($templateFactor->logo_name)){
            $this->deleteImageLogoInTemplateFactor($templateFactor);
        }
    }







    function CheckExistTemplateImageUserMohr()
    {
        $templateFactor= $this->GetInfoTemplateFactor();

        if (isset($templateFactor->id) && !empty($templateFactor->mohr_name) && Storage::exists($templateFactor->mohr_name) ){
            return $templateFactor->mohr_name;
        }
        return null;
    }

    function GetTemplateImageUserMohr()
    {
        $imageName = $this->CheckExistTemplateImageUserMohr();
        if (!empty($imageName)){
            return Storage::download($imageName);
        }
        return null;
    }

    function UploadTemplateImageUserMohr($mohrFile)
    {
        $templateFactor= $this->GetInfoTemplateFactor();
        if (isset($templateFactor->id)){
            $resultFile = ContextRepository::UserRepository()->uploadUserImageServer($mohrFile , "mohr");
            if (!empty($resultFile)){
                $this->DeleteTemplateImageUserLogo();
                $this->updateResult(
                    $templateFactor ,
                    ["mohr_name" => $resultFile]
                );
                ContextRepository::UserRepository()->DeleteUserFolderInPublicDirectory();
            }
        }
    }

    function DeleteTemplateImageUserMohr()
    {
        $templateFactor= $this->GetInfoTemplateFactor();
        if (isset($templateFactor->id) && !empty($templateFactor->mohr_name)){
            $this->deleteImageMohrInTemplateFactor($templateFactor);
        }
    }






    function SetTypeLogoAndMohrImageInTemplateFactor($typeLogo, $typeMohr)
    {
        $templateFactor= $this->GetInfoTemplateFactor();
        if (isset($templateFactor->id)){

            if ($typeLogo != 1){
                $this->deleteImageLogoInTemplateFactor($templateFactor);
            }

            if ($typeMohr != 1){
                $this->deleteImageMohrInTemplateFactor($templateFactor);
            }

            $this->updateResult($templateFactor , [
                "type_logo" => $typeLogo ,
                "type_mohr" => $typeMohr ,
            ]);
        }
    }




    /////--------------------------------------------------

    private function deleteImageLogoInTemplateFactor($templateFactor){
        if (!empty($templateFactor) && !empty($templateFactor->logo_name)){
            $logoName = $templateFactor->logo_name;
            $this->updateResult($templateFactor , [
                "logo_name" => null
            ]);
            if (Storage::exists($logoName)){
                Storage::delete($logoName);
            }
        }
    }

    private function deleteImageMohrInTemplateFactor($templateFactor){
        if (!empty($templateFactor) && !empty($templateFactor->mohr_name)){
            $mohrName = $templateFactor->mohr_name;
            $this->updateResult($templateFactor , [
                "mohr_name" => null
            ]);
            if (Storage::exists($mohrName)){
                Storage::delete($mohrName);
            }
        }
    }


}