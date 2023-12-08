<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dinas extends Model
{
    use HasFactory;
    protected $table = 'dinas';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'user_id', 'field_id', 'dinas', 'type', 'sections', 'address', 'phone_number', 'echelon', 'local_regulation', 'number_local_regulation', 'sk_tpjk', 'number_sk_tpjk', 'admin_sipjaki', 'number_sk_sipjaki', 'activity', 'last_year_budget', 'budget_this_year'];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';
}
