<?php
namespace App\Repositories\ModelRepositories\Users;

use App\Models\Users\User;
use App\Repositories\InterFaceRepositories\Users\IUserRepository;
use App\Repositories\ModelRepositories\BaseRepository;

class UserRepository extends BaseRepository implements IUserRepository {

    public function __construct()
    {
        parent::__construct(new User());
    }


    function GetUserWithEmail(string $userEmail)
    {
        return $this->model->where("email" , $userEmail)->first();
    }
}