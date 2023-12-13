<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rule extends Model
{
    use HasFactory;
    protected $table = 'rules';
    protected $primaryKey = 'id';
    protected $fillable = ['id','rule_category_id', 'year', 'title', 'code', 'file'];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';

    public function ruleCategory(): BelongsTo
    {
        return $this->belongsTo(RuleCategory::class);
    }
}
