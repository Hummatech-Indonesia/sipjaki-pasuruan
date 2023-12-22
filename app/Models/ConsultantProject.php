<?php

namespace App\Models;

use App\Base\Interfaces\HasProject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ConsultantProject extends Model implements HasProject
{
    use HasFactory;
    protected $table = 'consultant_projects';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'project_id', 'contract', 'administrative_minutes', 'report', 'minutes_of_disbursement'];
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
