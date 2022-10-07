<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiplomaGoal extends Model
{
    use HasFactory;

    protected $fillable = [
        'diploma_id', 'name'
    ];
}
