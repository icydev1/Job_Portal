@extends('layout.master')
@section('content')
    {{-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"> --}}

    <div class="row">

        <div class="col-md-5 zoom ">
            <!-- Item-->
            <div class="cart-item d-md-flex justify-content-between">
                <div class="px-3 my-3">
                    <a class="cart-item-product" href="#">
                        <div class="cart-item-product-thumb"><img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                alt="Product"></div>
                        <div class="cart-item-product-info">
                            <h2 class="cart-item-product-title">Tech Icy</h2>
                            <div class="text-lg text-body font-weight-medium pb-1"><h4>Job Shift</h4></div>
                            <span class="sal-text">Category:<span class="text-success font-weight-medium">IT</span></span>
                            <span class="sal-text">Salary:<span class="text-success font-weight-medium">4000</span></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-1 zoom">
            <span class="dynamic"><i class="fa fa-trash"></i></span>
        </div>
        <div class="col-md-5 zoom">
            <!-- Item-->
            <div class="cart-item d-md-flex justify-content-between">
                <div class="px-3 my-3">
                    <a class="cart-item-product" href="#">
                        <div class="cart-item-product-thumb"><img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                alt="Product"></div>
                        <div class="cart-item-product-info">
                            <h2 class="cart-item-product-title">Tech Icy</h2>
                            <div class="text-lg text-body font-weight-medium pb-1"><h4>Job Shift</h4></div>
                            <span class="sal-text">Category:<span class="text-success font-weight-medium">IT</span></span>
                            <span class="sal-text">Salary:<span class="text-success font-weight-medium">4000</span></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-1 zoom">
            <span class="dynamic"><i class="fa fa-trash"></i></span>
        </div>



    </div>

@endsection
