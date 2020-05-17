@extends('layouts.user')
@section('content')

<div class="me py-4">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 m-auto">
                <div class="card rounded-0">
                    <div class="card-body">
                        @if(Session::has('success'))
                            <p class="text-success">{{Session::get('success')}}</p>
                        @endif

                        <form action="{{route('buyer.account')}}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <small class="text-dark">নাম</small>
                                <input type="text" name="name" class="form-control rounded-0 shadow-none" value="{{Auth()->User()->name}}" required>
                            </div>

                            <div class="form-group mb-3">
                                <small class="text-dark">মোবাইল</small>
                                <input type="text" class="form-control rounded-0 shadow-none" value="{{Auth()->User()->phone}}" readonly>
                            </div>

                            <button type="submit" class="btn btn-block rounded-0 shadow text-dark btn-warning">আপডেট করুন</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection