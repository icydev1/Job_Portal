@extends('layout.master')
@section('content')
    <div id="ajaxPro">
        <form action="{{ route('JobPortal.UpdateProfile', ['user_id' => $editProfiles->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                        @if (!empty($editProfiles->image))
                            <label for="inputUserFile">
                                <img id="outputUserFile" class="rounded-circle mt-5"
                                    src="{{ asset('uploads/user_profile/' . $editProfiles->image) }}" width="90">
                                <input type="file" accept="image/*" id="inputUserFile" name="user_avatar"
                                    style="display: none"></label>
                            <input type="hidden" name="hidden_image" value="{{ $editProfiles->image }}">
                        @elseif (!empty($editProfiles->avatar))
                            <label for="inputUserFile">
                                <img id="outputUserFile" class="rounded-circle mt-5" src="{{ $editProfiles->avatar }}"
                                    width="90">
                                <input type="file" accept="image/*" id="inputUserFile" name="user_avatar"
                                    style="display: none"></label>
                            <input type="hidden" name="hidden_avatar" value="{{ $editProfiles->avatar }}">
                        @else
                            <label for="inputUserFile">
                                <img id="outputUserFile" class="rounded-circle mt-5"
                                    src="https://bootdey.com/img/Content/avatar/avatar7.png" width="90">
                                <input type="file" accept="image/*" id="inputUserFile" name="user_avatar"
                                    style="display: none"></label>
                        @endif

                        <span class="font-weight-bold">{{ $editProfiles->name ?? '' }}</span><span
                            class="text-black-50">{{ $editProfiles->email ?? '' }}</span>
                    </div>

                    <ul class="list-group list-group-flush">


                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-globe mr-2 icon-inline">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="2" y1="12" x2="22" y2="12"></line>
                                            <path
                                                d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                            </path>
                                        </svg> Website</h6>
                                </div>
                                <div class="col-md-6"> <input value="{{ $editProfiles->website_link }}"
                                        name="website_link" class="form-control" type="text">
                                </div>
                            </div>

                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-github mr-2 icon-inline">
                                            <path
                                                d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                                            </path>
                                        </svg> Github</h6>
                                </div>
                                <div class="col-md-6"> <input value="{{ $editProfiles->github_link }}"
                                        name="github_link" class="form-control" type="text">
                                </div>
                            </div>


                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-twitter mr-2 icon-inline text-info">
                                            <path
                                                d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                            </path>
                                        </svg> Twitter</h6>
                                </div>
                                <div class="col-md-6"> <input value="{{ $editProfiles->twitter_link }}"
                                        name="twitter_link" class="form-control" type="text">
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-instagram mr-2 icon-inline text-danger">
                                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                        </svg> Instagram</h6>
                                </div>
                                <div class="col-md-6"> <input value="{{ $editProfiles->insta_link }}"
                                        name="insta_link" class="form-control" type="text">
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-facebook mr-2 icon-inline text-primary">
                                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                            </path>
                                        </svg> Facebook</h6>
                                </div>
                                <div class="col-md-6"> <input value="{{ $editProfiles->fb_link }}" name="fb_link"
                                        class="form-control" type="text">
                                </div>
                            </div>
                        </li>
                    </ul>


                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="text-right">Edit your profile</h6>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12"><label class="labels">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Name"
                                    value="{{ $editProfiles->name ?? '' }}">
                            </div>

                            <div class="col-md-12"><label class="labels">Contact</label>
                                <input type="text" name="contact_number" class="form-control" placeholder="Contact Number"
                                    value="{{ $editProfiles->contact_number ?? '' }}">
                            </div>

                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12"><label class="labels">Short Bio</label>
                                <textarea class="form-control" name="short_bio"
                                    placeholder="Short Bio">{{ $editProfiles->short_bio ?? '' }}</textarea>
                            </div>

                            <div class="col-md-12"><label class="labels">Current Position</label><input
                                    type="text" class="form-control" name="position" placeholder="Current Position"
                                    value="{{ $editProfiles->position ?? '' }}"></div>

                            <div class="col-md-12"><label class="labels">Currently Working</label><input
                                    type="text" class="form-control" name="currently_working" placeholder="Currently Working"
                                    value="{{ $editProfiles->currently_working ?? '' }}"></div>

                            <div class="col-md-12"><label class="labels">Education</label><input type="text"
                                    class="form-control" name="education" placeholder="Education"
                                    value="{{ $editProfiles->education ?? '' }}"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6"><label class="labels">Country</label><input type="text"
                                    class="form-control" name="country" placeholder="country"
                                    value="{{ $editProfiles->country ?? '' }}"></div>
                            <div class="col-md-6"><label class="labels">State/Region</label><input type="text"
                                    class="form-control" name="state" value="{{ $editProfiles->state ?? '' }}"
                                    placeholder="state"></div>
                            <div class="col-md-12"><label class="labels">Address</label>
                                <textarea class="form-control" name="address" placeholder="Address">{{ $editProfiles->address ?? '' }}</textarea>
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
                        data-toggle="modal" data-target="#expModal" class="border px-3 p-1 add-experience"><i
                            class="fa fa-plus"></i>&nbsp;Experience</span></div>

                <hr>
                <div id="refreshExp">
                    @foreach ($exps as $exp)
                        @php $crypt = Crypt::encrypt($editProfiles->id);
                        @endphp
                        {{-- <a href="{{ route('JobPortal.MyProfile', ['profile_id' => $crypt]) }}"> --}}
                        <a id="clearExp{{$exp->id}}" href="javascript:void(0)">
                            <div class="d-flex flex-row mt-3 exp-container">
                                @if (!empty($exp->company_image))
                                    <img class="p-0"
                                        src="{{ asset('uploads/company_logo/' . $exp->company_image) }}" width="45"
                                        height="45">
                                @else
                                    <img src="{{ asset('img/nologo.png') }}" width="45" height="45">
                                @endif

                                <div class="work-experience ml-1"><span
                                        class="font-weight-bold d-block">{{ $exp->company_position }}<span style="position: absolute; right: 175px;"><span data-toggle="modal" data-target="#editExpModal{{$exp->id}}"><i class="fas fa-edit span-edit"></i></span>&nbsp;&nbsp;<span data-toggle="modal" data-target="#deleteExpModal{{$exp->id}}" ><i class="fas fa-trash span-delete"></i></span>

                                    </span>
                                        <span
                                        class="d-block text-black-50 labels">{{ $exp->company_name }}</span><span
                                        class="d-block text-black-50 labels">{{ $exp->company_from }} -
                                        {{ $exp->company_to ?? 'Till Date' }}</span>
                                    </div>
                            </div>
                            <hr>
                        </a>

                    @endforeach
                </div>


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
                                        <input id="profileId" type="hidden" name="profile_id"
                                            value="{{ $editProfiles->id }}">
                                        <input type="text" id="companyName" name="company_name" class="form form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Designation</label>
                                        <input type="text" id="companyDesignation" name="company_designation"
                                            class="form-control">

                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div id="lastCompanyName" class="col-md-6">
                                        <label>Date of Joining</label>
                                        <input type="date" id="startDate" name="start_date" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Last date of Leaving <span><i onclick="switchToggle(this)" class="fas fa-toggle-off"></i></span></label>
                                       <span id="hideDate" style="display: block"><input type="date" id="endDate" name="end_date" class="form-control"></span>

                                       <span id="showTillDate" style="display: none"><input type="text" id="endTillDate" name="end_till_date" value="Till Date" placeholder="Till Date" class="form-control"></span>

                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div id="lastCompanyName" class="col-md-6">
                                        <label>Choose File</label>
                                        <input id="inputCompLogo" type="file" name="company_logo" class="form-control">
                                    </div>
                                    <div class="col-md-6 mt-3">

                                        <img width="45" height="45" id="outputCompLogo"
                                            src="https://img.icons8.com/color/50/000000/google-logo.png">

                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6"><button onclick="addExp()" class="btn btn-success"
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

    {{-- end modal for add Experience --}}

    {{-- for update experience --}}
    <div id="refreshExpModal">
    @foreach ($exps as $exp)
    <div class="modal fade" id="editExpModal{{$exp->id}}" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content login-modal">
                <div class="modal-header login-modal-header">

                    <h4 class="modal-title text-center" id="loginModalLabel">Edit Experience</h4>
                </div>
                <div class="modal-body">

                    <form id="updateForm{{$exp->id}}">
                        <div class="container">
                            <div class="text-center">

                                <div class="row">
                                    <div id="lastCompanyName" class="col-md-6">
                                        <label>Company Name</label>
                                        <input id="profileId" type="hidden" name="exp_id"
                                            value="{{ $exp->id }}">
                                        <input type="text" value="{{$exp->company_name}}" id="companyName" name="company_name" class="form form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Designation</label>
                                        <input type="text" id="companyDesignation" value="{{$exp->company_position}}" name="company_designation"
                                            class="form-control">

                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div id="lastCompanyName" class="col-md-6">
                                        <label>Date of Joining</label>
                                        <input type="text" id="startDate" value="{{$exp->company_from}}" name="start_date" class="form-control">
                                    </div>


                                    <div class="col-md-6">
                                        <label>Last date of Leaving</label>

                                        <input type="text" id="endDate" value="{{$exp->company_to}}" name="end_date" class="form-control">

                                    </div>

                                </div>
                                <input type="hidden" name="hidden_company_logo" value="{{$exp->company_image}}">
                              @if(!empty($exp->company_image))
                                <div class="row mt-3">
                                    <div id="lastCompanyName" class="col-md-6">
                                        <label >Choose File</label>
                                        <input onclick="changeImage({{$exp->id}})" id="inputCompLogo{{$exp->id}}" type="file" name="company_logo" class="form-control">
                                    </div>
                                    <div class="col-md-6 mt-3">

                                        <img width="45" height="45" id="outputCompLogo{{$exp->id}}"
                                            src="{{asset('uploads/company_logo/'.$exp->company_image)}}">

                                    </div>
                                </div>

                                @else

                                <div class="row mt-3">
                                    <div id="lastCompanyName" class="col-md-6">
                                        <label>Choose File</label>
                                        <input onclick="changeImage({{$exp->id}})" id="inputCompLogo{{$exp->id}}" type="file" name="company_logo" class="form-control">
                                    </div>
                                    <div class="col-md-6 mt-3">

                                        <img width="45" height="45" id="outputCompLogo{{$exp->id}}"
                                            src="https://img.icons8.com/color/50/000000/google-logo.png">

                                    </div>
                                </div>

                                @endif

                                <div class="row mt-3">
                                    <div class="col-md-6"><button onclick="updateExp({{$exp->id}})" class="btn btn-success"
                                            type="button">Update</button></div>
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


    <div class="modal fade" id="deleteExpModal{{$exp->id}}" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content login-modal">
            <div class="modal-header login-modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="loginModalLabel">Are You Sure To Delete.?</h4>
            </div>
            <div class="modal-body">
                <div class="text-center">

                    <div class="row">
                        <div onclick="deleteExp({{$exp->id}});" class="col-md-6"><button class="btn btn-danger"
                                type="button">Yes</button></div>
                        <div class="col-md-6"><button type="button" class="btn btn-success close"
                                data-dismiss="modal" aria-label="Close">NO</button></div>
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>

    @endforeach
    </div>

    {{-- end modal for update Experience --}}


    <script>
        // add user image


        document.getElementById('inputUserFile').onchange = function() {
            var file = this.files[0]
            var src = URL.createObjectURL(this.files[0])
            document.getElementById('outputUserFile').src = src

        }

        // end  user image
    </script>

    <script>
        // add comp image


        document.getElementById('inputCompLogo').onchange = function() {
            var file = this.files[0]
            var src = URL.createObjectURL(this.files[0])
            document.getElementById('outputCompLogo').src = src

        }

        // end  comp image
    </script>

    <script>


function changeImage($id){

    let id = $id;

    document.getElementById('inputCompLogo'+id).onchange = function() {
            var file = this.files[0]
            var src = URL.createObjectURL(this.files[0])
            document.getElementById('outputCompLogo'+id).src = src

        }

}

    </script>




@endsection
