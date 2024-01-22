<?php

namespace App\Models;

use App\Base\Interfaces\HasAssociation;
use App\Base\Interfaces\HasConsultantProjects;
use App\Base\Interfaces\HasExecutorProjects;
use App\Base\Interfaces\HasOneAmendmentDeed;
use App\Base\Interfaces\HasOneFoundingDeed;
use App\Base\Interfaces\HasOneVerification;
use App\Base\Interfaces\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ServiceProvider extends Model implements HasConsultantProjects,HasExecutorProjects,HasUser, HasAssociation, HasOneAmendmentDeed, HasOneFoundingDeed, HasOneVerification
{
    use HasFactory;
    protected $table = 'service_providers';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'user_id', 'association_id', 'address', 'city', 'postal_code', 'province', 'website', 'form_of_business_entity', 'type_of_business_entity', 'fax', 'file', 'directur'];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';

    /**
     * user
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * association
     *
     * @return BelongsTo
     */
    public function association(): BelongsTo
    {
        return $this->belongsTo(Association::class);
    }

    /**
     * amendmentDeed
     *
     * @return HasOne
     */
    public function amendmentDeed(): HasOne
    {
        return $this->hasOne(AmendmentDeed::class);
    }

    /**
     * foundingDeed
     *
     * @return HasOne
     */
    public function foundingDeed(): HasOne
    {
        return $this->hasOne(FoundingDeed::class);
    }

    /**
     * verification
     *
     * @return HasOne
     */
    public function verification(): HasOne
    {
        return $this->hasOne(Verification::class);
    }

    /**
     * Get all of the consultantProjects for the ServiceProvider
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function consultantProjects(): HasMany
    {
        return $this->hasMany(ConsultantProject::class);
    }

    /**
     * Get all of the executorProjects for the ServiceProvider
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function executorProjects(): HasMany
    {
        return $this->hasMany(ExecutorProject::class);
    }
}
