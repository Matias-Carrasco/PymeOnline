<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
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

        Gate::define('admin-only', function($user){
            if($user->rol_id == 1){
                return true;
            }
            return false;
        });

        Gate::define('cliente-only', function($user){
            if($user->rol_id == 2){
                return true;
            }
            return false;
        });

        Gate::define('tienda-only', function($user){
            if($user->rol_id == 3){
                return true;
            }
            return false;
        });

        Gate::define('invitado-only', function($user){
            if(Auth::check()){
               
                return true;
            }
            return false;
        });
    }
}
