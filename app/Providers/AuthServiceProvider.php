<?php

namespace App\Providers;

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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Ayuda a identificar y diferencuar entre inquilinos(vendedores) y clientes de estos inquilinos
        if (app(\Hyn\Tenancy\Environment::class)->hostname()) {
            auth()->getProvider()->setModel(\App\Models\Tenant\User::class);
        }
    }
}
