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




    function GetAllTicketFolderAuthUser()
    {
        return $this->model
            ->where("user_id" , ContextRepository::UserRepository()->GetUserAuthId())
            ->get();
    }

    function GetSelectedTicketFolderAuthUser(int $ticketFolderId)
    {

        $tickets = $this->model
            ->select("*")
            ->leftjoin("tickets" ,"tickets.ticket_folder_id" , "=" , "ticket_folders.id")
            ->where("ticket_folders.id" , $ticketFolderId)
            ->where("ticket_folders.user_id" , ContextRepository::UserRepository()->GetUserAuthId())
            ->get();

        return $this->readyTicketsTopToDown($tickets);
    }


    function SubmitTicketAuthUser($ticketCategoryId , $ticketFolderId , $title , $text)
    {
        if ($ticketCategoryId == 0){
            $ticketCategoryId = null;
        }

        $isTrue= false;
        if ($ticketFolderId != null && $ticketFolderId > 0){

            $ticketFolder = $this->model
                ->where("id" , $ticketFolderId)
                ->where("user_id" ,  ContextRepository::UserRepository()->GetUserAuthId())
                ->first();

            if (!empty($ticketFolder) && $ticketFolder->status["id"] == 1){

                ContextRepository::TicketRepository()->addResult([
                    "ticket_folder_id" => $ticketFolderId ,
                    "text" => $text ,
                ]);

                $isTrue = true;
            }

        }
        else{

            $ticketFolder = $this->addResult([
                "ticket_category_id" => $ticketCategoryId ,
                "user_id" =>  ContextRepository::UserRepository()->GetUserAuthId() ,
                "title" => $title ,
                "status" => 1
            ]);

            ContextRepository::TicketRepository()->addResult([
                "ticket_folder_id" => $ticketFolder->id ,
                "text" => $text ,
            ]);

            $isTrue = true;
        }

        return $isTrue;
    }




    ///// ========================================
    private function readyTicketsTopToDown($tickets){
        $resultExp = [
            "parent"=>[],
            "children"=>[],
        ];

        if (sizeof($tickets) > 0){

            foreach ($tickets As $key => $item){
                if ($key == 0){
                    $resultExp["parent"] = $item;
                }
                else {
                    array_push($resultExp["children"] , $item);
                }
            }
        }

        return $resultExp;
    }



}