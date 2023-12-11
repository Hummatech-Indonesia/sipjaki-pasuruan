<?php

namespace App\Models;

use App\Base\Interfaces\HasDinas;
use App\Base\Interfaces\HasFiscalYear;
use App\Base\Interfaces\HasQualificationLevel;
use App\Base\Interfaces\HasSubClassification;
use App\Base\Interfaces\HasTrainingMethod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Training extends Model implements HasTrainingMethod,HasFiscalYear,HasSubClassification,HasQualificationLevel
{
    use HasFactory;

    protected $table = 'trainings';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'training_method_id',
        'fiscal_year_id',
        'sub_classifications_id',
        'qualification_level_id',
        'name',
        'organizer',
        'start_at',
        'end_time',
        'lesson_hour',
        'location',
        'description'
    ];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';


    /**
     * Get the dinas that owns the Training
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function TrainingMethod(): BelongsTo
    {
        return $this->belongsTo(TrainingMethod::class);
    }

    /**
     * Get the fiscalYear that owns the Training
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fiscalYear(): BelongsTo
    {
        return $this->belongsTo(FiscalYear::class); 
    }

    /**
     * Get the subClassification that owns the Training
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subClassification(): BelongsTo
    {
        return $this->belongsTo(SubClassification::class);
    }


    /**
     * Get the qualificationLevel that owns the Training
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function qualificationLevel(): BelongsTo
    {
        return $this->belongsTo(QualificationLevel::class);
    }

}
