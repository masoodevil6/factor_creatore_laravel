<?php

namespace App\Http\Controllers\Admin\Publics;


use App\Http\Controllers\Admin\MainAdminController;
use App\Http\Requests\Admin\Publics\UnitRequest;
use App\Models\Publics\Unit;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;

class UnitAdminController extends MainAdminController
{

    function __construct()
    {
        parent::__construct(route("admin.public.unit.index"));
    }



    public function index(){
        $nav = [
            "part"=> "بخش مدیریت واحدها",
            "navigation" =>[
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "لیست واحدها"
                ]
            ]
        ];

        $units = ContextRepository::UnitRepository()->getPaginateResult();

        return view("admin.publics.Unit.index" , compact("nav" , "units"));
    }



    public function create(){
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت واحدها",
            "navigation" =>[
                [
                    "route" => "admin.public.unit.index" ,
                    "current" => 0,
                    "title" => "لیست واحدها"
                ],
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "افزودن واحد"
                ]
            ]
        ];

        return view("admin.publics.Unit.create" , compact("nav"));
    }

    public function store(UnitRequest $request){
        $input = $request->all();
        ContextRepository::UnitRepository()->addResult($input);
        return $this ->redirectIndex("واحد جدید با موفقیت اضافه شد");
    }




    public function edit(Unit $unit){
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت واحدها",
            "navigation" =>[
                [
                    "route" => "admin.public.unit.index" ,
                    "current" => 0,
                    "title" => "لیست واحدها"
                ],
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "ویرایش واحد"
                ]
            ]
        ];

        return view("admin.publics.Unit.create" , compact("nav" , "unit"));
    }

    public function update(UnitRequest $request, Unit $unit){
        $input = $request->all();
        ContextRepository::UnitRepository()->updateResult($unit , $input);
        return $this ->redirectIndex("واحد با موفقیت اصلاح شد");
    }



    public function destroy(Unit $unit){
        ContextRepository::UnitRepository()->deleteResult($unit);
        return $this ->redirectIndex("واحد با موفقیت حذف شد");
    }

}
