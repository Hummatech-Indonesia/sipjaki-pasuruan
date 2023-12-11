<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProviderProject extends Model
{
    use HasFactory;
    protected $table = 'service_provider_projects';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'project_id', 'service_provider_id', 'date_start', 'date_finish', 'file', 'description', 'progres'];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';
}
