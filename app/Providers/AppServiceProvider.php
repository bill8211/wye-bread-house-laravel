<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Administradores y Empleados pueden entrar al panel
        Gate::define('access-admin', function (User $user) {
            $role = trim(strtolower($user->role));
            return in_array($role, ['admin', 'employee']);
        });

        // Solo el Administrador puede gestionar usuarios y productos
        Gate::define('manage-users', function (User $user) {
            $role = trim(strtolower($user->role));
            return $role === 'admin';
        });
    }
}