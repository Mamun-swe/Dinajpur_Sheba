@extends('layouts.admin')
@section('content')

<div class="co-admin-create py-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card rounded-0 shadow-sm">
                    <div class="card-header border-0 p-4 text-center">
                        <h5 class="mb-0 text-dark"><b>Make Co-Admin</b></h5>
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
                        <form action="{{route('registration')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <!-- Name -->
                                    <div class="form-group mb-3">
                                        <small class="text-dark">Co-Admin Name</small>
                                        <input type="text" name="name" class="form-control rounded-0 shadow-none" placeholder="Enter name">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <!-- Phone -->
                                    <div class="form-group mb-3">
                                        <small class="text-dark">Co-Admin Phone</small>
                                        <input type="number" name="phone" class="form-control rounded-0 shadow-none" placeholder="Enter phone number">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <!-- Account Type -->
                                    <div class="form-group mb-3">
                                        <small class="text-dark">Account Type</small>
                                        <input type="text" name="account_type" class="form-control rounded-0 shadow-none" value="co-admin" readonly>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <!-- Password -->
                                    <div class="form-group mb-3">
                                        <small class="text-dark">Password</small>
                                        <input type="password" name="password" class="form-control rounded-0 shadow-none" placeholder="Enter password">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control rounded-0 shadow-none" name="password_confirmation" placeholder="Re-enter password">
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