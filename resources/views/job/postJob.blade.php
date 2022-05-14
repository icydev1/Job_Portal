@extends('layout.master')
@section('content')




    <div class="row jobform">

        <div class="col-md-10">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="text-right">Post A Job</h6>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Company Name</label><input type="text" class="form-control" placeholder="Company Name" value=""></div>
                    <div class="col-md-6"><label class="labels">Company Email</label><input type="text" class="form-control" value="" placeholder="Company Email"></div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">Job Name</label><input type="text" class="form-control" placeholder="Job Name" value=""></div>

                </div>
                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">Job Description</label><textarea type="text" class="form-control" placeholder="Job Deescription" value=""></textarea></div>

                </div>

                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Job Location</label><input type="text" class="form-control" placeholder="Job Location" value=""></div>
                    <div class="col-md-6"><label class="labels">Salary</label><input type="text" class="form-control" value="" placeholder="Salary"></div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">Responsibility</label><textarea type="text" class="form-control" placeholder="Responsibility" value=""></textarea></div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div>+ Add Responsibilty</div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">Qualifications</label><textarea type="text" class="form-control" placeholder="Qualifications" value=""></textarea></div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div>+ Add Qualifications</div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">Benefits</label><textarea type="text" class="form-control" placeholder="Benefits" value=""></textarea></div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div>+ Add Benefits</div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Job Vacancy</label><input type="text" class="form-control" placeholder="Total Vacancy" value=""></div>
                    <div class="col-md-6"><label class="labels">Job Duration</label><input type="date" class="form-control" value="" placeholder="Post End Date"></div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Job Shift</label>
                        <input type="text" class="form-control" placeholder="Job Shift" value=""></div>
                    <div class="col-md-6">
                        <label class="labels">Job Type</label><input type="text" class="form-control" value="" placeholder="Job Type"></div>
                </div>


                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Company Logo</label><input type="file" class="form-control" placeholder="company_logo" value=""></div>

                </div>

                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
            </div>
        </div>

    </div>




@endsection
