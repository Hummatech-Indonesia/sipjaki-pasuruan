<?php

namespace App\Models;

use App\Base\Interfaces\HasQualification;
use App\Base\Interfaces\HasServiceProvider;
use App\Base\Interfaces\HasSubClassification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceProviderQualification extends Model implements HasSubClassification, HasServiceProvider, HasQualification
{
    use HasFactory;
    protected $table = 'service_provider_qualifications';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'sub_classification_id', 'service_provider_id', 'status', 'qualification_id', 'year', 'first_print', 'last_print'];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';

    /**
     * subClassification
     *
     * @return BelongsTo
     */
    public function subClassification(): BelongsTo
    {
        return $this->belongsTo(SubClassification::class);
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

    /**
     * qualification
     *
     * @return BelongsTo
     */
    public function qualification(): BelongsTo
    {
        return $this->belongsTo(Qualification::class);
    }
}
