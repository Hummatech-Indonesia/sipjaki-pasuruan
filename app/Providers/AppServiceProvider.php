<?php

namespace App\Providers;

use App\Contracts\Interfaces\AccidentInterface;
use App\Contracts\Interfaces\AssociationInterface;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Interfaces\NewsInterface;
use App\Contracts\Interfaces\RuleInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Contracts\Interfaces\ImageInterface;
use App\Contracts\Interfaces\ProjectInterface;
use App\Contracts\Repositories\NewsRepository;
use App\Contracts\Repositories\RuleRepository;
use App\Contracts\Repositories\UserRepository;
use App\Contracts\Interfaces\TrainingInterface;
use App\Contracts\Repositories\ImageRepository;
use App\Contracts\Interfaces\FiscalYearInterface;
use App\Contracts\Interfaces\FundSourceInterface;
use App\Contracts\Repositories\ProjectRepository;
use App\Contracts\Repositories\TrainingRepository;
use App\Contracts\Interfaces\Auth\RegisterInterface;
use App\Contracts\Interfaces\QualificationInterface;
use App\Contracts\Repositories\FiscalYearRepository;
use App\Contracts\Repositories\FundSourceRepository;
use App\Contracts\Interfaces\ClassificationInterface;
use App\Contracts\Interfaces\ClassificationTrainingInterface;
use App\Contracts\Interfaces\ForgotPasswordInterface;
use App\Contracts\Interfaces\RuleCategoriesInterface;
use App\Contracts\Interfaces\TrainingMemberInterface;
use App\Contracts\Interfaces\TrainingMethodInterface;
use App\Contracts\Interfaces\ContractCategoryInterface;
use App\Contracts\Interfaces\DinasFieldInterface;
use App\Contracts\Interfaces\DinasInterface;
use App\Contracts\Interfaces\FaqInterface;
use App\Contracts\Interfaces\HistoryLoginInterface;
use App\Contracts\Repositories\Auth\RegisterRepository;
use App\Contracts\Repositories\QualificationRepository;
use App\Contracts\Interfaces\SubClassificationInterface;
use App\Contracts\Repositories\ClassificationRepository;
use App\Contracts\Repositories\ForgotPasswordRepository;
use App\Contracts\Repositories\RuleCategoriesRepository;
use App\Contracts\Repositories\TrainingMemberRepository;
use App\Contracts\Repositories\TrainingMethodRepository;
use App\Contracts\Interfaces\QualificationLevelInterface;
use App\Contracts\Interfaces\QualificationLevelTrainingInterface;
use App\Contracts\Interfaces\SectionInterface;
use App\Contracts\Interfaces\ServiceProviderInterface;
use App\Contracts\Interfaces\ServiceProviderProjectInterface;
use App\Contracts\Interfaces\TypeInterface;
use App\Contracts\Interfaces\WorkerInterface;
use App\Contracts\Repositories\AccidentRepository;
use App\Contracts\Repositories\AssociationRepositoy;
use App\Contracts\Repositories\ClassificationTrainingRepository;
use App\Contracts\Repositories\ContractCategoryRepository;
use App\Contracts\Repositories\DinasFieldRepository;
use App\Contracts\Repositories\DinasRepository;
use App\Contracts\Repositories\FaqRepository;
use App\Contracts\Repositories\FieldRepository;
use App\Contracts\Repositories\HistoryLoginRepository;
use App\Contracts\Repositories\SubClassificationRepository;
use App\Contracts\Repositories\QualificationLevelRepository;
use App\Contracts\Repositories\QualificationLevelTrainingRepository;
use App\Contracts\Repositories\SectionRepository;
use App\Contracts\Repositories\ServiceProviderProjectRepository;
use App\Contracts\Repositories\ServiceProviderRepository;
use App\Contracts\Repositories\TypeRepository;
use App\Contracts\Repositories\WorkerRepository;
use App\Models\ClassificationTraining;

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
        TrainingInterface::class => TrainingRepository::class,
        ImageInterface::class => ImageRepository::class,
        ForgotPasswordInterface::class => ForgotPasswordRepository::class,
        ProjectInterface::class => ProjectRepository::class,
        TrainingMemberInterface::class => TrainingMemberRepository::class,
        ServiceProviderInterface::class => ServiceProviderRepository::class,
        AccidentInterface::class => AccidentRepository::class,
        AssociationInterface::class => AssociationRepositoy::class,
        WorkerInterface::class => WorkerRepository::class,
        DinasInterface::class => DinasRepository::class,
        HistoryLoginInterface::class => HistoryLoginRepository::class,
        ServiceProviderProjectInterface::class => ServiceProviderProjectRepository::class,
        SectionInterface::class => SectionRepository::class,
        TypeInterface::class => TypeRepository::class,
        DinasFieldInterface::class => DinasFieldRepository::class,
        FaqInterface::class => FaqRepository::class,
        ClassificationTrainingInterface::class => ClassificationTrainingRepository::class,
        QualificationLevelTrainingInterface::class => QualificationLevelTrainingRepository::class
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
