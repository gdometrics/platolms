<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Define User Access to Admin Portal
        Gate::define('admin-access', function ($user) 
        {
            return $user->getHighestRole()->name !== env('STUDENT_LABEL', 'Student');
        });

        // Define User Access to Student Portal
        Gate::define('portal-access', function ($user) 
        {
            return $user->getHighestRole()->name == env('STUDENT_LABEL', 'Student');
        });

    }
}
