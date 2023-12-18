<?php

namespace App\Models;

use App\Base\Interfaces\HasClassificationTraining;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubClassificationTraining extends Model implements HasClassificationTraining
{
    use HasFactory;
    protected $table = 'sub_classification_trainings';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'classification_training_id', 'code', 'name', 'description'];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';

    /**
     * classificationTraining
     *
     * @return BelongsTo
     */
    public function classificationTraining(): BelongsTo
    {
        return $this->belongsTo(ClassificationTraining::class);
    }

}
