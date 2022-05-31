@extends('layout.master')
@section('content')
@php $dcrypt  = Crypt::encrypt(Auth::id());
@endphp


<div class="container">
    <div class="main-body">



          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card-user">
                <div class="card-body-user">
                  <div class="d-flex flex-column align-items-center text-center">
                    @if (!empty($editProfile->image))
                    <img src="{{ asset('uploads/user_profile/'.$editProfile->image) }}" alt="Admin" class="rounded-circle" width="150">
                    @elseif (!empty($editProfile->avatar))
                    <img src="{{$editProfile->avatar}}" alt="Admin" class="rounded-circle" width="150">
                    @else
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    @endif

                    <div class="mt-3">
                        @if (DB::table('apply_job_posts')->where('user_id',$editProfile->id)->exists())
                        <h4>{{$editProfile->name}}</h4>
                        @else
                        <h4>{{$editProfile->name}}  <a href="{{route('JobPortal.EditProfile',['user_id'=>$dcrypt])}}"><span><i class="fas fa-edit"></i></span></a> </h4>
                        @endif

                      <p class="text-secondary mb-1">{{$editProfile->position ?? 'No Position Added Yet'}}</p>
                      <p class="text-muted font-size-sm">{{$editProfile->country ?? 'No Address Added Yet'}} {{$editProfile->state}} {{$editProfile->address}}</p>
                      <button class="btn btn-primary">Follow</button>
                      <button class="btn btn-outline-primary">Message</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-user mt-3">
                <ul class="list-group list-group-flush">
                    @foreach ($portfolios as $portfolio)


                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg> Website</h6>
                        <span class="text-secondary">{{$portfolio->portfolio_website_link}}</span>
                      </li>


                    @endforeach

                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg> Github</h6>
                    <span class="text-secondary">bootdey</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg> Twitter</h6>
                    <span class="text-secondary">@bootdey</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg> Instagram</h6>
                    <span class="text-secondary">bootdey</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg> Facebook</h6>
                    <span class="text-secondary">bootdey</span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card-user mb-3">
                <div class="card-body-user">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$editProfile->name}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$editProfile->email}}
                    </div>
                  </div>

                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Position</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$editProfile->position ?? 'No Position Added Yet'}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Education</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$editProfile->education ?? 'No Education Added Yet'}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Bio</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$editProfile->short_bio ?? 'No Bio Added Yet'}}
                    </div>
                  </div>

                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address </h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$editProfile->country ?? 'No Address Added Yet'}}  {{$editProfile->state}}  {{$editProfile->address}}
                    </div>
                  </div>
                  <hr>
                  <div style="display:none" class="row">
                    <div class="col-md-12">
                      <a class="btn btn-info " target="__blank" href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Edit</a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row gutters-sm">
                  @forelse ($exps as $exp)
                <div class="col-md-6 mb-3">
                  <div class="card-user h-100">
                    <div class="card-body-user">

               <div class="d-flex flex-row mt-3 exp-container">
                    @if (!empty($exp->company_image))
                    <img class="p-0" src="{{asset('uploads/company_logo/'.$exp->company_image)}}" width="45" height="45">
                    @else
                    <img src="{{asset('img/nologo.png')}}" width="45" height="45">
                    @endif

                <div class="work-experience ml-1"><span class="font-weight-bold d-block">{{$exp->company_position}}</span><span class="d-block text-black-50 labels">{{$exp->company_name}}</span><span
                        class="d-block text-black-50 labels">{{$exp->company_from}} - {{$exp->company_to ?? 'Till Date'}}</span></div>
            </div>


                    </div>
                  </div>
                </div>
                @empty

                <center>
                    @if (DB::table('apply_job_posts')->where('user_id',$editProfile->id)->exists())
                    <span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span>
                    @else
                    <a href="{{route('JobPortal.EditProfile',['user_id'=>$dcrypt])}}"><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></a>
                    @endif
                </center>

                @endif
              </div>



            </div>
          </div>

        </div>
    </div>







@endsection
