<?php

namespace App\Providers;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(GateContract $gate): void
    {
        $this->registerPolicies($gate);

        $gate->define('Admin',function($user){
            return $user->role == 'Admin' ;
        });
        $gate->define('Manager',function($user){
            return $user->role == 'Manager' ;
        });
        $gate->define('User',function($user){
            return $user->role == 'User' ;
        });
    }


}
