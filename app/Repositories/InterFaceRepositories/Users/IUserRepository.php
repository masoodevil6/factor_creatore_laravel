<?php
namespace App\Repositories\InterFaceRepositories\Users;


use App\Models\Users\Otp;
use App\Models\Users\User;
use App\Repositories\InterFaceRepositories\IBaseRepository;

interface IUserRepository extends IBaseRepository {

  function GetUserWithEmail(string $userEmail);

  function GetUserWithPhone(string $userPhone);

  function UpdateUserInfo(string $userName , string $userFamily) : bool ;

  function UpdateUserEmailOrPhone(Otp $otp) : bool ;

  function SearchUser(string $userName="" , $numInPage=15);




  function SyncPanelUserAdmin(string  $user_email , int $adminId , int $AdminStatus , string $adminPassword="fa1401");

  function UpdatePanelUserAdmin(User $user , int $adminId , int $AdminStatus);

  function DetachAllPanelUserAdmin(int $userId);

  function DetachPanelUserAdmin(User $user);




  function GetUserAuthInfo();

  function GetUserAuthId();

  function LogoutAuthUser();




  function GetUserPanelAuthAdminInfo($user);

  function GetUserPasswordAuthPanelAdmin($panel);




  function CheckExistImageUserLogo();

  function GetImageUserLogo();

  function UploadImageUserLogo($logoFile);

  function DeleteImageUserLogo();



  function CheckExistImageUserMohr();

  function GetImageUserMohr();

  function UploadImageUserMohr($mohrFile);

  function DeleteImageUserMohr();








  function getPathUser(): string;

  function getDirectoryUserFactors(): string;

  function getDirectoryUserLogo(): string;

  function getDirectoryUserMohr(): string;



  function uploadUserImageServer($fileImage , $type="");

  function DeleteUserFolderInPublicDirectory();



  function CopyFileLogoNameToDirectory();

  function CopyFileMohrNameToDirectory();

}