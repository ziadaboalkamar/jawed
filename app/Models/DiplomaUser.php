<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiplomaUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'diploma_id', 'status', 'payment_type', 'payment_file'
    ];

    public function diploma()
    {
        # code...
        return $this->belongsTo(Diploma::class,'diploma_id', 'id');
    }

    public function user()
    {
        # code...
        return $this->belongsTo(User::class,'user_id', 'id');
    }
}
