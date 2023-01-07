<?php
namespace App\Repositories\InterFaceRepositories\Forms;

use App\Repositories\InterFaceRepositories\IBaseRepository;

interface IFormCategoryRepository extends IBaseRepository {

    function SearchFormCategory(string $categoryTitle="" ,$numInPage = 15);



}