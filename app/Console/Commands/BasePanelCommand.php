<?php

namespace App\Console\Commands;

use App\Http\Services\Login\ConfirmLoginService;
use App\Http\Services\Login\LoginService;
use App\Models\Panel\Admin;
use App\Repositories\ContextRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class BasePanelCommand extends Command
{




    protected $signature =  'panel:create';

    protected $checkLogin=false;
    protected function CheckloginClient(){
        $resultLogin= $this->SendOtpToClient();
        if (isset($resultLogin["isValid"]) && $resultLogin["isValid"]){
            $resultConfirm = $this->ConfirmLoginClient($resultLogin["token"]);
            if (isset($resultConfirm["isValid"]) && isset($resultConfirm["status"]) &&  $resultConfirm["isValid"] && $resultConfirm["status"]){
                $this->checkLogin = $this->CheckPasswordAdmin($resultConfirm["user"]);
                return Command::SUCCESS;
            }
            else{
                return Command::INVALID;
            }
        }
        else{
            return Command::INVALID;
        }
    }



    protected function SendOtpToClient(){
        $userEmail = $this->ask('Please enter the email client');
        $loginService = new LoginService();
        $resultLogin = $loginService->SendOtpTokenUserExist($userEmail);
        if ($resultLogin["isValid"]){
            return $resultLogin;
        }
        return null;
    }

    protected function ConfirmLoginClient($token){
        $otpCode = $this->ask('Please enter the code receive');
        $confirmLoginService = new ConfirmLoginService();
        $resultConfirm = $confirmLoginService->ConfirmLoginClient($token , $otpCode);
        if ($resultConfirm["isValid"] && $resultConfirm["status"]){
           return $resultConfirm;
        }
        return null;
    }

    protected function CheckPasswordAdmin($user){
        $adminPassword = $this->ask('Please enter the password Admin Panel');

        $panel = ContextRepository::UserRepository()->GetUserPanelAuthAdminInfo($user);
        if (!empty($panel)){
            $password =  ContextRepository::UserRepository()->GetUserPasswordAuthPanelAdmin($panel);

            if (Hash::check($adminPassword , $password) && $panel->main=Admin::getPanelPass()){

                return true;
            }
        }

        return false;
    }
}
