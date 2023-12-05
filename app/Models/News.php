<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'title', 'thumbnail', 'content'];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';
}
