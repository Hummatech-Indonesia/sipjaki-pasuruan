<?php

namespace App\Models;

use App\Base\Interfaces\HasWorker;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
