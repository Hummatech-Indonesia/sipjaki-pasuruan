<?php

namespace App\Models;

use App\Base\Interfaces\HasProject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Accident extends Model implements HasProject
{
    use HasFactory;

    protected $table = 'accidents';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'project_id',
        'location',
        'time',
        'description',
        'loss',
        'problem'
    ];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';

    /**
     * project
     *
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
