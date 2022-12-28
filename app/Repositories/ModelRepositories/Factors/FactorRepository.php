<?php
namespace App\Repositories\ModelRepositories\Factors;

use App\Models\Factors\Factor;
use App\Repositories\InterFaceRepositories\Factors\IFactorRepository;
use App\Repositories\ModelRepositories\BaseRepository;

class FactorRepository extends BaseRepository implements IFactorRepository {

    public function __construct()
    {
        parent::__construct(new Factor());
    }

    function GetUserFactors(int $userId)
    {
        return $this->model->where("user_id" , $userId)->get();
    }
}