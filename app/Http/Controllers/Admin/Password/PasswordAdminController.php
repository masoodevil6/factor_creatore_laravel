<?php

namespace App\Http\Controllers\Admin\Password;

use App\Http\Controllers\Admin\MainAdminController;

use App\Http\Requests\Admin\Password\PasswordRequest;
use App\Http\Services\Messages\Email\EmailService;
use App\Http\Services\Messages\MessageService;
use App\Repositories\ContextRepository;
use Illuminate\Support\Facades\Hash;


class PasswordAdminController extends MainAdminController
{



    function __construct()
    {
        parent::__construct(route("admin.password.change-password"));
    }

    public function changePassword(){
        $nav = [
            "part"=> "مدیریت رمز ادمین",
            "navigation" =>[
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "تغییر رمز ادمین"
                ]
            ]
        ];

        return view("admin.password.index" , compact("nav" ));
    }



    public function sendTokenForChangePassword(PasswordRequest $request){

        $data = $request->all();

        $userEmail = ContextRepository::AdminUserRepository()->GetEmailAdminAuth($data["last_password"]);

        if (!empty($userEmail)){

            if (ContextRepository::RequestChangePasswordRepository()->CheckExistLastRequest($userEmail)){

                $token = ContextRepository::RequestChangePasswordRepository()->CreateRequestToken($userEmail ,$data["password"]);

                $this->sendTokenEmailForClient($token , $userEmail);

                return $this->redirectIndex("ایمیل تایید درخواست برای شما ارسال گشت");
            }

            return $this->redirectIndex("شما در طول 30 دقیقه گذشته درخواستی تغییر رمزی را ارسال کرده اید [محدودیت درخواست]" , true);
        }

        return $this->redirectIndex("رمز وارد شده صحیح نمی باشد" , true);
    }



    ////////// =================================================
    /// Send Token For Password
    /// ========================================================

    public function getRequestTokenForChangePassword($token){

        $requestChangePassword = ContextRepository::RequestChangePasswordRepository()->CheckValidRequestToken($token);

        if (!empty($requestChangePassword)){
            $user = ContextRepository::UserRepository()->GetUserWithEmail($requestChangePassword->user_email);
            $adminUser = $user->admin;

            if (!empty($adminUser)){

                ContextRepository::AdminUserRepository()->updateResult($adminUser , ["password" =>  $requestChangePassword->user_password]);

                ContextRepository::RequestChangePasswordRepository()->updateResult($requestChangePassword, [ "active" => 0 ]);

                return $this->redirectIndex("درخواست با موفقیت اعمال گشت" , false , route("admin.home"));
            }
            else{
                return redirect()->route("home");
            }
        }

        return $this->redirectIndex("تاریخ درخواست منقضی شده است، لذا دوباره تلاش نمایید" , true);
    }





    ////////// =================================================
    /// Model
    /// ========================================================
    protected function sendTokenEmailForClient($token , $userEmail){

        $body = " 
<td style='display: block'>
   <p style='text-align: center; font-family: Tahoma'>
       لینک تایید درخواست تغییر رمز پنل:
   </p>
    <a href='".route("admin.password.get-request-token" , $token)."' style='border-radius:5px ;border-color:#777575;border-style:solid;border-width:2px;padding:10px 20px;line-height:45px;background-color:#5092ff;font-family: Tahoma;color:white;text-decoration:none; display: block;width: 100px;text-align: center; margin: auto'   class='btn btn-success d-block mx-auto mt-2'>
        <b>
            لـینک تایـید
        </b>
    </a>
</td>";


        $details = [
            "title" => "تغییر رمز عبور" ,
            "body" => $body
        ];

        $emailService = new EmailService();
        $emailService->setDetails($details);
        $emailService->setFrom();
        $emailService->setSubject("تایید درخواست تغییر رمز پنل");
        $emailService->setTo($userEmail);

        $messageService = new MessageService($emailService);

        return $messageService->send();
    }

}
?>


