  
@extends('layouts.admin')
@section('content')

<div class="order-show" id="printTable">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card rounded-0">
                    <div class="card-body">
                        @if(Session::has('success'))
                            <p class="text-success mb-4">{{Session::get('success')}}</p>
                        @endif
                        <h5 class="text-success">Order By:</h5>

                        <table class="table table-sm table-bordered">
                            <tr>
                                <td><p class="text-dark mb-0">Name</td>
                                <td><p class="text-dark mb-0">{{$order->name}}</td>
                            </tr>
                            <tr>
                                <td><p class="text-dark mb-0">Phone</td>
                                <td><p class="text-dark mb-0">{{$order->phone}}</td>
                            </tr>
                            <tr>
                                <td><p class="text-dark mb-0">Quantity</td>
                                <td><p class="text-dark mb-0">{{$order->quantity}}</td>
                            </tr>
                            <tr>
                                <td><p class="text-dark mb-0">Location</td>
                                <td><p class="text-dark mb-0">{{$order->location}}</td>
                            </tr>
                            <tr>
                                <td><p class="text-dark mb-0">Payment In</td>
                                <td><p class="text-dark mb-0">{{$order->payment_method}}</td>
                            </tr>
                            <tr>
                                <td><p class="text-dark mb-0">Car Info</td>
                                <td><p class="text-dark mb-0">{{$order->carinfo}}</td>
                            </tr>
                        </table>
                       
                   
                        <h5 class="text-success">Product Information:</h5>
                        <table class="table table-sm table-bordered">
                            <tr>
                                <td><p class="text-dark mb-0">Product Name</td>
                                <td><p class="text-dark mb-0">{{$product->product_type_name}}</td>
                            </tr>
                            <tr>
                                <td><p class="text-dark mb-0">Seller Name</td>
                                <td><p class="text-dark mb-0">{{$product->name}}</td>
                            </tr>
                            <tr>
                                <td><p class="text-dark mb-0">Seller Phone</td>
                                <td><p class="text-dark mb-0">{{$product->phone}}</td>
                            </tr>
                            <tr>
                                <td><p class="text-dark mb-0">Seller Location</td>
                                <td><p class="text-dark mb-0">{{$product->location}}</td>
                            </tr>
                            <tr>
                                <td><p class="text-dark mb-0">Product Price Per Unit</td>
                                <td><p class="text-dark mb-0">{{$product->price_per_unit}}</td>
                            </tr>
                            <tr>
                                <td><p class="text-dark mb-0">Product Info</td>
                                <td><p class="text-dark mb-0">{{$product->product_info}}</td>
                            </tr>
                        </table>
                        
                        <div class="d-flex">
                            <div>
                                <h5 class="text-success">Total: {{$order->quantity * $product->price_per_unit}} Tk</h5>
                            </div>
                            <div class="ml-auto">
                                <form action="{{route('admin.approveorder')}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="order_id" value="{{$order_id}}">
                                    <button type="submit" class="btn btn-success text-white rounded-0 shadow-none px-4">Approve</button>
                                    <button type="button" id="printTable" class="btn btn-primary text-white rounded-0 shadow-none px-4">Print</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function printData(){
        var divToPrint=document.getElementById("printTable");
        newWin= window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    }

    $('button').on('click',function(){
        printData();
    })
</script>


@endsection