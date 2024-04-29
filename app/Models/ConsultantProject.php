<?php

namespace App\Models;

use App\Base\Interfaces\HasDinas;
use App\Base\Interfaces\HasFundSource;
use Illuminate\Database\Eloquent\Model;
use App\Base\Interfaces\HasServiceProvider;
use App\Base\Interfaces\HasContractCategory;
use App\Base\Interfaces\HasExecutorProjects;
use App\Base\Interfaces\HasFiscalYear;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ConsultantProject extends Model implements HasFiscalYear,HasDinas,HasFundSource,HasContractCategory,HasServiceProvider,HasExecutorProjects
{
    use HasFactory;
    protected $table = 'consultant_projects';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'dinas_id',
        'fund_source_id',
        'contract_category_id',
        'service_provider_id',
        'name',
        'project_value',
        'characteristic_project',
        'finance_progress_start',
        'finance_progress',
        'fiscal_year_id',
        'contract',
        'mail_order',
        'pcm_minutes',
        'administrative_minutes',
        'report',
        'minutes_of_disbursement',
        'minutes_of_hand_over',
        'start_at',
        'end_at',
        'status',
    ];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';

    /**
     * Get the dinas that owns the ConsultantProject
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dinas(): BelongsTo
    {
        return $this->belongsTo(Dinas::class);
    }

    /**
     * Get the fundSource that owns the ConsultantProject
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fundSource(): BelongsTo
    {
        return $this->belongsTo(FundSource::class);
    }

    /**
     * Get the contractCategory that owns the ConsultantProject
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contractCategory(): BelongsTo
    {
        return $this->belongsTo(ContractCategory::class);
    }

    /**
     * Get the serviceProvider that owns the ConsultantProject
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function serviceProvider(): BelongsTo
    {
        return $this->belongsTo(ServiceProvider::class);
    }

    /**
     * Get all of the executorProjects for the ConsultantProject
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function executorProjects(): HasMany
    {
        return $this->hasMany(ExecutorProject::class);
    }

    /**
     * Get the fiscalYear that owns the ConsultantProject
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fiscalYear(): BelongsTo
    {
        return $this->belongsTo(FiscalYear::class);
    }
}
