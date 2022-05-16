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
                                <h3 class="mb-3">{{ $getJobDetail->job_name }}</h3>
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
                                        class="far fa-money-bill-alt text-primary me-2"></i>{{ $getJobDetail->job_salary }}</span>
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
                            <form>
                                <div class="row g-3">
                                    <div class="col-12 col-sm-6">
                                        <input type="text" class="form-control" placeholder="Your Name">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="email" class="form-control" placeholder="Your Email">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="text" class="form-control" placeholder="Portfolio Website">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="file" class="form-control bg-white">
                                    </div>
                                    <div class="col-12">
                                        <textarea class="form-control" rows="5" placeholder="Coverletter"></textarea>
                                    </div>
                  <div id="ajaxRef">
                    @if (Auth::user())
                    <div class="col-12">
                        <button class="btn btn-primary w-100" type="button">Apply Now</button>
                    </div>
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
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Vacancy: {{ $getJobDetail->job_vacancy }}
                                Position</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Job Nature: @foreach ($jobShifts as $getShift)
                                    @if ($getShift->id == $getJobDetail->job_shift_id)
                                        {{ $getShift->job_shift_name }}
                                    @endif
                                @endforeach
                            </p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Salary: {{ $getJobDetail->job_salary }}
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
