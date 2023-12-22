<?php

namespace App\Providers;

use App\Models\Accident;
use App\Models\AmendmentDeed;
use App\Models\Association;
use App\Models\Classification;
use App\Models\ClassificationTraining;
use App\Models\ConsultantProject;
use App\Models\ContractCategory;
use App\Models\Dinas;
use App\Models\ExecutorProject;
use App\Models\FiscalYear;
use App\Models\FoundingDeed;
use App\Models\FundSource;
use App\Models\HistoryLogin;
use App\Models\Image;
use App\Models\News;
use App\Models\Officer;
use App\Models\Project;
use App\Models\Qualification;
use App\Models\QualificationLevel;
use App\Models\QualificationLevelTraining;
use App\Models\QualificationTraining;
use App\Models\RuleCategory;
use App\Models\Rule;
use App\Models\ServiceProvider as ModelsServiceProvider;
use App\Models\ServiceProviderProject;
use App\Models\ServiceProviderQualification;
use App\Models\SubClassification;
use App\Models\SubClassificationTraining;
use App\Models\SubQualificationTraining;
use App\Models\Training;
use App\Models\TrainingMember;
use App\Models\TrainingMethod;
use App\Models\Type;
use App\Models\Verification;
use App\Models\Worker;
use App\Models\WorkerCertificate;
use App\Observers\AccidentObserver;
use App\Observers\AmendmendDeedObserver;
use App\Observers\AssociationObserver;
use App\Observers\ClassificationObserver;
use App\Observers\ClassificationTrainingObserver;
use App\Observers\ConstultantProjectObserver;
use App\Observers\ContractCategoryObserver;
use App\Observers\DinasObserver;
use App\Observers\ExecutorProjectObserver;
use App\Observers\FiscalYearObserver;
use App\Observers\FoundingDeedObserver;
use App\Observers\FundSourceObserver;
use App\Observers\HistoryLoginObserver;
use App\Observers\ImageObserver;
use App\Observers\NewsObserver;
use App\Observers\OfficerObserver;
use App\Observers\ProjectObserver;
use App\Observers\QualificationLevelObserver;
use App\Observers\QualificationLevelTrainingObserver;
use App\Observers\QualificationObserver;
use App\Observers\QualificationTrainingObserver;
use App\Observers\RuleCategoriesObserver;
use App\Observers\RuleObserver;
use App\Observers\ServiceProviderObserver;
use App\Observers\ServiceProviderProjectObserver;
use App\Observers\ServiceProviderQualificationObserver;
use App\Observers\SubClassificationObserver;
use App\Observers\SubClassificationTrainingObserver;
use App\Observers\SubQualificationTrainingObserver;
use App\Observers\TrainingMemberObserver;
use App\Observers\TrainingMethodObserver;
use App\Observers\TrainingObserver;
use App\Observers\TypeObserver;
use App\Observers\VerificationObserver;
use App\Observers\WorkerCertificateObserver;
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
        RuleCategory::observe(RuleCategoriesObserver::class);
        Classification::observe(ClassificationObserver::class);
        FundSource::observe(FundSourceObserver::class);
        FiscalYear::observe(FiscalYearObserver::class);
        Qualification::observe(QualificationObserver::class);
        QualificationLevel::observe(QualificationLevelObserver::class);
        SubClassification::observe(SubClassificationObserver::class);
        TrainingMethod::observe(TrainingMethodObserver::class);
        Rule::observe(RuleObserver::class);
        ContractCategory::observe(ContractCategoryObserver::class);
        Dinas::observe(DinasObserver::class);
        Training::observe(TrainingObserver::class);
        Image::observe(ImageObserver::class);
        TrainingMember::observe(TrainingMemberObserver::class);
        Project::observe(ProjectObserver::class);
        ModelsServiceProvider::observe(ServiceProviderObserver::class);
        Worker::observe(WorkerObserver::class);
        Accident::observe(AccidentObserver::class);
        HistoryLogin::observe(HistoryLoginObserver::class);
        ServiceProviderProject::observe(ServiceProviderProjectObserver::class);
        Type::observe(TypeObserver::class);
        ClassificationTraining::observe(ClassificationTrainingObserver::class);
        Association::observe(AssociationObserver::class);
        FoundingDeed::observe(FoundingDeedObserver::class);
        Verification::observe(VerificationObserver::class);
        AmendmentDeed::observe(AmendmendDeedObserver::class);
        SubClassificationTraining::observe(SubClassificationTrainingObserver::class);
        QualificationTraining::observe(QualificationTrainingObserver::class);
        QualificationLevelTraining::observe(QualificationLevelTrainingObserver::class);
        Officer::observe(OfficerObserver::class);
        ServiceProviderQualification::observe(ServiceProviderQualificationObserver::class);
        WorkerCertificate::observe(WorkerCertificateObserver::class);
        ConsultantProject::observe(ConstultantProjectObserver::class);
        ExecutorProject::observe(ExecutorProjectObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
