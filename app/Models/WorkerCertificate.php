<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkerCertificate extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $keyType = 'char';
    protected $table = 'worker_certificates';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'worker_id',
        'service_provider_id',
        'file',
        'certificate',
        'registration_number',
    ];
    protected $guarded = [];
}
