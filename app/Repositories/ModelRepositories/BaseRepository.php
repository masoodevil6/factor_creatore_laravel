<?php
namespace App\Repositories\ModelRepositories;

use App\Repositories\InterFaceRepositories\IBaseRepository;
use Illuminate\Database\Eloquent\Model;
use mysqli_sql_exception;

class BaseRepository  implements IBaseRepository {

    protected $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }



    function getAllResult() : object
    {
        return $this->model->all();
    }

    function getResult($resultId) : object
    {
        return $this->model->find($resultId);
    }


    function addResult($result) : bool 
    {
        try{
            $this->model->create($result);
            return true;
        }
        catch (mysqli_sql_exception $e){
            return false;
        }
    }


    function updateResult($result) : bool
    {
        try{
            $this->model->update($result);
            return true;
        }
        catch (mysqli_sql_exception $e){
            return false;
        }
    }


    function deleteResult($result) : bool
    {
        try{
            if (gettype($result) == $this->model){
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


    function save($resultId) : void
    {
        $this->model->save();
    }

}