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
            ->select(
                [
                    "forms.id" , "forms.image" , "forms.name" , "forms.form_category_id" , "forms.subscribe_id" ,
                    "form_categories.title"
                ]
            )
            ->join('form_categories', "forms.form_category_id" , "=" , "form_categories.id")
            ->where("forms.status" , 1)
            ->where("forms.selected" , 1)
            ->limit($limit)->inRandomOrder()->get();
    }


    function GetListForms($formCategoryId = null)
    {
        return $this->model->where("form_category_id" , $formCategoryId)->get();
    }




    function SetStateActiveForm($subscribeActives , $subscribe_id){
        $active = false;
        if ($subscribe_id == null){
            $active = true;
        }
        else{
            foreach ($subscribeActives as $itemSubscribe){
                if ($subscribe_id == $itemSubscribe->id){
                    $active=true;
                }
            }
        }
        return $active;
    }
}