<?php

namespace App\Models;

use App\Base\Interfaces\HasUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceProvider extends Model implements HasUser
{
    use HasFactory;
    protected $table = 'service_providers';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'user_id'];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';

    /**
     * user
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
