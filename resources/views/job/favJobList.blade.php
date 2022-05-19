@extends('layout.master')
@section('content')
    {{-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"> --}}





    <div id="ajaxFavList">
        {{-- @if (Auth::user()) --}}


        <div class="row">
            @forelse ($favLists as $favList)
                {{-- <input type="hidden" id="removeList{{$favList->id}}" value="{{$favList->id}}" > --}}
                <div class="col-md-5 zoom">
                    <!-- Item-->
                    <div class="cart-item d-md-flex justify-content-between">
                        <div class="px-3 my-3">
                            <a class="cart-item-product"
                                href="{{ route('JobPortal.GetJobDetail', ['job_id' => $favList->fav_job_id]) }}">
                                @foreach ($favList->getFavList as $jobName)
                                    @if (!empty($jobName->company_logo))
                                        <div class="cart-item-product-thumb">
                                            <img class="comp-logo"
                                                src="{{ asset('uploads/company_logo/' . $jobName->company_logo) }}"
                                                alt="Product">
                                        </div>
                                    @else
                                        <div class="cart-item-product-thumb">
                                            <img class="comp-logo" src="{{ asset('img/nologo.png') }}" alt="Product">
                                        </div>
                                    @endif
                                @endforeach
                                <div class="cart-item-product-info">
                                    @foreach ($favList->getFavList as $jobName)
                                        <h4 class="cart-item-product-title">{{ $jobName->job_name }}</h4>
                                    @endforeach
                                    <div class="text-lg text-body font-weight-medium pb-1">
                                        <h5>
                                            @foreach ($jobShifts as $jobShift)
                                                @if ($jobShift->id == $favList->job_shift_id)
                                                   Job Shift : {{ $jobShift->job_shift_name }}
                                                @endif
                                            @endforeach
                                        </h5>
                                    </div>
                                    <span class="sal-text">Category:<span
                                            class="text-success font-weight-medium">
                                        @foreach ($jobCategory as $jobCat)

                                        @if($jobCat->id == $favList->job_cat_id)
                                        {{$jobCat->job_category_name}}
                                        @endif
                                        @endforeach
                                        </span></span>
                                    <span class="sal-text">Salary:@foreach ($favList->getFavList as $jobName)
                                            <span class="text-success font-weight-medium">{{ $jobName->job_salary }}</span>
                                        @endforeach
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 zoom">
                    <span onclick="removeList({{ $favList->id }})" class="dynamic"><i
                            class="fa fa-trash"></i></span>
                </div>
            @empty

                <center>
                    <h4>No Record Found</h5>
                </center>


            @endif
        </div>
        {{-- @endif --}}
    </div>

@endsection
