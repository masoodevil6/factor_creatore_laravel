<?php
namespace App\Repositories\ModelRepositories\Tickets;

use App\Models\Ticket\TicketCategory;
use App\Repositories\InterFaceRepositories\Tickets\ITicketCategoryRepository;
use App\Repositories\ModelRepositories\BaseRepository;


class TicketCategoryRepository extends BaseRepository implements ITicketCategoryRepository {

    public function __construct()
    {
        parent::__construct(new TicketCategory());
    }


    function SearchFormCategory($categoryTitle = "", $numInPage = 15)
    {
        if ($categoryTitle != ""){
            $this->model = $this->addSearcher('title' , $categoryTitle);
        }
        return $this->model->paginate($numInPage);
    }
}