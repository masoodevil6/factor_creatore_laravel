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
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserRepository extends BaseRepository implements IUserRepository {

    protected $pathUser="";
    protected $directoryUserFactors="";
    protected $directoryUserLogo="";
    protected $directoryUserMohr="";


    protected $pathTest;
    protected $directoryTestFile;
    protected $directoryTestLogo;
    protected $directoryTestMohr;
    protected $fileTestLogo;
    protected $fileTestMohr;

    public function __construct()
    {
        parent::__construct(new User());
        if (Auth::check() || Auth::guard("api")->check()){

            $this->pathUser = "users/".$this->GetUserAuthId();

            $this->directoryUserFactors = "/factors/";
            $this->directoryUserLogo = "/logos/";
            $this->directoryUserMohr = "/mohr/";

            $this->pathTest = "test";
            $this->directoryTestFile = $this->pathTest.$this->directoryUserFactors;
            $this->directoryTestLogo = $this->pathTest.$this->directoryUserLogo;
            $this->directoryTestMohr = $this->pathTest.$this->directoryUserMohr;
            $this->fileTestLogo = $this->directoryTestLogo."test.png";
            $this->fileTestMohr = $this->directoryTestMohr."test.png";

            $this->fileTestLogo = "https://".Config::get("app.ip")."/factorSaz/storage/app/test/logo/test.png";
            $this->fileTestMohr = "https://".Config::get("app.ip")."/factorSaz/storage/app/test/mohr/test.png";
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
        if (Auth::check()){
            return Auth::user();
        }
        else if (Auth::guard("api")->check()){
            return Auth::guard("api")->user()->user;
        }
        return null;
    }

    function GetUserAuthId()
    {
        $user = $this->GetUserAuthInfo();
        if (!empty($user) && $user != null){
            return $user->id;
        }
        return null;
    }

    function LogoutAuthUser()
    {
        if (Auth::check()){
            Auth::logout();
        }
        else if (Auth::guard("api")->check()){
            Auth::guard("api")->logout();
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
        $userLogo = $this->getFileNameLogo();
        if (!empty($userLogo) && Storage::exists($userLogo)){
            return true;
        }
        return false;
    }

    function GetImageUserLogo()
    {
        if ($this->CheckExistImageUserLogo()){
            return Storage::download($this->getFileNameLogo());
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
        $locationLogo = $this->getFileNameLogo();
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
        $userMohr = $this->getFileNameMohr();
        if (!empty($userMohr) && Storage::exists($userMohr)){
            return true;
        }
        return false;
    }

    function GetImageUserMohr()
    {
        if ($this->CheckExistImageUserMohr()){
            return Storage::download($this->getFileNameMohr());
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
        $locationMohr = $this->getFileNameMohr();
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




    public function getPathTest(): string
    {
        return $this->pathTest;
    }
    public function getDirectoryTestFile(): string
    {
        return $this->directoryTestFile;
    }
    public function getDirectoryTestLogo(): string
    {
        return $this->directoryTestLogo;
    }
    public function getDirectoryTestMohr(): string
    {
        return $this->directoryTestMohr;
    }
    public function getFileTestLogo(): string
    {
        return $this->fileTestLogo;
    }
    public function getFileTestMohr(): string
    {
        return $this->fileTestMohr;
    }










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




    function CopyFileLogoNameToDirectory()
    {
        $userImageLogo = $this->getFileNameLogo();
        if (!empty($userImageLogo)){
            $newFile = $this->getPathUser().$this->getDirectoryUserLogo().time().getMimeFile($userImageLogo);
            Storage::copy($userImageLogo , $newFile);
            return $newFile;
        }
        return null;
    }

    function CopyFileMohrNameToDirectory()
    {
        $userImageMohr = $this->getFileNameMohr();
        if (!empty($userImageMohr)){
            $newFile = $this->getPathUser().$this->getDirectoryUserMohr().time().getMimeFile($userImageMohr);
            Storage::copy($userImageMohr , $newFile);
            return $newFile;
        }
        return null;
    }










    //// --------------------------------------


    private function getFileNameLogo(){
        return $this->GetUserAuthInfo()->logo;
    }

    private function getFileNameMohr(){
        return $this->GetUserAuthInfo()->mohr;
    }





}