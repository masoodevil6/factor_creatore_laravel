<?php

namespace App\Repositories\InterFaceRepositories\Panels;

use App\Models\Panel\Admin;
use App\Repositories\InterFaceRepositories\IBaseRepository;


interface IAdminRepository extends IBaseRepository {

    function getListAdminMain(int $pw);

    function getLastAdminMain(int $pw);

    function AdminAttachPanel(Admin $admin , int $panelId) : void;

    function AdminAttachUser(Admin $admin , int $userId , string $password) : void;

    function SyncPanelForAdminPanel(Admin $admin , array $data);

    function SearchAdminPanel(string $panelName ,$numInPage = 15);

}