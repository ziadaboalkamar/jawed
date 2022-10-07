<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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
     * @var string[]
     */
    protected $fillable = [
        'full_name',
        'email',
        'user_name',
        'password',
        'address',
        'phone',
        'role_id',
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

    public function role()
    {
        # code...
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function courses()
    {
        # code...
        return $this->belongsToMany(Course::class, 'course_users', 'user_id', 'course_id', 'id', 'id')
                        ->withPivot(['payment_file', 'payment_type', 'status']);
    }

    public function diplomas()
    {
        # code...
        return $this->belongsToMany(Diploma::class, 'diploma_users', 'user_id', 'diploma_id', 'id', 'id')
                        ->withPivot(['payment_file', 'payment_type', 'status']);
    }
}
