@extends('layouts.admin')
@section('content')

<div class="product-show">
    <div class="container-fluid">
        @if($data)
        <div class="row">
            <div class="col-12 col-lg-5 mb-4">
                <img src="{{url('')}}/images/products/{{$data->product_image}}" alt="..." class="img-fluid w-100">
            </div>
            <div class="col-12 col-lg-7 py-lg-4">
                <h6><b>{{$data->product_type_name}}</b></h6>
                <p class="text-primary mb-1">৳{{$data->price_per_unit}}.00 প্রতি ইউনিট</p>
                <p class="text-danger mb-2">স্টক {{$data->stock_quantity}} পিস</p>
                <h6 class="mb-0 text-success"><b>Loading point</b></h6>
                <p class="text-dark">{{$data->loading_point}}</p>
                <h6 class="mb-1 text-success"><b>Product Information</b></h6>
                <p class="text-dark">{{$data->product_info}}</p>
            </div>
        </div>
        @endif
    </div>
</div>

@endsection