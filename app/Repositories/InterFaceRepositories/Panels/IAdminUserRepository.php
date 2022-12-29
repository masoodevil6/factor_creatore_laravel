<?php
namespace App\Repositories\InterFaceRepositories\Panels;

use App\Repositories\InterFaceRepositories\IBaseRepository;

interface IAdminUserRepository extends IBaseRepository {

    function getLoginClientToPanelAdmin();

    function LoginUserAdmin(int $id);

    function GetUserAdminAuth();

    function GetUserIdAdminAuth();

    function GetPanelUserAdminAuth($adminUser);

    function GetEmailAdminAuth($password);

    function SearchAdminUser($userName ="" , $userEmail="" , $panelSearcher = 0, $numInPage = 15);
}