<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
<meta charset="utf-8">
<title>UTM CARE CHARITY ONLINE SHOP</title>
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta property="og:title" content="">
<meta property="og:type" content="">
<meta property="og:url" content="">
<meta property="og:image" content="">
<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/imgs/logo/CCIN-LOGO.jpg')}}">
<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

@livewireStyles
</head>

<body>
    
    <header class="header-area header-style-1 header-height-2">
        <div class="header-top header-top-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-lg-4">
                        <div class="header-info header-info-right">
                            @auth
                            <ul>                                
                                <li><i class="fi-rs-user"></i>{{ Auth::user()->name }} / 
                                <form method="POST" action="{{route('logout')}}">
                                    @csrf
                                    <a href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();"> Logout </a> 
                                </form>
                                </li>
                            </ul>
                            @else
                            <ul>                                
                                <li><i class="fi-rs-key"></i><a href="{{route('login')}}">Log In </a>  / 
                                <a href="{{route('register')}}">Sign Up</a>
                                </li>
                            </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                     <a href="/"><img src="/assets/imgs/logo/CCIN-LOGO.jpg" alt="logo"></a>
                    </div>
                    <div class="header-right">
                        @livewire('search-header')  
                        <div class="header-action-right">
                            <div class="header-action-2">
                                @livewire('cart-icon')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="{{route('product.checkout')}}"><img src="assets/imgs/logo/CCIN-LOGO.jpg" alt="logo"></a>
                    </div>
                    <!-- header for home shop bla blaa -->
                    <div class="header-nav d-none d-lg-flex">
                        
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                            <nav>
                                <ul class="nav justify-content-center">
                                    <li><a class="active" href="/">Home </a></li>
                                    <li><a href="{{route('donate')}}">Donate</a></li>
                                    <li><a href= "{{route('product')}}">Shop</a></li>
                                    
                                    @auth
                                    <li><a href="#">My Account<i class="fi-rs-angle-down"></i></a>
                                            @if(Auth::user()->utype == 'ADMIN')
                                            <ul class="sub-menu">
                                                <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                                                <li><a href="{{route('admin.products')}}">Products</a></li>
                                                <li><a href="{{route('admin.categories')}}">Categories</a></li>
                                                <li><a href="{{route('admin.order')}}">Orders</a></li>
                                       
                                            </ul>
                                            @else
                                            <ul class="sub-menu">
                                                <li><a href="{{route('user.profile')}}">My Account</a></li>
                                                <li><a href="{{route('orderHistory')}}">Order History</a></li>                                           
                                            </ul>
                                            @endif
                                    </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </header>

    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="{{route('product.checkout')}}"><img src="assets/imgs/logo/CCIN-LOGO.jpg" alt="logo"></a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">
                    <form action="#">
                        <input type="text" placeholder="Search for items…">
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu">
                        <li><a class="active" href="/">Home </a></li>
                                    <li><a href="{{route('donate')}}">Donate</a></li>
                                    <li><a href= "{{route('product')}}">Shop</a></li>
                                </ul>
                            </li>
                            @auth
                                    <li><a href="#">My Account<i class="fi-rs-angle-down"></i></a>
                                            @if(Auth::user()->utype == 'ADMIN')
                                            <ul class="sub-menu">
                                                <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                                                <li><a href="{{route('admin.products')}}">Products</a></li>
                                                <li><a href="{{route('admin.categories')}}">Categories</a></li>
                                                <li><a href="{{route('admin.order')}}">Orders</a></li>
                                       
                                            </ul>
                                            @else
                                            <ul class="sub-menu">
                                                <li><a href="{{route('user.profile')}}">My Account</a></li>
                                                <li><a href="{{route('orderHistory')}}">Order History</a></li>                                           
                                            </ul>
                                            @endif
                                    </li>
                            @endif
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap mobile-header-border">
                    <div class="single-mobile-header-info">
                    @auth
                            <ul>                                
                                <li><i class="fi-rs-user"></i>{{ Auth::user()->name }} 
                                <form method="POST" action="{{route('logout')}}">
                                    @csrf
                                    <a href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();"> Logout </a> 
                                </form>
                                </li>
                            </ul>
                            @else
                            <ul>                                
                                <li><i class="fi-rs-key"></i><a href="{{route('login')}}">Log In </a> 
                                <a href="{{route('register')}}">Sign Up</a>
                                </li>
                            </ul>
                            @endif                        
                    </div>
                    <div class="single-mobile-header-info">                        
                        <a href="{{route('register')}}">>Sign Up</a>
                    </div>
                 
                </div>
            </div>
        </div>
    </div>        
    
    {{$slot}}
    <footer class="main">
        <section class="section-padding footer-mid">
            <div class="container pt-15 pb-20">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="widget-about font-md mb-md-5 mb-lg-0">
                
                            <h5 class="mt-20 mb-10 fw-600 text-grey-4 wow fadeIn animated">Contact</h5>
                            <p class="wow fadeIn animated">
                                <strong>Address: </strong>UTM
                            </p>
                            <p class="wow fadeIn animated">
                                <strong>Phone: </strong>+60-12345678
                            </p>
                            <p class="wow fadeIn animated">
                                <strong>Email: </strong>contact@utmcarecharity
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container pb-20 wow fadeIn animated mob-center">
            <div class="row">
                <div class="col-12 mb-20">
                    <div class="footer-bottom"></div>
                </div>
                <div class="col-lg-6">
                    <p class="float-md-left font-sm text-muted mb-0">
                        &copy; <strong class="text-brand">UTM CARE CHARITY ONLINE SHOP</strong> All rights reserved
                    </p>
                </div>
                <!-- <div class="col-lg-6">
                    <p class="text-lg-end text-start font-sm text-muted mb-0">
                        &copy; <strong class="text-brand">UTM CARE CHARITY ONLINE SHOP</strong> All rights reserved
                    </p>
                </div> -->
            </div>
        </div>
    </footer>    
    <!-- Vendor JS-->
<script src="{{asset('assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/slick.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery.syotimer.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/wow.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery-ui.js')}}"></script>
<script src="{{asset('assets/js/plugins/perfect-scrollbar.js')}}"></script>
<script src="{{asset('assets/js/plugins/magnific-popup.js')}}"></script>
<script src="{{asset('assets/js/plugins/select2.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/waypoints.js')}}"></script>
<script src="{{asset('assets/js/plugins/counterup.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery.countdown.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/images-loaded.js')}}"></script>
<script src="{{asset('assets/js/plugins/isotope.js')}}"></script>
<script src="{{asset('assets/js/plugins/scrollup.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery.vticker-min.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery.theia.sticky.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery.elevatezoom.js')}}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<!-- Template  JS -->
<script src="{{asset('assets/js/main.js?v=3.3')}}"></script>
<script src="{{asset('assets/js/shop.js?v=3.3')}}"></script>
<script src="{{ asset('js/app.js') }}"></script>

@livewireScripts
@stack('scripts')

</body>
</html>