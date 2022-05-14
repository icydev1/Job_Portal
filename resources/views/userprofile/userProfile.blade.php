@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                    src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg"
                    width="90"><span class="font-weight-bold">John Doe</span><span
                    class="text-black-50">john_doe12@bbb.com</span><span>United States</span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="text-right">Edit your profile</h6>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label><input type="text"
                            class="form-control" placeholder="first name" value="John"></div>
                    <div class="col-md-6"><label class="labels">Surname</label><input type="text"
                            class="form-control" value="Doe" placeholder="Doe"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Headline</label><input type="text"
                            class="form-control" placeholder="headline" value=""></div>
                    <div class="col-md-12"><label class="labels">Current position</label><input type="text"
                            class="form-control" placeholder="headline" value=""></div>
                    <div class="col-md-12"><label class="labels">Education</label><input type="text"
                            class="form-control" placeholder="education" value=""></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Country</label><input type="text"
                            class="form-control" placeholder="country" value=""></div>
                    <div class="col-md-6"><label class="labels">State/Region</label><input type="text"
                            class="form-control" value="" placeholder="state"></div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save
                        Profile</button></div>
            </div>
        </div>
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
@endsection
