<?php
namespace App\Repositories;

use App\Repositories\InterFaceRepositories\Factors\IFactorProductRepository;
use App\Repositories\InterFaceRepositories\Factors\IFactorRepository;
use App\Repositories\InterFaceRepositories\Forms\IFormCategoryRepository;
use App\Repositories\InterFaceRepositories\Forms\IFormRepository;
use App\Repositories\InterFaceRepositories\Panels\IAdminRepository;
use App\Repositories\InterFaceRepositories\Panels\IAdminUserRepository;
use App\Repositories\InterFaceRepositories\Panels\IPanelGroupRepository;
use App\Repositories\InterFaceRepositories\Panels\IPanelRepository;
use App\Repositories\InterFaceRepositories\Publics\IUnitRepository;
use App\Repositories\InterFaceRepositories\Users\IOtpRepository;
use App\Repositories\InterFaceRepositories\Users\ISettingRepository;
use App\Repositories\InterFaceRepositories\Users\IUserRepository;
use App\Repositories\InterFaceRepositories\Users\IUserStoreRepository;
use App\Repositories\ModelRepositories\Factors\FactorProductRepository;
use App\Repositories\ModelRepositories\Factors\FactorRepository;
use App\Repositories\ModelRepositories\Forms\FormCategoryRepository;
use App\Repositories\ModelRepositories\Forms\FormRepository;
use App\Repositories\ModelRepositories\Panels\AdminRepository;
use App\Repositories\ModelRepositories\Panels\AdminUserRepository;
use App\Repositories\ModelRepositories\Panels\PanelGroupRepository;
use App\Repositories\ModelRepositories\Panels\PanelRepository;
use App\Repositories\ModelRepositories\Publics\UnitRepository;
use App\Repositories\ModelRepositories\Publics\UserStoreRepository;
use App\Repositories\ModelRepositories\Users\OtpRepository;
use App\Repositories\ModelRepositories\Users\SettingRepository;
use App\Repositories\ModelRepositories\Users\UserRepository;


class ContextRepository{

    //// =============================================
    //// admin
    //// =============================================

    private static $adminRepository;
    private static $adminUserRepository;
    private static $panelGroupRepository;
    private static $panelRepository;

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
    //// factors
    //// =============================================

    private static $factorProductRepository;
    private static $factorRepository;


    public static function FactorProductRepository() : IFactorProductRepository
    {
        if (self::$factorProductRepository == null){
            self::$factorProductRepository = new FactorProductRepository();
        }
        return self::$factorProductRepository;
    }

    public static function FactorRepository() : IFactorRepository
    {
        if (self::$factorRepository == null){
            self::$factorRepository = new FactorRepository();
        }
        return self::$factorRepository;
    }






    //// =============================================
    //// forms
    //// =============================================

    private static $formCategoryRepository;
    private static $formRepository;

    public static function FormCategoryRepository() : IFormCategoryRepository
    {
        if (self::$formCategoryRepository == null){
            self::$formCategoryRepository = new FormCategoryRepository();
        }
        return self::$formCategoryRepository;
    }

    public static function FormRepository() : IFormRepository
    {
        if (self::$formRepository == null){
            self::$formRepository = new FormRepository();
        }
        return self::$formRepository;
    }




    //// =============================================
    //// public
    //// =============================================

    private static $settingRepository;
    private static $unitRepository;


    public static function SettingRepository() : ISettingRepository
    {
        if (self::$settingRepository == null){
            self::$settingRepository = new SettingRepository();
        }
        return self::$settingRepository;
    }

    public static function UnitRepository() : IUnitRepository
    {
        if (self::$unitRepository == null){
            self::$unitRepository = new UnitRepository();
        }
        return self::$unitRepository;
    }






    //// =============================================
    //// users
    //// =============================================

    private static $userRepository;
    private static $userStoreRepository;
    private static $otpRepository;

    public static function UserRepository() : IUserRepository
    {
        if (self::$userRepository == null){
            self::$userRepository = new UserRepository();
        }
        return self::$userRepository;
    }

    public static function UserStoreRepository() : IUserStoreRepository
    {
        if (self::$userStoreRepository == null){
            self::$userStoreRepository = new UserStoreRepository();
        }
        return self::$userStoreRepository;
    }

    public static function OtpRepository() : IOtpRepository
    {
        if (self::$otpRepository == null){
            self::$otpRepository = new OtpRepository();
        }
        return self::$otpRepository;
    }



}