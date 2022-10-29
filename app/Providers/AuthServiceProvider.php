<?php

namespace App\Providers;

use Illuminate\Auth\Access\Response;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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


        // Gate::define('Usuario', function (User $user) {

        //     if ($user->tipoUsuario ==='Administrador') {
        //         return Response::allow();
        //     } else {
        //         return Response::deny('Você deve ser o Administrador');
        //     }
        // });

        //    Gate::define('Administrador', function (User $user) {

        //     if ($user->tipoUsuario === 'Administrador') {
        //         return Response::allow();
        //     }
        // });
    }
}
