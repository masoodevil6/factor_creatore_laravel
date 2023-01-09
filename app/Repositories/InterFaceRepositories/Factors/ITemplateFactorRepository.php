<?php
namespace App\Repositories\InterFaceRepositories\Factors;

use App\Repositories\InterFaceRepositories\IBaseRepository;

interface ITemplateFactorRepository extends IBaseRepository {

    function GetInfoTemplateFactor();

    function SetFormTemplateFactor($formId);

    function SubmitInfoTemplateFactor($data);



    function CheckExistTemplateImageUserLogo();

    function GetTemplateImageUserLogo();

    function UploadTemplateImageUserLogo($LogoFile);

    function DeleteTemplateImageUserLogo();



    function CheckExistTemplateImageUserMohr();

    function GetTemplateImageUserMohr();

    function UploadTemplateImageUserMohr($mohrFile);

    function DeleteTemplateImageUserMohr();



    function SetTypeLogoAndMohrImageInTemplateFactor($typeImage , $typeMohr);

}