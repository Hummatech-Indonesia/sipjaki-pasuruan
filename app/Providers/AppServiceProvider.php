<?php

namespace App\Providers;

use App\Contracts\Interfaces\Auth\RegisterInterface;
use App\Contracts\Interfaces\ClassificationInterface;
use App\Contracts\Interfaces\ContractCategoryInterface;
use App\Contracts\Interfaces\DinasInterface;
use App\Contracts\Interfaces\FiscalYearInterface;
use App\Contracts\Interfaces\FundSourceInterface;
use App\Contracts\Interfaces\NewsInterface;
use App\Contracts\Interfaces\QualificationInterface;
use App\Contracts\Interfaces\QualificationLevelInterface;
use App\Contracts\Interfaces\RuleCategoriesInterface;
use App\Contracts\Interfaces\RuleInterface;
use App\Contracts\Interfaces\SubClassificationInterface;
use App\Contracts\Interfaces\TrainingInterface;
use App\Contracts\Interfaces\TrainingMethodInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Contracts\Repositories\Auth\RegisterRepository;
use App\Contracts\Repositories\ClassificationRepository;
use App\Contracts\Repositories\ContractCategoryRepository;
use App\Contracts\Repositories\FiscalYearRepository;
use App\Contracts\Repositories\FundSourceRepository;
use App\Contracts\Repositories\NewsRepository;
use App\Contracts\Repositories\QualificationLevelRepository;
use App\Contracts\Repositories\QualificationRepository;
use App\Contracts\Repositories\RuleCategoriesRepository;
use App\Contracts\Repositories\RuleRepository;
use App\Contracts\Repositories\SubClassificationRepository;
use App\Contracts\Repositories\TrainingMethodRepository;
use App\Contracts\Repositories\TrainingRepository;
use App\Contracts\Repositories\UserRepository;
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
        QualificationInterface::class => QualificationRepository::class,
        QualificationLevelInterface::class => QualificationLevelRepository::class,
        TrainingMethodInterface::class => TrainingMethodRepository::class,
        UserInterface::class => UserRepository::class,
        RuleInterface::class => RuleRepository::class,
        ContractCategoryInterface::class => ContractCategoryRepository::class,
        TrainingInterface::class => TrainingRepository::class
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
