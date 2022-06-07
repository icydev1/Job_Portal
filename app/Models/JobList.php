<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobList extends Model
{

    use HasFactory;

    protected $table = "job_lists";
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
