<?php
namespace App\Repositories\ModelRepositories\Factors;

use App\Models\Factors\TemplateFactorProduct;
use App\Repositories\InterFaceRepositories\Factors\ITemplateFactorProductRepository;
use App\Repositories\ModelRepositories\BaseRepository;
use function JmesPath\search;

class TemplateFactorProductRepository extends BaseRepository implements ITemplateFactorProductRepository {

    public function __construct()
    {
        parent::__construct(new TemplateFactorProduct());
    }


}