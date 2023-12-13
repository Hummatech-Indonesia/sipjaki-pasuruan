<?php

namespace App\Models;

use App\Base\Interfaces\HasDinas;
use App\Base\Interfaces\HasFiscalYear;
use App\Base\Interfaces\HasFundSource;
use Illuminate\Database\Eloquent\Model;
use App\Base\Interfaces\HasTrainingMethod;
use App\Base\Interfaces\HasTrainingMembers;
use App\Base\Interfaces\HasSubClassification;
use App\Base\Interfaces\HasQualificationLevel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Training extends Model implements HasFundSource,HasTrainingMethod,HasFiscalYear,HasSubClassification,HasQualificationLevel,HasTrainingMembers
{
    use HasFactory;

    protected $table = 'trainings';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'training_method_id',
        'fund_source_id',
        'fiscal_year_id',
        'sub_classification_id',
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
     * Get the fundSource that owns the Training
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fundSource(): BelongsTo
    {
        return $this->belongsTo(FundSource::class);
    }
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

    /**
     * Get all of the trainingMembers for the Training
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function trainingMembers(): HasMany
    {
        return $this->hasMany(TrainingMember::class);
    }

}
