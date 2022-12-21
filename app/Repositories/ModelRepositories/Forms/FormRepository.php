<?php
namespace App\Repositories\ModelRepositories\Forms;

use App\Models\Forms\Form;
use App\Repositories\InterFaceRepositories\Forms\IFormRepository;
use App\Repositories\ModelRepositories\BaseRepository;

class FormRepository extends BaseRepository implements IFormRepository {

    public function __construct()
    {
        parent::__construct(new Form());
    }

}