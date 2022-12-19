<?php
namespace App\Repositories\InterFaceRepositories;

interface IBaseRepository
{
    function getAllResult() : object ;

    function getResult($resultId)  : object;

    function addResult($result) : bool ;

    function updateResult($result) : bool;

    function deleteResult($result) : bool ;

    function deleteResultById($resultId) : bool ;

    function save($resultId) : void ;

}