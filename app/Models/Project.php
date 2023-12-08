<?php

namespace App\Models;

use App\Base\Interfaces\HasDinas;
use App\Base\Interfaces\HasFundSource;
use App\Base\Interfaces\HasServiceProvider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model implements HasDinas, HasServiceProvider, HasFundSource
{
    use HasFactory;
    protected $table = 'projects';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'dinas_id', 'service_provider_id', 'fund_source_id', 'contract_category_id', 'name', 'project_value', 'characteristic_project', 'physical_progress_start', 'finance_progress_start', 'physical_progress', 'finance_progress', 'year', 'start_at', 'end_at', 'status'];
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
        return $this->serviceProvider(ServiceProvider::class);
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
}
