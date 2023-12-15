<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassificationTraining extends Model
{
    use HasFactory;

    protected $table = 'classification_trainings';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'code', 'description'];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';
}
