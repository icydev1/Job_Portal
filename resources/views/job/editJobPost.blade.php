@extends('layout.master')
@section('content')
    @foreach ($getJobDetails as $getJobDetail)
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
            <form method="POST" action="{{ route('JobPortal.UpdateJobPost', ['job_id' => $getJobDetail->id]) }}"
                enctype="multipart/form-data">
                @csrf


                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="text-right">Post A Job</h6>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Company Name</label><input type="text"
                                    class="form-control" value="{{ $getJobDetail->company_name }}" name="company_name"
                                    placeholder="Company Name"></div>
                            <div class="col-md-6"><label class="labels">Company Email</label><input type="text"
                                    class="form-control" value="{{ $getJobDetail->company_email }}" name="company_email"
                                    placeholder="Company Email"></div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-12"><label class="labels">Company Detail</label>
                                <textarea type="text" name="comp_detail" class="form-control"
                                    placeholder="Company Detail">{{ $getJobDetail->company_detail }}</textarea>
                            </div>

                        </div>

                        <div class="row mt-2">
                            <div class="col-md-12"><label class="labels">Job Name</label><input type="text"
                                    class="form-control" value="{{ $getJobDetail->job_name }}" name="job_name"
                                    placeholder="Job Name"></div>

                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12"><label class="labels">Job Description</label>
                                <textarea type="text" name="job_description" class="form-control"
                                    placeholder="Job Description">{{ $getJobDetail->job_description }}</textarea>
                            </div>

                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Job Location</label><input type="text"
                                    class="form-control" value="{{ $getJobDetail->job_location }}" name="job_location"
                                    placeholder="Job Location"></div>
                            <div class="col-md-6"><label class="labels">Salary (₹) </label>
                                <select  name="salary" class="form-control" placeholder="Salary">
                                    <option selected disabled>Select Salary</option>
                                    @foreach ($offerSalary as $salary)
                                        <option value="{{ $salary->id }}" {{($salary->id == $getJobDetail->job_salary) ? 'selected' : '' }}>{{ $salary->salary_name }}</option>
                                    @endforeach

                                </select>
                                </div>
                        </div>


                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Experience</label>
                                <select type="text" class="form-control" placeholder="Experience" name="experience">
                                    <option selected disabled>Select Experience</option>
                                    @foreach ($experience as $exp)
                                        <option value="{{ $exp->id }}" {{($exp->id == $getJobDetail->experience_id) ? 'selected' : '' }}>{{ $exp->experience_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Qualification</label>
                                <select type="text" name="qualification" class="form-control" placeholder="Qualification">
                                    <option selected disabled>Select Qualification</option>
                                    @foreach ($qualifications as $qualification)
                                        <option value="{{ $qualification->id }}" {{($qualification->id == $getJobDetail->qualification_id) ? 'selected' : ''}}>{{ $qualification->qualification_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-12"><label class="labels">Responsibility</label>
                                <textarea type="text" class="form-control" name="resp_desc"
                                    placeholder="Responsibility">{{ $getJobDetail->job_responsibility }}</textarea>
                            </div>

                            <div>
                                @foreach ($getJobDetail->getResp as $getRespList)

                                    <div class="row mt-2" id="clearResp{{$getRespList->id}}" >
                                        <input type="hidden" name="resp_id[]" value="{{$getRespList->id}}">
                                        <input type="hidden" name="hidden_resp[]" value="Resp">
                                        <div class="col-md-11">
                                            <input type="text" value="{{ $getRespList->job_responsibilty_list }}"
                                                class="form-control" placeholder="Add Responsibilty List"
                                                name="resp_list_update[]" >
                                        </div>
                                        <div class="col-md-1  zoom"><span onclick="deleteResp({{$getRespList->id}})" class="removeBtn"><i
                                                    class="fa fa-trash"></i></span>
                                        </div>
                                    </div>
                                @endforeach
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
                                <textarea type="text" class="form-control" placeholder="Qualifications"
                                    name="qualification_desc">{{ $getJobDetail->job_qualification }}</textarea>
                            </div>


                            <div>
                                @foreach ($getJobDetail->getQualification as $getQuali)
                                <div class="row mt-2" id="clearQual{{$getQuali->id}}">
                                        <input type="hidden" name="qual_id[]" value="{{$getQuali->id}}">
                                         <input type="hidden" name="hidden_qual[]" value="Qualification">
                                        <div class="col-md-11">
                                            <input type="text" value="{{ $getQuali->job_qualification_list }}"
                                                class="form-control" placeholder="Add Qualification List"
                                                name="qualification_list_update[]" value="">
                                        </div>
                                        <div class="col-md-1  zoom"><span onclick="deleteQual({{$getQuali->id}})" class="removeBtn"><i
                                                    class="fa fa-trash"></i></span>
                                        </div>
                                    </div>
                                @endforeach
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
                                <textarea type="text" class="form-control" placeholder="Benefits"
                                    name="benefit_desc">{{ $getJobDetail->job_benefit }}</textarea>
                            </div>

                            <div>
                                @foreach ($getJobDetail->getJobBenefits as $getBenefits)
                                    <div class="row mt-2" id="clearBenefit{{$getBenefits->id}}">
                                        <input type="hidden" name="benefit_id[]" value="{{$getBenefits->id}}">
                                        <input type="hidden" name="hidden_benefit[]" value="benefits">
                                        <div class="col-md-11">
                                            <input type="text" value="{{ $getBenefits->job_benefit_name }}"
                                                class="form-control" placeholder="Add Benefits List"
                                                name="benefits_list_update[]" >
                                        </div>
                                        <div class="col-md-1  zoom"><span onclick="deleteBenefit({{$getBenefits->id}})" class="removeBtn"><i
                                                    class="fa fa-trash"></i></span>
                                        </div>
                                    </div>
                                @endforeach
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
                                    class="form-control" value={{ $getJobDetail->job_vacancy }} name="job_vacancy"
                                    placeholder="Total Vacancy"></div>
                            <div class="col-md-6"><label class="labels">Job Duration</label><input readonly
                                    type="date" class="form-control"
                                    value="{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $getJobDetail->job_end_date)->format('Y-m-d') }}"
                                    placeholder="Post End Date"></div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Job Shift</label>
                                <select type="text" class="form-control" placeholder="Job Shift" name="job_shift">
                                    <option selected disabled>Select Job Shift</option>
                                    @foreach ($jobShifts as $jobShift)
                                        <option value="{{ $jobShift->id }}"
                                            {{ $getJobDetail->job_shift_id == $jobShift->id ? 'selected' : '' }}>
                                            {{ $jobShift->job_shift_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Job Category</label>
                                <select type="text" name="job_category" class="form-control" placeholder="Job Category">
                                    <option selected disabled>Select Job Category</option>
                                    @foreach ($jobCategory as $jobCat)
                                        <option value="{{ $jobCat->id }}"
                                            {{ $getJobDetail->job_category_id == $jobCat->id ? 'selected' : '' }}>
                                            {{ $jobCat->job_category_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>


                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Company Logo</label>
                                <input id="addLogo" name="company_logo" accept="image/*" type="file" class="form-control"
                                    placeholder="company_logo">
                            </div>
                            @if (!empty($getJobDetail->company_logo))
                                <div class="col-md-6"><img id="outputLogo"
                                        class="flex-shrink-0 img-fluid border rounded"
                                        src="{{ asset('uploads/company_logo/' . $getJobDetail->company_logo) }}" alt=""
                                        style="width: 80px; height: 80px;">
                                </div>
                            @else
                                <div class="col-md-6"><img id="outputLogo"
                                        class="flex-shrink-0 img-fluid border rounded"
                                        src="{{ asset('img/yourlogo.png') }}" alt="" style="width: 80px; height: 80px;">
                                </div>
                            @endif

                            <input type="hidden" name="hidden_company_logo" value="{{ $getJobDetail->company_logo }}">

                        </div>

                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">
                                Update Job</button></div>


            </form>
        </div>
            <div class="col-md-1"></div>
        </div>
    @endforeach
@endsection
