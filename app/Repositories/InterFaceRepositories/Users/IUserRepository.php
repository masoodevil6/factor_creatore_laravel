<?php
namespace App\Repositories\InterFaceRepositories\Users;


use App\Repositories\InterFaceRepositories\IBaseRepository;

interface IUserRepository extends IBaseRepository {

  function GetUserWithEmail(string $userEmail);

}