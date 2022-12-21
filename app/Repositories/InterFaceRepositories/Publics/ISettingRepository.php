<?php
namespace App\Repositories\InterFaceRepositories\Users;


use App\Repositories\InterFaceRepositories\IBaseRepository;

interface ISettingRepository extends IBaseRepository {

    function createItemSettingIfNotExist(string  $titleEn , string $titleFa , string $value) : void;
}