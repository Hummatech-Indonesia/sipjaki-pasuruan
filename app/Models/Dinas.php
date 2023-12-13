<?php

namespace App\Models;

use App\Base\Interfaces\HasUser;
use App\Base\Interfaces\HasProjects;
use App\Base\Interfaces\HasSection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dinas extends Model implements HasUser, HasProjects, HasSection
{
    use HasFactory;
    protected $table = 'dinas';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'user_id', 'type_id', 'section_id', 'address', 'phone_number', 'echelon', 'local_regulation', 'number_local_regulation', 'sk_tpjk', 'position', 'name_official', 'email_official', 'number_sk_tpjk', 'admin_sipjaki', 'number_sk_sipjaki', 'activity', 'last_year_budget', 'budget_this_year', 'mobile_phone_number', 'sturucture_organization_file'];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';

    /**
     * section
     *
     * @return BelongsTo
     */
    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }

    /**
     * Get all of the projects for the Dinas
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    /**
     * Get the user that owns the Dinas
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
