<?php

namespace App\Models;

use App\Base\Interfaces\HasUser;
use App\Base\Interfaces\HasProjects;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceProvider extends Model implements HasUser, HasProjects
{
    use HasFactory;
    protected $table = 'service_providers';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'user_id', 'association_id', 'address', 'city', 'postal_code', 'province', 'website', 'form_of_business_entity', 'type_of_business_entity'];
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
}
