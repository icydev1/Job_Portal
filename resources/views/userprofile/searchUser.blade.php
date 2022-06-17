
    <div class="row">

        <div class="col-lg-12">


            <div class="row">
                @foreach ($products as $product)
                <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="candidate-list candidate-grid">
                        <div class="candidate-list-image">

                            @if (!empty($product->image))

                            <img class="img-fluid" src="{{ asset('uploads/user_profile/'.$product->image) }}" alt="">

                    @elseif (!empty($product->avatar))

                    <img class="img-fluid" src="{{ $product->avatar }}" alt="">



                    @else

                    <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">

                    @endif


                        </div>
                        <div class="candidate-list-details">
                            <div class="candidate-list-info">
                                <div class="candidate-list-title">
                                    <h5><a href="candidate-detail.html">{{ $product->name }}</a></h5>
                                </div>
                                <div class="candidate-list-option">
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-filter pr-1"></i>{{$product->position ?? 'No Position added Yet'}}</li>
                                        <li><i class="fas fa-map-marker-alt pr-1"></i>{{$product->country  ?? 'No Address added yet'}}{{$product->state}}{{$product->address}}</li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach


            </div>

        </div>
    </div>
</div>



