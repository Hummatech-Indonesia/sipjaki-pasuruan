<?php

namespace App\Models;

use App\Base\Interfaces\HasProject;
use App\Base\Interfaces\HasServiceProvider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceProviderProject extends Model implements HasProject, HasServiceProvider
{
    use HasFactory;
    protected $table = 'service_provider_projects';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'project_id', 'service_provider_id', 'date_start', 'date_finish', 'file', 'description', 'progres'];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';

    /**
     * project
     *
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
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
