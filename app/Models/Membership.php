<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'city', 'job_name', 'job_address', 'id_number',
        'id_date', 'id_source', 'phone', 'address', 'telephone', 'post_address',
        'type', 'start_date', 'tranfer_file', 'status'
    ];
}
