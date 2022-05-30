@extends('layout.master')
@section('content')


<div id="ajaxPro">
<form action="{{route('JobPortal.UpdateProfile',['user_id' => $editProfiles->id ])}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                @if (!empty($editProfiles->image))
                <label for="inputUserFile">
                    <img id="outputUserFile" class="rounded-circle mt-5"
                    src="{{ asset('uploads/user_profile/'.$editProfiles->image) }}"
                    width="90">
                    <input type="file" accept="image/*" id="inputUserFile" name="user_avatar" style="display: none" ></label>
                    <input type="hidden" name="hidden_image" value="{{$editProfiles->image}}" >

                @elseif (!empty($editProfiles->avatar))
                <label for="inputUserFile">
                    <img id="outputUserFile" class="rounded-circle mt-5"
                    src="{{$editProfiles->avatar}}"
                    width="90">
                    <input type="file" accept="image/*" id="inputUserFile" name="user_avatar" style="display: none" ></label>
                    <input type="hidden" name="hidden_avatar" value="{{$editProfiles->avatar}}" >
                @else
                <label for="inputUserFile">
                    <img id="outputUserFile" class="rounded-circle mt-5"
                    src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg"
                    width="90">
                    <input type="file" accept="image/*" id="inputUserFile" name="user_avatar" style="display: none" ></label>

                @endif

                    <span class="font-weight-bold">{{$editProfiles->name ?? ''}}</span><span
                    class="text-black-50">{{$editProfiles->email ?? ""}}</span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="text-right">Edit your profile</h6>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{$editProfiles->name ?? ""}}"></div>

                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Short Bio</label>
                        <textarea
                            class="form-control" name="short_bio" placeholder="Short Bio" >{{$editProfiles->short_bio ?? ''}}</textarea>
                        </div>

                    <div class="col-md-12"><label class="labels">Current Position</label><input type="text"
                            class="form-control" name="position" placeholder="Current Position" value="{{$editProfiles->position ?? ''}}"></div>

                    <div class="col-md-12"><label class="labels">Education</label><input type="text"
                            class="form-control" name="education" placeholder="Education" value="{{$editProfiles->education ?? ''}}"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Country</label><input type="text"
                            class="form-control" name="country" placeholder="country" value="{{$editProfiles->country ?? ''}}"></div>
                    <div class="col-md-6"><label class="labels">State/Region</label><input type="text"
                            class="form-control" name="state" value="{{$editProfiles->state ?? ''}}" placeholder="state"></div>
                            <div class="col-md-12"><label class="labels">Address</label>
                                <textarea
                                    class="form-control" name="address" placeholder="Address" >{{$editProfiles->address ?? ''}}</textarea>
                                </div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save
                        Profile</button></div>
            </div>
        </div>
    </form>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span
                        data-toggle="modal" data-target="#expModal" class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div>

                <hr>
                @foreach ($exps as $exp)
                @php $crypt  = Crypt::encrypt($editProfiles->id);
                @endphp
                <a href="{{route('JobPortal.MyProfile',['profile_id'=>$crypt])}}"><div class="d-flex flex-row mt-3 exp-container">
                    @if (!empty($exp->company_image))
                    <img class="p-0" src="{{asset('uploads/company_logo/'.$exp->company_image)}}" width="45" height="45">
                    @else
                    <img src="{{asset('img/nologo.png')}}" width="45" height="45">
                    @endif

                <div class="work-experience ml-1"><span class="font-weight-bold d-block">{{$exp->company_position}}</span><span class="d-block text-black-50 labels">{{$exp->company_name}}</span><span
                        class="d-block text-black-50 labels">{{$exp->company_from}} - {{$exp->company_to ?? 'Till Date'}}</span></div>
            </div></a>
            <hr>
                @endforeach



            </div>
        </div>
    </div>
    </div>



    {{-- modal for add Experience --}}


    <div class="modal fade" id="expModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content login-modal">
            <div class="modal-header login-modal-header">
                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button> --}}
                <h4 class="modal-title text-center" id="loginModalLabel">Add Experience</h4>
            </div>
            <div class="modal-body">

                <form id="storeForm">
                <div class="container">
                <div class="text-center ">

                    <div class="row">
                        <div id="lastCompanyName" class="col-md-6">
                            <label>Company Name</label>
                            <input id="profileId" type="hidden" name="profile_id" value="{{$editProfiles->id}}">
                            <input type="text" id="companyName" name="company_name" class="form form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Designation</label>
                            <input type="text" id="companyDesignation" name="company_designation" class="form-control">

                        </div>
                    </div>

                    <div class="row mt-3">
                        <div id="lastCompanyName" class="col-md-6">
                            <label>Date of Joining</label>
                            <input type="date" id="startDate" name="start_date" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Last date of Leaving</label>
                            <input type="date" id="endDate" name="end_date" class="form-control">

                        </div>
                    </div>

                    <div class="row mt-3">
                        <div id="lastCompanyName" class="col-md-6">
                            <label>Choose File</label>
                            <input id="inputCompLogo"  type="file" name="company_logo" class="form-control">
                        </div>
                        <div class="col-md-6 mt-3">

                            <img width="45" height="45" id="outputCompLogo"
                        src="https://img.icons8.com/color/50/000000/google-logo.png">

                    </div>
                    </div>

                    <div class="row mt-3">
                        <div  class="col-md-6"><button onclick="addExp()" class="btn btn-success"
                                type="button">Save</button></div>
                        <div class="col-md-6"><button type="button" class="btn btn-danger close"
                                data-dismiss="modal" aria-label="Close">Cancel</button></div>
                    </div>


                </div>
                </div>
            </form>

            </div>

        </div>

    </div>
</div>

    {{--end modal for add Experience --}}


    <script>

        // add user image


document.getElementById('inputUserFile').onchange = function () {
    var file=this.files[0]
         var src = URL.createObjectURL(this.files[0])
            document.getElementById('outputUserFile').src = src

    }

// end  user image
    </script>

    <script>

        // add comp image


document.getElementById('inputCompLogo').onchange = function () {
    var file=this.files[0]
         var src = URL.createObjectURL(this.files[0])
            document.getElementById('outputCompLogo').src = src

    }

// end  comp image
    </script>

@endsection
