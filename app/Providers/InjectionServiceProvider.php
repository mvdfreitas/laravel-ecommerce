<?php

namespace App\Providers;

use App\Interfaces\ClienteRepositoryInterface;
use App\Interfaces\NewsLetterEmailRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\ClienteRepository;
use App\Repositories\NewsLetterEmailRepository;
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
