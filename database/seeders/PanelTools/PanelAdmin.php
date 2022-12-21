<?php
namespace Database\Seeders\PanelTools;

use App\Models\Panel\Admin;
use App\Repositories\ContextRepository;
use PHPUnit\Runner\Exception;

class PanelAdmin{

    private $panelName = "مدیر اصلی";
    private $adminRepository;
    private $userRepository;

    public function __construct()
    {
        $this->adminRepository = ContextRepository::AdminRepository();
        $this->userRepository = ContextRepository::UserRepository();
    }


    private function getListMainAdmin(){
        return $this->adminRepository->getListAdminMain(Admin::getPanelPass());
    }
    private function getLastMainAdmin(){
        return $this->adminRepository->getLastAdminMain(Admin::getPanelPass());
    }


    private function createMainPanel(){
        $data = [
            "title" => $this->panelName ,
            "status" => 1 ,
            "main" => Admin::getPanelPass() ,
        ];

        $this->adminRepository->addResult($data);
    }


    private function deletePanel($panel){
        $this->adminRepository->deleteResult($panel);
    }


    public function addItemToMainPanel($panelId){
        $panelMinAdmin= $this->getLastMainAdmin();
        $this->adminRepository->AdminAttachPanel($panelMinAdmin , $panelId);
    }

    public function createMainAdminPanel(){
        $panelMinAdmin= $this->getListMainAdmin();
        if (!empty($panelMinAdmin)){
            foreach ($panelMinAdmin As $admin){
                $this->deletePanel($admin);
            }
        }

        $this->createMainPanel();
    }


    public function setMainAdmin($userEmail , $passwordAdmin){

        $panelMinAdmin= $this->getLastMainAdmin();
        $userMainAdmin = $panelMinAdmin->users;

        if (sizeof($userMainAdmin) == 0){
            $user = $this->userRepository->GetUserWithEmail($userEmail);

            if (!empty($user)){
                $this->adminRepository->AdminAttachUser($panelMinAdmin , $user->id , $passwordAdmin);
            }
            else{
                return new Exception("user not exist");
            }

        }
    }

}
