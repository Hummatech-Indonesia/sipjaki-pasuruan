<?php

namespace App\Models;

use App\Base\Interfaces\HasServiceProvider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Worker extends Model implements HasServiceProvider
{
    use HasFactory;

    public $incrementing = false;
    public $keyType = 'char';
    protected $table = 'workers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'service_provider_id',
        'name',
        'birth_date',
        'education',
        'registration_number',
        'cerificate',
    ];
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
}
