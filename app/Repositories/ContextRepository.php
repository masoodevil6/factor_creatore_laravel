<?php
namespace App\Repositories;

use App\Repositories\InterFaceRepositories\IAdminRepository;
use App\Repositories\ModelRepositories\AdminRepository;
use App\Repositories\InterFaceRepositories\IAdminUserRepository;
use App\Repositories\ModelRepositories\AdminUserRepository;
use App\Repositories\InterFaceRepositories\IPanelGroupRepository;
use App\Repositories\ModelRepositories\PanelGroupRepository;
use App\Repositories\InterFaceRepositories\IPanelRepository;
use App\Repositories\ModelRepositories\PanelRepository;


class ContextRepository{


    private static $adminRepository;
    private static $adminUserRepository;
    private static $panelGroupRepository;
    private static $panelRepository;



    //// =============================================
    //// admin
    //// =============================================

    public static function AdminRepository() : IAdminRepository
    {
        if (self::$adminRepository == null){
            self::$adminRepository = new AdminRepository();
        }
        return self::$adminRepository;
    }

    public static function AdminUserRepository() : IAdminUserRepository
    {
        if (self::$adminUserRepository == null){
            self::$adminUserRepository = new AdminUserRepository();
        }
        return self::$adminUserRepository;
    }

    public static function PanelGroupRepository() : IPanelGroupRepository
    {
        if (self::$panelGroupRepository == null){
            self::$panelGroupRepository = new PanelGroupRepository();
        }
        return self::$panelGroupRepository;
    }

    public static function PanelRepository() : IPanelRepository
    {
        if (self::$panelRepository == null){
            self::$panelRepository = new PanelRepository();
        }
        return self::$panelRepository;
    }





}