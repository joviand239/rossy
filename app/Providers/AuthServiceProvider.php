<?php

namespace App\Providers;

use App\Auth\SessionGuardCustom;
use Illuminate\Auth\EloquentUserProvider;
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
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);
        \Auth::extend('sessionCustom', function ($app) {
            $provider = new EloquentUserProvider($app['hash'], config('auth.providers.users.model'));
            return new SessionGuardCustom('sessionCustom', $provider, app()->make('session.store'), request());
        }
        );
    }
}
