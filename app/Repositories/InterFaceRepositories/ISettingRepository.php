<?php
namespace App\Repositories\InterFaceRepositories;


interface ISettingRepository extends IBaseRepository{

    function createItemSettingIfNotExist(string  $titleEn , string $titleFa , string $value) : void;
}