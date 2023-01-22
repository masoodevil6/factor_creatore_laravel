<?php
namespace App\Repositories\InterFaceRepositories\Publics;


use App\Repositories\InterFaceRepositories\IBaseRepository;

interface ISettingRepository extends IBaseRepository {

    function createItemSettingIfNotExist(string  $titleEn , string $titleFa , string $value) : void;

    function SetSettingInfoPage($convertAboutUsToHtml=false);
}