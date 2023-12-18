<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualificationTraining extends Model
{
    use HasFactory;
    protected $table = 'qualification_trainings';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name'];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';
}
