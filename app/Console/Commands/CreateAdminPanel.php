<?php

namespace App\Console\Commands;

use App\Http\Services\Admins\PanelAdminService;
use App\Http\Services\Login\ConfirmLoginService;
use App\Http\Services\Login\LoginService;
use App\Models\Panel\Admin;
use App\Repositories\ContextRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use League\Flysystem\Exception;
use function Symfony\Component\Uid\Factory\getNamespace;

class CreateAdminPanel extends Command
{

    ////=========================================================
    /// info comment
    ////=========================================================
    protected $signature =  'panel:create';

    protected $description = 'Command description create panel admin';




    private $typeGroupsAndPanels_key = 0;
    private $typeGroupsAndPanels_title = "Groups - Panels";

    private $typeGroups_key = 1;
    private $typeGroups_title = "Groups";

    private $typePanels_key = 2;
    private $typePanels_title = "Panels";

    private $typeReInstall_key = 3 ;
    private $typeReInstall_title = "re-install";

    private $userEmail = "";
    private $userPassword = "";

    private $continueRequest = "y";
    public function handle()
    {
        $result = $this->CheckloginClient();
        if ($result == Command::SUCCESS){
            $this->RequestCreatePanel();
        }
        else{
            $this->info("invalid login user");
            return $result;
        }


        //$user = $this->ask('Please enter the email client');
        //$email = $this->ask('Please enter the email main admin for creating access!!');
        //$this->info(ContextRepository::UserRepository()->getResult($this->argument('user')));
        //return Command::SUCCESS;
    }





    ////=========================================================
    /// login service
    ////=========================================================

