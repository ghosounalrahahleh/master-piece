<!DOCTYPE html>
<html lang="en">

<head>
    <title>Crafty-@yield('title','')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Crafty is an e-commerce website for hand crafts. You can find Crochet, Drawing, Quilling,
         Clay crafts, and Haymaking products ">
    {{-- <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}"> --}}
    <link rel="icon" type="image/png" href="{{ asset('images/iconLogo.png') }}">

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href=" {{ asset('assets2/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('assets2/css/animate.css') }}">

    <link rel="stylesheet" href=" {{ asset('assets2/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('assets2/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('assets2/css/magnific-popup.css') }}">

    <link rel="stylesheet" href=" {{ asset('assets2/css/aos.css') }}">

    <link rel="stylesheet" href=" {{ asset('assets2/css/ionicons.min.css') }}">

    <link rel="stylesheet" href=" {{ asset('assets2/css/flaticon.css') }}">
    <link rel="stylesheet" href=" {{ asset('assets2/css/icomoon.css') }}">
    <link rel="stylesheet" href=" {{ asset('assets2/css/style.css') }}">

    {{-- logo font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oldenburg&display=swap" rel="stylesheet">

    {{-- font icons --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css%22%3E">
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    {{-- slider --}}

    <link rel="stylesheet" href="{{ asset('assets2/css/custom.css') }}">


</head>

<body>

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark  ftco-navbar-light" id="ftco-navbar">
        <div class="container d-flex align-items-center justify-content-between ">

            <div class=" col-md-2 col-sm-3 d-flex align-items-center py-2">
                <a class="navbar-brand" href="/" style="font-family: 'Oldenburg', cursive;"><span
                        style="font-size:38px">C</span><span>rafty</span></a>
            </div>

            <div class="col-md-6 col-sm-3 d-lg-flex d-md-flex d-sm-none d-none align-items-center py-2">
                {{-- Search part --}}
                <form action="{{ route('search') }}" method="get" class="searchform order-lg-last w-100">
                    {{-- @csrf --}}
                    <div class="form-group d-flex">
                        <input type="text" class="form-control pl-3" placeholder="Search" name="search" required>
                        <button type="submit" placeholder="" class="form-control search"><span
                                class="ion-ios-search"></span></button>
                    </div>
                </form>
                {{-- End Searh part --}}
            </div>

            <button class="navbar-toggler col-2" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span>
            </button>

            <div class="collapse navbar-collapse col-md-4" id="ftco-nav">

                {{-- Search part --}}
                <form action="{{ route('search') }}" method="get" class="searchform order-lg-last d-lg-none d-md-none d-sm-block" style=" ">
                    {{-- @csrf --}}
                    <div class="form-group d-flex">
                        <input type="text" class="form-control pl-3" placeholder="Search" name="search" required>
                        <button type="submit" placeholder="" class="form-control search"><span
                                class="ion-ios-search"></span></button>
                    </div>
                </form>
                {{-- End Searh part --}}

                <ul class="navbar-nav mr-auto d-md-flex w-100  d-lg-flex justify-content-around public-menu">
                    <li class="nav-item text-white"><a href="/"
                            class="nav-link {{ request()->is('Crafty') ? 'active' : ''}}">Home</a></li>
                    <li class="nav-item  submenu dropdown">
                        <a href="{{ route('allCategories' )}}"
                            class="nav-link {{ request()->is('AllCategories') ? 'active' : ''}}">Categories</a>
                        @isset($categories)
                        <ul class="dropdown-menu">
                            @foreach ($categories as $category )
                            <a class="dropdown-item text-purple fw-bold"
                                href="{{ route('singleCategory',$category->id )}}">{{ $category->name }}</a>
                            @endforeach
                        </ul>
                        @endisset
                    </li>
                    @guest
                    @if (Route::has('login'))


                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('login') ? 'active' : ''}}" href="{{ route('login') }}">{{
                            __('Login') }}</a>
                    </li>
                    @endif

                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('register') ? 'active' : ''}}"
                            href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('userProfile.index') }}"
                            role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if (auth()->user()->role_id==3)
                            <a class="dropdown-item" href="{{ route('userProfile.index') }}">
                                {{ __('Profile') }}
                            </a>
                            @else
                            <a class="dropdown-item" href="{{ route('users.index') }}">
                                {{ __('Dashboard') }}
                            </a>
                            @endif

                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                    @if (session('cart'))
                    <li class="nav-item dropdown">
                        <a class="nav-link {{ request()->is('cart') ? 'active' : ''}}" href="{{ route('cart.index') }}">
                            <i class="icon-shopping-cart "></i>
                            <span class="cart-counter absolute">{{ count(session("cart")) }}  </span> </a>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a class="nav-link {{ request()->is('cart') ? 'active' : ''}}" href="{{ route('emptyCart') }}">
                            <i class="icon-shopping-cart "></i></a>
                    </li>
                    @endif

                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->
