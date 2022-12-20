<?php
namespace App\Repositories\InterFaceRepositories;


interface IPanelGroupRepository extends IBaseRepository{
    function getPanelGroupWithTitle(string $title);

    function deleteAllRecord() : void;
}