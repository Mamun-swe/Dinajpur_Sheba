  
@extends('layouts.admin')
@section('content')
  
<div class="seller-show">
  <div class="container-fluid">
        @if($data)
        <div class="row">
            <!-- Seller Info -->
            <div class="col-12 mb-3">
                <div class="card rounded-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex mb-2">
                            <div><i class="fas fa-user"></i></div>
                            <div class="pl-3">
                                <p class="text-capitalize mb-0">{{$data->name}}</p>
                            </div>
                        </div>
                        <div class="d-flex mb-2">
                            <div><i class="fas fa-phone"></i></div>
                            <div class="pl-3">
                                <p class="mb-0">{{$data->phone}}</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div><i class="fas fa-map-marker-alt"></i></div>
                            <div class="pl-3">
                                <p class="text-capitalize mb-0">{{$data->location}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Seller Products -->
            <div class="col-12 mb-3">
                <div class="card rounded-0 shadow-sm">
                    <div class="card-body py-2">
                        <h5 class="text-capitalize text-primary mb-0">All Products</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="row pb-4">

            @foreach($myProducts as $product)
            <div class="col-6 col-md-3 product_card">
                    <div class="card rounded-0 border-0 shadow-sm">
                        <div class="img-box">
                            <img src="{{url('')}}/images/products/{{$product->product_image}}" class="img-fluid">
                            <div class="options p-2">
                                <a href="{{route('admin.product.edit', $product->id)}}" class="btn rounded-0 shadow-none"><i class="fas fa-pen"></i></a>
                                <a href="{{route('admin.product.show', $product->id)}}" class="btn rounded-0 shadow-none"><i class="fas fa-eye"></i></a>
                                <form action="{{route('admin.product.destroy', $product->id)}}" method="post"
                                    onsubmit="return confirm('Are you sure ?')">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn rounded-0 shadow-none">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="product_name text-dark mb-0"><b>{{$product->product_type_name}}</b></p>
                            <p class="product_details mb-0 text-primary">৳ {{$product->price_per_unit}}.00 প্রতি ইউনিট</p>
                            <small class="text-danger">স্টক {{$product->stock_quantity}} পিস</small>
                        </div>
                    </div>
            </div>
            @endforeach

            <div class="col-12 text-center mt-2">
                {{ $myProducts->links() }}
            </div>


        </div>
        @endif
    </div>
</div>

@endsection