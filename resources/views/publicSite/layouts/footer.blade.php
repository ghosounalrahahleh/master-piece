<footer class="ftco-footer  ftco-section">
    <div class="container">
      <div class="row mb-5" style="justify-content:space-between">
        <div class="col-md-6 col-lg-2">
          <div class="ftco-footer-widget mb-5">
            <div>
              <a class="navbar-brand" href="/" style="font-family: 'Oldenburg', cursive;"><span
                  style="font-size:38px">A</span><span>fdalcomp</span></a>
            </div>
          </div>
        </div>
        {{-- <div class="col-md-6 col-lg-2">
          <div class="ftco-footer-widget mb-5 ml-md-4">
            <h2 class="ftco-heading-2">Categories</h2>
            <ul class="list-unstyled">
              @foreach ($categories as $category )
              <li class="nav-item">
                <li><a href="{{ route('allCategories',$category->id )}}"><span class="ion-ios-arrow-round-forward mr-2"></span>{{ $category->name }}</a></li>

              </li>
              @endforeach

            </ul>
          </div>
        </div> --}}
        <div class="col-md-6 col-lg-2">
          <div class="ftco-footer-widget mb-5 ml-md-4">
            <h2 class="ftco-heading-2">Links</h2>
            <ul class="list-unstyled">
              <li><a href="/"><span class="ion-ios-arrow-round-forward mr-2"></span>Home</a></li>
              <li><a href="{{ 'about' }}"><span class="ion-ios-arrow-round-forward mr-2"></span>About</a></li>
              <li><a href="{{ 'services' }}"><span class="ion-ios-arrow-round-forward mr-2"></span>Services</a></li>
              {{-- <li><a href="{{ route('allCategories' )}}"><span class="ion-ios-arrow-round-forward mr-2"></span>Companies</a></li> --}}
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-lg-2">
          <div class="ftco-footer-widget mb-5">
            <h2 class="ftco-heading-2">Our Contact Info</h2>
            <div class="block-23 mb-3">
              <ul>
                <li><span class="icon icon-map-marker"></span><span class="text">Amman, Jordan</span></li>
                <li><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></li>
                <li><span class="icon icon-envelope"> </span><span class="text ">Afdalcomp@gmail.com</span> </li>
              </ul>
            </div>
          </div>
        </div>


        <div class="col-md-6 col-lg-2">
          <div class="ftco-footer-widget mb-5">
            <h2 class="ftco-heading-2 mb-0">Connect With Us</h2>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
              <li class="ftco-animate"><a href="https://www.facebook.com/people/%D8%BA%D8%B5%D9%88%D9%86-%D8%A7%D9%84%D8%B1%D8%AD%D8%A7%D8%AD%D9%84%D8%A9/100008018806086/" target="_blank"><span class="icon-facebook"></span></a></li>
              <li class="ftco-animate"><a href="https://www.instagram.com/gswnlrhhl/" target="_blank"><span class="icon-instagram"></span></a></li>
            </ul>
          </div>
        </div>
      </div>
      {{--
    </div> --}}

    <div class="row">
      <div class="col-md-12 text-center">

        <p>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy;<script>
            document.write(new Date().getFullYear());
          </script> All rights reserved | This website is made with <i class="icon-heart" aria-hidden="true"></i> by <a
            href="https://google.com" target="_blank">Kafou Team</a>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>
      </div>
    </div>
    </div>
  </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/9bef045b1e.js" crossorigin="anonymous"></script>

  <script src=" {{ asset('js/jquery.min.js') }}"></script>
  <script src=" {{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src=" {{ asset('js/popper.min.js') }}"></script>
  <script src=" {{ asset('js/bootstrap.min.js') }}"></script>
  <script src=" {{ asset('js/jquery.easing.1.3.js') }}"></script>
  <script src=" {{ asset('js/jquery.waypoints.min.js') }}"></script>
  <script src=" {{ asset('js/jquery.stellar.min.js') }}"></script>
  <script src=" {{ asset('js/owl.carousel.min.js') }}"></script>
  <script src=" {{ asset('js/jquery.magnific-popup.min.js') }}"></script>
  <script src=" {{ asset('js/aos.js') }}"></script>
  <script src=" {{ asset('js/jquery.animateNumber.min.js') }}"></script>
  <script src=" {{ asset('js/scrollax.min.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src=" {{ asset('js/google-map.js') }}"></script>
  <script src=" {{ asset('js/main.js') }}"></script>
  </body>

  </html>
