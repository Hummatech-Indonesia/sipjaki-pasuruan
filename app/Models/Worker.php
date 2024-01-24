<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Base\Interfaces\HasServiceProvider;
use App\Base\Interfaces\HasWorkerCertificates;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Worker extends Model implements HasServiceProvider,HasWorkerCertificates
{
    use HasFactory;

    public $incrementing = false;
    public $keyType = 'char';
    protected $table = 'workers';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'service_provider_id', 'national_identity_number', 'name', 'phone_number', 'birth_date', 'gender', 'address', 'religion','marital_status', 'citizenship', 'education'];
    protected $guarded = [];

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
     * Get all of the workerCertificates for the WorkerCertificate
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function workerCertificates(): HasMany
    {
        return $this->hasMany(WorkerCertificate::class);
    }
}
