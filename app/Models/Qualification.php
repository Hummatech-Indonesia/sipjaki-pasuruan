<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Base\Interfaces\HasQualificationLevels;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Qualification extends Model implements HasQualificationLevels
{
    use HasFactory;
    protected $table = 'qualifications';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name'];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';

    /**
     * Get all of the qualificationLevels for the Qualification
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function qualificationLevels(): HasMany
    {
        return $this->hasMany(QualificationLevel::class);
    }
}
