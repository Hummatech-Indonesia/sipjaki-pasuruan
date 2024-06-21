<?php

namespace App\Models;

use App\Base\Interfaces\HasWorker;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkerCertificate extends Model implements HasWorker
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
        'qualification_level_id',
        'sub_classification_id'
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
     * Get the subClassification that owns the WorkerCertificate
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subClassification(): BelongsTo
    {
        return $this->belongsTo(SubClassificationTraining::class);
    }

    /**
     * Get the qualificationLevel that owns the WorkerCertificate
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function qualificationLevel(): BelongsTo
    {
        return $this->belongsTo(QualificationLevelTraining::class);
    }

}
