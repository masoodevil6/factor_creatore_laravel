<?php
namespace App\Repositories\ModelRepositories\Banks;

use App\Models\Banks\Bank;
use App\Repositories\InterFaceRepositories\Banks\IBanckRepository;
use App\Repositories\ModelRepositories\BaseRepository;


class BankRepository extends BaseRepository implements IBanckRepository {

    public function __construct()
    {
        parent::__construct(new Bank());
    }


    function SearchBank(string $bankName = "", $numInPage = 15)
    {
        if ($bankName != ""){
            $this->model = $this->addSearcher("title" , $bankName);
        }

        return $this->model->simplePaginate($numInPage);
    }
}