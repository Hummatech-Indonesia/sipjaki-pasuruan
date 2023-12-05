<?php

namespace App\Providers;

use App\Models\Classification;
use App\Models\Dinas;
use App\Models\FiscalYear;
use App\Models\FundSource;
use App\Models\News;
use App\Models\Qualification;
use App\Models\QualificationLevel;
use App\Models\RuleCategory;
use App\Models\SubClassification;
use App\Models\TrainingMethod;
use App\Models\User;
use App\Observers\ClassificationObserver;
use App\Observers\DinasObserver;
use App\Observers\FiscalYearObserver;
use App\Observers\FundSourceObserver;
use App\Observers\NewsObserver;
use App\Observers\QualificationObserver;
use App\Observers\RuleCategoriesObserver;
use App\Observers\SubClassificationOberserve;
use App\Observers\SubClassificationObserver;
use App\Observers\TrainingMethodObserver;
use App\Observers\UserObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        News::observe(NewsObserver::class);
        User::observe(UserObserver::class);
        RuleCategory::observe(RuleCategoriesObserver::class);
        Classification::observe(ClassificationObserver::class);
        FundSource::observe(FundSourceObserver::class);
        FiscalYear::observe(FiscalYearObserver::class);
        Qualification::observe(QualificationObserver::class);
        QualificationLevel::observe(QualificationLevel::class);
        SubClassification::observe(SubClassificationObserver::class);
        TrainingMethod::observe(TrainingMethodObserver::class);
        Dinas::observe(DinasObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
