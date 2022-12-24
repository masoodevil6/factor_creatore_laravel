<?php

namespace App\Http\Controllers\Admin\Password;

use App\Http\Controllers\Admin\MainAdminController;
use App\Http\Controllers\PanelCustomerController;
use App\Http\Requests\Admin\Password\PasswordRequest;
use App\Http\Services\Messages\Email\EmailService;
use App\Http\Services\Messages\MessageService;
use App\Models\AdminUser;
use App\Models\Publics\Setting;
use App\Models\RequestChangePassword;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Nette\Utils\DateTime;

class PasswordAdminController extends MainAdminController
{

    private $expireRequestTokenMinute = 30;


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

        $adminPanel = Auth::guard("admin")->user();
        $adminPanelPassword = $adminPanel->password;

        if (Hash::check($data["last_password"] , $adminPanelPassword)){
            $user = $adminPanel->user;
            $token =  Str::random(35);

            $existRequest = RequestChangePassword::where("user_email" , $user->email )->first();

            if (empty($existRequest) || (!empty($existRequest) && Carbon::parse($existRequest-> created_at)->addMinutes($this->expireRequestTokenMinute) < Carbon::now())){
                RequestChangePassword::create([
                    "user_email" => $user->email ,
                    "user_password" => Hash::make($data["password"]) ,
                    "token" => $token,
                    "active" => 1
                ]);

                $this->sendTokenEmailForClient($token , $user->email);

                return $this->redirectIndex("ایمیل تایید درخواست برای شما ارسال گشت");
            }
            else{
                return $this->redirectIndex("شما در طول 30 دقیقه گذشته درخواستی تغییر رمزی را ارسال کرده اید [محدودیت درخواست]" , true);
            }

        }
        else{
            return $this->redirectIndex("رمز وارد شده صحیح نمی باشد" , true);
        }

    }



    ////////// =================================================
    /// Send Token For Password
    /// ========================================================

    public function getRequestTokenForChangePassword(RequestChangePassword $requestChangePassword){

        $user = User::where("email" , $requestChangePassword->user_email)->first();
        $adminUser = $user->admin;

        if (!empty($adminUser)){

            if ($requestChangePassword->active == 1 && Carbon::parse($requestChangePassword-> created_at)->addMinutes($this->expireRequestTokenMinute) >= Carbon::now()){

                $adminUser->update([
                   "password" =>  $requestChangePassword->user_password
                ]);

                $requestChangePassword->update([
                    "active" => 0
                ]);

                return $this->redirectIndex("درخواست با موفقیت اعمال گشت" , false , route("admin.home"));
            }
            else{
                return $this->redirectIndex("تاریخ درخواست منقضی شده است، لذا دوباره تلاش نمایید" , true);
            }

        }
        else{
            return redirect()->route("home");
        }

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


