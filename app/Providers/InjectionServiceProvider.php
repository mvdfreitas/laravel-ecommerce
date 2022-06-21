<?php

namespace App\Providers;

use App\Interfaces\CategoriaRepositoryInterface;
use App\Interfaces\ClienteRepositoryInterface;
use App\Interfaces\ColaboradorRepositoryInterface;
use App\Interfaces\NewsLetterEmailRepositoryInterface;
use App\Interfaces\PermissionRepositoryInterface;
use App\Interfaces\RoleRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\CategoriaRepository;
use App\Repositories\ClienteRepository;
use App\Repositories\ColaboradorRepository;
use App\Repositories\NewsLetterEmailRepository;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class InjectionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(NewsLetterEmailRepositoryInterface::class, NewsLetterEmailRepository::class);
        $this->app->bind(ClienteRepositoryInterface::class, ClienteRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ColaboradorRepositoryInterface::class, ColaboradorRepository::class);
        $this->app->bind(CategoriaRepositoryInterface::class, CategoriaRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
