@extends('layouts.admin')
@section('content')

<div class="seller-create py-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card rounded-0 shadow-sm">
                    <div class="card-header border-0 p-4 text-center">
                        <h5 class="mb-0 text-dark"><b>Make Seller</b></h5>
                    </div>
                    <div class="card-body px-md-4 pt-3 pb-5">
                        @if(count($errors) > 0)
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif
                        @if(Session::has('success'))
                            <p class="text-success">{{Session::get('success')}}</p>
                        @endif
                        <form action="{{route('admin.seller.store')}}" method="post">
                            @csrf
                                    <!-- Name -->
                                    <div class="form-group mb-3">
                                        <small class="text-dark">Seller Name</small>
                                        <input type="text" name="name" class="form-control rounded-0 shadow-none" placeholder="Enter name">
                                    </div>

                                    <!-- Phone -->
                                    <div class="form-group mb-3">
                                        <small class="text-dark">Seller Phone</small>
                                        <input type="number" name="phone" class="form-control rounded-0 shadow-none" placeholder="Enter phone number">
                                    </div>

                                    <!-- Location -->
                                    <div class="form-group mb-3">
                                        <small class="text-dark">Seller Location</small>
                                        <input type="text" name="location" class="form-control rounded-0 shadow-none" placeholder="Enter location">
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