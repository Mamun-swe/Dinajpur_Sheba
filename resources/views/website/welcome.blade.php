  
@extends('layouts.website')
@section('content')

<!-- Desktop Nav -->
    <div class="website-nav shadow py-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex">
                        <div><img src="{{asset('images/static/logo.png')}}" class="img-fluid"></div>
                        <div class="ml-auto">
                            <ul class="d-none d-lg-block">
                                <li><a href="">হোম</a></li>
                                @if(Auth()->User())
                                <li><a href="{{route('login')}}">{{Auth()->User()->name}}</a></li>
                                @else
                                <li><a href="{{route('login')}}">লগইন</a></li>
                                <li><a href="{{route('register')}}">রেজিস্ট্রেশন</a></li>
                                @endif
                                <li>
                                    @if(Auth()->User())
                                        <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        লগ আউট
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                        </form>
                                    @endif
                                </li>
                            </ul>
                            <!-- Mobile Menu Icon -->
                            <button type="button" class="btn shadow-none d-lg-none p-0 openMenu"><i class="fas fa-bars px-2" style="font-size: 20px;"></i></button>
                            <!-- End Mobile Menu Icon -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- End Desktop Nav -->

<!-- Mobile Menu -->
<div class="mobile-menu">
    <div class="text-right">
        <span class="close-icon">&times;</span>
    </div>
    <div class="p-3">
        <ul>
            <li><a href="">হোম</a></li>
            @if(Auth()->User())
                <li><a href="{{route('login')}}">{{Auth()->User()->name}}</a></li>
            @else
                <li><a href="{{route('login')}}">লগইন</a></li>
                <li><a href="{{route('register')}}">রেজিস্ট্রেশন</a></li>
            @endif
            <li>
            @if(Auth()->User())
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    লগ আউট
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endif
            </li>
        </ul>
    </div>
</div>
<!-- End Mobile Menu -->
  
<!-- Slider -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{asset('images/slider/1.jpg')}}" alt="First slide">
      <div class="overlay"></div>
    </div>
    <div class="carousel-item">
      <img src="{{asset('images/slider/2.jpg')}}" alt="Second slide">
      <div class="overlay"></div>
    </div>
    <div class="carousel-item">
      <img src="{{asset('images/slider/3.jpg')}}" alt="Third slide">
      <div class="overlay"></div>
    </div>
  </div>
</div>
<!-- End Slider -->

<!-- Products -->
<div class="products py-4 py-lg-5">
  <div class="container">
      <div class="row">

          <div class="col-12 col-md-4 mb-4 mb-lg-0">
              <div class="card shadow">
                  <div class="card-body p-3">
                    <div class="poster">
                        <img src="{{asset('images/static/lichi.jpg')}}" class="img-fluid" />
                        <div class="overlay">
                            <h3 class="mb-0">দিনাজপুরের লিচু</h3> 
                        </div>
                    </div>
                    <div class="content pt-3">
                        <h5><b>৭ জাতের লিচু আছে</b></h5>
                        <div class="d-flex">
                            <div>
                                <small><b>লিচুর পরিমাণঃ </b><br> ১৭০ কোটি পিস+ স্টক আছে</small><br>
                                <small><b>চাষী সংখ্যাঃ </b> ২৫০০+</small>
                            </div>
                            <div class="ml-auto">
                                <a href="{{route('login')}}" class="btn btn-sm btn-dark shadow-none text-white"><small>আরো দেখুন</small></a>
                            </div>
                        </div>
                    </div>
                  </div>
              </div>
          </div>

          <div class="col-12 col-md-4 mb-4 mb-lg-0">
              <div class="card shadow">
                  <div class="card-body p-3">
                    <div class="poster">
                        <img src="{{asset('images/static/mango.jpg')}}" class="img-fluid" />
                        <div class="overlay">
                            <h3 class="mb-0">দিনাজপুরের আম</h3> 
                        </div>
                    </div>
                    <div class="content pt-3">
                        <h5><b>১৬ জাতের আম আছে</b></h5>
                        <div class="d-flex">
                            <div>
                                <small><b>আমের পরিমাণঃ </b><br> ৫ লক্ষ মণ+ স্টক আছে</small><br>
                                <small><b>চাষী সংখ্যাঃ </b> ২২০০+</small>
                            </div>
                            <div class="ml-auto">
                                <a href="{{route('login')}}" class="btn btn-sm btn-dark shadow-none text-white"><small>আরো দেখুন</small></a>
                            </div>
                        </div>
                    </div>
                  </div>
              </div>
          </div>

          <div class="col-12 col-md-4 mb-4 mb-lg-0">
              <div class="card shadow">
                  <div class="card-body p-3">
                    <div class="poster">
                        <img src="{{asset('images/static/vegitables.jpg')}}" class="img-fluid" />
                        <div class="overlay">
                            <h3 class="mb-0">দিনাজপুরের শাক-সবজি</h3> 
                        </div>
                    </div>
                    <div class="content pt-3">
                        <h5><b>১৭-৩১ জাতের শাক-সবজি আছে</b></h5>
                        <div class="d-flex">
                            <div>
                                <small><b>সবজির পরিমাণঃ </b><br> ১৬,০০০ টন+ দেওয়া যেতে পারে</small><br>
                                <small><b>চাষী সংখ্যাঃ </b> ৩৮,০০০+</small>
                            </div>
                            <div class="ml-auto">
                                <a href="{{route('login')}}" class="btn btn-sm btn-dark shadow-none text-white"><small>আরো দেখুন</small></a>
                            </div>
                        </div>
                    </div>
                  </div>
              </div>
          </div>


      </div>
  </div>
