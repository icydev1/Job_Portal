<?php

namespace App\Http\Controllers\job;

use App\Http\Controllers\Controller;
use App\Models\AddToWishList;
use App\Models\ApplyJobPost;
use App\Models\Job;
use App\Models\JobBenefit;
use App\Models\JobCategory;
use App\Models\JobQualificationList;
use App\Models\JobResponsibiltyList;
use App\Models\JobShift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
// use Illuminate\Support\Facades\Session;

class JobController extends Controller
{
    public function job()
    {
        $jobID =  Session::get('job_id');


        $jobShifts = JobShift::get();

        $value = [];
        foreach ($jobShifts as $val) {
            $value[] = $val->id;
        }


        $getJobsLists = Job::orderBy('id', 'DESC')
            ->get();

        $getFavJob = AddToWishList::where('user_id', Auth::id())
            ->where('status', 0)
            ->orderBy('id', 'DESC')
            ->get();

        return view('job.job', ['getFavJob' => $getFavJob, 'jobShifts' => $jobShifts, 'getJobsLists' => $getJobsLists]);
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

    public function getJobDetail(Request $request, $job_id)
    {


        // Session::put(['jobID'=>$job_id]);

        $getJobDetails = Job::with(['getJobBenefits', 'getQualification', 'getResp'])
            ->where('id', $job_id)
            ->get();

        $jobShifts   = JobShift::get();

        return view('job.jobDetail', ['getJobDetails' => $getJobDetails, 'jobShifts' => $jobShifts]);
    }

    public function favJobList(Request $request)
    {


        $favLists = AddToWishList::with(['getFavList'])
            ->where(['user_id' => Auth::id()])
            ->where('status', '!=', 1)
            ->get();

        $count = AddToWishList::where(['user_id' => Auth::id()])
            ->where('status', 0)->count('fav_job_id');

        Session::put(['count' => $count]);


        $jobCategory = JobCategory::get();
        $jobShifts   = JobShift::get();

        return view('job.favJobList', ['favLists' => $favLists, 'jobShifts' => $jobShifts, 'jobCategory' => $jobCategory]);
    }

    public function storeFavJob(Request $request)
    {



        $jobID   = $request->get('jobID');
        $cat     = $request->get('cat');
        $shiftId = $request->get('shiftId');

        // for insert  new  status by ajax
        $exists = AddToWishList::
        where('fav_job_id', $jobID)
        ->where('user_id', Auth::id())
        ->exists();


        // for checking  update status by ajax
        $alreadyExists =  AddToWishList::
        where('fav_job_id', $jobID)
        ->where('user_id', Auth::id())
        ->where('status', 0)
        ->exists();

        if (!$exists) {

            $storeWishList  = new AddToWishList([
                'fav_job_id'   => $jobID,
                'job_cat_id'   => $cat,
                'job_shift_id' => $shiftId,
                'user_id'      => Auth::id(),
            ]);

            $storeWishList->save();

            $count = AddToWishList::
                where(['user_id' => Auth::id()])
                ->where('status', 0)
                ->count('fav_job_id');


            return response()->json(['data' => $count, 'message' => 'Saved'], 200);
        } else if ($alreadyExists) {

            return "already added";
        } else {
            $exists = AddToWishList::
                where('fav_job_id', $jobID)
                ->where('user_id', Auth::id())
                ->update(['status' => 0]);

            $count = AddToWishList::
                where(['user_id' => Auth::id()])
                ->where('status', 0)
                ->count('fav_job_id');

            return response()->json(['data' => $count, 'message' => 'Saved'], 200);
        }
    }

    public function removeFavList(Request $request)
    {

        $id = $request->get('removeId');

        $RemoveFavList = AddToWishList::where('id', $id)
                         ->update(['status' => 1]);

        $count = AddToWishList::where(['user_id' => Auth::id()])
                 ->where('status', 0)
                 ->count('fav_job_id');

        return response()->json(['data' => $count, 'message' => 'delete'], 200);
    }

    public function applyForJob(Request $request)
    {

        $request->validate([

            'user_name'    => 'required',
            'user_email'   => 'required',
            'website_link' => 'required',
            'user_file'    => 'required',
            'coverletter'  => 'required',

        ]);

        if ($request->hasfile('user_file')) {
            $image    = request()->file('user_file');
            $new_name =  $request->file('user_file')->getClientOriginalName();
            $image->move(public_path('/uploads/user_resume'), $new_name);
            $resume = $new_name;
        } else {
            $resume = "";
        }





        $jobApply = new ApplyJobPost([
            'user_name'              => $request->user_name,
            'user_email'             => $request->user_email,
            'portfolio_website_link' => $request->website_link,
            'user_resume'            => $resume ?? '',
            'cover_letter'           => $request->coverletter,
            'user_id'                => Auth::id(),
            'job_cat_id'             => $request->job_cat_id,
            'job_shift_id'           => $request->job_shift_id,
            'apply_job_id'           => $request->apply_job_id,
        ]);

        $jobApply->save();

        return redirect()->route('JobPortal.Job');
    }


    public function getJobList(){

        return view('job.jobApplyList');

    }


}
