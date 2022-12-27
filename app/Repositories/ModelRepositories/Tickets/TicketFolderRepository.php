<?php
namespace App\Repositories\ModelRepositories\Tickets;

use App\Models\Ticket\TicketFolder;
use App\Repositories\ContextRepository;
use App\Repositories\InterFaceRepositories\Tickets\ITicketFolderRepository;
use App\Repositories\ModelRepositories\BaseRepository;


class TicketFolderRepository extends BaseRepository implements ITicketFolderRepository {

    public function __construct()
    {
        parent::__construct(new TicketFolder());
    }


    public function GetNewTicketFolder($numInPage=15)
    {
        return TicketFolder::withCount("ticketsNotSeen")->orderBy("tickets_not_seen_count" , "desc")->simplePaginate($numInPage);
    }

    public function AnswerTicketFolder(TicketFolder $ticketFolder , string $ticketText): bool
    {
        if ($ticketFolder->status["id"] == 1){
            ContextRepository::TicketRepository()->addResult([
                "ticket_folder_id" => $ticketFolder->id,
                "admin_id" => ContextRepository::AdminUserRepository()->GetUserAdminAuth()->user_id,
                "text" => $ticketText,
                "seen" => 1,
            ]);

            return true;
        }
        return false;

    }
}