@extends('layout.master')
@section('content')
    <div class="job-item p-4 mb-4">
        <div class="row g-4">
            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                <a href="http://127.0.0.1:8000/JobPortal/GetJobDetail/5"><img class="flex-shrink-0 img-fluid border rounded"
                        src="http://127.0.0.1:8000/uploads/company_logo/c1.png" alt=""
                        style="width: 80px; height: 80px;"></a>


                <div class="text-start ps-4">
                    <h5 class="mb-3">Devin Rocha</h5>
                    <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>Architecto culpa
                        pr</span>
                    <span id="" class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>
                        Featured
                    </span>
                    <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>5432</span>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">



                <div class="d-flex mb-3">
                    <a  class=" btn btn-light btn-square me-3" href="javascript:void(0)">

                        <i id="changeIcon"
                            class=" fa fa-heart                                                                     text-primary"></i>

                    </a>

                </div>


                <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line:
                    2018-11-04</small>
            </div>
        </div>
    </div>

    <div class="container-job">
        <div class="card-job">
            <div class="card-header-job">
                <img src="https://c0.wallpaperflare.com/preview/483/210/436/car-green-4x4-jeep.jpg" alt="rover" />
            </div>
            <div class="card-body">
                <span class="tag tag-teal">Technology</span>
                <h4>
                    Why is the Tesla Cybertruck designed the way it
                    is?
                </h4>
                <p>
                    An exploration into the truck's polarising design
                </p>
                <div class="user">
                    <img src="https://yt3.ggpht.com/a/AGF-l7-0J1G0Ue0mcZMw-99kMeVuBmRxiPjyvIYONg=s900-c-k-c0xffffffff-no-rj-mo"
                        alt="user" />
                    <div class="user-info">
                        <h5>July Dec</h5>
                        <small>2h ago</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-job">
            <div class="card-header-job">
                <img src="https://www.newsbtc.com/wp-content/uploads/2020/06/mesut-kaya-LcCdl__-kO0-unsplash-scaled.jpg"
                    alt="ballons" />
            </div>
            <div class="card-body">
                <span class="tag tag-purple">Popular</span>
                <h4>
                    How to Keep Going When You Don’t Know What’s Next
                </h4>
                <p>
                    The future can be scary, but there are ways to
                    deal with that fear.
                </p>
                <div class="user">
                    <img src="https://lh3.googleusercontent.com/ogw/ADGmqu8sn9zF15pW59JIYiLgx3PQ3EyZLFp5Zqao906l=s32-c-mo"
                        alt="user" />
                    <div class="user-info">
                        <h5>Eyup Ucmaz</h5>
                        <small>Yesterday</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-job">
            <div class="card-header-job">
                <img src="https://images6.alphacoders.com/312/thumb-1920-312773.jpg" alt="city" />
            </div>
            <div class="card-body">
                <span class="tag tag-pink">Design</span>
                <h4>
                    10 Rules of Dashboard Design
                </h4>
                <p>
                    Dashboard Design Guidelines
                </p>
                <div class="user">
                    <img src="https://studyinbaltics.ee/wp-content/uploads/2020/03/3799Ffxy.jpg" alt="user" />
                    <div class="user-info">
                        <h5>Carrie Brewer</h5>
                        <small>1w ago</small>
                    </div>
                </div>
            </div>
        </div>
    @endsection
