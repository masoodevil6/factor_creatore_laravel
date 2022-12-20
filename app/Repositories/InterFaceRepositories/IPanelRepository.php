<?php
namespace App\Repositories\InterFaceRepositories;


interface IPanelRepository extends IBaseRepository{

    function getPanelGroupAndLink(int $panelGroupId ,string $link) ;

    function deleteAllRecord() : void;

}