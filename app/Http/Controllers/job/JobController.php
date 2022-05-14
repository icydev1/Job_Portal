<?php

namespace App\Http\Controllers\job;

use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use App\Models\JobShift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function job(){


        $jobShifts = JobShift::get();

        return view('job.job',['jobShifts'=>$jobShifts]);

    }

    public function postJob(){

        $jobCategory = JobCategory::get();
        $jobShifts = JobShift::get();

        return view('job.postJob',['jobShifts'=>$jobShifts,'jobCategory' => $jobCategory]);

    }


}
