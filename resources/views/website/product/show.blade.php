@extends('layouts.user')
@section('content')

<div class="product-show py-4">

    @if($data)
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-5 mb-4 mb-lg-0">
                <img src="{{url('')}}/images/products/{{$data->product_image}}" class="img-fluid w-100">
            </div>
            <div class="col-12 col-lg-7 py-lg-4">
                <h6><b>পণ্যের ধরণ {{$data->product_type_name}}</b></h6>
                <p class="text-primary mb-1">৳ {{$data->price_per_unit}}.00 প্রতি ইউনিট</p>
                <p class="text-danger mb-3">স্টক {{$data->stock_quantity}} পিস</p>
                <h6 class="mb-2 text-success"><b><i class="fas fa-map-marker-alt mr-2"></i>লোডিং পয়েন্ট</b></h6>
                <p class="text-dark ml-3">{{$data->loading_point}}</p>
                <h6 class="mb-1 text-success"><b><i class="fab fa-product-hunt mr-2"></i>পণ্যের বিবরণ</b></h6>
                <p class="text-dark ml-3 mb-4">{{$data->product_info}}</p>
                <a href="{{route('buyer.checkout', $data->id)}}" class="btn btn-block btn-info rounded-0 shadow-lg text-white">অর্ডার করুন</a>
            </div>
        </div>
    </div>
    @endif

</div>

@endsection