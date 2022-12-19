<?php
namespace App\Repositories\ModelRepositories;

use App\Models\Panel\Admin;
use App\Repositories\InterFaceRepositories\IAdminRepository;

class AdminRepository extends BaseRepository implements IAdminRepository {

    public function __construct()
    {
        parent::__construct(new Admin());
    }




}