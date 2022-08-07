<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobList extends Model
{

    use HasFactory;

    protected $table = "job_lists";
    protected $guarded = [];

    public function getJobBenefits()
    {

        return $this->hasMany(JobBenefit::class, 'job_id');
    }

    public function getQualification()
    {

        return $this->hasMany(JobQualificationList::class, 'job_id');
    }

    public function getResp()
    {

        return $this->hasMany(JobResponsibiltyList::class, 'job_id');
    }


    public function scopeApplyFilter($query, $request)
    {

        $jobshift      = $request->input('jobshift');
        $salary        = $request->input('salary');
        $qualification = $request->input('qualification');
        $experience    = $request->input('experience');
        $category      = $request->input('jobcat');
        $time          = $request->input('dateposted');
        // $order         = $request->input('orderBy');
        // $search = $request->input('search');

        if ($jobshift) {
            dump('jobshift');
            return $query->jobshift($jobshift);
        } elseif ($salary) {
            return $query->salary($salary);
            dump('salary');
        } elseif ($qualification) {
            dump('qualification');
            return $query->qualification($qualification);
        } elseif ($experience) {
            dump('experience');
            return $query->experience($experience);
        } elseif ($category) {
            dump('category');
            return $query->category($category);
        } elseif ($time) {
            dump('time');
            return $query->time($time);
        // } elseif ($search) {
        //     return $query->search($search);
        }elseif($jobshift && $salary && $qualification && $experience && $category && $time ){
            dump('all');
            return $query->jobshift($jobshift)
            ->salary($salary)
            ->qualification($qualification)
            ->experience($experience)
            ->category($category)
            ->time($time);
            // ->search($search)
        }
    }

    public function scopeJobShift($query, $jobShift = null)
    {
        return  $query->whereIn('job_shift_id', $jobShift);
    }

    public function scopeSalary($query, $salary = null)
    {
        return  $query->whereIn('job_salary', $salary);
    }

    public function scopeQualification($query, $qualification = null)
    {
        return  $query->whereIn('qualification_id', $qualification);
    }

    public function scopeExperience($query, $experience = null)
    {
        return  $query->whereIn('experience_id', $experience);
    }

    public function scopeCategory($query, $category = null)
    {
        return  $query->whereIn('job_category_id', $category);
    }

    // public function scopeSearch($query, $search = null)
    // {
    //     return  $query->where('job_name','LIKE','%'.$search."%");
    // }


    public function scopeTime($query, $time = null)
    {

        return $query->where(function ($q) use ($time) {
            for ($i = 0; $i < count($time); $i++) {
                $q->where('created_at', '>=', Carbon::now()->subDays($time[$i]));
            }
        });
    }
}
