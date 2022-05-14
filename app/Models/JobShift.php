<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobShift extends Model
{
    use HasFactory;
    protected $table = "job_shifts";
    protected $gaurded = [];
    protected $guarded = [];
}
