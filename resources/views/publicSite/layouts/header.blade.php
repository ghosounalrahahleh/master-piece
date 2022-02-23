<!DOCTYPE html>
<html lang="en">

<head>
  <title>Afdalcomp-@yield('title','Afdalcomp')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800,900&display=swap"
    rel="stylesheet">

  <link rel="stylesheet" href=" {{ asset('css/open-iconic-bootstrap.min.css') }}">
  <link rel="stylesheet" href=" {{ asset('css/animate.css') }}">

  <link rel="stylesheet" href=" {{ asset('css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href=" {{ asset('css/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href=" {{ asset('css/magnific-popup.css') }}">

  <link rel="stylesheet" href=" {{ asset('css/aos.css') }}">

  <link rel="stylesheet" href=" {{ asset('css/ionicons.min.css') }}">

  <link rel="stylesheet" href=" {{ asset('css/flaticon.css') }}">
  <link rel="stylesheet" href=" {{ asset('css/icomoon.css') }}">
  <link rel="stylesheet" href=" {{ asset('css/style.css') }}">

  <link rel="stylesheet" href=" {{ asset('userProfile') }}">

  {{-- logo font --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oldenburg&display=swap" rel="stylesheet">

  {{-- font icons --}}
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css%22%3E">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="col-md-4 d-flex align-items-center py-4">
      <a class="navbar-brand" href="/" style="font-family: 'Oldenburg', cursive;"><span
          style="font-size:38px">A</span><span>fdalcomp</span></a>
    </div>
    <div class="container d-flex align-items-center">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
        aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>
      {{-- Search part --}}
      <form action="" method="get" class="searchform order-lg-last">
        {{-- @csrf --}}
        <div class="form-group d-flex">
          <input type="text" class="form-control pl-3" placeholder="Search" name="search" required>
          <button type="submit" placeholder="" class="form-control search"><span class="ion-ios-search"></span></button>
        </div>
      </form>
      {{-- End Searh part --}}
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active"><a href="/" class="nav-link pl-0">Home</a></li>

          <li class="nav-item  submenu dropdown">

            {{-- <a href="{{ route('allCategories' )}}" class="nav-link ">Companies</a> --}}
            {{-- @isset($categories)

            <ul class="dropdown-menu">



              @foreach ($categories as $category )
              <li class="nav-item">j
                {{-- <a class="nav-link text-dark justify-content-center px-2"
                  href="{{ route('category',$category->id )}}">{{ $category->name }}</a> --}}
              {{-- </li>
              @endforeach --}}

            {{-- </ul>
            @endisset --}}
          {{-- </li> --}}
          {{-- <li class="nav-item"><a href="{{ route('services' )}}" class="nav-link">Services</a></li> --}}
          {{-- <li class="nav-item"><a href="{{  route('about' ) }}" class="nav-link">About</a></li> --}}
          @guest
          @if (Route::has('login'))


          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @endif

          @if (Route::has('register'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
          @endif
          @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('users.index') }}" role="button"
              data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('users.index') }}">
                {{ __('Profile') }}
              </a>

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
        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->
