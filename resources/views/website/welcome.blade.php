  
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
      <img src="{{asset('images/slider/2.jpeg')}}" alt="Second slide">
      <div class="overlay"></div>
    </div>
    <div class="carousel-item">
      <img src="{{asset('images/slider/3.jpg')}}" alt="Third slide">
      <div class="overlay"></div>
    </div>
  </div>
</div>
<!-- End Slider -->


<!-- Team -->
<div class="team py-4 py-lg-5">
    <div class="container">
        <div class="row">
            <div class="col-12 team-column">
                <div class="card">
                <img src="{{asset('images/static/team.jpg')}}" class="img-fluid w-100">
                <div class="team_overlay">
                    <div class="flex-center flex-column text-center">
                        <h1 class="mb-0 text-white">বিরল সায়েন্স একাডেমি</h1>
                    </div> 
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Team -->

<!-- Story -->
<div class="story mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <p class="text-uppercase text-muted mb-0">আমাদের সম্পর্কে</p>
                <h1 class="mb-3"><span class="my_color">আমাদের</span> <span class="text-dark">গল্প পড়ুন</span></h1>
                <p>Lorem ipsum dolor sit amet, consectetu adipiscing elit. Etiam nunc elit, pretium atlanta urna veloci, fermentum malesuda mina. Donec auctor nislec neque sagittis, sit amet dapibus pellentesque donal feugiat. Nulla mollis magna non sanaliquet, volutpat do zutum, ultrices consectetur, ultrices at purus.</p>
                <a href="" class="btn rounded-0 shadow text-white">আরো পড়ুন</a>
            </div>
        </div>
    </div>
</div>

<!-- End Story -->


<!-- Footer -->
<div class="footer"  style=" background-image: url('{{asset('images/static/farmer.jpg')}}');">
  <div class="overlay py-5">
      <div class="container">
          <div class="row">
              <div class="col-12 col-lg-4">
                    <img src="{{asset('images/static/logo.png')}}" class="img-fluid mb-4">
                    <p class="text-white">Lorem ipsum dolor sit amet, consectetu adipiscing elit. Etiam nunc elit, pretium atlanta urna veloci, fermentum malesuda mina. Donec auctor nislec neque sagittis, sit amet dapibus pellentesque donal feugiat. Nulla mollis magna non sanaliquet, volutpat do zutum, ultrices consectetur, ultrices at purus.</p>
              </div>
              <div class="col-12 col-lg-4 pl-lg-5">
                  <h4 class="text-white mb-4">যোগাযোগ করুন</h4>
                    <p><i class="fas fa-phone my_color mr-3"></i><span class="text-white">+8801740301050</span></p>
              </div>
              <div class="col-12 col-lg-4 pl-lg-5">
                  <h4 class="text-white mb-4">আমাদের সাথে যুক্ত থাকুন</h4>
                  <a href="https://www.facebook.com/Dinajpur-Sheba-113868520314939" target="_blank"><i class="fab fa-facebook-f"></i></a>
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