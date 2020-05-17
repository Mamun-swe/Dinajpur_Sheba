  
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
                                <h5 class="mb-0 mt-2"><b>আমাদের পণ্যসমূহ</b></h5>
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

            <!-- Lichi -->
            <div class="row">
                <div class="col-12 mb-4">
                    <h5 class="mb-0 mt-2"><b>দিনাজপুরের লিচু</b></h5>
                </div>
            </div>
            <div class="row">
                @foreach($lichiall as $lichi)
                <div class="col-6 col-md-4 product_card">
                    <a href="{{route('buyer.product', $lichi->id)}}">
                        <div class="card rounded-0 border-0 shadow-sm">
                            <div class="img-box">
                                <img src="{{url('')}}/images/products/{{$lichi->product_image}}" class="img-fluid">
                            </div>
                            <div class="card-body">
                                <div class="d-md-flex">
                                    <div>
                                        <h5 class="product_name text-dark mb-0">
                                            @if($lichi->product_type == 'lichi')
                                                লিচু
                                            @endif
                                        </h5>
                                        <p class="mb-0"><span class="text-dark">জাতঃ</span> {{$lichi->category}}</p>
                                    </div>
                                    <div class="ml-auto">
                                        <p class="mb-0"><span class="rounded px-2 py-1 bg-danger text-white">পণ্যের কোডঃ {{$lichi->id}}</span></p>
                                    </div>
                                </div>
                                
                                
                                <h6 class="product_details mt-2 mb-0 text-primary">৳ {{$lichi->price_per_unit}}.00 প্রতি ইউনিট</h6>
                                <small class="text-danger">স্টক {{$lichi->stock_quantity}} পিস</small>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-12 text-center mb-3">
                    <a href="{{route('buyer.productall', 'lichi')}}" class="btn btn-success text-white shadow-none">লিচু আরো দেখুন</a>
                </div>
            </div>


            <!-- Mango -->
            <div class="row">
                <div class="col-12 mb-4">
                    <h5 class="mb-0 mt-2"><b>দিনাজপুরের আম</b></h5>
                </div>
            </div>
            <div class="row">
                @foreach($mangoall as $mango)
                <div class="col-6 col-md-4 product_card">
                    <a href="{{route('buyer.product', $mango->id)}}">
                        <div class="card rounded-0 border-0 shadow-sm">
                            <div class="img-box">
                                <img src="{{url('')}}/images/products/{{$mango->product_image}}" class="img-fluid">
                            </div>
                            <div class="card-body">
                                <div class="d-md-flex">
                                    <div>
                                        <h5 class="product_name text-dark mb-0">
                                            @if($mango->product_type == 'mango')
                                                আম
                                            @endif
                                        </h5>
                                        <p class="mb-0"><span class="text-dark">জাতঃ</span> {{$mango->category}}</p>
                                    </div>
                                    <div class="ml-auto">
                                        <p class="mb-0"><span class="rounded px-2 py-1 bg-danger text-white">পণ্যের কোডঃ {{$mango->id}}</span></p>
                                    </div>
                                </div>
                                
                                
                                <h6 class="product_details mt-2 mb-0 text-primary">৳ {{$mango->price_per_unit}}.00 প্রতি ইউনিট</h6>
                                <small class="text-danger">স্টক {{$mango->stock_quantity}} পিস</small>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-12 text-center mb-3">
                    <a href="{{route('buyer.productall', 'mango')}}" class="btn btn-success text-white shadow-none">আম আরো দেখুন</a>
                </div>
            </div>

            <!-- Vegitables -->
            <div class="row">
                <div class="col-12 mb-4">
                    <h5 class="mb-0 mt-2"><b>দিনাজপুরের শাক-সবজি</b></h5>
                </div>
            </div>
            <div class="row">
                @foreach($vegitableall as $vegitable)
                <div class="col-6 col-md-4 product_card">
                    <a href="{{route('buyer.product', $vegitable->id)}}">
                        <div class="card rounded-0 border-0 shadow-sm">
                            <div class="img-box">
                                <img src="{{url('')}}/images/products/{{$vegitable->product_image}}" class="img-fluid">
                            </div>
                            <div class="card-body">
                                <div class="d-md-flex">
                                    <div>
                                        <h5 class="product_name text-dark mb-0">
                                            @if($vegitable->product_type == 'vegitables')
                                                শাক-সবজি
                                            @endif
                                        </h5>
                                        <p class="mb-0"><span class="text-dark">জাতঃ</span> {{$vegitable->category}}</p>
                                    </div>
                                    <div class="ml-auto">
                                        <p class="mb-0"><span class="rounded px-2 py-1 bg-danger text-white">পণ্যের কোডঃ {{$vegitable->id}}</span></p>
                                    </div>
                                </div>
                                
                                
                                <h6 class="product_details mt-2 mb-0 text-primary">৳ {{$vegitable->price_per_unit}}.00 প্রতি ইউনিট</h6>
                                <small class="text-danger">স্টক {{$vegitable->stock_quantity}} পিস</small>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-12 text-center mb-3">
                    <a href="{{route('buyer.productall', 'vegitables')}}" class="btn btn-success text-white shadow-none">শাক-সবজি আরো দেখুন</a>
                </div>
            </div>

    </div>
</div>

@endsection