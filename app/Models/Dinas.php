<?php

namespace App\Models;

use App\Base\Interfaces\HasConsultantProjects;
use App\Base\Interfaces\HasExecutorProjects;
use App\Base\Interfaces\HasUser;
use App\Base\Interfaces\HasProjects;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dinas extends Model implements HasUser,HasConsultantProjects,HasExecutorProjects
{
    use HasFactory;
    protected $table = 'dinas';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name_opd', 'phone_number_opd', 'user_id', 'person_responsible', 'position', 'civil_servant_identity_number', 'address'];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';



    /**
     * Get the user that owns the Dinas
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the consultantProjects for the Dinas
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function consultantProjects(): HasMany
    {
        return $this->hasMany(ConsultantProject::class);
    }

    /**
     * Get all of the executorProjects for the Dinas
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function executorProjects(): HasMany
    {
        return $this->hasMany(ExecutorProject::class);
    }
}
