<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/favicon.png" type="image/png">
        <title>Xpenser</title>
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/linericon/style.css')}}">
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/owl-carousel/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/lightbox/simpleLightbox.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/nice-select/css/nice-select.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/animate-css/animate.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/swiper/css/swiper.min.css')}}">
        <!-- main css -->
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    </head>
    <body>
        
        <!--================Header Menu Area =================-->
        <header class="header_area">
            <div class="main_menu">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container box_1620">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <a class="navbar-brand logo_h" href="/"><span><b>XPENSER</b></span></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                            <ul class="nav navbar-nav menu_nav justify-content-center">
                            @guest
                                <li class="nav-item active"><a class="nav-link" href="/">Home</a></li> 
                                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Log In</a></li>
                                @if (Route::has('register')) 
                                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Sign Up</a>
                                 @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Hello, {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/home"
                                       >
                                        {{ __('Dashboard') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="nav-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="nav-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="nav-item"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li class="nav-item"><a href="#"><i class="fa fa-behance"></i></a></li>
                                <li class="nav-item"><a href="#" class="search"><i class="lnr lnr-magnifier"></i></a></li>
                            </ul>
                        </div> 
                    </div>
                </nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->
       
            @yield('content')
        
        
        <!--================ start footer Area  =================-->    
        <footer class="footer-area">
            <div class="container">
                <div class="row footer-bottom d-flex justify-content-between align-items-center">
                    <p class="col-lg-8 col-md-8 footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    <div class="col-lg-4 col-md-4 footer-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>
        </footer>
        <!--================ End footer Area  =================-->
        
        
        
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
        <script src="{{asset('js/popper.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/stellar.js')}}"></script>
        <script src="{{asset('vendors/lightbox/simpleLightbox.min.js')}}"></script>
        <script src="{{asset('vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
        <script src="{{asset('vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{asset('vendors/isotope/isotope-min.js')}}"></script>
        <script src="{{asset('vendors/owl-carousel/owl.carousel.min.js')}}"></script>
        <script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>
        <script src="{{asset('vendors/counter-up/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('vendors/counter-up/jquery.counterup.js')}}"></script>
        <script src="{{asset('js/mail-script.js')}}"></script>
        <script src="{{asset('vendors/popup/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{asset('vendors/swiper/js/swiper.min.js')}}"></script>
        <script src="{{asset('js/theme.js')}}"></script>
    </body>
</html>


