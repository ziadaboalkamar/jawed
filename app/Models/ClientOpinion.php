<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientOpinion extends Model
{
    use HasFactory;

    protected $fillable = [
        'message', 'name', 'image', 'client_position'
    ];
}
