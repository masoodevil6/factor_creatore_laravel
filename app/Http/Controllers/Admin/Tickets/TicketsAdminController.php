<?php

namespace App\Http\Controllers\Admin\Tickets;

use App\Http\Controllers\Admin\MainAdminController;
use App\Http\Requests\Admin\User\AnswerTicketRequest;
use App\Http\Requests\Admin\User\ChangeStatusTicketRequest;
use App\Models\Ticket\Ticket;
use App\Models\Ticket\TicketFolder;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketsAdminController extends MainAdminController
{


    function __construct()
    {
        parent::__construct(route("admin.tickets.ticket.index"));
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

        $ticketFolders = ContextRepository::TicketFolderRepository()->GetNewTicketFolder();

        return view("admin.ticket.ticket.index" , compact("nav" , "ticketFolders"));
    }




    public function answer(TicketFolder $ticketFolder)
    {
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت کاربران",
            "navigation" =>[
                [
                    "route" => "admin.tickets.ticket.index" ,
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

        ContextRepository::TicketRepository()->SetVisitAllTicket($ticketFolder->tickets);

        return view("admin.ticket.ticket.answer" , compact("nav" , "ticketFolder"));
    }

    public function submitAnswer( TicketFolder $ticketFolder, AnswerTicketRequest $request)
    {
        $thisRoute = route("admin.tickets.ticket.answer" , $ticketFolder->id);

        if (ContextRepository::TicketFolderRepository()->AnswerTicketFolder($ticketFolder , $request->get("text"))){
            return $this ->redirectIndex("پاسخ جدید با موفقیت ثبت شد" );
        }
        return $this ->redirectIndex("لطفا ابتدا وضعیت تیکت را در حالت باز قرار دهید" , true ,$thisRoute );
    }

    public function changeStatusTicket( TicketFolder $ticketFolder, ChangeStatusTicketRequest $request)
    {
        ContextRepository::TicketFolderRepository()->updateResult($ticketFolder , ["status" => $request->get("status")]);

        return $this ->redirectIndex("وضعیت تیکت با موفقیت ثبت شد" , false , route("admin.tickets.ticket.answer" , $ticketFolder->id) );
    }

}
