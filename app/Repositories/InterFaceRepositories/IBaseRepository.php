<?php
namespace App\Repositories\InterFaceRepositories;

use App\Models\Panel\Admin;
use App\ViewModel\ABaseViewModel;
use App\ViewModel\Panel\AdminModel;
use App\ViewModel\Panel\AdminViewModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface IBaseRepository
{
    function getAllResult($ifStatus=false);

    function getPaginateResult( $ifStatus=false , $numInPage=15);

    function getResult($resultId , $ifStatus=false) ;

    function addResult($result)  ;

    function changeStatusResult(Model $model , $field="status" , $defaultValue=null);

    function updateResult(Model $result , $data) : bool;

    function deleteResult(Model $result) : bool ;

    function deleteResultById(int $resultId) : bool ;

    function save($model) : void ;

}