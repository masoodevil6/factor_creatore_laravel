<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Admin\LoginAdminRequest;
use App\Http\Services\RedirectRoute\RedirectRouteService;
use App\Models\AdminUser;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use function Symfony\Component\Mime\Header\get;

class LoginAdminPanelCustomerController extends Controller
{

    //use AuthenticatableUser;

    public function formLogin(){

        $isMaxRequest = 0;
        if (isset($_GET["is-max-request"])){
            $isMaxRequest = $_GET["is-max-request"];
        }

        //dd(Auth::guard("admin")->check());
        $user = Auth::user();

        return view("admin.auth.index" , compact("user" , "isMaxRequest"));
    }



    public function commitLogin(LoginAdminRequest $request){

        $myPassword = $request->get("password");

        $user= Auth::user();

        $panel = $user->admins()->first();
        if (!empty($panel)){
            $password = $panel->pivot->password;

            if (Hash::check($myPassword , $password)){
                $panelClass = AdminUser::where("user_id" , $user->id)->first();
                Auth::guard("admin")->login($panelClass);
                return redirect()->route("admin.home");
            }
            else{
                return RedirectRouteService::setMsgResultText("پسورد وارد شده صحیح نمی باشد ...")
                    ->doRedirectRouteErrorResult()
                    ->setRouteRedirect(route("admin-auth.form-login"))
                    ->doRedirect();
            }
        }
        else{
           return redirect()->route("home");
        }
    }




    public function logout(){
        Auth::guard("admin")->logout();
        return redirect()->route(RouteServiceProvider::CUSTOMER_HOME);
    }



}
