<?php

namespace App\Providers;

use App\Contracts\Interfaces\Auth\RegisterInterface;
use App\Contracts\Interfaces\ClassificationInterface;
use App\Contracts\Repositories\Auth\RegisterRepository;
use App\Contracts\Repositories\ClassificationRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    private array $register = [
        RegisterInterface::class => RegisterRepository::class,
        ClassificationInterface::class => ClassificationRepository::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach ($this->register as $index => $value) $this->app->bind($index, $value);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
