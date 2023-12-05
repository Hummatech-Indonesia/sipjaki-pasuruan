<?php

namespace App\Providers;

use App\Contracts\Interfaces\Auth\RegisterInterface;
use App\Contracts\Interfaces\ClassificationInterface;
use App\Contracts\Interfaces\FiscalYearInterface;
use App\Contracts\Interfaces\FundSourceInterface;
use App\Contracts\Interfaces\NewsInterface;
use App\Contracts\Interfaces\RuleCategoriesInterface;
use App\Contracts\Interfaces\SubClassificationInterface;
use App\Contracts\Interfaces\TrainingMethodInterface;
use App\Contracts\Repositories\Auth\RegisterRepository;
use App\Contracts\Repositories\ClassificationRepository;
use App\Contracts\Repositories\FiscalYearRepository;
use App\Contracts\Repositories\FundSourceRepository;
use App\Contracts\Repositories\NewsRepository;
use App\Contracts\Repositories\RuleCategoriesRepository;
use App\Contracts\Repositories\SubClassificationRepository;
use App\Contracts\Repositories\TrainingMethodRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    private array $register = [
        RegisterInterface::class => RegisterRepository::class,
        ClassificationInterface::class => ClassificationRepository::class,
        NewsInterface::class => NewsRepository::class,
        RuleCategoriesInterface::class => RuleCategoriesRepository::class,
        FundSourceInterface::class => FundSourceRepository::class,
        SubClassificationInterface::class => SubClassificationRepository::class,
        FiscalYearInterface::class => FiscalYearRepository::class,
        TrainingMethodInterface::class => TrainingMethodRepository::class
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
