<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dinas extends Model
{
    use HasFactory;
    protected $table = 'fiscal_years';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'user_id'];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';
}
