<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    use HasFactory;
    protected $table = 'classifications';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'file'];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';
}
