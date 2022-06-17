@extends('layout.master')
@section('content')




    <div class="row mt-4">
        <div class="col-lg-3">
            <div class="sidebar">
                <div class="widget border-0">
                    <div class="search">
                        <input class="form-control" type="text" placeholder="Search Keywords">
                    </div>
                </div>
                <div class="widget border-0">
                    <div class="locations">
                        <input class="form-control" type="text" placeholder="All Locations">
                    </div>
                </div>
                <div class="widget">
                    <div class="widget-title widget-collapse">
                        <h6>Date Posted</h6>
                        <a class="ml-auto" data-toggle="collapse" href="#dateposted" role="button" aria-expanded="false" aria-controls="dateposted"> <i class="fas fa-chevron-down"></i> </a>
                    </div>
                    <div class="collapse show" id="dateposted">
                        <div class="widget-content">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="dateposted1">
                                <label class="custom-control-label" for="dateposted1">Last hour</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="dateposted2">
                                <label class="custom-control-label" for="dateposted2">Last 24 hour</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="dateposted3">
                                <label class="custom-control-label" for="dateposted3">Last 7 days</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="dateposted4">
                                <label class="custom-control-label" for="dateposted4">Last 14 days</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="dateposted5">
                                <label class="custom-control-label" for="dateposted5">Last 30 days</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget">
                    <div class="widget-title widget-collapse">
                        <h6>Specialism</h6>
                        <a class="ml-auto" data-toggle="collapse" href="#specialism" role="button" aria-expanded="false" aria-controls="specialism"> <i class="fas fa-chevron-down"></i> </a>
                    </div>
                    <div class="collapse show" id="specialism">
                        <div class="widget-content">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="specialism1">
                                <label class="custom-control-label" for="specialism1">IT Contractor</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="specialism2">
                                <label class="custom-control-label" for="specialism2">Clinical Psychology</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="specialism3">
                                <label class="custom-control-label" for="specialism3">Digital &amp; Creative</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="specialism4">
                                <label class="custom-control-label" for="specialism4">Estate Agency</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="specialism5">
                                <label class="custom-control-label" for="specialism5">Graduate</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget">
                    <div class="widget-title widget-collapse">
                        <h6>Job Type</h6>
                        <a class="ml-auto" data-toggle="collapse" href="#jobtype" role="button" aria-expanded="false" aria-controls="jobtype"> <i class="fas fa-chevron-down"></i> </a>
                    </div>
                    <div class="collapse show" id="jobtype">
                        <div class="widget-content">
                            <div class="custom-control custom-checkbox fulltime-job">
                                <input type="checkbox" class="custom-control-input" id="jobtype1">
                                <label class="custom-control-label" for="jobtype1">Full Time</label>
                            </div>
                            <div class="custom-control custom-checkbox parttime-job">
                                <input type="checkbox" class="custom-control-input" id="jobtype2">
                                <label class="custom-control-label" for="jobtype2">Part-Time</label>
                            </div>
                            <div class="custom-control custom-checkbox freelance-job">
                                <input type="checkbox" class="custom-control-input" id="jobtype3">
                                <label class="custom-control-label" for="jobtype3">Freelance</label>
                            </div>
                            <div class="custom-control custom-checkbox temporary-job">
                                <input type="checkbox" class="custom-control-input" id="jobtype4">
                                <label class="custom-control-label" for="jobtype4">Temporary</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget">
                    <div class="widget-title widget-collapse">
                        <h6>Experience</h6>
                        <a class="ml-auto" data-toggle="collapse" href="#experience" role="button" aria-expanded="false" aria-controls="experience"> <i class="fas fa-chevron-down"></i> </a>
                    </div>
                    <div class="collapse show" id="experience">
                        <div class="widget-content">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="experience1">
                                <label class="custom-control-label" for="experience1">fresher</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="experience2">
                                <label class="custom-control-label" for="experience2">Less than 1 year</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="experience3">
                                <label class="custom-control-label" for="experience3">2 Year</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="experience4">
                                <label class="custom-control-label" for="experience4">3 Year</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="experience5">
                                <label class="custom-control-label" for="experience5">4 Year</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget">
                    <div class="widget-title widget-collapse">
                        <h6>Offered Salary</h6>
                        <a class="ml-auto" data-toggle="collapse" href="#Offeredsalary" role="button" aria-expanded="false" aria-controls="Offeredsalary"> <i class="fas fa-chevron-down"></i> </a>
                    </div>
                    <div class="collapse show" id="Offeredsalary">
                        <div class="widget-content">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="Offeredsalary1">
                                <label class="custom-control-label" for="Offeredsalary1">10k - 20k</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="Offeredsalary2">
                                <label class="custom-control-label" for="Offeredsalary2">20k - 30k</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="Offeredsalary3">
                                <label class="custom-control-label" for="Offeredsalary3">30k - 40k</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="Offeredsalary4">
                                <label class="custom-control-label" for="Offeredsalary4">40k - 50k</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="Offeredsalary5">
                                <label class="custom-control-label" for="Offeredsalary5">50k - 60k</label>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="widget">
                    <div class="widget-title widget-collapse">
                        <h6>Gender</h6>
                        <a class="ml-auto" data-toggle="collapse" href="#gender" role="button" aria-expanded="false" aria-controls="gender"><i class="fas fa-chevron-down"></i></a>
                    </div>
                    <div class="collapse show" id="gender">
                        <div class="widget-content">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="gender1">
                                <label class="custom-control-label" for="gender1">Male</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="gender2">
                                <label class="custom-control-label" for="gender2">Female</label>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="widget">
                    <div class="widget-title widget-collapse">
                        <h6>Qualification</h6>
                        <a class="ml-auto" data-toggle="collapse" href="#qualification" role="button" aria-expanded="false" aria-controls="qualification"> <i class="fas fa-chevron-down"></i></a>
                    </div>
                    <div class="collapse show" id="qualification">
                        <div class="widget-content">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="qualification1">
                                <label class="custom-control-label" for="qualification1">Matriculation</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="qualification2">
                                <label class="custom-control-label" for="qualification2">Intermediate</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="qualification3">
                                <label class="custom-control-label" for="qualification3">Graduate</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget border-0">
                    <div class="widget-add">
                        <img class="img-fluid" src="images/add-banner.png" alt=""></div>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            {{-- <div class="row mb-4">
                <div class="col-12">
                    <h6 class="mb-0">Showing 1-10 of <span class="text-primary">28 Candidates</span></h6>
                </div>
            </div> --}}
            <div class="job-filter mb-4 d-sm-flex align-items-center">
                <div class="job-alert-bt"> <a class="btn btn-md btn-dark" href="#"><i class="fa fa-envelope"></i>Get job alert </a> </div>
                <div class="job-shortby ml-sm-auto d-flex align-items-center">
                    <form class="form-inline">
                        <div class="form-group mb-0">
                            <label class="justify-content-start mr-2">Sort by :</label>
                            <div class="short-by">
                                <select class="form-control basic-select select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option data-select2-id="3">Newest</option>
                                    <option>Oldest</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="candidate-list candidate-grid">
                        <div class="candidate-list-image">
                            <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                        </div>
                        <div class="candidate-list-details">
                            <div class="candidate-list-info">
                                <div class="candidate-list-title">
                                    <h5><a href="candidate-detail.html">Rafael Briggs</a></h5>
                                </div>
                                <div class="candidate-list-option">
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-filter pr-1"></i>Recruitment Consultancy</li>
                                        <li><i class="fas fa-map-marker-alt pr-1"></i>Haines City, FL 33844</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="candidate-list-favourite-time">
                                <a class="candidate-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                                <span class="candidate-list-time order-1"><i class="far fa-clock pr-1"></i>1M ago</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="candidate-list candidate-grid">
                        <div class="candidate-list-image">
                            <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="">
                        </div>
                        <div class="candidate-list-details">
                            <div class="candidate-list-info">
                                <div class="candidate-list-title">
                                    <h5><a href="candidate-detail.html">Roderick Moss</a></h5>
                                </div>
                                <div class="candidate-list-option">
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-filter pr-1"></i>Information Technology</li>
                                        <li><i class="fas fa-map-marker-alt pr-1"></i>Lynch Lane, Weymouth</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="candidate-list-favourite-time">
                                <a class="candidate-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                                <span class="candidate-list-time order-1"><i class="far fa-clock pr-1"></i>3M ago</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="candidate-list candidate-grid">
                        <div class="candidate-list-image">
                            <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="">
                        </div>
                        <div class="candidate-list-details">
                            <div class="candidate-list-info">
                                <div class="candidate-list-title">
                                    <h5><a href="candidate-detail.html">Ronald Bradley</a></h5>
                                </div>
                                <div class="candidate-list-option">
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-filter pr-1"></i>Human Resources</li>
                                        <li><i class="fas fa-map-marker-alt pr-1"></i>Monroe Township, NJ 08831</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="candidate-list-favourite-time">
                                <a class="candidate-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                                <span class="candidate-list-time order-1"><i class="far fa-clock pr-1"></i>3D ago</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="candidate-list candidate-grid">
                        <div class="candidate-list-image">
                            <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar4.png" alt="">
                        </div>
                        <div class="candidate-list-details">
                            <div class="candidate-list-info">
                                <div class="candidate-list-title">
                                    <h5><a href="candidate-detail.html">Nichole Haynes</a></h5>
                                </div>
                                <div class="candidate-list-option">
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-filter pr-1"></i>IT Contractor</li>
                                        <li><i class="fas fa-map-marker-alt pr-1"></i>Botchergate, Carlisle</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="candidate-list-favourite-time">
                                <a class="candidate-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                                <span class="candidate-list-time order-1"><i class="far fa-clock pr-1"></i>6D ago</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="candidate-list candidate-grid">
                        <div class="candidate-list-image">
                            <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar5.png" alt="">
                        </div>
                        <div class="candidate-list-details">
                            <div class="candidate-list-info">
                                <div class="candidate-list-title">
                                    <h5><a href="candidate-detail.html">Vickie Meyer</a></h5>
                                </div>
                                <div class="candidate-list-option">
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-filter pr-1"></i>Human Resources</li>
                                        <li><i class="fas fa-map-marker-alt pr-1"></i>Minneapolis, MN 55406</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="candidate-list-favourite-time">
                                <a class="candidate-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                                <span class="candidate-list-time order-1"><i class="far fa-clock pr-1"></i>2D ago</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="candidate-list candidate-grid">
                        <div class="candidate-list-image">
                            <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="">
                        </div>
                        <div class="candidate-list-details">
                            <div class="candidate-list-info">
                                <div class="candidate-list-title">
                                    <h5><a href="candidate-detail.html">Brooke Kelly</a></h5>
                                </div>
                                <div class="candidate-list-option">
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-filter pr-1"></i>Information Technology</li>
                                        <li><i class="fas fa-map-marker-alt pr-1"></i>Rolling Meadows, IL 60008</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="candidate-list-favourite-time">
                                <a class="candidate-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                                <span class="candidate-list-time order-1"><i class="far fa-clock pr-1"></i>3W ago</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="candidate-list candidate-grid">
                        <div class="candidate-list-image">
                            <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="">
                        </div>
                        <div class="candidate-list-details">
                            <div class="candidate-list-info">
                                <div class="candidate-list-title">
                                    <h5><a href="candidate-detail.html">Reyna Chung</a></h5>
                                </div>
                                <div class="candidate-list-option">
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-filter pr-1"></i>Transport &amp; Logistics</li>
                                        <li><i class="fas fa-map-marker-alt pr-1"></i>Glen Cove, NY 11542</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="candidate-list-favourite-time">
                                <a class="candidate-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                                <span class="candidate-list-time order-1"><i class="far fa-clock pr-1"></i>1H ago</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="candidate-list candidate-grid">
                        <div class="candidate-list-image">
                            <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar8.png" alt="">
                        </div>
                        <div class="candidate-list-details">
                            <div class="candidate-list-info">
                                <div class="candidate-list-title">
                                    <h5><a href="candidate-detail.html">Rafael Briggs</a></h5>
                                </div>
                                <div class="candidate-list-option">
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-filter pr-1"></i>Architecture</li>
                                        <li><i class="fas fa-map-marker-alt pr-1"></i>Botchergate, Carlisle</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="candidate-list-favourite-time">
                                <a class="candidate-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                                <span class="candidate-list-time order-1"><i class="far fa-clock pr-1"></i>3M ago</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mb-4 mb-md-0">
                    <div class="candidate-list candidate-grid">
                        <div class="candidate-list-image">
                            <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                        </div>
                        <div class="candidate-list-details">
                            <div class="candidate-list-info">
                                <div class="candidate-list-title">
                                    <h5><a href="candidate-detail.html">Michael Bean</a></h5>
                                </div>
                                <div class="candidate-list-option">
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-filter pr-1"></i>Estate Agency</li>
                                        <li><i class="fas fa-map-marker-alt pr-1"></i>Richmond Hill, NY 11418</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="candidate-list-favourite-time">
                                <a class="candidate-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                                <span class="candidate-list-time order-1"><i class="far fa-clock pr-1"></i>6D ago</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-12 text-center mt-4 mt-sm-5">
                    <ul class="pagination justify-content-center mb-0">
                        <li class="page-item disabled"> <span class="page-link">Prev</span> </li>
                        <li class="page-item active" aria-current="page"><span class="page-link">1 </span> <span class="sr-only">(current)</span></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">...</a></li>
                        <li class="page-item"><a class="page-link" href="#">25</a></li>
                        <li class="page-item"> <a class="page-link" href="#">Next</a> </li>
                    </ul>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
