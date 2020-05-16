@extends('layouts.admin')
@section('content')

<div class="product-create">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card rounded-0 shadow-sm">
                    <div class="card-header p-3 border-0">
                        <h5 class="mb-0">Create Product</h5>
                    </div>
                    <div class="card-body">
                        @if(Session::has('success'))
                            <p class="text-success">{{Session::get('success')}}</p>
                        @endif

                        <form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <!-- Seller -->
                            <div class="form-group">
                                @if($errors->has('seller_id'))
                                    <label><p class="mb-0"><i class="fas fa-user p-2 bg-danger text-white mr-2"></i><span class="text-danger">Product Seller Required</span></p></label>
                                @else 
                                    <label><p class="mb-0"><i class="fas fa-user p-2 bg-success text-white mr-2"></i>Product Seller</p></label>
                                @endif

                                <select name="seller_id" class="form-control rounded-0 shadow-none select2" style="width: 100%;">
                                    <option value="" selected>Select product seller by phone number</option>
                                    @foreach($sellers as $seller)
                                        <option value="{{$seller->id}}">{{$seller->phone}}</option>
                                    @endforeach
                                </select>
                            </div>

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

                            <!-- Category -->
                            <div class="form-group">
                                @if($errors->has('category'))
                                    <label><p class="mb-0"><i class="fab fa-product-hunt bg-danger text-white mr-2" style="padding: 9px 11px;"></i><span class="text-danger">Category Required</span></p></label>
                                @else 
                                    <label><p class="mb-0"><i class="fab fa-product-hunt bg-success text-white mr-2" style="padding: 9px 11px;"></i>Category</p></label>
                                @endif
                                <input type="text" name="category" class="form-control rounded-0 shadow-none" placeholder="Enter category">
                            </div>

                            <!-- Loading Point -->
                            <div class="form-group">
                                @if($errors->has('loading_point'))
                                    <label><p class="mb-0"><i class="fas fa-map-marker-alt bg-danger text-white mr-2" style="padding: 9px 11px;"></i><span class="text-danger">Loading Point Required</span></p></label>
                                @else 
                                    <label><p class="mb-0"><i class="fas fa-map-marker-alt bg-success text-white mr-2" style="padding: 9px 11px;"></i>Loading Point</p></label>
                                @endif
                                <input type="text" name="loading_point" class="form-control rounded-0 shadow-none" placeholder="Enter lodin point">
                            </div>

                            <!-- Stock Quantity -->
                            <div class="form-group">
                                @if($errors->has('stock_quantity'))
                                    <label><p class="mb-0"><i class="far fa-check-circle p-2 bg-danger text-white mr-2"></i><span class="text-danger">Stock Quantity Required</span></p></label>
                                @else 
                                    <label><p class="mb-0"><i class="far fa-check-circle p-2 bg-success text-white mr-2"></i>Stock Quantity</p></label>
                                @endif
                                
                                <input type="number" name="stock_quantity" min="1" class="form-control rounded-0 shadow-none" placeholder="Enter stock quantity">
                            </div>

                            <!-- Price Per Unit -->
                            <div class="form-group">
                                @if($errors->has('price_per_unit'))
                                    <label><p class="mb-0"><i class="fas fa-dollar-sign bg-danger text-white mr-2" style="padding: 9px 11px;"></i><span class="text-danger">Price Per Unit Required</span></p></label>
                                @else 
                                    <label><p class="mb-0"><i class="fas fa-dollar-sign bg-success text-white mr-2" style="padding: 9px 11px;"></i>Price Per Unit</p></label>
                                @endif
                                
                                <input type="text" name="price_per_unit" min="1" class="form-control rounded-0 shadow-none" placeholder="Enter price per unit">
                            </div>

                            <!-- Product Info -->
                            <div class="form-group">
                                @if($errors->has('product_info'))
                                    <label><p class="mb-0"><i class="fas fa-info-circle bg-danger text-white mr-2 p-2"></i><span class="text-danger">Product Info Required</span></p></label>
                                @else 
                                    <label><p class="mb-0"><i class="fas fa-info-circle bg-success text-white mr-2 p-2"></i>Product Info</p></label>
                                @endif
                                
                                <textarea name="product_info" class="form-control rounded-0 shadow-none" rows="5" placeholder="Write product info"></textarea>
                            </div>

                            <!-- Product Image -->
                            <div class="form-group">
                                @if($errors->has('product_image'))
                                    <label><p class="mb-0"><i class="fas fa-camera bg-danger text-white mr-2 p-2"></i><span class="text-danger">Produc Image Required</span></p></label>
                                @else 
                                    <label><p class="mb-0"><i class="fas fa-camera bg-success text-white mr-2 p-2"></i>Produc Image</p></label>
                                @endif
                                <br>
                                <input type="file" name="product_image">
                            </div>

                            <button type="submit" class="btn btn-info rounded-0 shadow-sm text-white btn-block">Submit</button>


                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection