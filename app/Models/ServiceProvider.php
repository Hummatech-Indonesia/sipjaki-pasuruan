<?php

namespace App\Models;

use App\Base\Interfaces\HasAssociation;
use App\Base\Interfaces\HasOneAmendmentDeed;
use App\Base\Interfaces\HasOneFoundingDeed;
use App\Base\Interfaces\HasOneVerification;
use App\Base\Interfaces\HasUser;
use App\Base\Interfaces\HasProjects;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ServiceProvider extends Model implements HasUser, HasProjects, HasAssociation, HasOneAmendmentDeed, HasOneFoundingDeed, HasOneVerification
{
    use HasFactory;
    protected $table = 'service_providers';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'user_id', 'association_id', 'address', 'city', 'postal_code', 'province', 'website', 'form_of_business_entity', 'type_of_business_entity', 'fax'];
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
     * Get all of the projects for the ServiceProvider
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
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
}
