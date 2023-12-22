<?php

namespace App\Models;

use App\Base\Interfaces\HasConsultant;
use App\Models\ServiceProvider;
use App\Base\Interfaces\HasDinas;
use App\Base\Interfaces\HasFundSource;
use Illuminate\Database\Eloquent\Model;
use App\Base\Interfaces\HasContractCategory;
use App\Base\Interfaces\HasExecutor;
use App\Base\Interfaces\HasServiceProviderProjects;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model implements HasDinas, HasExecutor, HasConsultant, HasFundSource, HasContractCategory, HasServiceProviderProjects
{
    use HasFactory;
    protected $table = 'projects';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'dinas_id', 'consultant_id', 'executor_id', 'physical_progress', 'fund_source_id', 'contract_category_id', 'name', 'project_value', 'characteristic_project', 'physical_progress_start', 'finance_progress_start', 'finance_progress', 'year', 'start_at', 'end_at', 'status'];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';

    /**
     * dinas
     *
     * @return BelongsTo
     */
    public function dinas(): BelongsTo
    {
        return $this->belongsTo(Dinas::class);
    }

    /**
     * Get the consultant that owns the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function consultant(): BelongsTo
    {
        return $this->belongsTo(ServiceProvider::class, 'consultant_id');
    }

    /**
     * Get the executor that owns the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function executor(): BelongsTo
    {
        return $this->belongsTo(ServiceProvider::class, 'executor_id');
    }

    /**
     * fundSource
     *
     * @return BelongsTo
     */
    public function fundSource(): BelongsTo
    {
        return $this->belongsTo(FundSource::class);
    }

    /**
     * Get the contractCategory that owns the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contractCategory(): BelongsTo
    {
        return $this->belongsTo(ContractCategory::class);
    }

    /**
     * serviceProviderProjects
     *
     * @return HasMany
     */
    public function serviceProviderProjects(): HasMany
    {
        return $this->hasMany(ServiceProviderProject::class);
    }
    /**
     * accidents
     *
     * @return HasMany
     */
    public function accidents(): HasMany
    {
        return $this->hasMany(Accident::class);
    }
}
