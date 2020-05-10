  
@extends('layouts.admin')
@section('content')
  
<div class="co-admin-index">
  <div class="container-fluid">
      <div class="row">
        <div class="col-12 mb-2">
            <div class="d-flex">
                <div>
                    <h5 class="mb-0 mt-2"><b>Co-Admin List</b></h5>
                </div>
                <div class="ml-auto">
                    <a href="{{route('admin.co-admin.create')}}" class="btn btn-info rounded-0 shadow-none text-white px-4"><i class="fas fa-plus mr-2"></i>Make New Co-Admin</a>
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
                        <td class="text-center"><b>Type</b></td>
                        <td><b>Location</b></td>
                        <td class="text-center"><b>Action</b></td>
                    </tr>
                </thead>
                <tbody>

                    @foreach($data as $key => $coadmin)
                    <tr>
                        <td class="text-center">{{$key + 1}}</td>
                        <td class="text-capitalize">{{$coadmin->name}}</td>
                        <td class="text-center">{{$coadmin->phone}}</td>
                        <td class="text-center text-capitalize">{{$coadmin->account_type}}</td>
                        <td class="text-capitalize">Location</td>
                        <td class="text-center">
                            <ul class="list-inline mb-0">
                                <!-- <li class="list-inline-item">
                                    <a href="" class="btn btn-light btn-sm rounded-0 shadow-none text-info"><i class="fas fa-pen"></i></a>
                                </li> -->
                                <li class="list-inline-item">
                                    <form action="{{route('admin.co-admin.destroy', $coadmin->id)}}" method="post"
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