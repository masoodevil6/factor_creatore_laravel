<?php
namespace App\Repositories\ModelRepositories;

use App\Repositories\InterFaceRepositories\IBaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use mysqli_sql_exception;

class BaseRepository  implements IBaseRepository {

    protected $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }



    function getAllResult()
    {
        return $this->model->all();
    }

    function getResult($resultId)
    {
        return  $this->model->find($resultId);
    }


    function addResult($result)
    {
        try{
            return $this->model->create($result);
        }
        catch (mysqli_sql_exception $e){
            return null;
        }
    }


    function updateResult($result) : bool
    {
        try{

            $this->model->update($result);
            dd($this->model->update($result));
            return true;
        }
        catch (mysqli_sql_exception $e){
            return false;
        }
    }


    function deleteResult($result) : bool
    {
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
        return $this->deleteResult($this->getResult($resultId));
    }



    function save($model) : void
    {
        $model->save();
    }


}

