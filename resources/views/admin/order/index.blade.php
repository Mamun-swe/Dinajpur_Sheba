  
@extends('layouts.admin')
@section('content')
  
<div class="orders pb-4">
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-12 mb-3">
                <div class="card rounded-0">
                    <div class="card-body p-3">
                        <h5 class="mb-0">Today's Order</h5>
                    </div>
                </div>
            </div>

            @foreach($data as $orders)
            <div class="col-12">
                <div class="card rounded-0 order_card">
                    <div class="card-body p-2">
                        <div class="d-flex">
                            <div><p class="mb-0 mt-1">{{$orders->phone}}</p></div>
                            <div class="ml-auto">
                                <a href="{{route('admin.order', $orders->id)}}" class="btn btn-warning btn-sm rounded-0 text-dark">View Order</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="col-12 mt-2">
                {{ $data->links() }}
            </div>

        </div>
    </div>
</div>
      
@endsection