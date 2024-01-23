<?php

namespace App\Models;

use App\Base\Interfaces\HasWorker;
use Illuminate\Database\Eloquent\Model;
use App\Base\Interfaces\HasWorkerCerificates;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkerCertificate extends Model implements HasWorker,HasWorkerCerificates
{
    use HasFactory;

    public $incrementing = false;
    public $keyType = 'char';
    protected $table = 'worker_certificates';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'worker_id',
        'file',
        'certificate',
        'registration_number',
    ];
    protected $guarded = [];

    /**
     * worker
     *
     * @return BelongsTo
     */
    public function worker(): BelongsTo
    {
        return $this->belongsTo(Worker::class);
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
