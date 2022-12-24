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
    function getAllResult();

    function getResult($resultId) ;

    function addResult($result)  ;

    function updateResult($result) : bool;

    function deleteResult(Model $result) : bool ;

    function deleteResultById(int $resultId) : bool ;

    function save($model) : void ;

}