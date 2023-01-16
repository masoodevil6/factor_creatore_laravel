<?php
namespace App\Repositories\InterFaceRepositories\Factors;

use App\Repositories\InterFaceRepositories\IBaseRepository;

interface ITemplateFactorRepository extends IBaseRepository {

    function CheckExistTemplateFactor();

    function GetInfoTemplateFactor();

    function SetFormTemplateFactor($formId , $size);

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