@extends('layout.master')
@section('content')



    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
        <form method="POST" action="{{route('JobPortal.StoreJobPost')}}" enctype="multipart/form-data">
            @csrf



                <div class="d-flex justify-content-between align-items-center mb-3 mt-2">
                    <h6 class="text-right">Post A Job</h6>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Company Name</label><input type="text"
                            class="form-control" name="company_name" placeholder="Company Name"></div>
                    <div class="col-md-6"><label class="labels">Company Email</label><input type="text"
                            class="form-control" name="company_email" placeholder="Company Email"></div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">Company Detail</label>
                        <textarea type="text" name="comp_detail" class="form-control" placeholder="Company Detail"></textarea>
                    </div>

                </div>

                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">Job Name</label><input type="text"
                            class="form-control" name="job_name" placeholder="Job Name"></div>

                </div>
                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">Job Description</label>
                        <textarea type="text" name="job_description" class="form-control" placeholder="Job Description"></textarea>
                    </div>

                </div>

                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Job Location</label><input type="text"
                            class="form-control" name="job_location" placeholder="Job Location"></div>
                    <div class="col-md-6"><label class="labels">Salary (₹) </label>
                        <select  name="salary" class="form-control" placeholder="Salary">
                            <option selected disabled>Select Salary</option>
                            @foreach ($offerSalary as $salary)
                                <option value="{{ $salary->id }}">{{ $salary->salary_name }}</option>
                            @endforeach

                        </select>

                        </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Experience</label>
                        <select type="text" class="form-control" placeholder="Experience" name="experience">
                            <option selected disabled>Select Experience</option>
                            @foreach ($experience as $exp)
                                <option value="{{ $exp->id }}">{{ $exp->experience_name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Qualification</label>
                        <select type="text" name="qualification" class="form-control" placeholder="Qualification">
                            <option selected disabled>Select Qualification</option>
                            @foreach ($qualifications as $qualification)
                                <option value="{{ $qualification->id }}">{{ $qualification->qualification_name }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">Responsibility</label>
                        <textarea type="text" class="form-control" name="resp_desc" placeholder="Responsibility"></textarea>
                    </div>

                    <div id="addMoreResp"></div>


                    <div>
                        <span onclick="addResp()"
                            class="btn btn-primary profile-button border mt-2 px-3 p-1 add-experience"><i
                                class="fa fa-plus"></i>&nbsp;Add Responsibilty</span>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">Qualifications</label>
                        <textarea type="text" class="form-control" placeholder="Qualifications" name="qualification_desc"></textarea>
                    </div>

                    <div id="addMoreQualification"></div>


                    <div>
                        <span onclick="addQualification()"
                            class=" mt-2 btn btn-primary profile-button border px-3 p-1 add-experience"><i
                                class="fa fa-plus"></i>&nbsp;Add Qualifications</span>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">Benefits</label>
                        <textarea type="text" class="form-control" placeholder="Benefits" name="benefit_desc"></textarea>
                    </div>

                    <div id="addMoreBenefit"></div>


                    <div>
                        <span onclick="addBenefit()"
                            class="mt-3 btn btn-primary profile-button border px-3 p-1 add-experience"><i
                                class="fa fa-plus"></i>&nbsp;Add Benefits</span>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Job Vacancy</label><input type="text"
                            class="form-control" name="job_vacancy" placeholder="Total Vacancy"></div>
                    <div class="col-md-6"><label class="labels">Job Duration</label><input type="date"
                            class="form-control" name="job_duration" placeholder="Post End Date"></div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Job Shift</label>
                        <select type="text" class="form-control" placeholder="Job Shift" name="job_shift">
                            <option selected disabled>Select Job Shift</option>
                            @foreach ($jobShifts as $jobShift)
                                <option value="{{ $jobShift->id }}">{{ $jobShift->job_shift_name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Job Category</label>
                        <select type="text" name="job_category" class="form-control" placeholder="Job Category">
                            <option selected disabled>Select Job Category</option>
                            @foreach ($jobCategory as $jobCat)
                                <option value="{{ $jobCat->id }}">{{ $jobCat->job_category_name }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>


                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Company Logo</label>
                        <input id="addLogo" name="company_logo" accept="image/*" type="file" class="form-control"
                            placeholder="company_logo">
                    </div>
                    <div class="col-md-6"><img id="outputLogo" class="flex-shrink-0 img-fluid border rounded"
                            src="{{ asset('img/yourlogo.png') }}" alt="" style="width: 80px; height: 80px;">
                    </div>

                </div>

                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">
                        Post Job</button></div>



        </form>
    </div>
        <div class="col-md-1"></div>
    </div>
@endsection
