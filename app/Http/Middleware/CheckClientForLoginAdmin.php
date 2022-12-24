<?php

namespace App\Http\Middleware;

use App\Models\AdminUser;
use App\Providers\RouteServiceProvider;
use App\Repositories\ContextRepository;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckClientForLoginAdmin
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
        $panelAdmin = ContextRepository::AdminUserRepository()->getLoginClientToPanelAdmin();

        if (isset($panelAdmin->id)){
            if (Auth::guard("admin")->check()){
                return redirect()->route(RouteServiceProvider::ADMIN_PANEL);
            }
            else{
                return $next($request);
            }
        }
        return redirect()->route(RouteServiceProvider::HOME);
    }
}
