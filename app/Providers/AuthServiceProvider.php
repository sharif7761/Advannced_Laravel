<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\MemberPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        User::class => MemberPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('subscribers-only', function (User $user) {
            if($user->subscriber == User::SUBSCRIBED) {
                return true;
            } else {
                return false;
            }
        });

        Gate::define('premium_members_only', 'App\Policies\MemberPolicy@premiumMembersOnly');
    }
}
