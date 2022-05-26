@extends('layout.master')

@section('content')
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">

                <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">

                    @php $i = 0 @endphp
                    @foreach ($jobShifts as $jobShift)
                        @php $i++ @endphp
                        <li class="nav-item">
                            <a class="@if ($i == 1) active @endif d-flex align-items-center text-start mx-3 ms-0 pb-3"
                                data-bs-toggle="pill" href="#tab-{{ $i }}">
                                <h6 class="mt-n1 mb-0">{{ $jobShift->job_shift_name }}</h6>
                            </a>
                        </li>
                    @endforeach


                </ul>

<div id="ajaxJob">
                <div class="tab-content">
                    @php $tab = 0 @endphp
                    @foreach ($jobShifts as $jobShift)
                        @php $tab++ @endphp
                        <div id="tab-{{ $tab }}"
                            class="@if ($tab == 1) active @endif tab-pane fade show p-0">


                            @forelse ($getJobsLists as $getJobsList)
                                @if ($getJobsList->job_shift_id == $jobShift->id)
                                    <div class="job-item p-4 mb-4">
                                        <div class="row g-4">
                                            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                                @if (!empty($getJobsList->company_logo))
                                                    <a
                                                        href="{{ route('JobPortal.GetJobDetail', ['job_id' => $getJobsList->id]) }}"><img
                                                            class="flex-shrink-0 img-fluid border rounded"
                                                            src="{{ asset('uploads/company_logo/' . $getJobsList->company_logo) }}"
                                                            alt="" style="width: 80px; height: 80px;"></a>
                                                @else
                                                    <a
                                                        href="{{ route('JobPortal.GetJobDetail', ['job_id' => $getJobsList->id]) }}"><img
                                                            class="flex-shrink-0 img-fluid border rounded"
                                                            src="{{ asset('img/nologo.png') }}" alt=""
                                                            style="width: 80px; height: 80px;"></a>
                                                @endif


                                                <div class="text-start ps-4">
                                                    <h5 class="mb-3">{{ $getJobsList->job_name }}</h5>
                                                    <span class="text-truncate me-3"><i
                                                            class="fa fa-map-marker-alt text-primary me-2"></i>{{ $getJobsList->job_location }}</span>
                                                    <span id="" class="text-truncate me-3"><i
                                                            class="far fa-clock text-primary me-2"></i>
                                                        @if ($getJobsList->job_shift_id == $jobShift->id)
                                                            {{ $jobShift->job_shift_name }}
                                                        @endif
                                                    </span>
                                                    <span class="text-truncate me-0"><i
                                                            class="far fa-money-bill-alt text-primary me-2"></i>{{ $getJobsList->job_salary }}</span>
                                                </div>
                                            </div>
                                            <div
                                                class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">

                                                <input type="hidden" id="job{{ $getJobsList->id }}"
                                                    value="{{ $getJobsList->id }}">
                                                <input type="hidden" id="shiftId{{ $getJobsList->id }}"
                                                    value="{{ $jobShift->id }}">
                                                <input type="hidden" id="cat{{ $getJobsList->id }}"
                                                    value="{{ $getJobsList->job_category_id }}">

                                                @if (Auth::user())
                                                    <div class="d-flex mb-3">
                                                        <a onclick="addWishList({{ $getJobsList->id }})"
                                                            class=" btn btn-light btn-square me-3"
                                                            href="javascript:void(0)">

                                                            <i id="changeIcon{{ $getJobsList->id }}"
                                                                class=" far fa-heart @foreach ($getFavJob as $getFav) @if ($getJobsList->id == $getFav->fav_job_id)
                                                                    fa fa-heart
                                                                    @else far fa-heart @endif
                                                                  @endforeach
                                                                    text-primary"></i>

                                                        </a>
                                                        @if (DB::table('apply_job_posts')->where(['user_id' => Auth::id(), 'apply_job_id' => $getJobsList->id])->exists())
                                                            <a class="btn btn-primary"
                                                                href="{{ route('JobPortal.GetJobDetail', ['job_id' => $getJobsList->id]) }}">Already
                                                                Applied</a>
                                                        @else
                                                            <a class="btn btn-primary"
                                                                href="{{ route('JobPortal.GetJobDetail', ['job_id' => $getJobsList->id]) }}">Apply
                                                                Now</a>
                                                        @endif
                                                    </div>
                                                @else
                                                    <div class="d-flex mb-3">
                                                        <a class=" btn btn-light btn-square me-3" href="#">

                                                            <i class="far fa-heart text-primary"></i>
                                                            {{-- <i class="fa-solid fa-heart"></i> --}}
                                                        </a>
                                                        <a class="btn btn-primary"
                                                            href="{{ route('JobPortal.GetJobDetail', ['job_id' => $getJobsList->id]) }}">Apply
                                                            Now</a>
                                                    </div>
                                                @endif


                                                <small class="text-truncate"><i
                                                        class="far fa-calendar-alt text-primary me-2"></i>Date Line:
                                                    {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $getJobsList->job_end_date)->format('Y-m-d') }}</small>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                <h5>Empty</h5>
                            @endforelse
                            @if (count($getJobsLists) > 0)
                                <a class="btn btn-primary py-3 px-5" href="">Browse More Jobs</a>
                            @endif


                        </div>
                    @endforeach


                </div>

            </div>

            </div>
        </div>
    </div>
@endsection
