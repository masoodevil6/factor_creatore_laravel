<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Admin\MainAdminController;
use App\Http\Requests\Admin\User\TicketCategoriesRequest;
use App\Models\Ticket\TicketCategory;
use Illuminate\Http\Request;

class TicketCategoriesAdminController extends MainAdminController
{

    function __construct()
    {
        parent::__construct(route("admin.user.ticket-categories.index"));
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

        $ticketCategories = TicketCategory::simplePaginate(15);

        return view("admin.user.ticket-category.index" , compact("nav" , "ticketCategories"));
    }



    public function create(){
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت کاربران",
            "navigation" =>[
                [
                    "route" => "admin.user.ticket-categories.index" ,
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

        return view("admin.user.ticket-category.create" , compact("nav"));
    }

    public function store(TicketCategoriesRequest $request){
        $input = $request->all();

        TicketCategory::create($input);

        return $this ->redirectIndex("دسته جدید با موفقیت اضافه شد");
    }




    public function edit(TicketCategory $ticketCategory){
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت کاربران",
            "navigation" =>[
                [
                    "route" => "admin.user.ticket-categories.index" ,
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

        return view("admin.user.ticket-category.create" , compact("nav" , "ticketCategory"));
    }

    public function update(TicketCategoriesRequest $request, TicketCategory $ticketCategory){
        $input = $request->all();

        $ticketCategory->update($input);

        return $this ->redirectIndex("دسته با موفقیت اصلاح شد");
    }




    public function destroy(TicketCategory $ticketCategory){
        $ticketCategory->delete();
        return $this ->redirectIndex("دسته با موفقیت حذف شد");
    }



    public function status(TicketCategory $ticketCategory){
        return $this->changeStatus($ticketCategory);
    }
}
