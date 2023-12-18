<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    use HasFactory;
    protected $table = 'officers';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'birth_date', 'address', 'position', 'education'];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';
}
