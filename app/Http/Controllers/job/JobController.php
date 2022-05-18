<?php

namespace App\Http\Controllers\job;

use App\Http\Controllers\Controller;
use App\Models\AddToWishList;
use App\Models\Job;
use App\Models\JobBenefit;
use App\Models\JobCategory;
use App\Models\JobQualificationList;
use App\Models\JobResponsibiltyList;
use App\Models\JobShift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function job()
    {

        $jobShifts = JobShift::get();

        $value = [];
        foreach ($jobShifts as $val) {
            $value[] = $val->id;
        }


        $getJobsLists = Job::orderBy('id', 'DESC')
            ->get();

        return view('job.job', ['jobShifts' => $jobShifts, 'getJobsLists' => $getJobsLists]);
    }

    public function postJob()
    {

        $jobCategory = JobCategory::get();
        $jobShifts   = JobShift::get();

        return view('job.postJob', ['jobShifts' => $jobShifts, 'jobCategory' => $jobCategory]);
    }

    public function storeJobPost(Request $request)
    {



        $company_logo = "";

        if ($request->hasfile('company_logo')) {
            $image    = request()->file('company_logo');
            $new_name =  $request->file('company_logo')->getClientOriginalName();
            $image->move(public_path('/uploads/company_logo'), $new_name);
            $company_logo = $new_name;
        } else {
            $company_logo = "";
        }


        $storeJobs = new Job();

        $storeJobs->company_name       = $request->company_name;
        $storeJobs->company_email      = $request->company_email;
        $storeJobs->company_detail     = $request->comp_detail;
        $storeJobs->job_name           = $request->job_name;
        $storeJobs->job_location       = $request->job_location;
        $storeJobs->job_salary         = $request->salary;
        $storeJobs->job_description    = $request->job_description;
        $storeJobs->job_responsibility = $request->resp_desc;
        $storeJobs->job_qualification  = $request->qualification_desc;
        $storeJobs->job_benefit        = $request->benefit_desc;
        $storeJobs->job_vacancy        = $request->job_vacancy;
        $storeJobs->job_end_date       = $request->job_duration;
        $storeJobs->job_shift_id       = $request->job_shift;
        $storeJobs->job_category_id    = $request->job_category;
        $storeJobs->user_id            = Auth::id();
        $storeJobs->company_logo       = $company_logo;

        $storeJobs->save();

        $job_id = $storeJobs->id;

        if ($request->resp_list) {
            for ($i = 0; $i < count($request->resp_list); $i++) {

                $saveRespList = new JobResponsibiltyList();
                $saveRespList->job_id                 = $job_id;
                $saveRespList->job_responsibilty_list = $request->resp_list[$i];
                $saveRespList->save();
            }
        } else {
        }


        if ($request->qualification_list) {
            foreach ($request->qualification_list as $key => $addQual) {

                $saveQualList = new JobQualificationList();
                $saveQualList->job_id                 = $job_id;
                $saveQualList->job_qualification_list = $request->qualification_list[$key];
                $saveQualList->save();
            }
        } else {
        }

        if ($request->benefits_list) {
            foreach ($request->benefits_list as $key => $addBenefit) {

                $saveBenefit = new JobBenefit();
                $saveBenefit->job_id = $job_id;
                $saveBenefit->job_benefit_name = $request->benefits_list[$key];
                $saveBenefit->save();
            }
        } else {
        }


        return redirect()->route('JobPortal.Job');
    }

    public function getJobDetail($job_id){


        $getJobDetails = Job::with(['getJobBenefits','getQualification','getResp'])
        ->where('id',$job_id)
        ->get();

        $jobShifts   = JobShift::get();

        return view('job.jobDetail',['getJobDetails' => $getJobDetails,'jobShifts'=>$jobShifts]);

    }

    public function favJobList(){

        $favLists = AddToWishList::where(['user_id'=>Auth::id()])
        ->get();

        return view('job.favJobList',['favLists'=>$favLists]);

    }

    public function storeFavJob(Request $request){

    //    dd($request->all());

        $jobID = $request->get('jobID');
        $cat = $request->get('cat');
        $shiftId = $request->get('shiftId');

        $storeWishList  = new AddToWishList([
                'fav_job_id' => $jobID,
                'job_cat_id' => $cat,
                'job_shift_id' => $shiftId,
                'user_id' => Auth::id(),
        ]);

            $storeWishList->save();

            return "Saved";




    }


}
