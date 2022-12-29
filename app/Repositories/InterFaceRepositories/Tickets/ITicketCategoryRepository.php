<?php
namespace App\Repositories\InterFaceRepositories\Tickets;

use App\Repositories\InterFaceRepositories\IBaseRepository;

interface ITicketCategoryRepository extends IBaseRepository {

    function SearchFormCategory($categoryTitle="" , $numInPage=15);

}