<?php
namespace App\Repositories;

use App\Repositories\InterFaceRepositories\IAdminRepository;
use App\Repositories\InterFaceRepositories\ISettingRepository;
use App\Repositories\InterFaceRepositories\IUserRepository;
use App\Repositories\ModelRepositories\AdminRepository;
use App\Repositories\InterFaceRepositories\IAdminUserRepository;
use App\Repositories\ModelRepositories\AdminUserRepository;
use App\Repositories\InterFaceRepositories\IPanelGroupRepository;
use App\Repositories\ModelRepositories\PanelGroupRepository;
use App\Repositories\InterFaceRepositories\IPanelRepository;
use App\Repositories\ModelRepositories\PanelRepository;
use App\Repositories\ModelRepositories\SettingRepository;
use App\Repositories\ModelRepositories\UserRepository;


class ContextRepository{


    private static $adminRepository;
    private static $adminUserRepository;
    private static $panelGroupRepository;
    private static $panelRepository;

    private static $settingRepository;

    private static $userRepository;




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


    //// =============================================
    //// public
    //// =============================================

    public static function SettingRepository() : ISettingRepository
    {
        if (self::$settingRepository == null){
            self::$settingRepository = new SettingRepository();
        }
        return self::$settingRepository;
    }





    //// =============================================
    //// user
    //// =============================================


    public static function UserRepository() : IUserRepository
    {
        if (self::$userRepository == null){
            self::$userRepository = new UserRepository();
        }
        return self::$userRepository;
    }



}