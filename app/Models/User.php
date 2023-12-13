<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Base\Interfaces\HasOneDinas;
use App\Base\Interfaces\HasOneServiceProvider;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail, HasOneDinas, HasOneServiceProvider
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    public $incrementing = false;
    public $keyType = 'char';
    protected $table = 'users';
    protected $primaryKey = 'id';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'profile',
        'email',
        'password',
        'phone_number',
        'decree',
        'email_verified_at',
        'token',
        'expired_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    /**
     * dinas
     *
     * @return HasOne
     */
    public function dinas(): HasOne
    {
        return $this->hasOne(Dinas::class, 'user_id');
    }

    /**
     * serviceProvider
     *
     * @return HasOne
     */
    public function serviceProvider(): HasOne
    {
        return $this->hasOne(ServiceProvider::class);
    }
}
