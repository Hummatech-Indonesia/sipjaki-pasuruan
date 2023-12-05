<?php

namespace App\Models;

use App\Base\Interfaces\HasQualification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QualificationLevel extends Model implements HasQualification
{
    use HasFactory;

    protected $table = 'qualification_levels';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name','qualification_id'];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';

    /**
     * Get the qualification that owns the QualificationLevel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function qualification(): BelongsTo
    {
        return $this->belongsTo(Qualification::class);
    }
}
