<?php
namespace App\Repositories\InterFaceRepositories\Forms;


use App\Repositories\InterFaceRepositories\IBaseRepository;

interface IFormRepository extends IBaseRepository {

    function SearchForm(string $formName="" , int $subscribeId=0 ,$numInPage = 15);

    function GetLimitRandomSelectedForm(int $limit=10);

    function GetListForms($formCategoryId=null);

    function SetStateActiveForm($subscribeActives , $subscribe_id);

    function SetStateActiveFromFormId($formId);

    function SetStateActiveFromForm($form);


    function SearchFromFromClassName(string $className);
}