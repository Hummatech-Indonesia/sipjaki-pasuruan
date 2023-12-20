<?php

namespace App\Models;

use App\Base\Interfaces\HasServiceProvider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AmendmentDeed extends Model implements HasServiceProvider
{
    use HasFactory;
    protected $table = 'amendment_deeds';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'service_provider_id','province','deed_number', 'notary_name', 'address', 'city'];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';

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
