<?php
namespace App\Repositories\ModelRepositories\Factors;

use App\Models\Factors\FactorProduct;
use App\Repositories\InterFaceRepositories\Factors\IFactorProductRepository;
use App\Repositories\ModelRepositories\BaseRepository;

class FactorProductRepository extends BaseRepository implements IFactorProductRepository {

    public function __construct()
    {
        parent::__construct(new FactorProduct());
    }

}