<?php
namespace App\Repositories\ModelRepositories\Users;

use App\Models\Users\UserStore;
use App\Repositories\ContextRepository;
use App\Repositories\InterFaceRepositories\Users\IUserStoreRepository;
use App\Repositories\ModelRepositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\Finder\size;

class UserStoreRepository extends BaseRepository implements IUserStoreRepository {

    public function __construct()
    {
        parent::__construct(new UserStore());
    }

    function GetUserStores(int $userId)
    {
        return $this->model->where("user_id" , $userId)->get();
    }

    function GetStoresAuthUser()
    {
        return $this->model->where("user_id" , ContextRepository::UserRepository()->GetUserAuthId())->orderBy('id', 'desc')->get();
    }


    function SearchUserStore(string $userName, string $userStore, $numInPage = 15)
    {
        $this->model = $this->model->select("user_stores.*" , "user_stores.name as nameStore" , "users.name" , "users.family");
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

        return $this->model->paginate($numInPage);
    }


    function GetInfoStoresAuthUser($userStoreId)
    {
        return $this->model
            ->where("id" , $userStoreId)
            ->where("user_id" , ContextRepository::UserRepository()->GetUserAuthId())
            ->first();
    }

    function AddOrEditStoreAuthUser($userStoreId=0, $userStoreName, $userStorePhone, $userStoreAddress)
    {
        $data = [
            "name" => $userStoreName ,
            "phone" => $userStorePhone ,
            "address" => $userStoreAddress ,
        ];

        if ($userStoreId > 0){
            $userStore = $this->GetInfoStoresAuthUser($userStoreId);
            $this->updateResult($userStore , $data);
        }
        else{
            $data["user_id"] = ContextRepository::UserRepository()->GetUserAuthId();
            $this->addResult($data);
        }
    }
}