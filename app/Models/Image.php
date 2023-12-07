<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table = 'images';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'photo', 'categories'];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';
}
