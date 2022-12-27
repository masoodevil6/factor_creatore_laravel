<?php
namespace App\Repositories\InterFaceRepositories\Tickets;

use App\Repositories\InterFaceRepositories\IBaseRepository;

interface ITicketRepository extends IBaseRepository {

    public function SetVisitAllTicket($tickets);

}