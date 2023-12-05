<?php

namespace App\Models;

use App\Base\Interfaces\HasClassification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubClassification extends Model implements HasClassification
{
    use HasFactory;
    protected $table = 'sub_classifications';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'classification_id', 'name'];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';

    /**
     * classification
     *
     * @return BelongsTo
     */
    public function classification(): BelongsTo
    {
        return $this->belongsTo(Classification::class);
    }
}
