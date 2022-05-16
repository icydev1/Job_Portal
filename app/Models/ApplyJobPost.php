<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyJobPost extends Model
{
    use HasFactory;

    protected $table = "apply_job_posts";
    protected $gaurded = [];
    protected $guarded = [];

}
