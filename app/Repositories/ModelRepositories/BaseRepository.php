<?php
namespace App\Repositories\ModelRepositories;

use App\Repositories\InterFaceRepositories\IBaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use mysqli_sql_exception;

class BaseRepository  implements IBaseRepository {

    private $baseModel;
    protected $model;
    public function __construct(Model $model)
    {
        $this->baseModel = $model;
        $this->resetClassModel();
    }

    function resetClassModel()
    {
        $this->model = $this->baseModel;
    }




    function getAllResult($ifStatus=false)
    {
        $this->resetClassModel();
        $res = $this->model;
        if ($ifStatus){
            $res =$res->where("status" , 1);
        }
        return $res->get();
    }

    function getPaginateResult($ifStatus=false ,$numInPage = 15 )
    {
        $this->resetClassModel();
        $res = $this->model;
        if ($ifStatus){
            $res =$res->where("status" , 1);
        }
        return $res->paginate($numInPage);
    }


    function getResult($resultId , $ifStatus=false)
    {
        $this->resetClassModel();
        $res = $this->model;
        if ($ifStatus){
            $res =$res->where("status" , 1);
        }
        return $res->find($resultId);
    }


    function addResult($result)
    {
        $this->resetClassModel();
        try{
            return $this->model->create($result);
        }
        catch (mysqli_sql_exception $e){
            return null;
        }
    }


    function changeStatusResult(Model $result, $field = "status" , $defaultValue=null)
    {
        $this->resetClassModel();
        $resultExp=[
            "status" => true ,
            "exp" => null
        ];

        $gotoRequest = false;
        if ($defaultValue == null){
            $gotoRequest = true;
        }
        else{
            if (in_array($defaultValue, [0 , 1])){
                $gotoRequest = true;
            }
        }

        if ($gotoRequest){

            if ($defaultValue == null){
                $result[$field] = $result[$field] == 0 ? 1 : 0;
            }
            else{
                $result[$field] = $defaultValue;
            }
            $this->save($result);

            $resultExp["status"] = true;
            $resultExp["exp"] = $this->resultJsonChangeStatus($result , $result[$field] , false , $field , $result[$field]);

        }
        return $resultExp;
    }



    function updateResult(Model $result , $data) : bool
    {
        $this->resetClassModel();
        try{
            $result->update($data);
            return true;
        }
        catch (mysqli_sql_exception $e){
            return false;
        }
    }


    function deleteResult(Model $result) : bool
    {
        $this->resetClassModel();
        try{
            if (get_class($result) == get_class($this->model)){
                $result->delete();
                return true;
            }
            return false;
        }
        catch (mysqli_sql_exception $e){
            return false;
        }
    }

    function deleteResultById($resultId): bool
    {
        $this->resetClassModel();
        return $this->deleteResult($this->getResult($resultId));
    }



    function save($model) : void
    {
        $model->save();
    }



    function addSearcher(string $property  , string $value)
    {
        return $this->model->where(function($where) use ($property , $value){

            $where->orWhere(DB::raw($property)  , "like" , $value."%")
                ->orWhere(DB::raw($property)  , "like" , "%".$value)
                ->orWhere(DB::raw($property) , "like" , "%".$value."%")
                ->orWhere(DB::raw($property)  , "like" , $value);

        });

    }





    ////// ==========================================================
    protected function resultJsonChangeStatus($resultAction , $fieldResult , $reverse = false , $field="status" , $finalValue=0){
        if ($resultAction){
            if ($fieldResult == 1){
                if ($reverse){
                    return response()->json(["status" => true , "checked" => false , "field" => $field  , "value" => $finalValue]);
                }
                else{
                    return response()->json(["status" => true , "checked" => true , "field" => $field , "value" => $finalValue]);
                }

            }
            else{
                if ($reverse){
                    return response()->json(["status" => true , "checked" => true , "field" => $field , "value" => $finalValue]);
                }
                else{
                    return response()->json(["status" => true , "checked" => false , "field" => $field , "value" => $finalValue]);
                }

            }
        }
        else{
            return response()->json(["status" => false]);
        }
    }



}

