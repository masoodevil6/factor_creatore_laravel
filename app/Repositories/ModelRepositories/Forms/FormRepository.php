<?php
namespace App\Repositories\ModelRepositories\Forms;

use App\Models\Forms\Form;
use App\Repositories\ContextRepository;
use App\Repositories\InterFaceRepositories\Forms\IFormRepository;
use App\Repositories\ModelRepositories\BaseRepository;
use Illuminate\Support\Facades\DB;

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

        return $this->model->where("status" , 1)->paginate($numInPage);
    }

    function GetLimitRandomSelectedForm(int $limit=10)
    {
        $forms = $this->model
            ->select(
                [
                    "forms.id" , "forms.image" , "forms.name" , "forms.image_title", "forms.image_alt" , "forms.form_category_id" , "forms.subscribe_id" ,
                    "form_categories.title"
                ]
            )
            ->join('form_categories', "forms.form_category_id" , "=" , "form_categories.id")
            ->where("forms.status" , 1)
            ->where("forms.selected" , 1)
            ->limit($limit)->inRandomOrder()->get();

        return $this->checkExistPicForm($forms);
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


    function SetStateActiveFromFormId($formId)
    {
        $form = $this->getResult($formId);
        if (!empty($form)){
            $form = $this->SetStateActiveFromForm($form);
        }
        return $form;
    }

    function SetStateActiveFromForm($form)
    {
        $listSubscribeActive = ContextRepository::SubscribePaymentRepository()->GetSubscribeActiveNow();
        $form->active = $this->SetStateActiveForm($listSubscribeActive , $form->subscribe_id);
        return $form;
    }




    function SearchFromFromClassName(string $className)
    {
        return $this->model
            ->where("class" , $className)
            ->first();
    }



    function GetListFormsInSubscribe($subscribeSlug = "", $numInPage = 15)
    {
        $result = $this->model;

        if (!empty($subscribeSlug)){

            $result = $result->whereRaw("subscribe_id = (select id from subscribes WHERE slug = '".$subscribeSlug."' and status = 1 )");
        }

        return  $result->where("status" , 1)->paginate($numInPage);
    }




    //// ==========================================================
    private function checkExistPicForm($forms){
        $resultExp = [];
        foreach ($forms as $itemform){
            if(isset($itemform["image"]) && $itemform["image"] != "" && file_exists($itemform["image"]["indexArray"][$itemform["image"]["currentImage"]])){
                array_push($resultExp , $itemform);
            }
        }
        return $resultExp;
    }


}