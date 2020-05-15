@extends('layouts.user')
@section('content')

<div class="product-show pb-4">

    <!-- Slider -->
    <div id="carouselExampleIndicators" class="carousel slide mb-4" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="{{asset('images/slider/1.jpg')}}" alt="First slide">
            <div class="overlay"></div>
            </div>
            <div class="carousel-item">
            <img src="{{asset('images/slider/2.jpeg')}}" alt="Second slide">
            <div class="overlay"></div>
            </div>
            <div class="carousel-item">
            <img src="{{asset('images/slider/3.jpg')}}" alt="Third slide">
            <div class="overlay"></div>
            </div>
        </div>
    </div>
    <!-- End Slider -->

    @if($data)
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4 mb-4 mb-lg-0">
                <img src="{{url('')}}/images/products/{{$data->product_image}}" class="img-fluid w-100">
            </div>
            <div class="col-12 col-lg-4 py-4">
                <p class="mb-3"><span class="rounded px-2 py-1 bg-danger text-white">পণ্যের কোডঃ ১১২২</span></p>
                <h6><b>পণ্যের ধরণ {{$data->product_type_name}}</b></h6>
                <p class="text-primary mb-1">৳ {{$data->price_per_unit}}.00 প্রতি ইউনিট</p>
                <p class="text-danger mb-3">স্টক {{$data->stock_quantity}} পিস</p>

                <p class="mb-3"><span class="rounded px-2 py-1 bg-danger text-white">অর্ডার করুন +88 01956-667775</span></p>

                <a href="{{route('buyer.checkout', $data->id)}}" class="btn btn-block btn-info rounded-0 shadow-none text-white">অর্ডার করুন</a>
            </div>

            <div class="col-12 col-lg-4 py-lg-4">
                <h6 class="mb-2 text-success"><b><i class="fas fa-map-marker-alt mr-2"></i>লোডিং পয়েন্ট</b></h6>
                <p class="text-dark ml-3">{{$data->loading_point}}</p>
                <h6 class="mb-1 text-success"><b><i class="fab fa-product-hunt mr-2"></i>পণ্যের বিবরণ</b></h6>
                <p class="text-dark ml-3 mb-4">{{$data->product_info}}</p>
            </div>
        </div>
    </div>
    @endif

</div>

@endsection