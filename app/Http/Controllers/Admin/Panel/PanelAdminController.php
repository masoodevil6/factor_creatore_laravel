<?php

namespace App\Http\Controllers\Admin\Panel;

use App\Http\Controllers\Admin\MainAdminController;
use App\Http\Requests\Admin\Admin\AdminPanelsRequest;
use App\Http\Requests\Admin\Admin\AdminRequest;
use App\Models\Panel\Admin;
use App\Models\Panel\Panel;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;
use function Symfony\Component\HttpFoundation\add;
use function Symfony\Component\Mime\getTo;

class PanelAdminController extends MainAdminController
{


    function __construct()
    {
        parent::__construct(route("admin.panel.admin.index") );
    }




    public function index()
    {
        $nav = [
            "part"=> "بخش مدیریت ادمین ها",
            "navigation" =>[
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "لیست پنل ها "
                ]
            ]
        ];

        $admins = $this->getPublicListAdminPanels();

        return view("admin.admin.admin.index" , compact("nav" , "admins"));
    }




    public function create()
    {
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت ادمین ها",
            "navigation" =>[
                [
                    "route" => "admin.panel.admin.index" ,
                    "current" => 0,
                    "title" => "لیست پنل ها"
                ],
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "افزودن پنل"
                ]
            ]
        ];

        return view("admin.admin.admin.create" , compact("nav"));
    }


    public function store(AdminRequest $request)
    {
        $input = $request->all();

        ContextRepository::AdminRepository()->addResult($input);

        return $this ->redirectIndex("پنل جدید با موفقیت اضافه شد");
    }





    public function edit(Admin $admin)
    {
        $this->checkAccessNormalPanel($admin);

        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت ادمین ها",
            "navigation" =>[
                [
                    "route" => "admin.panel.admin.index" ,
                    "current" => 0,
                    "title" => "لیست پنل ها"
                ],
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "ویرایش پنل"
                ]
            ]
        ];

        return view("admin.admin.admin.create" , compact("nav" , "admin"));
    }

    public function update(AdminRequest $request, Admin $admin)
    {
        if ($this->checkNormalPanel($admin)){
            $input = $request->all();

            ContextRepository::AdminRepository()->updateResult($admin , $input);

            return $this ->redirectIndex("پنل مورد نظر با موفقیت ویرایش شد");
        }
        return $this->redirectErrorAccess();
    }




    public function panels(Admin $admin)
    {
        $this->checkAccessNormalPanel($admin);

        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت ادمین ها",
            "navigation" =>[
                [
                    "route" => "admin.panel.admin.index" ,
                    "current" => 0,
                    "title" => "لیست پنل ها"
                ],
                [
                    "route" => "admin.panel.admin.panels" ,
                    "valueRoute" => $admin->id ,
                    "current" => 0,
                    "title" => "پنل ".$admin->title
                ],
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "دسترسی ها"
                ]
            ]
        ];

        $panels = ContextRepository::PanelRepository()->getAllResult();

        $panels = $this->getTotalListPanels($panels , $admin);

        return view("admin.admin.admin.list-panels" , compact("nav" , "admin" , "panels"));
    }

    public function storePanels(AdminPanelsRequest $request, Admin $admin)
    {
        if ($this->checkNormalPanel($admin)){
            $inputs = $request->all()["panels"];

            ContextRepository::AdminRepository()->SyncPanelForAdminPanel($admin , $inputs);

            return $this ->redirectIndex("دسترسی ها پنل با موفقیت ثبت گردید");
        }
        return $this->redirectErrorAccess();
    }





    public function destroy(Admin $admin)
    {
        if ($this->checkNormalPanel($admin)){

            ContextRepository::AdminRepository()->deleteResult($admin);

            return $this ->redirectIndex("پنل مورد نظر با موفقیت حذف شد");
        }
        return $this->redirectErrorAccess();
    }





    public function status(Admin $admin){
        if ($this->checkNormalPanel($admin)){
            return $this->changeStatus($admin);
        }
        return false;
    }





    /////======================================
    /// model
    /// =======================================

    private function getPublicListAdminPanels(){

        $admins = ContextRepository::AdminRepository()->getAllResult();

        foreach ($admins As $key => $itemAdmin){
            if ($itemAdmin["main"] != 0){
                $admins->forget($key);
            }
        }

        return $admins;
    }

    private function checkAccessNormalPanel($admin){
        $checkAccess = $this->checkNormalPanel($admin);
        if (!$checkAccess){
            return $this->redirectErrorAccess();
        }
    }

    private function redirectErrorAccess(){
        return abort(404);
    }

    private function checkNormalPanel($admin){
        if ($admin->main == Admin::getPanelPass()){
            return false;
        }
        return true;
    }


}
