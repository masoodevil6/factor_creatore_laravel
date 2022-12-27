<?php

namespace App\Http\Controllers\Admin\Tickets;

use App\Http\Controllers\Admin\MainAdminController;
use App\Http\Requests\Admin\User\TicketCategoriesRequest;
use App\Models\Ticket\TicketCategory;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;

class TicketCategoriesAdminController extends MainAdminController
{

    function __construct()
    {
        parent::__construct(route("admin.tickets.ticket-category.index"));
    }


    public function index(){
        $nav = [
            "part"=> "بخش مدیریت کاربران",
            "navigation" =>[
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "لیست دسته بندی تیکت ها"
                ]
            ]
        ];

        $ticketCategories = ContextRepository::TicketCategoryRepository()->getPaginateResult();

        return view("admin.ticket.ticket-category.index" , compact("nav" , "ticketCategories"));
    }



    public function create(){
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت کاربران",
            "navigation" =>[
                [
                    "route" => "admin.tickets.ticket-category.index" ,
                    "current" => 0,
                    "title" => "لیست دسته بندی ها"
                ],
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "افزودن دسته جدید"
                ]
            ]
        ];

        return view("admin.ticket.ticket-category.create" , compact("nav"));
    }

    public function store(TicketCategoriesRequest $request){
        $input = $request->all();

        ContextRepository::TicketCategoryRepository()->addResult($input);

        return $this ->redirectIndex("دسته جدید با موفقیت اضافه شد");
    }




    public function edit(TicketCategory $ticketCategory){
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت کاربران",
            "navigation" =>[
                [
                    "route" => "admin.tickets.ticket-category.index" ,
                    "current" => 0,
                    "title" => "لیست دسته بندی ها"
                ],
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "ویرایش دسته"
                ]
            ]
        ];

        return view("admin.ticket.ticket-category.create" , compact("nav" , "ticketCategory"));
    }

    public function update(TicketCategoriesRequest $request, TicketCategory $ticketCategory){
        $input = $request->all();

        ContextRepository::TicketCategoryRepository()->updateResult($ticketCategory , $input);

        return $this ->redirectIndex("دسته با موفقیت اصلاح شد");
    }




    public function destroy(TicketCategory $ticketCategory){
        ContextRepository::TicketCategoryRepository()->deleteResult($ticketCategory);
        return $this ->redirectIndex("دسته با موفقیت حذف شد");
    }



    public function status(TicketCategory $ticketCategory){
        $result = ContextRepository::TicketCategoryRepository()->changeStatusResult($ticketCategory);
        if ($result["status"]){
            return $result["exp"];
        }
    }
}
