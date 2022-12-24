<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Admin\MainAdminController;
use App\Http\Requests\Admin\User\AnswerTicketRequest;
use App\Http\Requests\Admin\User\ChangeStatusTicketRequest;
use App\Models\Ticket\Ticket;
use App\Models\Ticket\TicketFolder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketsAdminController extends MainAdminController
{


    function __construct()
    {
        parent::__construct(route("admin.user.tickets.index"));
    }


    public function index()
    {
        $nav = [
            "part"=> "بخش مدیریت کاربران",
            "navigation" =>[
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "لیست تیکت ها"
                ]
            ]
        ];

        $ticketFolders = TicketFolder::getNewTicketFolder();

        return view("admin.user.ticket.index" , compact("nav" , "ticketFolders"));
    }




    public function answer(TicketFolder $ticketFolder)
    {
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت کاربران",
            "navigation" =>[
                [
                    "route" => "admin.user.tickets.index" ,
                    "current" => 0,
                    "title" => "لیست تیکت ها"
                ],
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "پاسخ به تیکت"
                ]
            ]
        ];

        foreach($ticketFolder->tickets As $itemTicket){
            if ($itemTicket->seen == 0){
                Ticket::where('id',$itemTicket->id)->update(['seen'=>1]);
            }
        }

        return view("admin.user.ticket.answer" , compact("nav" , "ticketFolder"));
    }

    public function submitAnswer( TicketFolder $ticketFolder, AnswerTicketRequest $request)
    {
        $thisRoute = route("admin.user.tickets.answer" , $ticketFolder->id);
        if ($ticketFolder->status["id"] == 1){
            $ticketText = $request->get("text");
            Ticket::create([
                "ticket_folder_id" => $ticketFolder->id,
                "admin_id" => Auth::id(),
                "text" => $ticketText,
                "seen" => 1,
            ]);

            return $this ->redirectIndex("پاسخ جدید با موفقیت ثبت شد" );
        }
        else{
            return $this ->redirectIndex("لطفا ابتدا وضعیت تیکت را در حالت باز قرار دهید" , true ,$thisRoute );
        }
    }

    public function changeStatusTicket( TicketFolder $ticketFolder, ChangeStatusTicketRequest $request)
    {
        $ticketFolder->update([
            "status" => $request->get("status")
        ]);
        return $this ->redirectIndex("وضعیت تیکت با موفقیت ثبت شد" , false , route("admin.user.tickets.answer" , $ticketFolder->id) );
    }

}
