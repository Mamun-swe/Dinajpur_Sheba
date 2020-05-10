@extends('layouts.admin')
@section('content')

<div class="product_type py-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card rounded-0 shadow-sm border-0">
                    <div class="card-header bg-white py-4">
                        <h5 class="mb-4">Loading points</h5>
                        <div>
                            <form action="{{route('admin.loading-point.store')}}" method="post">
                                @csrf
                                <div class="input-group mb-0">
                                    <input type="text" class="form-control rounded-0 shadow-none" name="loading_point" placeholder="Enter new loading point" required>
                                    <div class="input-group-prepend p-0">
                                        <button type="submit" class="btn btn-info rounded-0 shadow-none text-white px-4">Add</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <ol class="m-0 pl-3">
                            @foreach($data as $loadingPoints)
                            <li class="mb-2">
                                <div class="d-flex">
                                    <div><p class="mb-0">{{$loadingPoints->loading_point}}</p></div>
                                    <div class="ml-auto">
                                        <a href="{{route('admin.loading-point.edit', $loadingPoints->id)}}" class="btn btn-sm btn-light rounded-0 shadow-none text-info"><i class="fas fa-pen"></i></a>
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