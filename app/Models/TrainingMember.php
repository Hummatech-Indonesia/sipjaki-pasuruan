<?php

namespace App\Models;

use App\Base\Interfaces\HasTraining;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrainingMember extends Model implements HasTraining
{
    use HasFactory;
    protected $table = 'training_members';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'training_id',
        'name',
        'posisition',
        'address',
        'phone_number',
        'decree',
        'gender',
        'file',
        'national_identity_number',
        'education'
    ];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';
    /**
     * Get the training that owns the TrainingMember
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function training(): BelongsTo
    {
        return $this->belongsTo(Training::class);
    }
}
