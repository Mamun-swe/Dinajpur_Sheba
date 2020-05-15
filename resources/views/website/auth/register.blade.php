  
@extends('layouts.website')
@section('content')
  
<div class="auth pb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-6 m-auto">
                <div class="card rounded-0">
                    <div class="card-header rounded-0 border-0 p-4 text-center">
                        <div class="d-flex justify-content-between">
                            <div><a href="{{route('home')}}"><img src="{{asset('images/static/back.png')}}" alt=""></a></div>
                            <div><h5 class="mb-0">রেজিস্ট্রেশন</h5></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="card-body pb-5">
                        @if(Session::has('success'))
                            <p class="text-danger">{{Session::get('success')}}</p>
                        @endif
                        <form action="{{route('register')}}" method="post">
                            @csrf
                            <!-- Name -->
                            <div class="form-group mb-4">
                                @if($errors->has('name'))
                                    <p class="mb-2 text-danger"><i class="fas fa-user mr-2"></i>ক্রেতার নাম প্রয়োজন</p>
                                @else 
                                    <p class="mb-2"><i class="fas fa-user mr-2"></i>ক্রেতার নাম</p>
                                @endif
                                <input type="text" name="name" class="form-control rounded-0 shadow-none" placeholder="আপনার নাম লিখুন">
                            </div>

                            <input type="hidden" name="account_type" value="buyer">

                            <!-- Phone -->
                            <div class="form-group mb-4">
                                @if($errors->has('phone'))
                                    <p class="mb-2 text-danger"><i class="fas fa-phone mr-2"></i>মোবাইল প্রয়োজন</p>
                                @else 
                                    <p class="mb-2"><i class="fas fa-phone mr-2"></i>মোবাইল</p>
                                @endif
                                
                                <input type="text" name="phone" class="form-control rounded-0 shadow-none" placeholder="মোবাইল নাম্বার লিখুন">
                            </div>

                            <!-- Password -->
                            <div class="form-group mb-4">
                                @if($errors->has('password'))
                                    <p class="mb-2 text-danger"><i class="fas fa-key mr-2"></i>পাসওয়ার্ড প্রয়োজন</p>
                                @else 
                                    <p class="mb-2"><i class="fas fa-key mr-2"></i>পাসওয়ার্ড</p>
                                @endif
                                
                                <input type="password" name="password" class="form-control rounded-0 shadow-none" placeholder="পাসওয়ার্ড লিখুন">
                            </div>

                            <!-- Re-Password -->
                            <div class="form-group mb-4">
                                @if($errors->has('password'))
                                    <p class="mb-2 text-danger"><i class="fas fa-key mr-2"></i>পুনরায় পাসওয়ার্ড প্রয়োজন</p>
                                @else 
                                    <p class="mb-2"><i class="fas fa-key mr-2"></i>পুনরায় পাসওয়ার্ড</p>
                                @endif
                                
                                <input type="password" name="password_confirmation" class="form-control rounded-0 shadow-none" placeholder="পুনরায় পাসওয়ার্ড লিখুন">
                            </div>

                            <button type="submit" class="btn btn-block rounded-0 shadow text-white">রেজিস্ট্রেশন করুন</button>
                        </form>
                        <div class="text-center links mt-4">
                            <p class="mb-0">একাউন্ট আছে ?<a href="{{route('login')}}"> লগইন করুন</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
      
@endsection