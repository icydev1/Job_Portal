@extends("layout.master")
@section('content')


<div class="container-job">
    @foreach ($jobusers as $jobuser)
    <div class="card-job">
        @if (!empty($jobuser->image))
        <div class="card-header-job">
            <img src="{{asset('uploads/user_profile/'.$jobuser->image)}}" alt="rover" />
        </div>
        @elseif(!empty($jobuser->avatar))
        <div class="card-header-job">
            <img src="{{$jobuser->avatar}}" alt="rover" />
        </div>
        @else
        <div class="card-header-job">
            <img src="{{asset('img/yourlogo.png')}}" alt="rover" />
        </div>
        @endif

        <div class="card-body">
            <span class="tag tag-teal">{{$jobuser->position ?? 'No Position Yet'}}</span>
            <h4>
                {{$jobuser->user_name ?? $jobuser->name}}
            </h4>
            <h6>
                {{$jobuser->education ?? 'No education added Yet'}}
            </h6>
            <p>
                {{$jobuser->short_bio ?? 'No Bio Added yet'}}
            </p>
            <div class="user">
                <div class="user-info">
                    <h5>July Dec</h5>
                    <small>{{$jobuser->created_at}}</small>
                </div>
            </div>
            <div class="row mt-2">

                <div class="col-md-12 btn-primary resume">Download Resume</div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6 btn-danger reject">Reject</div>
                <div class="col-md-6 btn-primary hired">Hired</div>
            </div>

        </div>
    </div>
    @endforeach
    </div>

@endsection
