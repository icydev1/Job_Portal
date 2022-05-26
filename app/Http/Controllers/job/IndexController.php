<?php

namespace App\Http\Controllers\job;

use App\Http\Controllers\Controller;

use App\Models\JobCategory;

use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(){


        $jobCategory = JobCategory::get();

        return view('job.index',['jobCategory' => $jobCategory]);

    }





}
