<?php
namespace App\Repositories\InterFaceRepositories\Users;

use App\Repositories\InterFaceRepositories\IBaseRepository;

interface IUserStoreRepository extends IBaseRepository {

    function GetUserStores(int $userId);

    function SearchUserStore(string $userName , string $userStore , $numInPage=15);
}