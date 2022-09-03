@extends('layout.master')
@section('content')


    <div class="row mt-4">
        <div class="col-lg-3">
            <div class="sidebar">
                <div class="widget border-0">
                    <div class="search d-none">
                        <input name="freesearch" id="freeSearch" onkeyup="searchJobFilter()" class="form-control" type="text" placeholder="Search Keywords">
                    </div>
                </div>
                <div class="widget border-0 d-none">
                    <div class="locations">
                        <input name="location" multiple onchange="searchJobFilter()" value="" class="form-control" type="text" placeholder="All Locations">
                    </div>
                </div>
                <div class="widget">
                    <div class="widget-title widget-collapse">
                        <h6>Date Posted</h6>
                        <a class="ml-auto" data-toggle="collapse" href="#dateposted" role="button" aria-expanded="false" aria-controls="dateposted"> <i class="fas fa-chevron-down"></i> </a>
                    </div>
                    <div class="collapse show" id="dateposted">
                        <div class="widget-content">
                            @foreach ($times as $time)
                            <div class="custom-control custom-checkbox">
                                <input name="time[]" onchange="searchJobFilter()" multiple onchange="searchJobFilter()" value="{{$time->time_days}}" type="checkbox" class="custom-control-input" id="dateposted">
                                <label class="custom-control-label" for="dateposted1">{{$time->time_name}}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="widget">
                    <div class="widget-title widget-collapse">
                        <h6>Specialism</h6>
                        <a class="ml-auto" data-toggle="collapse" href="#specialism" role="button" aria-expanded="false" aria-controls="specialism"> <i class="fas fa-chevron-down"></i> </a>
                    </div>
                    <div class="collapse show" id="specialism">
                        <div class="widget-content">

                            @foreach ($jobCategory as $jobcat)
                            <div class="custom-control custom-checkbox">
                                <input  multiple onchange="searchJobFilter()" value="{{$jobcat->id}}" type="checkbox" class="custom-control-input" name="jobcat[]"    id="specialism1">
                                <label class="custom-control-label" for="specialism1">{{$jobcat->job_category_name}}</label>
                            </div>
                            @endforeach


                        </div>
                    </div>
                </div>
                <div class="widget">
                    <div class="widget-title widget-collapse">
                        <h6>Job Type</h6>
                        <a class="ml-auto" data-toggle="collapse" href="#jobtype" role="button" aria-expanded="false" aria-controls="jobtype"> <i class="fas fa-chevron-down"></i> </a>
                    </div>
                    <div class="collapse show" id="jobtype">
                        <div class="widget-content">
                            @foreach ($jobShifts as $jobShift)
                            <div class="custom-control custom-checkbox fulltime-job">
                                <input name="jobshift[]" multiple onchange="searchJobFilter()"  value="{{$jobShift->id}}" type="checkbox" class="custom-control-input" id="jobtype1">
                                <label class="custom-control-label" for="jobtype1">{{$jobShift->job_shift_name}}</label>
                            </div>
                            @endforeach


                        </div>
                    </div>
                </div>
                <div class="widget">
                    <div class="widget-title widget-collapse">
                        <h6>Experience</h6>
                        <a class="ml-auto" data-toggle="collapse" href="#experience" role="button" aria-expanded="false" aria-controls="experience"> <i class="fas fa-chevron-down"></i> </a>
                    </div>
                    <div class="collapse show" id="experience">
                        <div class="widget-content">
                            @foreach ($experience as $exp)
                            <div class="custom-control custom-checkbox">
                                <input name="experience[]" value="{{$exp->id}}" multiple onchange="searchJobFilter()"  type="checkbox" class="custom-control-input" id="experience1">
                                <label class="custom-control-label" for="experience1">{{$exp->experience_name}}</label>
                            </div>
                            @endforeach


                        </div>
                    </div>
                </div>
                <div class="widget">
                    <div class="widget-title widget-collapse">
                        <h6>Offered Salary</h6>
                        <a class="ml-auto" data-toggle="collapse" href="#Offeredsalary" role="button" aria-expanded="false" aria-controls="Offeredsalary"> <i class="fas fa-chevron-down"></i> </a>
                    </div>
                    <div class="collapse show" id="Offeredsalary">
                        <div class="widget-content">
                        @foreach ($offerSalary as $salary)
                        <div class="custom-control custom-checkbox">
                            <input name="salary[]" multiple onchange="searchJobFilter()"  type="checkbox" value="{{$salary->id}}" class="custom-control-input" id="Offeredsalary1">
                            <label class="custom-control-label" for="Offeredsalary1">{{$salary->salary_name}}</label>
                        </div>
                        @endforeach


                        </div>
                    </div>
                </div>
                {{-- <div class="widget">
                    <div class="widget-title widget-collapse">
                        <h6>Gender</h6>
                        <a class="ml-auto" data-toggle="collapse" href="#gender" role="button" aria-expanded="false" aria-controls="gender"><i class="fas fa-chevron-down"></i></a>
                    </div>
                    <div class="collapse show" id="gender">
                        <div class="widget-content">
                            <div class="custom-control custom-checkbox">
                                <input name="[]" multiple onchange="searchJobFilter()" value="{{}}" type="checkbox" class="custom-control-input" id="gender1">
                                <label class="custom-control-label" for="gender1">Male</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input name="[]" multiple onchange="searchJobFilter()" value="{{}}" type="checkbox" class="custom-control-input" id="gender2">
                                <label class="custom-control-label" for="gender2">Female</label>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="widget">
                    <div class="widget-title widget-collapse">
                        <h6>Qualification</h6>
                        <a class="ml-auto" data-toggle="collapse" href="#qualification" role="button" aria-expanded="false" aria-controls="qualification"> <i class="fas fa-chevron-down"></i></a>
                    </div>
                    <div class="collapse show" id="qualification">
                        <div class="widget-content">


                            @foreach ($qualifications as $qualification)
                            <div class="custom-control custom-checkbox">
                                <input name="qualification[]" value="{{$qualification->id}}" multiple onchange="searchJobFilter()"  type="checkbox" class="custom-control-input" id="qualification1">
                                <label class="custom-control-label" for="qualification1">{{$qualification->qualification_name}}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="widget border-0">
                    <div class="widget-add">
                        <img class="img-fluid" src="images/add-banner.png" alt=""></div>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            {{-- <div class="row mb-4">
                <div class="col-12">
                    <h6 class="mb-0">Showing 1-10 of <span class="text-primary">28 Candidates</span></h6>
                </div>
            </div> --}}
            <div class="job-filter mb-4 d-sm-flex align-items-center ">
                <div class="job-alert-bt"> <a class="btn btn-md btn-dark" href="#"><i class="fa fa-envelope"></i>Get job alert </a> </div>
                <div class="job-shortby ml-sm-auto d-flex align-items-center">
                    <form class="form-inline">
                        <div class="form-group mb-0">
                            <label class="justify-content-start mr-2">Sort by :</label>
                            <div class="short-by d-none">
                                <select name="order_by" onchange="searchJobFilter()" id="orderBy" class="form-control basic-select select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option value="desc">Newest</option>
                                    <option value="asc" >Oldest</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <div id="searchJob"></div>


                @include('job.scopeFilter')

            {{-- <div class="row">
                <div class="col-12 text-center mt-4 mt-sm-5">
                    <ul class="pagination justify-content-center mb-0">
                        <li class="page-item disabled"> <span class="page-link">Prev</span> </li>
                        <li class="page-item active" aria-current="page"><span class="page-link">1 </span> <span class="sr-only">(current)</span></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">...</a></li>
                        <li class="page-item"><a class="page-link" href="#">25</a></li>
                        <li class="page-item"> <a class="page-link" href="#">Next</a> </li>
                    </ul>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
