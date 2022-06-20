<?php

namespace App\Providers;

use App\Models\Permission;
use Exception;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class PermissionsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        try {
            Permission::get()->map(function ($permission) {
                Gate::define($permission->slug, function ($colaborador) use ($permission) {
                    return $colaborador->hasPermissionTo($permission);
                });
            });
        } catch (Exception $ex) {
            report($ex);
            return false;
        }

        Blade::directive('role', function ($role) {
            return "if(auth()->check() && auth()->colaborador()->hasRole({$role})) :";
        });

        Blade::directive('endrole', function ($role) {
            return "endif;";
        });
    }
}
