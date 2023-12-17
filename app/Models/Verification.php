<?php

namespace App\Models;

use App\Base\Interfaces\HasServiceProvider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Verification extends Model implements HasServiceProvider
{
    use HasFactory;

    protected $table = 'verifications';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'service_provider_id', 'judiciary_number', 'judiciary_date', 'district_court_number', 'district_court_date', 'state_institution_number', 'state_institution_date'];
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
