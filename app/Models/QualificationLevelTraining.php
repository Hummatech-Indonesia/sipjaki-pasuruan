<?php

namespace App\Models;

use App\Base\Interfaces\HasQualificationTraining;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QualificationLevelTraining extends Model implements HasQualificationTraining
{
    use HasFactory;
    protected $table = 'qualification_level_trainings';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'qualification_training_id'];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';

    /**
     * qualificationTraining
     *
     * @return BelongsTo
     */
    public function qualificationTraining(): BelongsTo
    {
        return $this->belongsTo(QualificationTraining::class);
    }
}
