<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Association extends Model
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
}
