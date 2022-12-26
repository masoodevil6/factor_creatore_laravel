<?php
namespace App\Repositories\ModelRepositories\Panels;

use App\Models\Panel\Admin;
use App\Repositories\InterFaceRepositories\Panels\IAdminRepository;
use App\Repositories\ModelRepositories\BaseRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminRepository extends BaseRepository implements IAdminRepository {

    public function __construct()
    {
        parent::__construct(new Admin());
    }


    public function getLastAdminMain(int $pw)
    {
        return $this->model::where("main" , $pw)->orderBy("id" , "desc")->first();
    }

    public function getListAdminMain(int $pw)
    {
        return  $this->model::where("main" , $pw)->get();
    }


    public function AdminAttachPanel(Admin $admin ,int $panelId): void
    {
        $admin->panels()->attach($panelId);
    }

    public function AdminAttachUser(Admin $admin, int $userId, string $password): void
    {
        $admin->users()->sync([$userId => ["status" => 1 , "password" => Hash::make($password)]]);
    }

    function SyncPanelForAdminPanel(Admin $admin, array $data)
    {
        $admin->panels()->sync($data);
    }
}