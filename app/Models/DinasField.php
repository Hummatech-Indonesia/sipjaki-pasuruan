<?php

namespace App\Models;

use App\Base\Interfaces\HasDinas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DinasField extends Model implements HasDinas
{
    use HasFactory;
    protected $table = 'dinas_fields';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'dinas_id', 'field_id'];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';

    /**
     * dinas
     *
     * @return BelongsTo
     */
    public function dinas(): BelongsTo
    {
        return $this->belongsTo(Dinas::class);
    }
}
