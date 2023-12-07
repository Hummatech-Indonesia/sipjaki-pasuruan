<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accident extends Model
{
    use HasFactory;

    protected $table = 'accidents';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'project_id',
        'location',
        'time',
        'description',
        'loss',
        'problem'
    ];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';
}
