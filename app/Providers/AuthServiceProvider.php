<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;

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
    public function boot(GateContract $gate)
    {
        $this->registerPolicies();

        $gate->define('isAdmin',function($user)
        {
            return $user->usertype =='admin';
        });

        $gate->define('isTeacher',function($user)
        {
            return $user->usertype =='teacher';
        });
        $gate->define('isUser',function($user)
        {
            return $user->usertype =='user';
        });

        $gate->define('isCoordinator',function($user)
        {
            return $user->usertype =='coordinator';
        });
        $gate->define('isSponsor',function($user)
        {
            return $user->usertype =='sponsor';
        });
    }
}
