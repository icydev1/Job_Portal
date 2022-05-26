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
                        class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div>

                <hr>
                <div class="d-flex flex-row mt-3 exp-container"><img
                        src="https://img.icons8.com/color/100/000000/facebook.png" width="45" height="45">
                    <div class="work-experience ml-1"><span class="font-weight-bold d-block">Senior UI/UX
                            Designer</span><span class="d-block text-black-50 labels">Facebook Inc.</span><span
                            class="d-block text-black-50 labels">March,2017 - May 2020</span></div>
                </div>
                <hr>
                <div class="d-flex flex-row mt-3 exp-container"><img
                        src="https://img.icons8.com/color/50/000000/google-logo.png" width="45" height="45">
                    <div class="work-experience ml-1"><span class="font-weight-bold d-block">UI/UX Designer</span><span
                            class="d-block text-black-50 labels">Google Inc.</span><span
                            class="d-block text-black-50 labels">March,2017 - May 2020</span></div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <script>

        // add user image


document.getElementById('inputUserFile').onchange = function () {
    var file=this.files[0]
         var src = URL.createObjectURL(this.files[0])
            document.getElementById('outputUserFile').src = src

    }

// end  user image
    </script>

@endsection
