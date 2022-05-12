<?php

namespace App\Http\Controllers\job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function job(){

        return view('job.job');

    }
}
