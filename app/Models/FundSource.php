<?php

namespace App\Models;

use App\Base\Interfaces\HasTrainings;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FundSource extends Model implements HasTrainings
{
    use HasFactory;
    protected $table = 'fund_sources';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name'];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';

    /**
     * Get all of the training for the FundSource
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function trainings(): HasMany
    {
        return $this->hasMany(Training::class);
    }
}
