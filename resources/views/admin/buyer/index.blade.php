  
@extends('layouts.admin')
@section('content')
  
<div class="buyers">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-2">
                        <h5 class="mb-0">Buyer List</h5>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr>
                            <td class="text-center"><b>SL</b></td>
                            <td><b>Name</b></td>
                            <td><b>Phone</b></td>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($data as $key => $buyer)
                        <tr>
                            <td class="text-center">{{$key + 1}}</td>
                            <td>{{$buyer->name}}</td>
                            <td>{{$buyer->phone}}</td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>

            <div class="col-12 mt-2">
                {{ $data->links() }}
            </div>
        </div>
    </div>
</div>
      
@endsection