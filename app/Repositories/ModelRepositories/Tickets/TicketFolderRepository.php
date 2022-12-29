<?php
namespace App\Repositories\ModelRepositories\Tickets;

use App\Models\Ticket\TicketFolder;
use App\Repositories\ContextRepository;
use App\Repositories\InterFaceRepositories\Tickets\ITicketFolderRepository;
use App\Repositories\ModelRepositories\BaseRepository;
use Illuminate\Support\Facades\DB;


class TicketFolderRepository extends BaseRepository implements ITicketFolderRepository {

    public function __construct()
    {
        parent::__construct(new TicketFolder());
    }


    public function SearchTicketFolder(string $userName="", int $Status=-1, int $ticketCategory=0 , $numInPage=15)
    {

        if ($userName != ""){
            $this->model = $this->model->join('users', function($join) use ($userName){
                $join->on('ticket_folders.user_id', "=", 'users.id');
                $join
                    ->where(DB::raw("CONCAT(users.`name`, ' ', users.`family`)")  , "like" , $userName."%")
                    ->orWhere(DB::raw("CONCAT(users.`name`, ' ', users.`family`)")  , "like" , "%".$userName)
                    ->orWhere(DB::raw("CONCAT(users.`name`, ' ', users.`family`)")  , "like" , "%".$userName."%")
                    ->orWhere(DB::raw("CONCAT(users.`name`, ' ', users.`family`)")  , "like" , $userName);
            });
        }

        if (in_array($Status , [0 , 1])){
            $this->model = $this->model->where('ticket_folders.status' , $Status);
        }

        if ($ticketCategory > 0){
            $this->model = $this->model->where('ticket_folders.ticket_category_id' , $ticketCategory);
        }

        return $this->model->withCount("ticketsNotSeen")->orderBy("tickets_not_seen_count" , "desc")->paginate($numInPage);
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