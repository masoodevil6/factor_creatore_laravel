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

}