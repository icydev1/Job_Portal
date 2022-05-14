<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobBenefit extends Model
{
    use HasFactory;


    protected $table = "job_benefits";
    protected $gaurded = [];
    protected $guarded = [];

}
