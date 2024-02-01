<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Gate\AdminGate;
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

        // Gate::define('isAdmin', function ($user) {
        //     return $user->role_id === 3;
        // });
        Gate::define('isAdmin', [AdminGate::class, 'check_admin']);
        Gate::define('isRegular', [AdminGate::class, 'check_regular_user']);
        Gate::define('isModerator', [AdminGate::class, 'check_moderator_user']);
    }
}
