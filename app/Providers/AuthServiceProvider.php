<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Repositories\ContextRepository;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use function Termwind\ValueObjects\pr;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Auth::viaRequest('custom-token', function ($request) {
            return ContextRepository::OtpRepository()->checkLastLogin($request->bearerToken() , $request->header("inputLogin"));
        });
    }
}
