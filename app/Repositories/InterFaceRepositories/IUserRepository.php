<?php
namespace App\Repositories\InterFaceRepositories;


interface IUserRepository extends IBaseRepository{

  function GetUserWithEmail(string $userEmail);

}