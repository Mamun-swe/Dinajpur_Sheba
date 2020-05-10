  
@extends('layouts.website')
@section('content')
  
<div class="auth">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-6 m-auto">
                <div class="card rounded-0">
                    <div class="card-header rounded-0 border-0 p-4 text-center">
                        <h5 class="mb-0">পাসওয়ার্ড পরিবর্তন</h5>
                    </div>
                    <div class="card-body pb-5">
                        <form action="" method="post">
                            <!-- Phone -->
                            <div class="form-group mb-4">
                                <p class="mb-2"><i class="fas fa-phone mr-2"></i>মোবাইল</p>
                                <input type="text" class="form-control rounded-0 shadow-none" placeholder="মোবাইল নাম্বার লিখুন">
                            </div>

                            <!-- Password -->
                            <div class="form-group mb-4">
                                <p class="mb-2"><i class="fas fa-key mr-2"></i>নতুন পাসওয়ার্ড</p>
                                <input type="password" class="form-control rounded-0 shadow-none" placeholder="নতুন পাসওয়ার্ড লিখুন">
                            </div>

                            <button type="submit" class="btn btn-block rounded-0 shadow text-white">সাবমিট করুন</button>
                        </form>
                        <div class="text-center links mt-4">
                        <p class="mb-0"><a href="{{route('login')}}"> লগইন করুন</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
      
@endsection