</div>
<!-- End Products -->

<!-- About Us -->
<div class="about-us pb-4 pb-lg-5 pt-lg-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 p-lg-4 mb-2 mb-lg-0">
                <h4>আমাদের সম্পর্কে</h4>
                <p>বিরল সায়েন্স একাডেমীর ব্যানারে একটি স্থানীয় স্বেচ্ছাসেবী ৪৩৬ সদস্যের গ্রুপ দিনাজপুর জেলার ও পার্শ্ববর্তী জেলার লিচু, আম ও শাক-সবজি চাষীদের একটি সহযোগীতার উদ্দেশ্যে চাষী ও ব্যবসায়ীদের ডেটাবেজ তৈরি করেছে। পাশাপাশি একটি অনলাইন ভিত্তিক বাজার ব্যবস্থাও তোইরি করেছে যার নাম: <a href="https://dinajpursheba.com">dinajpursheba.com</a> উক্ত অনলাইন ভিত্তিক বাজার ব্যবস্থায় অনলাইনে পাইকারি ভাবে লিচু, আম, ও শাক-সবজি কেনা-বেচার জন্য বাংলাদেশের যে কোনো প্রান্ত থেকে অর্ডার করা যাবে। এ ক্ষেত্রে উক্ত অনলাইন প্লাটফর্মটি আপদকালীন সময়ে লিচু, আম ও শাক-সবজি পাইকারি ভাবে কেনা-বেচার জন্য ব্যবহার করতে পারেন।</p>
            </div>
            <div class="col-12 col-lg-4">
                <img src="{{asset('images/static/team.jpg')}}" class="img-fluid w-100">
            </div>
        </div>
    </div>
</div>
<!-- End About Us -->

<!-- Footer -->
<div class="footer"  style=" background-image: url('{{asset('images/static/farmer.jpg')}}');">
  <div class="overlay py-5">
      <div class="container">
          <div class="row">
              <div class="col-12 col-lg-4 text-center">
                    <img src="{{asset('images/static/logo2.png')}}" class="img-fluid mb-4">
                    <img src="{{asset('images/static/logo3.png')}}" class="img-fluid mb-4">
              </div>
              <div class="col-12 col-lg-4 pl-lg-5">
                  <h4 class="text-dark bg-white p-3 mb-4">যোগাযোগ করুন</h4>
                  <div class="p-4 bg-white">
                      <p class="mb-0"><b>Cell: </b>+88 01956667775</p>
                      <p class="mb-2"><b>Cell: </b>+88 01684215160</p>
                      <p class="mb-0"><b>Facebook: </b>facebook.com</p>
                      <p class="mb-2"><b>email: </b>email.com</p>
                      <h5 class="mb-0"><b>Address: </b> Birol, Dinajpur, Rangpur, Rajshahi, Bangladesh</h5>
                  </div>
              </div>
              <div class="col-12 col-lg-4 pl-lg-5">
                  <h4 class="text-dark bg-white p-3 mb-4">আমাদের অবস্থান</h4>
                  <img src="{{asset('images/static/map.png')}}" class="img-fluid w-100">
              </div>
          </div>
      </div>
  </div>
</div>
<!-- End Footer -->


<script>
    $(document).ready(function(){
        $('.openMenu').click(function(){
            $('.mobile-menu').addClass('open-menu');
        });
        $('.close-icon').click(function(){
            $('.mobile-menu').removeClass('open-menu');
        })
    })
</script>

@endsection