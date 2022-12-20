<?php
namespace App\Repositories\ModelRepositories;

use App\Models\User;
use App\Repositories\InterFaceRepositories\IUserRepository;

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