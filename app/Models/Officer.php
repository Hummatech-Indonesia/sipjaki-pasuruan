<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    use HasFactory;
    protected $table = 'officers';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'service_provider_id', 'national_identity_number', 'name', 'birth_date', 'gender', 'address', 'religion','marital_status', 'position', 'citizenship', 'education', 'job'];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';
}
