<?php

namespace App\Models;

use App\Base\Interfaces\HasServiceProviders;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Association extends Model implements HasServiceProviders
{
    use HasFactory;
    protected $table = 'associations';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'slug',
        'email',
        'email_leader',
        'address',
        'city',
        'postal_code',
        'phone_number',
        'leader',
        'address_leader',
        'phone_number_leader'
    ];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';

    /**
     * serviceProviders
     *
     * @return HasMany
     */
    public function serviceProviders(): HasMany
    {
        return $this->hasMany(ServiceProvider::class);
    }
}
