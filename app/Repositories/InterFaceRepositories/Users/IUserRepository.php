<?php
namespace App\Repositories\InterFaceRepositories\Users;


use App\Models\Users\User;
use App\Repositories\InterFaceRepositories\IBaseRepository;

interface IUserRepository extends IBaseRepository {

  function GetUserWithEmail(string $userEmail);

  function GetUserWithPhone(string $userPhone);



  function SyncPanelUserAdmin(string  $user_email , int $adminId , int $AdminStatus , string $adminPassword="fa1401");

  function UpdatePanelUserAdmin(User $user , int $adminId , int $AdminStatus);

  function DetachAllPanelUserAdmin(int $userId);

  function DetachPanelUserAdmin(User $user);



  function SearchUser(string $userName="" , $numInPage=15);



  function GetUserAuthInfo();

  function GetUserPanelAuthAdminInfo($user);

  function GetUserPasswordAuthPanelAdmin($panel);


}