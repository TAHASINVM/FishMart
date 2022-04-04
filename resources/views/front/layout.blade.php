
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <title>@yield('title')</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
      <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
      <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}">
      <link rel="icon" href="{{ asset('front/images/fevicon.png') }}" type="image/gif" />
      <link rel="stylesheet" href="{{ asset('front/css/jquery.mCustomScrollbar.min.css') }}">
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><h1><span class="text-primary logo">FISH</span>MART</h1></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div  class="head_top">
            <div class="header bg-white shadow">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                           <div class="center-desk">
                              <div class="logos">
                                 <a href="{{ url('/') }}"><h1><span class="text-primary logo">FISH</span>MART</h1></a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 d-flex align-item-center">
                        <nav class="navigation navbar navbar-expand-md navbar-dark d-flex align-item-center justify-content-end">
                           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                              <span class="navbar-toggler-icon"></span>
                           </button>
                           <div class="collapse navbar-collapse" id="navbarsExample04">
                              <ul class="navbar-nav">
                                 <li class="nav-item">
                                    <a class="nav-link text-muted bold" href="#"> Home  </a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link text-muted bold" href="#">About</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link text-muted bold" href="#">Contact</a>
                                 </li>
                              </ul>
                           </div>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
            <!-- end header inner -->
            <!-- end header -->
            <!-- banner -->
            <section class="banner_main">
               <div class="container-fluid">
                  <div class="row d_flex">
                     <div class="col-md-6">
                        <div class="text-bg">
                           <h1>Buy Fresh Fish With FishMart</h1>
                           <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,</p>
                           <a href="#">Read More</a>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="text-img">
                           <figure><img src="{{ asset('front/images/dolphin.png') }}" alt="#"/></figure>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </header>
      <!-- end banner -->
      <!-- business -->
      <div class="business">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <span>Today Available Fishes</span>
                     <h2>Buy Before It Finish</h2>
                     <figure><img width="50%" src="{{ asset('front/images/fish_1.png') }}" alt="#"/></figure>
                  </div>
               </div>
            </div>
            <div class="row mx-3 justify-content-around flex-wrap">
               @if (isset($data[0]))
                  @foreach ($data as $fish)
                     <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card">
                           <img width="100%" height="200px" src="{{ asset('media/fish/'.$fish['getFishName']->image) }}" alt="Card image cap">
                           <div class="card-body">
                              <h5 class="card-title">{{ $fish['getFishName']->eng_name }} ( {{ $fish['getFishName']->mal_name }})</h5>
                              <h5>Rs {{ $fish->price }}</h5>
                              @if ($fish->status==1)
                                 <a href="#" class="btn btn-primary">Add To Cart</a>
                              @else
                                 <button class="btn btn-danger">Finish</button>
                              @endif
                           </div>
                        </div>
                     </div>
                  @endforeach
               @endif  
            </div>
         </div>
      </div>
      <!-- end business -->

      <!-- Testimonial -->
      <div class="section">
         <div class="container">
            <div id="" class="Testimonial">
               <div class="row">
                  <div class="col-md-12">
                     <div class="titlepage">
                        <h2>Testimonial</h2>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-3">
                     <div class="Testimonial_box">
                        <i><img src="images/plan1.png" alt="#"/></i>
                     </div>
                  </div>
                  <div class="col-md-9">
                     <div class="Testimonial_box">
                        <h4>Donals</h4>
                        <p>Tof Lorem Ipsum, you need to be There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a pass <br>
                           age of Lorem Ipsum, you need to be 
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
     
      <!-- end Testimonial -->
      <!-- contact -->
      <div id="contact" class="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Contact us</h2>
                     <span>There are many variations of passages of Lorem Ipsum available, but the </span>
                  </div>
               </div>
            </div>
         </div>
         <div class="container">
            <div class="row">
               <div class="col-md-12 ">
                  <form class="main_form ">
                     <div class="row">
                        <div class="col-md-12 ">
                           <input class="form_contril" placeholder="Name " type="text" name="Name ">
                        </div>
                        <div class="col-md-12">
                           <input class="form_contril" placeholder="Phone Number" type="text" name=" Phone Number">
                        </div>
                        <div class="col-md-12">
                           <input class="form_contril" placeholder="Email" type="text" name="Email">
                        </div>
                        <div class="col-md-12">
                           <textarea class="textarea" placeholder="Message" type="text" name="Message"></textarea>
                        </div>
                        <div class="col-sm-12">
                           <button class="send_btn">Send</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-- end contact -->
      <!--  footer -->
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-md-12 ">
                     <div class="cont">
                        <h3> <strong class="multi"> Free Multipurpose Responsive</strong><br>
                           Landing Page 2019
                        </h3>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <ul class="social_icon">
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <p>Copyright 2019 All Right Reserved By <a href="https://html.design/"> Free  html Templates</a></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>

      <script src="{{ asset('front/js/jquery.min.js') }}"></script>
      <script src="{{ asset('front/js/popper.min.js') }}"></script>
      <script src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('front/js/jquery-3.0.0.min.js') }}"></script>
      <script src="{{ asset('front/js/plugin.js') }}"></script>
      <script src="{{ asset('front/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
      <script src="{{ asset('front/js/custom.js') }}"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
   </body>
</html>

