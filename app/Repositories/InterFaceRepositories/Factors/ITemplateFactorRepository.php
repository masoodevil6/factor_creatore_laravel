<?php
namespace App\Repositories\InterFaceRepositories\Factors;

use App\Repositories\InterFaceRepositories\IBaseRepository;

interface ITemplateFactorRepository extends IBaseRepository {

    function GetInfoTemplateFactor();

    function SubmitInfoTemplateFactor($data);

}