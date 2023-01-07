<?php
namespace App\Repositories\InterFaceRepositories\Subscribes;

use App\Repositories\InterFaceRepositories\IBaseRepository;

interface ISubscribeRepository extends IBaseRepository {

    function SearchSubscribe(string $subscribeName="" , $numInPage=15);


    function GetLimitRandomSelectedSubscribe(int $limitSubscribe=10 , int $limitForm=6);

    function GetListSubscribes($numInPage=8 , int $limitForm=6);


    function GetInfoSubscribe($slug  , $numInPage=8);


    function GetSlugSubscribeForm($subscribe_id);

}