<?php
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('create-job', function ($user) {
            return $user->hasRole('admin');
        });

        Gate::define('edit-job', function ($user) {
            return $user->hasRole('admin');
        });

        Gate::define('delete-job', function ($user) {
            return $user->hasRole('admin');
        });
    }
}
