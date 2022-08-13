<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    public function position()
    {
        return $this->hasOne(Position::class, "id", "positions_id");
    }

    public function perfection()
    {
        return $this->hasOne(Perfection::class, "id", "perfections_id");
    }

    public function scopeYearBirth($query)
    {
        return $query->selectRaw('users.*, ? - age as year_birth  ', [now()->year]);
    }
}
