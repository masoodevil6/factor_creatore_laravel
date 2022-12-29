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

    function SearchForm(string $formName = "", int $subscribeId = 0, $numInPage = 15)
    {
        if ($subscribeId > 0){
            $this->model = $this->model->where("subscribe_id" , $subscribeId);
        }

        if ($formName != ""){
            $this->model = $this->addSearcher("name" , $formName);
        }

        return $this->model->paginate($numInPage);
    }
}