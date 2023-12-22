<?php

namespace App\Models;

use App\Base\Interfaces\HasProject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExecutorProject extends Model implements HasProject
{
    use HasFactory;
    protected $table = 'executor_projects';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'project_id', 'contract', 'administrative_minutes', 'p1_meeting_minutes', 'minutes_of_disbursement'];
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
