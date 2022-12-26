<?php
namespace App\Repositories\ModelRepositories\Users;

use App\Models\Users\UserStore;
use App\Repositories\InterFaceRepositories\Users\IUserStoreRepository;
use App\Repositories\ModelRepositories\BaseRepository;

class UserStoreRepository extends BaseRepository implements IUserStoreRepository {

    public function __construct()
    {
        parent::__construct(new UserStore());
    }

}