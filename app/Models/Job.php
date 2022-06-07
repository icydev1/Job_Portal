<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = "jobss";
    protected $gaurded = [];
    protected $guarded = [];

    public function getJobBenefits(){

        return $this->hasMany(JobBenefit::class,'job_id');


    }

    public function getQualification(){

        return $this->hasMany(JobQualificationList::class,'job_id');

    }

    public function getResp(){

        return $this->hasMany(JobResponsibiltyList::class,'job_id');

    }



}
