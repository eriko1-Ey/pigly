<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\WeightLog;
use App\Models\WeightTarget;


class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password'];

    public function weightTarget()
    {
        return $this->hasOne(WeightTarget::class);
    }

    public function weightLogs()
    {
        return $this->hasMany(WeightLog::class);
    }
}
