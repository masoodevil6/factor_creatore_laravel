<?php
namespace App\Repositories\InterFaceRepositories\Tickets;

use App\Models\Ticket\TicketFolder;
use App\Repositories\InterFaceRepositories\IBaseRepository;

interface ITicketFolderRepository extends IBaseRepository {

    public function GetNewTicketFolder($numInPage=15);

    public function AnswerTicketFolder(TicketFolder $ticketFolder , string $ticketText) : bool;

}