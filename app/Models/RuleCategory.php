<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuleCategory extends Model
{
    use HasFactory;
    protected $table = 'rule_categories';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name'];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';
}
