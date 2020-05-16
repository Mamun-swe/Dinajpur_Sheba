@extends('layouts.admin')
@section('content')

<div class="me">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card rounded-0">
                    <div class="card-body">
                        @if(Session::has('success'))
                            <p class="text-success">{{Session::get('success')}}</p>
                        @endif
                        <form action="{{route('admin.me.update')}}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <small class="text-dark">Name</small>
                                <input type="text" name="name" class="form-control rounded-0 shadow-none" value="{{Auth()->User()->name}}" required>
                            </div>

                            <div class="form-group mb-3">
                                <small class="text-dark">Phone</small>
                                <input type="text" class="form-control rounded-0 shadow-none" value="{{Auth()->User()->phone}}" readonly>
                            </div>

                            <button type="submit" class="btn btn-info rounded-0 shadow text-white btn-block">Update</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection