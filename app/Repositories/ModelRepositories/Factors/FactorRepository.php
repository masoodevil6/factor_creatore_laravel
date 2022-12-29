<?php
namespace App\Repositories\ModelRepositories\Factors;

use App\Models\Factors\Factor;
use App\Repositories\InterFaceRepositories\Factors\IFactorRepository;
use App\Repositories\ModelRepositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use function JmesPath\search;

class FactorRepository extends BaseRepository implements IFactorRepository {

    public function __construct()
    {
        parent::__construct(new Factor());
    }

    function GetUserFactors(int $userId)
    {
        return $this->model->where("user_id" , $userId)->get();
    }


    function SearchFactors(string $userName="" , $resNum="" , $numInPage=15)
    {

        if ($userName != ""){
            $this->model = $this->model->join('users', function($join) use ($userName){

                $join->on('factors.user_id', "=", 'users.id');

                $join
                    ->where(DB::raw("CONCAT(users.`name`, ' ', users.`family`)")  , "like" , $userName."%")
                    ->orWhere(DB::raw("CONCAT(users.`name`, ' ', users.`family`)")  , "like" , "%".$userName)
                    ->orWhere(DB::raw("CONCAT(users.`name`, ' ', users.`family`)")  , "like" , "%".$userName."%")
                    ->orWhere(DB::raw("CONCAT(users.`name`, ' ', users.`family`)")  , "like" , $userName);
            });
        }
        if ($resNum != ""){
            $this->model = $this->addSearcher("res_num" , $resNum);
        }

        return $this->model->simplePaginate($numInPage);
    }
}