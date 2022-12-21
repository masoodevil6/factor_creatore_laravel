<?php
namespace App\Repositories\InterFaceRepositories\Panels;

use App\Repositories\InterFaceRepositories\IBaseRepository;

interface IPanelGroupRepository extends IBaseRepository {
    function getPanelGroupWithTitle(string $title);

    function deleteAllRecord() : void;
}