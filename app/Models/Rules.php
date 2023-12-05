<?php

namespace App\Models;

use App\Base\Interfaces\HasFiscalYear;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rules extends Model implements HasFiscalYear
{
    use HasFactory;
    protected $table = 'rules';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'fiscal_year_id', 'title', 'code', 'file'];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';

    /**
     * fiscalYear
     *
     * @return BelongsTo
     */
    public function fiscalYear(): BelongsTo
    {
        return $this->belongsTo(FiscalYear::class);
    }
}
