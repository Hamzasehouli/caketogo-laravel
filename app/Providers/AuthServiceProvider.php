<?php

namespace App\Providers;

use App\Models\Cake;
use App\Models\User;
use App\Policies\CakePolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
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
        Cake::class => CakePolicy::class,
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {

        $this->registerPolicies();

        ///Cake

        Gate::define('add.cake', [CakePolicy::class, 'create']);
        Gate::define('add.get', [CakePolicy::class, 'index']);
        Gate::define('destroy.cake', [CakePolicy::class, 'delete']);
        Gate::define('update.cake', [CakePolicy::class, 'update']);
        Gate::define('update.cake.view', [CakePolicy::class, 'updateCake']);
        Gate::define('edit.cake', [CakePolicy::class, 'edit']);

        ////User

        Gate::define('get.users', [UserPolicy::class, 'getAllUsers']);
        Gate::define('get.actives', [UserPolicy::class, 'getActives']);
        Gate::define('add.user', [UserPolicy::class, 'store']);
        Gate::define('update.user.view', [UserPolicy::class, 'updateView']);
        Gate::define('update.user', [UserPolicy::class, 'update']);
        Gate::define('show.user', [UserPolicy::class, 'show']);
        Gate::define('destroy.user', [UserPolicy::class, 'delete']);
        Gate::define('deactivate.user', [UserPolicy::class, 'deactivate']);
    }
}
