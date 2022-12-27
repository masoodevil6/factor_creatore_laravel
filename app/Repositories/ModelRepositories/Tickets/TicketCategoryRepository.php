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


}