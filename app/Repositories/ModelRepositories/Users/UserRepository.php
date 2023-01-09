<?php
namespace App\Repositories\ModelRepositories\Users;

use App\Http\Services\Images\ImageService;
use App\Models\Users\Otp;
use App\Models\Users\User;
use App\Repositories\ContextRepository;
use App\Repositories\InterFaceRepositories\Users\IUserRepository;
use App\Repositories\ModelRepositories\BaseRepository;
use CKSource\CKFinder\Filesystem\Path;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserRepository extends BaseRepository implements IUserRepository {

    protected $pathUser="";
    protected $directoryUserFactors="";
    protected $directoryUserLogo="";
    protected $directoryUserMohr="";

    public function __construct()
    {
        parent::__construct(new User());
        if (Auth::check()){

            $this->pathUser = "users/".$this->GetUserAuthId();
            $this->directoryUserFactors = "/factors/";
            $this->directoryUserLogo = "/logos/";
            $this->directoryUserMohr = "/mohr/";
        }
    }

    function GetUserWithEmail(string $userEmail)
    {
        return $this->model->where("email" , $userEmail)->first();
    }

    function GetUserWithPhone(string $userPhone)
    {
        return $this->model->where("mobile" , $userPhone)->first();
    }

    function UpdateUserInfo(string $userName, string $userFamily) :bool
    {
        $user = $this->GetUserAuthInfo();
        if (!empty($user)){
            return $this->updateResult(
                $user ,
                [
                    "name" => $userName ,
                    "family" => $userFamily ,
                ]
            );
        }
        return false;
    }


    function UpdateUserEmailOrPhone(Otp $otp): bool
    {
        if ($this->GetUserAuthId() == $otp->user_id){
            $type = $otp->type;
            $input = $otp->input_login;
            $user = $this->GetUserAuthInfo();

            if ($type == 0){
                $data = ["mobile" => $input];
            }
            else if ($type == 1){
                $data = ["email" => $input];
            }

            ContextRepository::OtpRepository()->UpdateUsedTokenOtp($otp);
            $this->updateResult($user , $data);

            return true;
        }
        return false;
    }





    function SyncPanelUserAdmin(string  $user_email , int $adminId , int $AdminStatus , string $adminPassword="fa1401")
    {
        $user = $this->GetUserWithEmail($user_email);
        $user->admins()->sync(
            [
                $adminId =>[
                    "status"=> $AdminStatus ,
                    "password" => Hash::make($adminPassword)
                ]
            ]
        );
    }

    function UpdatePanelUserAdmin(User $user , int $adminId , int $AdminStatus)
    {
        $user->admins()->updateExistingPivot($user->admins->get(0) , [ "admin_id" => $adminId , "status"=> $AdminStatus]);
    }

    function DetachAllPanelUserAdmin(int $userId)
    {
        $user = $this->getResult($userId);
        $this->DetachPanelUserAdmin($user);
    }

    function DetachPanelUserAdmin(User $user)
    {
        $user->admins()->detach();
    }





    function SearchUser(string $userName = "" , $numInPage=15)
    {
        if ($userName != ""){
            $this->model = $this->addSearcher("CONCAT(`name`, ' ', `family`)" , $userName);
        }

        return $this->model->paginate($numInPage);
    }






    function GetUserAuthInfo()
    {
        return Auth::user();
    }

    function GetUserAuthId()
    {
        return Auth::id();
    }

    function LogoutAuthUser()
    {
        if (Auth::check()){
            Auth::logout();
        }
    }








    function GetUserPanelAuthAdminInfo($user)
    {
        return $user->admins()->first();
    }

    function GetUserPasswordAuthPanelAdmin($panel)
    {
        return $panel->pivot->password;
    }






    function CheckExistImageUserLogo(){
        $userLogo = $this->GetUserAuthInfo()->logo;
        if (!empty($userLogo) && Storage::exists($this->GetUserAuthInfo()->logo)){
            return true;
        }
        return false;
    }

    function GetImageUserLogo()
    {
        if ($this->CheckExistImageUserLogo()){
            return Storage::download($this->GetUserAuthInfo()->logo);
        }
        return null;
    }

    function UploadImageUserLogo($logoFile)
    {
        $resultFile = $this->uploadUserImageServer($logoFile , "logo");
        if (!empty($resultFile)){
            $this->DeleteImageUserLogo();
            $this->updateResult($this->GetUserAuthInfo() , [
                "logo" => $resultFile
            ]);
            $this->DeleteUserFolderInPublicDirectory();
        }
    }

    function DeleteImageUserLogo()
    {
        $locationLogo = $this->GetUserAuthInfo()->logo;
        if (!empty($locationLogo)){
            $this->updateResult($this->GetUserAuthInfo() , [
                "logo" => null
            ]);

            if (Storage::exists($locationLogo)){
                Storage::delete($locationLogo);
            }
        }
    }







    function CheckExistImageUserMohr(){
        $userMohr = $this->GetUserAuthInfo()->mohr;
        if (!empty($userMohr) && Storage::exists($this->GetUserAuthInfo()->mohr)){
            return true;
        }
        return false;
    }

    function GetImageUserMohr()
    {
        if ($this->CheckExistImageUserMohr()){
            return Storage::download($this->GetUserAuthInfo()->mohr);
        }
        return null;
    }

    function UploadImageUserMohr($mohrFile)
    {
        $resultFile = $this->uploadUserImageServer($mohrFile , "mohr");
        if (!empty($resultFile)){
            $this->DeleteImageUserMohr();
            $this->updateResult($this->GetUserAuthInfo() , [
                "mohr" => $resultFile
            ]);
            $this->DeleteUserFolderInPublicDirectory();
        }
    }

    function DeleteImageUserMohr()
    {
        $locationMohr = $this->GetUserAuthInfo()->mohr;
        if (!empty($locationMohr)){
            $this->updateResult($this->GetUserAuthInfo() , [
                "mohr" => null
            ]);

            if (Storage::exists($locationMohr)){
                Storage::delete($locationMohr);
            }
        }
    }






    public function getPathUser(): string
    {
        return $this->pathUser;
    }

    public function getDirectoryUserFactors(): string
    {
        return $this->directoryUserFactors;
    }

    public function getDirectoryUserLogo(): string
    {
        return $this->directoryUserLogo;
    }

    public function getDirectoryUserMohr(): string
    {
        return $this->directoryUserMohr;
    }












    /////--------------------------------------------------
    public function uploadUserImageServer($fileImage , $type=""){

        $imageService = new ImageService();

        $imageService->setExclusiveDirectory($this->getPathUser());
        if ($type == "logo"){
            $imageService->setImageDirectory($this->getDirectoryUserLogo());
        }
        else if ($type == "mohr"){
            $imageService->setImageDirectory($this->getDirectoryUserMohr());
        }

        return $imageService -> save($fileImage , false , "storage");
    }

    public function DeleteUserFolderInPublicDirectory(){
        $imageService = new ImageService();
        $imageService->deleteDirectoryAndFiles(public_path($this->getPathUser()));
    }


}

//"users\/1\/logos\\2023\\01\\06\\1673032375.png"