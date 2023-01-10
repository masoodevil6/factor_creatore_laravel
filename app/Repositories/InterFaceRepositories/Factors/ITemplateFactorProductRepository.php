<?php
namespace App\Repositories\InterFaceRepositories\Factors;

use App\Repositories\InterFaceRepositories\IBaseRepository;

interface ITemplateFactorProductRepository extends IBaseRepository {

    function CheckExistProductInTemplateFactorAuth();

    function GetInfoFactorProduct($templateFactorProductId=null);

    function DeleteFactorProduct($templateFactorProductId);

    function AddFactorProduct($dataProduct);

}