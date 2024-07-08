<?php

namespace App\Models;

use App\Base\Interfaces\HasExecutorProject;
use App\Base\Interfaces\HasServiceProvider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceProviderProject extends Model implements HasExecutorProject, HasServiceProvider
{
    use HasFactory;
    protected $table = 'service_provider_projects';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'executor_project_id','week','service_provider_id', 'date_start', 'date_finish', 'file', 'description', 'progres','page','type','days','executor_type'];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';

    /**
     * Get the executorProject that owns the ServiceProviderProject
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function executorProject(): BelongsTo
    {
        return $this->belongsTo(ExecutorProject::class);
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
}
