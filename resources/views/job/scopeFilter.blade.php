
        <div class="row" id="hideJob">
            @foreach ($searchJob as $job)
                <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="candidate-list candidate-grid">
                        @if (!empty($job->company_logo))
                            <a href="{{ route('JobPortal.GetJobDetail', ['job_id' => $job->id]) }}">

                                <div class="candidate-list-image">
                                    <img class="img-fluid"
                                        src="{{ asset('uploads/company_logo/' . $job->company_logo) }}" alt="">
                                </div>
                            </a>
                        @else
                            <a href="{{ route('JobPortal.GetJobDetail', ['job_id' => $job->id]) }}">
                                <div class="candidate-list-image">
                                    <img class="img-fluid" src="{{ asset('img/nologo.png') }}" alt="">
                                </div>
                            </a>
                        @endif


                        <div class="candidate-list-details">
                            <div class="candidate-list-info">
                                <div class="candidate-list-title">
                                    <h5><a href="candidate-detail.html">{{ $job->job_name }}</a></h5>
                                </div>
                                <div class="candidate-list-option">
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-filter pr-1"></i>

                                            @foreach ($jobCategory as $jobCat)
                                                @if ($jobCat->id == $job->job_category_id)
                                                    {{ $jobCat->job_category_name }}
                                                @endif
                                            @endforeach
                                        </li>
                                        <li><i class="fas fa-map-marker-alt pr-1"></i>{{ $job->job_location }}</li>
                                        <li><i class="fas fa-map-marker-alt pr-1"></i>
                                            @foreach ($jobShifts as $jobShift)
                                                @if ($jobShift->id == $job->job_shift_id)
                                                    {{ $jobShift->job_shift_name }}
                                                @endif
                                            @endforeach
                                        </li>
                                        <li><i class="fas fa-map-marker-alt pr-1"></i>
                                            @foreach ($experience as $exp)
                                                @if ($exp->id == $job->experience_id)
                                                    {{ $exp->experience_name }}
                                                @endif
                                            @endforeach
                                        </li>
                                        <li><i class="fas fa-map-marker-alt pr-1"></i>
                                            @foreach ($qualifications as $qualification)
                                                @if ($qualification->id == $job->qualification_id)
                                                    {{ $qualification->qualification_name }}
                                                @endif
                                            @endforeach
                                        </li>
                                        <li><i class="fas fa-map-marker-alt pr-1"></i>
                                            @foreach ($offerSalary as $salary)
                                                @if ($salary->id == $job->job_salary)
                                                    {{ $salary->salary_name }}
                                                @endif
                                            @endforeach
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="candidate-list-favourite-time">
                                <a class="candidate-list-favourite order-2" href="#"><i
                                        class="far fa-heart"></i></a>
                                <span class="candidate-list-time order-1"><i
                                        class="far fa-clock pr-1"></i>{{ $job->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

