<?php

namespace App\Models;

use App\Base\Interfaces\HasAccidents;
use App\Models\ServiceProvider;
use App\Base\Interfaces\HasDinas;
use App\Base\Interfaces\HasFundSource;
use Illuminate\Database\Eloquent\Model;
use App\Base\Interfaces\HasServiceProvider;
use App\Base\Interfaces\HasContractCategory;
use App\Base\Interfaces\HasServiceProviderProjects;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model implements HasDinas, HasServiceProvider, HasFundSource, HasContractCategory, HasServiceProviderProjects
{
    use HasFactory;
    protected $table = 'projects';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'dinas_id', 'service_provider_id', 'fund_source_id', 'contract_category_id', 'name', 'project_value', 'characteristic_project', 'physical_progress_start', 'finance_progress_start', 'finance_progress', 'year', 'start_at', 'end_at', 'status'];
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
     * serviceProvider
     *
     * @return BelongsTo
     */
    public function serviceProvider(): BelongsTo
    {
        return $this->belongsTo(ServiceProvider::class);
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
