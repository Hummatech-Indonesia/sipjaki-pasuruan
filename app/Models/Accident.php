<?php

namespace App\Models;

use App\Base\Interfaces\HasExecutorProject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Accident extends Model implements HasExecutorProject
{
    use HasFactory;

    protected $table = 'accidents';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'executor_project_id',
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
     * Get the executorProject that owns the Accident
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function executorProject(): BelongsTo
    {
        return $this->belongsTo(ExecutorProject::class);
    }
}
