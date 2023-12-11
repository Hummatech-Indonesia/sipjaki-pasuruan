<?php

namespace App\Providers;

use App\Models\Accident;
use App\Models\Classification;
use App\Models\ContractCategory;
use App\Models\Dinas;
use App\Models\Field;
use App\Models\FiscalYear;
use App\Models\FundSource;
use App\Models\HistoryLogin;
use App\Models\Image;
use App\Models\News;
use App\Models\Project;
use App\Models\Qualification;
use App\Models\QualificationLevel;
use App\Models\RuleCategory;
use App\Models\Rules;
use App\Models\ServiceProvider as ModelsServiceProvider;
use App\Models\SubClassification;
use App\Models\Training;
use App\Models\TrainingMember;
use App\Models\TrainingMethod;
use App\Models\User;
use App\Models\Worker;
use App\Observers\AccidentObserver;
use App\Observers\ClassificationObserver;
use App\Observers\ContractCategoryObserver;
use App\Observers\DinasObserver;
use App\Observers\FieldObserver;
use App\Observers\FiscalYearObserver;
use App\Observers\FundSourceObserver;
use App\Observers\HistoryLoginObserver;
use App\Observers\ImageObserver;
use App\Observers\NewsObserver;
use App\Observers\ProjectObserver;
use App\Observers\QualificationLevelObserver;
use App\Observers\QualificationObserver;
use App\Observers\RuleCategoriesObserver;
use App\Observers\RuleObserver;
use App\Observers\ServiceProviderObserver;
use App\Observers\SubClassificationOberserve;
use App\Observers\SubClassificationObserver;
use App\Observers\TrainingMemberObserver;
use App\Observers\TrainingMethodObserver;
use App\Observers\TrainingObserver;
use App\Observers\UserObserver;
use App\Observers\WorkerObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

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
        QualificationLevel::observe(QualificationLevelObserver::class);
        SubClassification::observe(SubClassificationObserver::class);
        TrainingMethod::observe(TrainingMethodObserver::class);
        Rules::observe(RuleObserver::class);
        ContractCategory::observe(ContractCategoryObserver::class);
        Dinas::observe(DinasObserver::class);
        Training::observe(TrainingObserver::class);
        Image::observe(ImageObserver::class);
        TrainingMember::observe(TrainingMemberObserver::class);
        Project::observe(ProjectObserver::class);
        Field::observe(FieldObserver::class);
        ModelsServiceProvider::observe(ServiceProviderObserver::class);
        Worker::observe(WorkerObserver::class);
        Accident::observe(AccidentObserver::class);
        HistoryLogin::observe(HistoryLoginObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
