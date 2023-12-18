<?php

namespace App\Models;

use App\Base\Interfaces\HasQualificationTraining;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubQualificationTraining extends Model implements HasQualificationTraining
{
    use HasFactory;
    protected $table = 'sub_qualification_trainings';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'qualification_training_id', 'name'];
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
