@extends("layout.master")
@section('content')


<div class="row">
<div class="container-job">

    @forelse ($jobusers as $jobuser)

    @php $dcrypt  = Crypt::encrypt($jobuser->user_id);
@endphp
    <div class="card-job">
        @if (!empty($jobuser->image))
        <div class="card-header-job">
            <a href="{{route('JobPortal.MyProfile',['profile_id'=>$dcrypt])}}">
                <img src="{{asset('uploads/user_profile/'.$jobuser->image)}}" alt="rover" />
            </a>
            </div>
        @elseif(!empty($jobuser->avatar))
        <div class="card-header-job">
            <a href="{{route('JobPortal.MyProfile',['profile_id'=>$dcrypt])}}">
            <img src="{{$jobuser->avatar}}" alt="rover" />
        </a>
        </div>
        @else
        <div class="card-header-job">
            <a href="{{route('JobPortal.MyProfile',['profile_id'=>$dcrypt])}}">
            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="rover" />
        </a>
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
            <p  style="height: 60px; overflow: hidden">
                {{$jobuser->short_bio ?? 'No bio Added Yet'}}
            </p>
            <div class="user">
                <div class="user-info">
                    <h5>Applied For Job</h5><span>{{$jobuser->created_at->diffForHumans();}}</span>
                </div>
            </div>
            <div class="row mt-2">
                <img style="display:none" id="outputResume{{$jobuser->id}}" src="{{asset('uploads/user_resume/'.$jobuser->user_resume)}}" >
                <div  onclick="downloadResume({{$jobuser->id}})"  class="col-md-12 btn-primary resume tag tag-teal">Download Resume</div>
            </div>


            <div class="row mt-2">
                <div class="col-md-6 btn-danger reject">Reject</div>
                <div class="col-md-6 btn-primary hired">Hired</div>
            </div>

        </div>
    </div>
    @empty

    <center class="mt-5"><h5>No one Applied Yet</h5></center>

    @endif
    </div>
    </div>




@endsection
