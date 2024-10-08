<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    use HasFactory;
    protected $table = 'password_resets';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'email', 'token'];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';
}
