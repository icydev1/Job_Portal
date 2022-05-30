@extends('layout.master')
@section('content')
    @foreach ($myjobs as $myjob)
        <div class="job-item p-4 mb-4">
            <div class="row g-4">
                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                    @if (!empty($myjob->company_logo))
                        <a href="{{ route('JobPortal.GetJobDetail', ['job_id' => $myjob->id]) }}"><img
                                class="flex-shrink-0 img-fluid border rounded"
                                src="{{ asset('uploads/company_logo/' . $myjob->company_logo) }}" alt=""
                                style="width: 80px; height: 80px;"></a>
                    @else
                        <a href="{{ route('JobPortal.GetJobDetail', ['job_id' => $myjob->id]) }}"><img
                                class="flex-shrink-0 img-fluid border rounded" src="{{ asset('img/nologo.png') }}" alt=""
                                style="width: 80px; height: 80px;"></a>
                    @endif


                    <div class="text-start ps-4">
                        <h5 class="mb-3">{{ $myjob->job_name }}</h5>
                        <span class="text-truncate me-3"><i
                                class="fa fa-map-marker-alt text-primary me-2"></i>{{ $myjob->job_location }}</span>
                        <span id="" class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>
                            @foreach ($jobShifts as $jobShift)
                                @if ($jobShift->id == $myjob->job_shift_id)
                                    {{ $jobShift->job_shift_name }}
                                @endif
                            @endforeach
                        </span>
                        <span class="text-truncate me-0"><i
                                class="far fa-money-bill-alt text-primary me-2"></i>{{ $myjob->job_salary }}</span>
                    </div>
                </div>



                <div
                    class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                    <div class="d-flex mb-3">
                        <a class=" btn btn-light  me-3" href="{{route('JobPortal.GetJobUserList',['job_id'=>$myjob->id])}}">

                            <span id="seeMore">See Job Applier List</span>

                        </a>

                    </div>


                    <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line:
                        {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $myjob->job_end_date)->format('Y-m-d') }}</small>
                </div>
            </div>
        </div>

    @endforeach
@endsection
