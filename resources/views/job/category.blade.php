<div class="container-xxl py-5">
<div class="container">
    <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore By Category</h1>
    <div class="row g-4">
        @php $i = 0; @endphp
        @foreach ($jobCategory as $jobCat)
        @php $i++ @endphp
        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.{{$i}}s">
            <a class="cat-item rounded p-4" href="#">
                <i class="{{$jobCat->job_category_icon}} text-primary mb-4"></i>
                <h6 class="mb-3">{{$jobCat->job_category_name}}</h6>
                <p class="mb-0">{{$jobCat->total_job_vacancy}} Vacancy</p>
            </a>
        </div>
        @endforeach

    </div>
</div>
</div>
