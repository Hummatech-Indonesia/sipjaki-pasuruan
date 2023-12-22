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
    protected $fillable = ['id', 'service_provider_id', 'national_identity_number', 'name', 'phone_number', 'birth_date', 'gender', 'address', 'religion','marital_status', 'position', 'citizenship', 'education', 'job'];
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
