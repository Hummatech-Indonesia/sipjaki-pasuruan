<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;
    protected $table = 'rules';
    protected $primaryKey = 'id';
    protected $fillable = ['id','rule_category_id', 'year', 'title', 'code', 'file'];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';

}