    protected function CheckloginClient(){
        $resultLogin= $this->SendOtpToClient();
        if (isset($resultLogin["isValid"]) && $resultLogin["isValid"]){
            $resultConfirm = $this->ConfirmLoginClient($resultLogin["token"]);
            if (isset($resultConfirm["isValid"]) && isset($resultConfirm["status"]) &&  $resultConfirm["isValid"] && $resultConfirm["status"]){
                $result = $this->CheckPasswordAdmin($resultConfirm["user"]);
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
        $this->userEmail = $this->ask('Please enter the email client');
        $loginService = new LoginService();
        $resultLogin = $loginService->SendOtpTokenUserExist($this->userEmail);
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
        $this->userPassword = $this->ask('Please enter the password Admin Panel');

        $panel = ContextRepository::UserRepository()->GetUserPanelAuthAdminInfo($user);
        if (!empty($panel)){
            $password =  ContextRepository::UserRepository()->GetUserPasswordAuthPanelAdmin($panel);
            $main =  ContextRepository::UserRepository()->GetUserMainAuthPanelAdmin($panel);

            if (Hash::check($this->userPassword , $password) && $main ==Admin::getPanelPass()){

                return true;
            }
        }

        return false;
    }




    ////=========================================================
    /// get table list chooser
    ////=========================================================

    private function GetHeadersCommand($type="groups"){
        $headers = [];
        array_push($headers , "key");
        if($type == "group_panel"){
            array_push($headers , "group");
            array_push($headers , "panels");
        }
        else if ($type == "groups"){
            array_push($headers , "group");
        }
        else if($type == "panels"){
            array_push($headers , "panel");
            array_push($headers , "group");
        }
        else if($type == "type"){
            array_push($headers , "type");
        }
        return $headers;
    }

    private function GetListType(){
        $rows = [];
        array_push($rows , [$this->typeGroupsAndPanels_key , $this->typeGroupsAndPanels_title]);
        array_push($rows , [$this->typeGroups_key , $this->typeGroups_title]);
        array_push($rows , [$this->typePanels_key , $this->typePanels_title]);
        array_push($rows , [$this->typeReInstall_key , $this->typeReInstall_title]);
        $this->table($this->GetHeadersCommand("type") , $rows);
    }

    private function GetTableListGroupsAndPanels(){
        $rows = [];

        $groupsAndPanels = $this->GetArrayGroupsAndPanels();
        foreach ($groupsAndPanels as $key => $itemGroup){

            $panelsInGroup = [];
            foreach ($itemGroup["panels"] as $itemPanel){
                array_push($panelsInGroup , $itemPanel["panel_name"]);
            }

            $textPanel = join(" | " , $panelsInGroup);
            array_push($rows , [$key , $itemGroup["group_name"] , $textPanel]);
        }

        $this->table($this->GetHeadersCommand("group_panel") , $rows);

    }

    private function GetTableListGroups(){
        $rows = [];

        $groups = $this->GetArrayConfigGroups();
        foreach ($groups as $key => $itemGroup){
            array_push($rows , [$key , $itemGroup["group_name"]]);
        }

        $this->table($this->GetHeadersCommand("groups") , $rows);
    }

    private function GetTableListPanels(){
        $rows = [];

        $panels = $this->GetArrayConfigPanels();
        foreach ($panels as $key => $itemPanel){
            array_push($rows , [$key , $itemPanel["panel_name"] , $itemPanel["group_name"]]);
        }

        $this->table($this->GetHeadersCommand("panels") , $rows);
    }






    ////=========================================================
    /// run groups and panels
    ////=========================================================

    private function RequestCreatePanel(){
        while ($this->continueRequest == "y"){

            // step 2 ===> get type
            $this->GetListType();
            $arrayChoose = [$this->typeGroupsAndPanels_key, $this->typeGroups_key , $this->typePanels_key , $this->typeReInstall_key];
            $typeCreator = $this->anticipate('Please enter type panel: ['. join(" / " , $arrayChoose) .']',
                $arrayChoose);

            if ($typeCreator == $this->typeGroupsAndPanels_key){
                $this ->  GetTableListGroupsAndPanels();
            }
            else if ($typeCreator == $this->typeGroups_key){
                $this ->  GetTableListGroups();
            }
            else if ($typeCreator == $this->typePanels_key){
                $this ->  GetTableListPanels();
            }


            // step 3 ===> get key
            if ($typeCreator == $this->typeGroupsAndPanels_key ||
                $typeCreator == $this->typeGroups_key ||
                $typeCreator == $this->typePanels_key){

                $this->InstallGroupPanel($typeCreator);
            }
            else if ($typeCreator == $this->typeReInstall_key){
                $this->ReinstallAllGroupsAndAdmin();
            }


            $this->continueRequest = $this->anticipate('are you continue? [ y / n]',
                ["y" , "n"]);
        }

        $this->info("finish request");
        return Command::SUCCESS;
    }

    private function InstallGroupPanel($typeCreator){

        $keyCreator = $this->ask('Please enter key panel');

        if ($typeCreator == $this->typeGroupsAndPanels_key ){
            $this->RunGroupAndPanelSelected($keyCreator);
        }
        else if ($typeCreator == $this->typeGroups_key ){
            $this->RunGroupSelected($keyCreator);
        }
        else if ($typeCreator == $this->typePanels_key ){
            $this->RunPanelSelected($keyCreator);
        }

    }

    private function RunGroupAndPanelSelected($keySelected){
        $listPanelsAndGroup = $this->GetArrayGroupsAndPanels();

        foreach ($listPanelsAndGroup as $key => $itemGroup){
            if ($keySelected == $key){
                $this->RunClassGroupOrPanel($itemGroup["group_class"]);
                foreach ($itemGroup["panels"] as $itemPanel){
                    $this->RunClassGroupOrPanel($itemPanel["panel_class"]);
                }
            }
        }
    }

    private function RunGroupSelected($keySelected){
        $listGroups = $this->GetArrayConfigGroups();
        foreach ($listGroups as $key => $itemGroup){
            if ($keySelected == $key){
                $this->RunClassGroupOrPanel($itemGroup["group_class"]);
            }
        }
    }

    private function RunPanelSelected($keySelected){
        $listPanels= $this->GetArrayConfigPanels();
        foreach ($listPanels as $key => $itemPanel){
            if ($keySelected == $key){
                $this->RunClassGroupOrPanel($itemPanel["panel_class"]);
            }
        }
    }



    ////=========================================================
    /// re-Install groups and panels
    ////=========================================================

    private function ReinstallAllGroupsAndAdmin(){

        $status = $this->anticipate('Are you sure for continue delete and re-install groups and panels [yes / cancel] ',
            ["yes" , "cancel"]);

        if ($status == "yes"){

            ///step 1
            $panelAdminService = new PanelAdminService();
            $panelAdminService->createMainAdminPanel();

            ///step 2
            ContextRepository::PanelGroupRepository()->deleteAllRecord();
            ContextRepository::PanelRepository()->deleteAllRecord();

            $groupsAndPanels = $this->GetArrayGroupsAndPanels();
            foreach ($groupsAndPanels as $key => $itemGroup){
                $this->RunClassGroupOrPanel($itemGroup["group_class"]);
                foreach ($itemGroup["panels"] as $itemPanel){
                    $this->RunClassGroupOrPanel($itemPanel["panel_class"]);
                }
            }

            ///step 3
            $panelAdminService ->setMainAdmin($this->userEmail , $this->userPassword);

            ///step 4
            Artisan::call('setting:data');
        }
    }



    ////=========================================================
    /// all array getter
    ////=========================================================
    private function GetArrayGroupsAndPanels(){
        $resultExp = [];

        $groups = $this->GetArrayConfigGroups();
        $panels = $this->GetArrayConfigPanels();
        foreach ($groups as $key => $itemGroup){

            $res = $itemGroup;
            $res["panels"] = [];

            foreach ($panels as $itemPanel){
                if ($itemGroup["group_name"] == $itemPanel["group_name"]){
                    array_push($res["panels"] , $itemPanel);
                }
            }

            array_push($resultExp , $res);
        }

        return $resultExp;
    }

    private function GetArrayConfigGroups(){
        return Config::get("adminPanel.groups");
    }

    private function GetArrayConfigPanels(){
        return Config::get("adminPanel.panels");
    }



    ////=========================================================
    /// reInstall all groups and panels
    ////=========================================================
    private function RunClassGroupOrPanel($namespace){
        try{
            return (new \ReflectionClass($namespace))->newInstance();
        }
        catch (Exception $e){
            $this->info($e);
            return null;
        }
    }


}
