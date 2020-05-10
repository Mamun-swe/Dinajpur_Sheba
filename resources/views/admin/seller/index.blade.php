  
@extends('layouts.admin')
@section('content')
  
<div class="seller-index">
  <div class="container-fluid">
      <div class="row">
        <div class="col-12 mb-2">
            <div class="d-flex">
                <div>
                    <h5 class="mb-0 mt-2"><b>Seller List</b></h5>
                </div>
                <div class="ml-auto">
                    <a href="{{route('admin.seller.create')}}" class="btn btn-info rounded-0 shadow-none text-white px-4"><i class="fas fa-plus mr-2"></i>Make New Seller</a>
                </div>
            </div>
        </div>
          <div class="col-12">
            <table class="table table-bordered table-responsive-lg">
                <thead>
                    <tr>
                        <td class="text-center"><b>SL</b></td>
                        <td><b>Name</b></td>
                        <td class="text-center"><b>Phone</b></td>
                        <td><b>Location</b></td>
                        <td class="text-center"><b>Action</b></td>
                    </tr>
                </thead>
                <tbody>

                    @foreach($data as $key => $seller)
                    <tr>
                        <td class="text-center">{{$key + 1}}</td>
                        <td class="text-capitalize">{{$seller->name}}</td>
                        <td class="text-center">{{$seller->phone}}</td>
                        <td class="text-capitalize">{{$seller->location}}</td>
                        <td class="text-center">
                            <ul class="list-inline mb-0">
                                <!-- <li class="list-inline-item">
                                    <a href="" class="btn btn-light btn-sm rounded-0 shadow-none text-info"><i class="fas fa-pen"></i></a>
                                </li> -->
                                <li class="list-inline-item">
                                    <a href="{{route('admin.seller.show',$seller->id)}}" class="btn btn-light btn-sm rounded-0 shadow-none text-info"><i class="fas fa-eye"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <form action="{{route('admin.seller.destroy', $seller->id)}}" method="post"
                                        onsubmit="return confirm('Are you sure ?')">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-light btn-sm rounded-0 shadow-none text-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
          </div>
      </div>
  </div>
</div>
      
@endsection