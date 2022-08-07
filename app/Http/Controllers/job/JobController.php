<?php

namespace App\Http\Controllers\job;

use App\Events\HireUserEvent;
use App\Events\UserPostJob;
use App\Http\Controllers\Controller;
use App\Mail\HiringMail;
use App\Mail\PostJob;
use App\Models\AddToWishList;
use App\Models\ApplyJobPost;
use App\Models\Experience;
use App\Models\Job;
use App\Models\JobBenefit;
use App\Models\JobCategory;
use App\Models\JobList;
use App\Models\JobQualificationList;
use App\Models\JobResponsibiltyList;
use App\Models\JobShift;
use App\Models\OfferSalary;
use App\Models\Qualification;
use App\Models\Time;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\JobName;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
// use Illuminate\Support\Facades\Session;

class JobController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('user')->except('logout');
    // }



    public function job()
    {


        $jobShifts = JobShift::get();

        $offerSalary   = OfferSalary::get();

        $getJobsLists = JobList::orderBy('id', 'DESC')
            ->where('status', 0)
            ->get();

        $getFavJob = AddToWishList::where('user_id', Auth::id())
            ->where('status', 0)
            ->orderBy('id', 'DESC')
            ->get();

        return view('job.job', ['offerSalary'=>$offerSalary,'getFavJob' => $getFavJob, 'jobShifts' => $jobShifts, 'getJobsLists' => $getJobsLists]);
    }

    public function postJob()
    {

        $jobCategory = JobCategory::get();
        $jobShifts   = JobShift::get();
        $offerSalary   = OfferSalary::get();
        $experience   = Experience::get();
        $qualifications   = Qualification::get();

        return view('job.postJob', ['qualifications'=>$qualifications,'experience'=>$experience,'offerSalary'=>$offerSalary,'jobShifts' => $jobShifts, 'jobCategory' => $jobCategory]);
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


        $storeJobs = new JobList();

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
        $storeJobs->qualification_id   = $request->qualification;
        $storeJobs->experience_id      = $request->experience;
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
        // Mail::to($request->company_email)->send(new PostJob($storeJobs));


        //helper function

        // for updating balance in wallet

        $balance = checkBalance();

        $freeCredits = freePostJob();

        if ($freeCredits > 0) {

            User::where('id', Auth::id())->update(
                [
                    'quantity' => $freeCredits - 1,
                ]
            );
        } else if ($balance >= 0) {

            Wallet::where('user_id', Auth::id())->update(
                [
                    'wallet_amount' => $balance - 100,
                ]
            );
        };



        // event(new UserPostJob($storeJobs));

        return redirect()->route('JobPortal.Job');
    }



    public function editJobPost($job_id)
    {



        $jobCategory = JobCategory::get();
        $jobShifts   = JobShift::get();
        $offerSalary   = OfferSalary::get();
        $experience   = Experience::get();
        $qualifications   = Qualification::get();

        $getJobDetails = JobList::with(['getJobBenefits', 'getQualification', 'getResp'])
            ->where('id', $job_id)
            ->where('status', 0)
            ->get();

        return view('job.editJobPost', ['qualifications'=>$qualifications,'experience'=>$experience,'offerSalary'=>$offerSalary,'jobShifts' => $jobShifts, 'jobCategory' => $jobCategory, 'getJobDetails' => $getJobDetails]);
    }


    public function updateJobPost(Request $request, $job_id)
    {



        if (!empty($request->hasfile('company_logo'))) {
            $image    = request()->file('company_logo');
            $new_name =  $request->file('company_logo')->getClientOriginalName();
            $image->move(public_path('/uploads/company_logo'), $new_name);
            $company_logo = $new_name;
        } else {

            $company_logo = $request->hidden_company_logo;
        }



        $updateData = [

            'company_name'       => $request->company_name,
            'company_email'      => $request->company_email,
            'company_detail'     => $request->comp_detail,
            'job_name'           => $request->job_name,
            'job_description'    => $request->job_description,
            'job_location'       => $request->job_location,
            'job_salary'         => $request->salary,
            'job_responsibility' => $request->resp_desc,
            'job_qualification'  => $request->qualification_desc,
            'job_benefit'        => $request->benefit_desc,
            'qualification_id'   => $request->qualification,
            'experience_id'      => $request->experience,
            'job_vacancy'        => $request->job_vacancy,
            'job_shift_id'       => $request->job_shift,
            'job_category_id'    => $request->job_category,
            'company_logo'       => $company_logo,

        ];

        JobList::where('id', $job_id)->update($updateData);

        if ($request->hidden_benefit) {


            for ($i = 0; $i < count($request->hidden_benefit); $i++) {

                JobBenefit::where('id', $request->benefit_id[$i])->update(['job_benefit_name' => $request->benefits_list_update[$i]]);
            }
        } else {
        }
        if ($request->hidden_resp) {


            for ($i = 0; $i < count($request->hidden_resp); $i++) {

                JobResponsibiltyList::where('id', $request->resp_id[$i])->update(['job_responsibilty_list' => $request->resp_list_update[$i]]);
            }
        } else {
        }
        if ($request->hidden_qual) {


            for ($i = 0; $i < count($request->hidden_qual); $i++) {

                JobQualificationList::where('id', $request->qual_id[$i])->update(['job_qualification_list' => $request->qualification_list_update[$i]]);
            }
        } else {
        }

        if ($request->benefits_list) {
            foreach ($request->benefits_list as $key => $addBenefit) {

                $saveBenefit = new JobBenefit();
                $saveBenefit->job_id           = $job_id;
                $saveBenefit->job_benefit_name = $request->benefits_list[$key];
                $saveBenefit->save();
            }
        } else {
        }

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
        return redirect()->route('JobPortal.GetJobDetail', ['job_id' => $job_id]);
    }


    public function getJobDetail(Request $request, $job_id)
    {


        // Session::put(['jobID'=>$job_id]);

        $getJobDetails = JobList::with(['getJobBenefits', 'getQualification', 'getResp'])
            ->where('id', $job_id)
            ->where('status', 0)
            ->get();

            $offerSalary   = OfferSalary::get();
            $experience   = Experience::get();
            $qualifications   = Qualification::get();
            $jobShifts   = JobShift::get();

        return view('job.jobDetail', ['qualifications'=>$qualifications,'experience'=>$experience,'offerSalary'=>$offerSalary,'getJobDetails' => $getJobDetails, 'jobShifts' => $jobShifts]);
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
        $exists = AddToWishList::where('fav_job_id', $jobID)
            ->where('user_id', Auth::id())
            ->exists();


        // for checking  update status by ajax
        $alreadyExists =  AddToWishList::where('fav_job_id', $jobID)
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

            $count = AddToWishList::where(['user_id' => Auth::id()])
                ->where('status', 0)
                ->count('fav_job_id');


            return response()->json(['data' => $count, 'message' => 'Saved'], 200);
        } else if ($alreadyExists) {

            return "already added";
        } else {
            $exists = AddToWishList::where('fav_job_id', $jobID)
                ->where('user_id', Auth::id())
                ->update(['status' => 0]);

            $count = AddToWishList::where(['user_id' => Auth::id()])
                ->where('status', 0)
                ->count('fav_job_id');

            return  'Saved';
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


    public function getJobList()
    {

        $myjobs = JobList::where(['user_id' => Auth::id(), 'status' => 0])->get();

        $jobShifts = JobShift::get();

        $offerSalary   = OfferSalary::get();

        return view('job.jobApplyList', ['offerSalary'=>$offerSalary,'myjobs' => $myjobs, 'jobShifts' => $jobShifts]);
    }

    public function getJobUserList($job_id)
    {

        $jobusers = User::join('apply_job_posts', 'apply_job_posts.user_id', '=', 'users.id')
            ->where('apply_job_id', $job_id)
            ->where('apply_job_posts.status', '!=', 1)
            ->orderBy('apply_job_posts.id', 'DESC')
            ->get();

        return view('job.jobUserList', ['jobusers' => $jobusers]);
    }

    public function deleteJob($delete_job_id)
    {

        JobList::where('id', $delete_job_id)->update(['status' => 1]);

        AddToWishList::where('fav_job_id', $delete_job_id)
            ->update(['status' => 1]);

        return redirect()->route('JobPortal.Index');
    }

    public function deleteResp(Request $request)

    {
        $id = $request->get('removeRespId');
        JobResponsibiltyList::where('id', $id)->delete();

        return response()->json(['message' => 'delete'], 200);
    }

    public function deleteQual(Request $request)
    {
        $id = $request->get('removeQualId');
        JobQualificationList::where('id', $id)->delete();

        return response()->json(['message' => 'delete'], 200);
    }

    public function deleteBenefit(Request $request)
    {
        $id = $request->get('removeBenefitId');
        JobBenefit::where('id', $id)->delete();

        return response()->json(['message' => 'delete'], 200);
    }


    public function rejectApp(Request $request)
    {

        ApplyJobPost::where('id', $request->reject)->update(['status' => 1]);

        return response()->json(['message' => 'reject'], 200);
    }

    public function acceptApp(Request $request)
    {

        ApplyJobPost::where('id', $request->accept)->update(['status' => 2]);

        $getDetail =  ApplyJobPost::where('id', $request->accept)->first()->toArray();

        //    Mail::to($getDetail['user_email'])->send(new HiringMail($getDetail));

        // event(new HireUserEvent($getDetail));


        return response()->json(['message' => 'accept'], 200);
    }

    public function searchJobFilter(){

        $data = [

            'jobCategory'      => JobCategory::get(),
            'jobShifts'        => JobShift::get(),
            'offerSalary'      => OfferSalary::get(),
            'experience'       => Experience::get(),
            'qualifications'   => Qualification::get(),
            'times'            => Time::get(),

            'searchJob' => JobList::orderBy('id', 'DESC')
                ->where('status', 0)
                ->get(),

        ];

        return view('job.jobSearchFilter')->with($data);

    }

    public function getJobFilter(Request $request){

        $data = [

            'jobCategory'      => JobCategory::get(),
            'jobShifts'        => JobShift::get(),
            'offerSalary'      => OfferSalary::get(),
            'experience'       => Experience::get(),
            'qualifications'   => Qualification::get(),
            'times'            => Time::get(),


        ];

        $order  = $request->input('orderBy');
        $search = $request->input('search');

        $query = JobList::query();

        $searchJob = $query->applyfilter($request)->with(['getJobBenefits', 'getQualification', 'getResp'])
        ->where(function($q) use ($search) {
            $q->where('job_name','LIKE','%'.$search."%");
        })
        ->orderBy('created_at',$order)->get();

        // dd($searchJob);
        return view('job.scopeFilter',compact('searchJob'))->with($data);

    }


}
