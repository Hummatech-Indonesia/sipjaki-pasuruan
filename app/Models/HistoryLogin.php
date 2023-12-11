<?php

namespace App\Models;

use App\Base\Interfaces\HasUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HistoryLogin extends Model implements HasUser
{
    use HasFactory;

    protected $table = 'history_logins';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'user_id', 'ip_address'];
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
