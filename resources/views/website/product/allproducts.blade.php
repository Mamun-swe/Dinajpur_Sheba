@extends('layouts.user')
@section('content')

<div class="products py-3">
    <div class="container">

        <div class="row">
            @foreach($productAll as $product)
            <div class="col-6 col-md-4 product_card">
                <a href="{{route('buyer.product', $product->id)}}">
                    <div class="card rounded-0 border-0 shadow-sm">
                        <div class="img-box">
                            <img src="{{url('')}}/images/products/{{$product->product_image}}" class="img-fluid">
                        </div>
                        <div class="card-body">
                            <div class="d-md-flex">
                                <div>
                                    <h5 class="product_name text-dark mb-0">
                                        {{$product->product_type}}
                                    </h5>
                                    <p class="mb-0"><span class="text-dark">জাতঃ</span> {{$product->category}}</p>
                                </div>
                                <div class="ml-auto">
                                    <p class="mb-0"><span class="rounded px-2 py-1 bg-danger text-white">পণ্যের কোডঃ {{$product->id}}</span></p>
                                </div>
                            </div>
                                
                                
                            <h6 class="product_details mt-2 mb-0 text-primary">৳ {{$product->price_per_unit}}.00 
                                @if($product->product_type == 'আম')
                                    প্রতি মণ
                                @elseif($product->product_type == 'লিচু')
                                    প্রতি হাজার
                                @elseif($product->product_type == 'শাক-সবজি')
                                    প্রতি ইউনিট
                                @endif
                            </h6>
                            <small class="text-danger">স্টক {{$product->stock_quantity}} পিস</small>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-12">
                {{ $productAll->links() }}
            </div>
        </div>

    </div>
</div>

@endsection