<?php

namespace App\Repositories\InterFaceRepositories;

use App\Models\Panel\Admin;
use App\ViewModel\Panel\AdminModel;
use Illuminate\Database\Eloquent\Collection;


interface IAdminRepository extends IBaseRepository{

    function getListAdminMain(int $pw);

    function getLastAdminMain(int $pw);

    function AdminAttachPanel(Admin $admin , int $panelId) : void;

    function AdminAttachUser(Admin $admin , int $userId , string $password) : void;

}