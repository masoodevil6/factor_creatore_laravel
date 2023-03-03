<?php
namespace App\Repositories\InterFaceRepositories\Seo;


use App\Repositories\InterFaceRepositories\IBaseRepository;

interface ISeoPageRepository extends IBaseRepository {

    function createItemSeoPageIfNotExist(string  $pageName , bool $spical) : void;

    function getListSpicalPages();


    function getIdSubscribeSeo();

    function getTitleSubscribesSeo();

}