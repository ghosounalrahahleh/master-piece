<footer class="ftco-footer  ftco-section">
    <div class="container">
        <div class="row mb-5 w-100">
            <div class="col-md-3 col-sm-3 col-lg-3">
                <div class="ftco-footer-widget mb-5">
                    <div class="ftco-footer-widget mb-5 ml-md-4">
                        <h2 class="ftco-heading-2">Quiq Links</h2>
                        <ul class="list-unstyled">
                            <li><a class="text-decoration-none" href="{{ route('home') }}"><span class="ion-ios-arrow-round-forward mr-2"></span>Home</a></li>
                            <li><a class="text-decoration-none" href="{{ route('allCategories')}}"><span class="ion-ios-arrow-round-forward mr-2"></span>Store</a> </li>
                            <li><a class="text-decoration-none" href="{{ 'services' }}"><span
                                        class="ion-ios-arrow-round-forward mr-2"></span>About</a></li>
                            <li><a class="text-decoration-none" href="{{ route('userProfile.index') }}"><span class="ion-ios-arrow-round-forward mr-2"></span>My
                                    Account</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-lg-3">
                <div class="ftco-footer-widget mb-5 ml-md-4">
                    <h2 class="ftco-heading-2">Categories</h2>
                    <ul class="list-unstyled">
                        @for ($i = 0; $i < 4; $i++)
                        @if(count($categories))
                        <li><a class="text-decoration-none" href="{{ route('singleCategory',$categories[$i]->id )}}"><span class="ion-ios-arrow-round-forward mr-2"></span>{{ $categories[$i]->name }}</a></li>
                        @endif

                        @endfor
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-lg-3">
                <div class="ftco-footer-widget mb-5 ml-md-4">
                    <h2 class="ftco-heading-2">About</h2>
                    <ul class="list-unstyled">
                        <li><a class="text-decoration-none" href="{{ route('JoinUs') }}"><span class="ion-ios-arrow-round-forward mr-2 "></span>Join Us</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-lg-3">
                <div class="ftco-footer-widget mb-5">
                    <h2 class="ftco-heading-2 mb-0">Connect Us</h2>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lfet  mt-3">
                        <li class="ftco-animate mr-5 mt-3 "><a
                                href="https://www.facebook.com/ghosounhandcraft/"
                                target="_blank"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate mr-5 mt-3"><a href="https://www.instagram.com/ghhandcraft/"
                                target="_blank"><span class="icon-instagram"></span></a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    {{--
    </div> --}}
    <div class="col-md-12 m-auto text-center">

        <p class="text-center">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>
                document.write(new Date().getFullYear());
            </script> All rights reserved | This website is made with <i class="icon-heart" aria-hidden="true"></i>
            by <a href="https://jo.linkedin.com/in/ghosoun-alrahahleh-62b78b21b" target="_blank">Ghosoun Alrahahleh</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>
    </div>
    </div>
</footer>
<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
            stroke="#F96D00" />
    </svg></div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://kit.fontawesome.com/9bef045b1e.js" crossorigin="anonymous"></script>

<script src=" {{ asset('assets2/js/custom.js') }}"></script>
<script src=" {{ asset('assets2/js/jquery.min.js') }}"></script>
<script src=" {{ asset('assets2/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src=" {{ asset('assets2/js/popper.min.js') }}"></script>
<script src=" {{ asset('assets2/js/bootstrap.min.js') }}"></script>
<script src=" {{ asset('assets2/js/jquery.easing.1.3.js') }}"></script>
<script src=" {{ asset('assets2/js/jquery.waypoints.min.js') }}"></script>
<script src=" {{ asset('assets2/js/jquery.stellar.min.js') }}"></script>
<script src=" {{ asset('assets2/js/owl.carousel.min.js') }}"></script>
<script src=" {{ asset('assets2/js/jquery.magnific-popup.min.js') }}"></script>
<script src=" {{ asset('assets2/js/aos.js') }}"></script>
<script src=" {{ asset('assets2/js/jquery.animateNumber.min.js') }}"></script>
<script src=" {{ asset('assets2/js/scrollax.min.js') }}"></script>
<script src=" {{ asset('assets2/js/slider.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src=" {{ asset('assets2/js/google-map.js') }}"></script>
<script src=" {{ asset('assets2/js/main.js') }}"></script>
</body>

</html>
