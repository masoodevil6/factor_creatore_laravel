<?php
namespace App\Repositories\ModelRepositories\Tickets;

use App\Models\Ticket\Ticket;
use App\Repositories\InterFaceRepositories\Tickets\ITicketRepository;
use App\Repositories\ModelRepositories\BaseRepository;


class TicketRepository extends BaseRepository implements ITicketRepository {

    public function __construct()
    {
        parent::__construct(new Ticket());
    }


    public function SetVisitAllTicket($tickets)
    {
        foreach($tickets As $itemTicket){
            if ($itemTicket->seen == 0){
                $this->model->where('id',$itemTicket->id)->update(['seen'=>1]);
            }
        }
    }
}