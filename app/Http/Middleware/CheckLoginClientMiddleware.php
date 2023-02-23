<?php

namespace App\Http\Middleware;

use App\Http\Services\Login\CheckLogin;
use App\Providers\RouteServiceProvider;
use App\Repositories\ContextRepository;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLoginClientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();
        $inputLogin = $request->header("inputLogin");
        $checkLogin = new CheckLogin();
        $resultLogin = $checkLogin->checkLastLogin($token , $inputLogin);
        if ($resultLogin["isValid"] && $resultLogin["status"]){
            $request->merge(["otp" => $resultLogin["otp"]]);
            return $next($request);
        }
        return response()->json(['error' => 'Unauthenticated.'], 401);
    }
}
