<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/favicon.png" type="image/png">
        <title>Xpenser</title>
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
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
                        </div> 
                    </div>
                </nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->
       
<div class="container-fluid">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            @if($errors->any())
              <div class="alert alert-danger" role='alert'>
                @foreach($errors->all() as $error)
                {{$error}}<br>
                @endforeach
              </div>
            @endif
            <form method="POST" action="{{ route('register') }}">
                        @csrf

            <div class="card" >
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body" >
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row" >
                          <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Select Currency') }}</label>

                          <div class="input-group col-md-6" >
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-money-bill"></i></span>
                            </div>
                            <select class="form-control" name="currency" >
                              @foreach($money as $key)
                                           <option value="{{$key->currency_id}}">{{$key->currency_name}}</option>
                                        @endforeach
                            </select>
                          </div>
                          <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                      
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<!--================ start footer Area  =================-->    
        <footer class="footer-area">
            <div class="container">
                <div class="row footer-bottom d-flex justify-content-between align-items-center">
                    <p class="col-lg-8 col-md-8 footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                </div>
            </div>
        </footer>
        <!--================ End footer Area  =================-->
<!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
        <script src="{{asset('js/popper.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/theme.js')}}"></script>
</body>
</html>