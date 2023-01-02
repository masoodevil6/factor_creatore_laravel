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

    function GetLimitRandomSelectedForm(int $limit=10)
    {
        return $this->model
            ->join('form_categories', "forms.form_category_id" , "=" , "form_categories.id")
            ->where("forms.status" , 1)
            ->where("forms.selected" , 1)
            ->limit($limit)->inRandomOrder()->get();
    }
}