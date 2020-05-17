@extends('layouts.user')
@section('content')

<div class="checkout py-4">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 m-auto">
                <div class="card rounded-0">
                    <div class="card-header p-4 text-center bg-white">
                        <h5 class="mb-0"><b>অর্ডার চেকআউট</b></h5>
                    </div>
                    <div class="card-body">
                        @if(Session::has('success'))
                        <div class="custom-modal">
                            <div class="flex-center flex-column text-center">
                                <i class="far fa-check-circle fa-2x text-white mb-3"></i>
                                <h5 class="text-white">অর্ডার সফল হয়েছে</h5>
                                <p class="text-white">আমরা আপনাকে মোবাইলে কলের মাধ্যমে বিস্তারিত জানাব, ধন্যবাদ ।</p>
                                <a href="{{route('buyer.products')}}" class="btn btn-warning text-dark px-4">ফিরে যান</a>
                            </div>
                        </div>
                        @endif
                        <form action="{{route('buyer.ordersubmit')}}" method="post">
                            @csrf

                            <input type="hidden" name="productid" value="{{$productid}}">

                            <div class="form-group mb-3">
                                @if($errors->has('name'))
                                    <small class="text-danger">সম্পুর্ণ নাম প্রয়োজন</small>
                                @else 
                                    <small class="text-dark">সম্পুর্ণ নাম</small>
                                @endif
                                <input type="text" name="name" class="form-control rounded-0 shadow-none" value="{{Auth()->User()->name}}">
                            </div>

                            <div class="form-group mb-3">
                                @if($errors->has('phone'))
                                    <small class="text-danger">মোবাইল প্রয়োজন</small>
                                @else 
                                    <small class="text-dark">মোবাইল</small>
                                @endif
                                <small class="text-dark"></small>
                                <input type="text" name="phone" class="form-control rounded-0 shadow-none" value="{{Auth()->User()->phone}}">
                            </div>

                            <div class="form-group mb-3">
                                @if($errors->has('nid'))
                                    <small class="text-danger">ভোটার আইডি নং প্রয়োজন</small>
                                @else 
                                    <small class="text-dark">ভোটার আইডি নং</small>
                                @endif
                                <small class="text-dark"></small>
                                <input type="text" name="nid" class="form-control rounded-0 shadow-none" placeholder="ভোটার আইডি নং লিখুন">
                            </div>

                            <div class="form-group mb-3">
                                @if($errors->has('location'))
                                    <small class="text-danger">পাঠানোর ঠিকানা প্রয়োজন</small>
                                @else 
                                    <small class="text-dark">পাঠানোর ঠিকানা</small>
                                @endif
                                <input type="text" name="location" class="form-control rounded-0 shadow-none">
                            </div>

                            <div class="form-group mb-3">
                                @if($errors->has('carinfo'))
                                    <small class="text-danger">পরিবহনের তথ্য প্রয়োজন</small>
                                @else 
                                    <small class="text-dark">পরিবহনের তথ্য</small>
                                @endif
                                <input type="text" name="carinfo" class="form-control rounded-0 shadow-none">
                            </div>

                            <div class="form-group mb-3">
                                @if($errors->has('payment_method'))
                                    <small class="text-danger">মূল্যপরিশোধ পদ্ধতি প্রয়োজন</small>
                                @else 
                                    <small class="text-dark">মূল্যপরিশোধ পদ্ধতি</small>
                                @endif
                                <select name="payment_method" class="form-control rounded-0 shadow-none">
                                    <option value="">অর্থ প্রদানের পদ্ধতি নির্বাচন করুন</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Bkash">Bkash</option>
                                    <option value="Rocket">Rocket</option>
                                    <option value="Nagat">Nagat</option>
                                    <option value="Bank">Bank</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                @if($errors->has('quantity'))
                                    <small class="text-danger">পণ্যের পরিমাণ প্রয়োজন</small>
                                @else 
                                    <small class="text-dark">পণ্যের পরিমাণ</small>
                                @endif
                                <input type="number" id="quantity" name="quantity" min="1" class="form-control rounded-0 shadow-none">
                            </div>

                            <div class="d-flex bg-white p-2">
                                <div>
                                    <p id="core_price" style="display: none;">{{$product->price_per_unit}}</p>
                                    <h5 class="mb-0">মোট টাকার পরিমাণঃ <span id="unit_price"></span></h5>
                                </div>
                                <div class="ml-auto">
                                    <button type="submit" class="btn btn-warning text-dark rounded-0 shadow-sm btn-block">অর্ডার কনফার্ম করুন</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    

</div>


<script>
    $(document).ready(function(){
        var total = 0;
        $('#quantity').keyup(function(){
            total = $('#core_price').text() * $('#quantity').val();
            $('#unit_price').html(total)
        })
    })
</script>

@endsection