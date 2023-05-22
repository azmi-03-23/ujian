<?php

namespace App\Providers;


use App\Models\User;
use App\Models\Customer;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        //automatic
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('customer-update-membership', function(User $user, Customer $customer){
            return $user->role == 'SuperAdmin'
                ? Response::allow()
                : Response::deny('You must be a Super Admin to assign/revoke membership.');
        });
    }
}
