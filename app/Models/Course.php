<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'image', 'name', 'period', 'date', 'trainer', 'city', 'price', 'description', 'status','short_description'
    ];

    public function users(){
        return $this->belongsToMany(User::class,'course_users', 'course_id', 'user_id', 'id', 'id')
                    ->withPivot(['payment_file', 'payment_type', 'status']);
    }

}
