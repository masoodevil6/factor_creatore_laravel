<?php
namespace App\Repositories\ModelRepositories;

use App\Models\Panel\AdminUser;
use App\Repositories\InterFaceRepositories\IAdminUserRepository;

class AdminUserRepository extends BaseRepository implements IAdminUserRepository {

    public function __construct()
    {
        parent::__construct(new AdminUser());
    }


}