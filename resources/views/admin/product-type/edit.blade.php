@extends('layouts.admin')
@section('content')

<div class="product_type py-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card rounded-0 shadow-sm border-0">
                    <div class="card-header bg-white py-4">
                        <h5 class="mb-4">Product type edit</h5>
                        <div>
                            <form action="{{route('admin.product-type.update', $data->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="input-group mb-0">
                                    <input type="text" class="form-control rounded-0 shadow-none" name="product_type_name" value="{{$data->product_type_name}}" required>
                                    <div class="input-group-prepend p-0">
                                        <button type="submit" class="btn btn-info rounded-0 shadow-none text-white px-4">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection