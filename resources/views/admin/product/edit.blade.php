@extends('layouts.admin')
@section('content')

<div class="product-edit">
    <div class="container-fluid">
        @if($data)
        <div class="row">
            <div class="col-12 col-lg-5 mb-4">
                <img src="{{url('')}}/images/products/{{$data->product_image}}" alt="..." class="img-fluid w-100">
            </div>
            <div class="col-12 col-lg-7 py-lg-4">
                    @if(Session::has('success'))
                        <p class="text-success">{{Session::get('success')}}</p>
                    @endif
                <form action="{{route('admin.product.update', $data->id)}}" method="post">
                    @csrf
                    @method('PUT')
                        
                            <!-- Type -->
                            <div class="form-group">
                                @if($errors->has('product_type'))
                                    <label><p class="mb-0"><i class="fab fa-product-hunt p-2 bg-danger text-white mr-2"></i><span class="text-danger">Product Type Required</span></p></label>
                                @else 
                                    <label><p class="mb-0"><i class="fab fa-product-hunt p-2 bg-success text-white mr-2"></i>Product Type</p></label>
                                @endif
                                <select name="product_type" class="form-control rounded-0 shadow-none select2" style="width: 100%;">
                                    <option value="" selected>Select product type</option>
                                    <option value="mango">আম</option>
                                    <option value="lichi">লিচু</option>
                                    <option value="vegitables">শাক-সবজি</option>
                                </select>
                            </div>

                            <!-- Loading Point -->
                            <div class="form-group">
                                @if($errors->has('loading_point'))
                                    <label><p class="mb-0"><i class="fas fa-map-marker-alt bg-danger text-white mr-2" style="padding: 9px 11px;"></i><span class="text-danger">Loading Point Required</span></p></label>
                                @else 
                                    <label><p class="mb-0"><i class="fas fa-map-marker-alt bg-success text-white mr-2" style="padding: 9px 11px;"></i>Loading Point</p></label>
                                @endif
                                <input type="text" name="loading_point" class="form-control rounded-0 shadow-none" value="{{$data->loading_point}}">
                            </div>

                            <!-- Stock Quantity -->
                            <div class="form-group">
                                @if($errors->has('stock_quantity'))
                                    <label><p class="mb-0"><i class="far fa-check-circle p-2 bg-danger text-white mr-2"></i><span class="text-danger">Stock Quantity Required</span></p></label>
                                @else 
                                    <label><p class="mb-0"><i class="far fa-check-circle p-2 bg-success text-white mr-2"></i>Stock Quantity</p></label>
                                @endif
                                
                                <input type="number" name="stock_quantity" min="1" class="form-control rounded-0 shadow-none" value="{{$data->stock_quantity}}">
                            </div>

                            <!-- Price Per Unit -->
                            <div class="form-group">
                                @if($errors->has('price_per_unit'))
                                    <label><p class="mb-0"><i class="fas fa-dollar-sign bg-danger text-white mr-2" style="padding: 9px 11px;"></i><span class="text-danger">Price Per Unit Required</span></p></label>
                                @else 
                                    <label><p class="mb-0"><i class="fas fa-dollar-sign bg-success text-white mr-2" style="padding: 9px 11px;"></i>Price Per Unit</p></label>
                                @endif
                                
                                <input type="text" name="price_per_unit" min="1" class="form-control rounded-0 shadow-none" value="{{$data->price_per_unit}}">
                            </div>

                            <!-- Product Info -->
                            <div class="form-group">
                                @if($errors->has('product_info'))
                                    <label><p class="mb-0"><i class="fas fa-info-circle bg-danger text-white mr-2 p-2"></i><span class="text-danger">Product Info Required</span></p></label>
                                @else 
                                    <label><p class="mb-0"><i class="fas fa-info-circle bg-success text-white mr-2 p-2"></i>Product Info</p></label>
                                @endif
                                
                                <textarea name="product_info" class="form-control rounded-0 shadow-none" rows="5" placeholder="Write product info">{{$data->product_info}}</textarea>
                            </div>

                            <button type="submit" class="btn btn-info rounded-0 shadow-sm text-white btn-block">Update</button>
                </form>
            </div>
        </div>
        @endif
    </div>
</div>

@endsection