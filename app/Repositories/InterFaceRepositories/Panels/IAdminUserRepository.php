<?php
namespace App\Repositories\InterFaceRepositories\Panels;

use App\Repositories\InterFaceRepositories\IBaseRepository;

interface IAdminUserRepository extends IBaseRepository {

    function getLoginClientToPanelAdmin();

}