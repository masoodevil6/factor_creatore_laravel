<?php
namespace App\Repositories\ModelRepositories\Factors;

use App\Models\Factors\TemplateFactor;
use App\Repositories\InterFaceRepositories\Factors\ITemplateFactorRepository;
use App\Repositories\ModelRepositories\BaseRepository;
use function JmesPath\search;

class TemplateFactorRepository extends BaseRepository implements ITemplateFactorRepository {

    public function __construct()
    {
        parent::__construct(new TemplateFactor());
    }


}