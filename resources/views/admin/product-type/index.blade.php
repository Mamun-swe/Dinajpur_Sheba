@extends('layouts.admin')
@section('content')

<div class="product_type py-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card rounded-0 shadow-sm border-0">
                    <div class="card-header bg-white py-4">
                        <h5 class="mb-4">Product types</h5>
                        <!-- <div>
                            <form action="{{route('admin.product-type.store')}}" method="post">
                                @csrf
                                <div class="input-group mb-0">
                                    <input type="text" class="form-control rounded-0 shadow-none" name="product_type_name" placeholder="Enter new product type" required>
                                    <div class="input-group-prepend p-0">
                                        <button type="submit" class="btn btn-info rounded-0 shadow-none text-white px-4">Add</button>
                                    </div>
                                </div>
                            </form>
                        </div> -->
                    </div>
                    <div class="card-body p-4">
                        <ol class="m-0 pl-3">
                            @foreach($data as $types)
                            <li class="mb-2">
                                <div class="d-flex">
                                    <div><p class="mb-0">{{$types->product_type_name}}</p></div>
                                    <div class="ml-auto">
                                        <!-- <a href="{{route('admin.product-type.edit', $types->id)}}" class="btn btn-sm btn-light rounded-0 shadow-none text-info"><i class="fas fa-pen"></i></a> -->
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection