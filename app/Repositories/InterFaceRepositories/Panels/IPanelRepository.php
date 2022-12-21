<?php
namespace App\Repositories\InterFaceRepositories\Panels;


use App\Repositories\InterFaceRepositories\IBaseRepository;

interface IPanelRepository extends IBaseRepository {

    function getPanelGroupAndLink(int $panelGroupId ,string $link) ;

    function deleteAllRecord() : void;

}