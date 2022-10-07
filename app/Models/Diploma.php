<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diploma extends Model
{
    use HasFactory;

    protected $fillable = [
        'image', 'name', 'certificate', 'period', 'trainer', 'price', 'description', 'status','short_description'
    ];

    public function goals()
    {
        # code...

        return $this->hasMany(DiplomaGoal::class,'diploma_id','id');
    }
}
