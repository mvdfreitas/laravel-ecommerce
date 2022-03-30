<?php

namespace App\Providers;

use App\Interfaces\NewsLetterEmailRepositoryInterface;
use App\Repositories\NewsLetterEmailRepository;
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
