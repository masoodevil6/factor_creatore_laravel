<?php
namespace App\Repositories\ModelRepositories\Panels;

use App\Models\Panel\AdminUser;
use App\Repositories\InterFaceRepositories\Panels\IAdminUserRepository;
use App\Repositories\ModelRepositories\BaseRepository;

class AdminUserRepository extends BaseRepository implements IAdminUserRepository {

    public function __construct()
    {
        parent::__construct(new AdminUser());
    }


}