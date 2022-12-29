<?php
namespace App\Repositories\ModelRepositories\Users;

use App\Models\Users\UserStore;
use App\Repositories\InterFaceRepositories\Users\IUserStoreRepository;
use App\Repositories\ModelRepositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class UserStoreRepository extends BaseRepository implements IUserStoreRepository {

    public function __construct()
    {
        parent::__construct(new UserStore());
    }

    function GetUserStores(int $userId)
    {
        return $this->model->where("user_id" , $userId)->get();
    }

    function SearchUserStore(string $userName, string $userStore, $numInPage = 15)
    {
        $this->model = $this->model->select("user_stores.*" , "user_stores.name as nameStore" , "users.*");
        if ($userName != ""){
            $this->model = $this->model->join('users', function($join) use ($userName){

                $join->on('user_stores.user_id', "=", 'users.id');

                $join
                    ->where(DB::raw("CONCAT(users.`name`, ' ', users.`family`)")  , "like" , $userName."%")
                    ->orWhere(DB::raw("CONCAT(users.`name`, ' ', users.`family`)")  , "like" , "%".$userName)
                    ->orWhere(DB::raw("CONCAT(users.`name`, ' ', users.`family`)")  , "like" , "%".$userName."%")
                    ->orWhere(DB::raw("CONCAT(users.`name`, ' ', users.`family`)")  , "like" , $userName);
            });
        }
        else{
            $this->model = $this->model->join('users', 'user_stores.user_id', "=", 'users.id');
        }

        if ($userStore != ""){
            $this->model = $this->addSearcher("user_stores.name" , $userStore);
        }

        return $this->model->simplePaginate($numInPage);
    }
}