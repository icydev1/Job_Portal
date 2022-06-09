@extends("layout.master")
@section('content')


<div class="row">
<div class="container-job">

    @forelse ($jobusers as $jobuser)

    @php
    $dcrypt  = Crypt::encrypt($jobuser->user_id);
    @endphp
    <div class="card-job" id="removeUser{{$jobuser->id}}">
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

                <div class="col-md-12 text-center" >
                  <span class="tag tag-teal ">{{$jobuser->position ?? 'No Position Yet'}}</span>
                </div>


                <div class="d-flex col-12 justify-content-around mt-3 ">
                    <div>
                        <span>
                            <strong class="text-center font-weight-bold">{{$jobuser->user_name ?? $jobuser->name}}</strong>
                        </span>
                    </div>
                    <div>
                        <span>
                            <strong class="text-center font-weight-bold">{{$jobuser->education ?? 'No education added Yet'}}</strong>
                        </span>
                    </div>
                </div>


                <div class="d-flex col-12 justify-content-around mt-2" >

            <span class="text-center">
                <strong class="font-weight-bold">{{$jobuser->contact_number ?? 'No contact added Yet'}}</strong>
            </span>
            <span class="text-center">
                <strong class=" font-weight-bold"> {{$jobuser->currently_working ?? 'Self Employed yet'}}</strong>
            </span>

        </div>

        <div class="col-md-12 text-center mt-2">
            <h6>
                {{$jobuser->portfolio_website_link ?? 'No website added yet'}}
            </h6>
        </div>

        <div class="col-md-12 text-center mt-2" style="height: 40px; overflow: hidden">
            <span>
                {{$jobuser->short_bio ?? 'No bio Added Yet'}}
            </span>
        </div>

        <div class="d-flex col-12 justify-content-around mt-2" >

            <div class="user">
                <div class="user-info">
                    <span><h5>Applied For Job</h5></span>
                </div>
            </div>

            <span><strong>{{$jobuser->created_at->diffForHumans();}}</strong></span>

        </div>

            <div class="col-md-12 text-center mt-2">
                <img style="display:none" id="outputResume{{$jobuser->id}}" src="{{asset('uploads/user_resume/'.$jobuser->user_resume)}}" >
                <span  onclick="downloadResume({{$jobuser->id}})"  class=" btn-primary  tag tag-teal">Download Resume</span>
            </div>

            <div class="col-md-12 text-center mt-2 px-4">
                <span><b>Accept Request For Interview</b></span>
            </div>

            <div class="d-flex col-12 justify-content-around mt-2 ">
                <span style="border-radius: 30px;" class="btn btn-danger btn-rounded" onclick="rejectApp('{{$jobuser->id}}')">Reject</span>
                @if($jobuser->status == '2')
               <span style="border-radius: 30px;" class="btn btn-primary btn-rounded" >Accepted</span>
                @else
                <span style="border-radius: 30px;" class="btn btn-primary btn-rounded" id="userStatus{{$jobuser->id}}" onclick="acceptApp('{{$jobuser->id}}')">Accept</span>
                @endif
            </div>

        </div>
    </div>
    @empty

    <center class="mt-5"><h5>No one Applied Yet</h5></center>

    @endif
    </div>
    </div>




@endsection
