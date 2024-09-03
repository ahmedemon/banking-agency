<?php

namespace App\Models;

use App\Models\Primary\StaffRole;
use App\Models\Primary\Staffs;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;


    // public function role()
    // {
    //     return $this->hasOne(StaffRole::class, 'role_id', 'id');
    // }

    public function staff()
    {
        return $this->belongsTo(Staffs::class, 'id', 'user_id');
    }

    // get the staff user area throught the staff_id
    // public function area()
    // {
    //     return $this->hasOneThrough(
    //         Area::class,
    //         Staffs::class,
    //         'id', // Foreign key on users table...
    //         'id', // Foreign key on posts table...
    //         'id', // Local key on countries table...
    //         'staff_id' // Local key on users table...
    //     );
    // }

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
