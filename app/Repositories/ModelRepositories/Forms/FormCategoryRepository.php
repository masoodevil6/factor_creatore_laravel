<?php
namespace App\Repositories\ModelRepositories\Forms;

use App\Models\Forms\FormCategory;
use App\Repositories\InterFaceRepositories\Forms\IFormCategoryRepository;
use App\Repositories\ModelRepositories\BaseRepository;

class FormCategoryRepository extends BaseRepository implements IFormCategoryRepository {

    public function __construct()
    {
        parent::__construct(new FormCategory());
    }

}