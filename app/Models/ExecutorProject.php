<?php

namespace App\Models;

use App\Base\Interfaces\HasAccidents;
use App\Base\Interfaces\HasFiscalYear;
use App\Base\Interfaces\HasFundSource;
use Illuminate\Database\Eloquent\Model;
use App\Base\Interfaces\HasServiceProvider;
use App\Base\Interfaces\HasContractCategory;
use App\Base\Interfaces\HasServiceProviderProjects;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExecutorProject extends Model implements HasAccidents, HasFiscalYear, HasFundSource, HasContractCategory, HasServiceProvider, HasServiceProviderProjects
{
    use HasFactory;
    protected $table = 'executor_projects';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'fund_source_id',
        'contract_category_id',
        'service_provider_id',
        'consultant_project_id',
        'name',
        'project_value',
        'characteristic_project',
        'physical_progress',
        'physical_progress_start',
        'finance_progress_start',
        'finance_progress',
        'fiscal_year_id',
        'contract',
        'order_mail',
        'pcm_minutes',
        'invoice',
        'report',
        'shop_drawing',
        'asbuild_drawing',
        'administrative_minutes',
        'uitzet_minutes',
        'mutual_check_0',
        'mutual_check_100',
        'p1_meeting_minutes',
        'p2_meeting_minutes',
        'minutes_of_disbursement',
        'start_at',
        'end_at',
        'status',
        'dinas_id',
        'executor_physical_progress'
    ];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';
    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
        // Tambahkan atribut lainnya yang perlu di-cast jika ada
    ];

    /**
     * Get all of the serviceProviderProjects for the ExecutorProject
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function serviceProviderProjects(): HasMany
    {
        return $this->hasMany(ServiceProviderProject::class);
    }

    /**
     * Get the fundSource that owns the ExecutorProject
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fundSource(): BelongsTo
    {
        return $this->belongsTo(FundSource::class);
    }

    /**
     * Get the contractCategory that owns the ExecutorProject
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contractCategory(): BelongsTo
    {
        return $this->belongsTo(ContractCategory::class);
    }

    /**
     * Get the serviceProvider that owns the ExecutorProject
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function serviceProvider(): BelongsTo
    {
        return $this->belongsTo(ServiceProvider::class);
    }

    /**
     * Get the consultantProject that owns the ExecutorProject
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function consultantProject(): BelongsTo
    {
        return $this->belongsTo(ConsultantProject::class);
    }

    /**
     * Get the fiscalYear that owns the ExecutorProject
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fiscalYear(): BelongsTo
    {
        return $this->belongsTo(FiscalYear::class);
    }

    /**
     * Get all of the accidents for the ExecutorProject
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accidents(): HasMany
    {
        return $this->hasMany(Accident::class);
    }

    /**
     * Get the dinas that owns the ExecutorProject
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dinas(): BelongsTo
    {
        return $this->belongsTo(Dinas::class);
    }
}
