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

        $jobshift      = $request->input('jobshift') ?? '';
        $salary        = $request->input('salary') ?? '';
        $qualification = $request->input('qualification') ?? '';
        $experience    = $request->input('experience') ?? '';
        $category      = $request->input('jobcat') ?? '';
        $time          = $request->input('dateposted') ?? '';
        $order         = $request->input('orderBy') ?? '';
        $search        = $request->input('search') ?? '';

        if ($jobshift) {

            return $query->jobshift($jobshift);
        }
        if ($salary) {

            return $query->salary($salary);
        }
        if ($jobshift && $salary){

            return $query->jobshift($jobshift)->salary($salary);
        }
        if ($qualification) {

            return $query->qualification($qualification);
        }
        if ($experience) {

            return $query->experience($experience);
        }
        if ($category) {

            return $query->category($category);
        }
        if ($time) {

            return $query->time($time);
        }
        if ($search) {

            return $query->search($search);
        }
        if ($order) {

            return $query->order($order);
        }
        // if (($jobshift) || ($salary) || ($order) || ($search) || ($category) || ($time) || ($experience) || ($qualification)) {

        //     return $query->jobshift($jobshift)->salary($salary)->category($category)->time($time)->experience($experience)->qualification($qualification);
        // }
    }

    public function scopeJobShift($query, $jobShift)
    {
        return  $query->whereIn('job_shift_id', @$jobShift);
    }

    public function scopeSalary($query, $salary)
    {
        return  $query->whereIn('job_salary', @$salary);
    }

    public function scopeQualification($query, $qualification)
    {
        return  $query->whereIn('qualification_id', @$qualification);
    }

    public function scopeExperience($query, $experience)
    {
        return  $query->whereIn('experience_id', @$experience);
    }

    public function scopeCategory($query, $category)
    {
        return  $query->whereIn('job_category_id', @$category);
    }

    public function scopeSearch($query, $search)
    {
        return  $query->where('job_name', 'LIKE', '%' . $search . "%");
    }

    public function scopeOrder($query, $order)
    {
        return  $query->orderBy('created_at',$order);
    }


    public function scopeTime($query, $time)
    {
        // $time=[];

        return $query->where(function ($q) use ($time) {
            for ($i = 0; $i < count($time); $i++) {
                $q->where('created_at', '>=', Carbon::now()->subDays($time[$i]));
            }
        });
    }
}
