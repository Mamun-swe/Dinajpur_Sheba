@extends('layouts.user')
@section('content')

<div class="order py-4">
    <div class="container">
        <div class="row">

            @foreach($data as $order)
            <div class="col-12 col-lg-8 m-auto pb-3">
                <div class="card rounded-0">
                    @if($order->status == 'pending')
                        <div class="card-header rounded-0 p-2 bg-warning">
                            <h5 class="mb-0">অর্ডার পেনডিং এ আছে</h5>
                        </div>
                    @elseif($order->status == 'approved')
                        <div class="card-header rounded-0 p-2 bg-success">
                            <h5 class="mb-0 text-white">অর্ডার গ্রহণ করা হয়েছে</h5>
                        </div>
                    @endif
                    <div class="card-body p-2">
                        <?php
                            $products = \App\Models\Product::where('id', '=', $order->productid)->get();
                            foreach($products as $product){
                                $productType = \App\Models\ProductType::where('id', '=', $product->product_type_id)->get();
                                foreach($productType as $type){
                        ?>
                        <div class="d-flex">
                            <div>
                                <img src="{{url('')}}/images/products/{{$product->product_image}}" class="img-fluid">
                            </div>
                            <div class="pl-3 pt-1">
                                <h5><b>{{$type->product_type_name}}</b></h5>
                                <p class="mb-0">পণ্যের পরিমাণ {{$order->quantity}}</p>
                                <p class="mb-0">মোট দাম {{$order->quantity * $product->price_per_unit }}</p>
                            </div>
                        </div>
                        <?php
                                }
                            }
                        ?>
                        
                    </div>
                </div>
            </div>
            @endforeach

            <div class="col-12 col-lg-8 m-auto pb-3 text-center mt-2">
                {{ $data->links() }}
            </div>

        </div>
    </div>
</div>

@endsection