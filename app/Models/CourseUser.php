<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'course_id', 'status', 'payment_type', 'payment_file'
    ];

    public function course()
    {
        # code...
        return $this->belongsTo(Course::class,'course_id', 'id');
    }

    public function user()
    {
        # code...
        return $this->belongsTo(User::class,'user_id', 'id');
    }
}
