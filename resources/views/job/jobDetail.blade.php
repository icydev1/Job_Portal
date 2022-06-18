
@extends('layout.master')
@section('content')
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">

            @foreach ($getJobDetails as $getJobDetail)
                <div class="row gy-5 gx-4">
                    <div class="col-lg-8">
                        <div class="d-flex align-items-center mb-5">
                            @if (!empty($getJobDetail->company_logo))
                                <img class="flex-shrink-0 img-fluid border rounded"
                                    src="{{ asset('uploads/company_logo/' . $getJobDetail->company_logo) }}" alt=""
                                    style="width: 80px; height: 80px;">
                            @else
                                <img class="flex-shrink-0 img-fluid border rounded" src="{{ asset('img/nologo.png') }}"
                                    alt="" style="width: 80px; height: 80px;">
                            @endif
                            <div class="text-start ps-4">

                                @if(DB::table('job_lists')->where(['id'=>$getJobDetail->id,'user_id'=> Auth::id()])->exists())



                                    <h3 class="mb-3">{{ $getJobDetail->job_name }}  <span class="dropdown">
                                        <span class="dropbtn"><i class="fas fa-edit"></i></span>
                                        <span class="dropdown-content">
                                          <a href="{{route('JobPortal.EditJobPost',['job_id'=>$getJobDetail->id])}}"><span><i class="fas fa-edit span-edit"></i></span></a>

                                          <a href="{{route('JobPortal.DeleteJob',['delete_job_id'=>$getJobDetail->id])}}"><span><i class="fas fa-trash span-delete"></i></span></a>
                                        </span>
                                      </span>
                                    </h3>

                                @else
                                <h3 class="mb-3">{{ $getJobDetail->job_name }} </h3>


                                @endif

                                <span class="text-truncate me-3"><i
                                        class="fa fa-map-marker-alt text-primary me-2"></i>{{ $getJobDetail->job_location }}</span>
                                <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>
                                    @foreach ($jobShifts as $getShift)
                                        @if ($getShift->id == $getJobDetail->job_shift_id)
                                            {{ $getShift->job_shift_name }}
                                        @endif
                                    @endforeach
                                </span>
                                <span class="text-truncate me-0"><i
                                        class="far fa-money-bill-alt text-primary me-2"></i>
                                        @foreach ($offerSalary as $salary)
                                        @if($salary->id == $getJobDetail->job_salary) {{$salary->salary_name}} @endif
                                     @endforeach
                                    </span>
                            </div>
                        </div>

                        <div class="mb-5">
                            <h4 class="mb-3">Job description</h4>
                            <p>{{ $getJobDetail->job_description }}</p>
                            <h4 class="mb-3">Responsibility</h4>
                            <p>{{ $getJobDetail->job_responsibility }}</p>
                            <ul class="list-unstyled">
                                @foreach ($getJobDetail->getResp as $getRespList)
                                    <li><i
                                            class="fa fa-angle-right text-primary me-2"></i>{{ $getRespList->job_responsibilty_list }}
                                    </li>
                                @endforeach

                            </ul>
                            <h4 class="mb-3">Qualifications</h4>
                            <p>{{ $getJobDetail->job_qualification }}</p>
                            <ul class="list-unstyled">

                                @foreach ($getJobDetail->getQualification as $getQuali)
                                    <li><i
                                            class="fa fa-angle-right text-primary me-2"></i>{{ $getQuali->job_qualification_list }}
                                    </li>
                                @endforeach
                            </ul>
                            <h4 class="mb-3">Benefits</h4>
                            <p>{{ $getJobDetail->job_benefit }}</p>

                            <ul class="list-unstyled">
                                @foreach ($getJobDetail->getJobBenefits as $getBenefits)
                                    <li><i
                                            class="fa fa-angle-right text-primary me-2"></i>{{ $getBenefits->job_benefit_name }}
                                    </li>
                                @endforeach

                            </ul>

                        </div>


                        <div class="">
                            <h4 class="mb-4">Apply For The Job</h4>
                            <form action="{{route('JobPortal.ApplyForJob')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="job_cat_id" value="{{$getJobDetail->job_category_id}}">
                                <input type="hidden" name="job_shift_id" value="{{$getJobDetail->job_shift_id}}">
                                <input type="hidden" name="apply_job_id" value="{{$getJobDetail->id}}">

                                <div class="row g-3">
                                    <div class="col-12 col-sm-6">
                                        <input type="text" class="form-control" name="user_name" value="{{old('user_name')}}" placeholder="Your Name">
                                        @error('user_name')
                                        <span class="text-danger">The Name Field is Required..!</span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="email" class="form-control" value="{{old('user_email')}}" name="user_email" placeholder="Your Email">
                                        @error('user_email')
                                        <span class="text-danger">The Email Field is Required..!</span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="text" class="form-control" value="{{old('website_link')}}" name="website_link" placeholder="Portfolio Website">
                                        @error('website_link')
                                        <span class="text-danger">The Portfolio Website is Required..!</span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="file"  accept = "application/pdf,.csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" name="user_file" class="form-control bg-white">
                                        @error('user_file')
                                        <span class="text-danger">Must Be a Pdf File and it's Required..!</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <textarea class="form-control"  name="coverletter" rows="5" placeholder="Coverletter">{{old('coverletter')}}</textarea>
                                        @error('coverletter')
                                        <span class="text-danger">Cover Letter is Required..!</span>
                                        @enderror
                                    </div>
                                    <div id="ajaxRef">
                                        @if (Auth::user())

                                        @if (DB::table('apply_job_posts')->where(['user_id'=>Auth::id(),'apply_job_id'=>$getJobDetail->id])->exists())

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="button">Already Applied</button>
                                        </div>

                                        @elseif(DB::table('job_lists')->where(['id'=>$getJobDetail->id,'user_id'=>Auth::id()])->exists())

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="button">It's Your Job</button>
                                        </div>

                                        @else

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Apply Now</button>
                                        </div>

                                        @endif

                                        @else
                                            <div class="col-12">
                                                <button class="btn btn-primary w-100" data-toggle="modal"
                                                    data-target="#loginModal" type="button">Apply Now</button>
                                            </div>
                                        @endif
                                    </div>




                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Job Summery</h4>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Published On:
                                {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $getJobDetail->created_at)->format('Y-m-d') }}
                            </p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Vacancy:
                                {{ $getJobDetail->job_vacancy }}
                                Position</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Job Nature: @foreach ($jobShifts as $getShift)
                                    @if ($getShift->id == $getJobDetail->job_shift_id)
                                        {{ $getShift->job_shift_name }}
                                    @endif
                                @endforeach
                            </p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Salary:

                                @foreach ($offerSalary as $salary)
                                @if($salary->id == $getJobDetail->job_salary) {{$salary->salary_name}} @endif
                             @endforeach
                            </p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Qualification:

                                @foreach ($qualifications as $qualification)
                                @if($qualification->id == $getJobDetail->qualification_id) {{$qualification->qualification_name}} @endif
                             @endforeach
                            </p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Experience:

                                @foreach ($experience as $exp)
                                @if($exp->id == $getJobDetail->experience_id) {{$salary->experience_name}} @endif
                             @endforeach
                            </p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Location:
                                {{ $getJobDetail->job_location }}</p>
                            <p class="m-0"><i class="fa fa-angle-right text-primary me-2"></i>Date Line:
                                {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $getJobDetail->job_end_date)->format('Y-m-d') }}
                            </p>
                        </div>
                        <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                            <h5 class="mb-2">Company Name</h5>
                            <p class="m-0">{{ $getJobDetail->company_name }}</p>

                            <h5 class="mb-2">Company Email</h5>
                            <p class="m-0">{{ $getJobDetail->company_email }}</p>

                            <h5 class="mb-2">Company Detail</h5>
                            <p class="m-0">{{ $getJobDetail->company_detail }}</p>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
@endsection
















