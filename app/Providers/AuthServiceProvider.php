<?php

namespace App\Providers;

use App\Models\Cake;
use App\Policies\CakePolicy;
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
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('add.cake', [CakePolicy::class, 'create']);
        Gate::define('add.get', [CakePolicy::class, 'index']);
        Gate::define('destroy.cake', [CakePolicy::class, 'delete']);
        Gate::define('update.cake', [CakePolicy::class, 'update']);
        Gate::define('edit.cake', [CakePolicy::class, 'edit']);
    }
}
