  
@extends('layouts.user')
@section('content')

<div class="products py-3">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 rounded-0 shadow-sm">
                    <div class="card-body px-3 py-2">
                        <div class="d-flex">
                            <div>
                                <h5 class="mb-0 mt-2"><b>পণ্য</b></h5>
                            </div>
                            <div class="ml-auto">
                                <button type="button" class="btn btn-sm btn-danger rounded-0 shadow-sm text-white px-4 py-2">সব গুলো</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


            <!-- Products -->
        <div class="row">

            @foreach($products as $product)
            <div class="col-6 col-md-4 product_card">
                <a href="{{route('buyer.product', $product->id)}}">
                    <div class="card rounded-0 border-0 shadow-sm">
                        <div class="img-box">
                            <img src="{{url('')}}/images/products/{{$product->product_image}}" class="img-fluid">
                        </div>
                        <div class="card-body">
                            <h5 class="product_name text-dark">{{$product->product_type_name}}</h5>
                            <h6 class="product_details mb-0 text-primary">৳ {{$product->price_per_unit}}.00 প্রতি ইউনিট</h6>
                            <small class="text-danger">স্টক {{$product->stock_quantity}} পিস</small>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach

        </div>

    </div>
</div>

@endsection