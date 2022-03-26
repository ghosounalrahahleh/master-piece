@extends('publicSite.layouts.master')
@section('title','Home')
@section('content')
<main class="grid">
    {{-- section 1 start --}}
    <section class="section1">
        <h1 class="section1__heading text-center">“Something Handmade is so Much More Meaningful”</h1>
        <div class="container section1__slider">
            <div class="row">
                <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel" data-interval="1000">
                    <div class="MultiCarousel-inner">
                        @foreach ($categories as $category)
                        <a href="{{ route('singleCategory',$category->id) }}">
                            <div class="item text-center">
                                <div>
                                    <img class="item__img " src="{{ asset($category->image) }}"
                                        alt="{{ $category->name }}">
                                    <p class="mt-3 text-center"> <strong>{{ $category->name }}</strong></p>
                                </div>
                            </div>
                            @endforeach
                        </a>
                    </div>
                    <button class="btn pre-btn leftLst">&#10094; </button>
                    <button class="btn next-btn rightLst"> &#10095;</button>
                </div>
            </div>
        </div>
    </section>
    {{-- section 2 start --}}
    <section class="section2">
        <div class="section__title">
            <div class="d-none d-lg-block d-md-block">
                <hr>
            </div>
            <h3 class="text-purple section__subtitle font-Lobster">Featured Products</h3>
            <div class="d-none d-lg-block d-md-block">
                <hr>
            </div>
        </div>
        <div class="container section2__slider">
            <div class="row">
                <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel" data-interval="1000">
                    <div class="MultiCarousel-inner">
                        @foreach ($newProducts as $product)
                        <div class="item section2__item ">
                            <div class="card border-0  ">
                                <a href="{{ route('singleProduct',$product->id) }}">
                                    <img height="150" src="{{asset($product->main_image)}}" class="card-img-top"
                                        alt="{{ $product->name }}"></a>
                                <div class="card-body ps-0 ">
                                    <a class="text-decoration-none" href="{{ route('singleProduct',$product->id)}}">
                                        <h5 class="text-truncate">{{ $product->name }}</h5>
                                    </a>
                                    <a class="text-decoration-none text-purple "
                                        href="{{ route('singleCategory',$product->category_id) }}">
                                        <h6 class="mb-3 text-truncate "><i class="category_link">
                                                {{$product->category->name }}</i> </h6>
                                    </a>
                                    <h5 class="mb-3">
                                        <span
                                            class="{{ $product->is_onSale == 1 ? 'text-decoration-line-through fw-light' : ''  }}">
                                            {{$product->price}} {{ $product->is_onSale == 0 ? "JD" :''}}</span>
                                        @if ($product->is_onSale == 1)
                                        <span class="text-danger h4 ms-2">{{ $product->sale_price }}JD</span>
                                        @endif
                                    </h5>
                                    <!-- Button trigger modal -->
                                    <form method="POST" action="{{ route('cart.store') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <input type="hidden" name="name" value="{{ $product->name }}">
                                        <input type="hidden" name="price" value="{{ $product->price }}">
                                        <input type="hidden" name="sale_price" value="{{ $product->sale_price }}">
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <input type="hidden" name="image" value="{{ $product->main_image }}">
                                        <button type="submit" class=" btn btn-purple rounded-0" data-toggle="modal"
                                            data-target="#exampleModalCenter"> add to cart </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered " role="document">
                                <div class="modal-content">
                                    <div class="modal-body p-5 d-flex flex-column align-items-center">
                                        <img width="100px" src="{{ asset('images/success.png') }}" alt="add to cart successfully">
                                        <h5 class="text-center mt-3"> {{ $product->name }} added to cart
                                            successfully !</h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-purple" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <button class="btn pre-btn leftLst2 leftLst ">&#10094; </button>
                    <button class="btn next-btn rightLst2 rightLst "> &#10095;</button>
                </div>
            </div>
        </div>
    </section>
    {{-- section 3 start --}}
    <section class="section3">
        <div class="section__title">
            <div class="d-none d-lg-block d-md-block">
                <hr>
            </div>
            <h3 class="text-purple section__subtitle font-Lobster"> Products on Sale</h3>
            <div class="d-none d-lg-block d-md-block">
                <hr>
            </div>
        </div>
        <div class="container section2__slider">
            <div class="row">
                <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel" data-interval="1000">
                    <div class="MultiCarousel-inner">
                        @foreach ($saleProducts as $product)
                        <div class="item section2__item ">
                            <div class="border-0  card">
                                <a class="" href="{{ route('singleProduct',$product->id) }}"><img height="150"
                                        src="{{asset($product->main_image)}}" class="card-img-top"
                                        alt="Company-logo"></a>
                                <div class="ps-0  card-body">
                                    <a class="text-decoration-none" href="{{ route('singleProduct',$product->id)
                                        }}">
                                        <h5 class="text-truncate">{{ $product->name}}</h5>
                                    </a>
                                    <a class="text-decoration-none text-purple "
                                        href="{{ route('singleCategory',$product->category_id) }}">
                                        <h6 class="mb-3 text-truncate "><i class="category_link">
                                                {{$product->category->name }}</i> </h6>
                                    </a>
                                    <h5 class="mb-3">
                                        <span
                                            class="{{ $product->is_onSale == 1 ? 'text-decoration-line-through fw-light' : ''  }}">
                                            {{$product->price}} {{ $product->is_onSale == 0 ? "JD" :''}}</span>
                                        @if ($product->is_onSale == 1)
                                        <span class="text-danger h4 ms-2">{{ $product->sale_price }}JD</span>
                                        @endif
                                    </h5>
                                    <!-- Button trigger modal -->
                                    <form method="POST" action="{{ route('cart.store') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <input type="hidden" name="name" value="{{ $product->name }}">
                                        <input type="hidden" name="price" value="{{ $product->price }}">
                                        <input type="hidden" name="sale_price" value="{{ $product->sale_price }}">
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <input type="hidden" name="image" value="{{ $product->main_image }}">
                                        <button type="submit" class=" btn btn-purple rounded-0" data-toggle="modal"
                                            data-target="#exampleModalCenter">
                                            add to cart </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered " role="document">
                                <div class="modal-content">
                                    <div class="modal-body p-5 d-flex flex-column align-items-center">
                                        <img width="100px" src="{{ asset('images/success.png') }}" alt="add to cart successfully">
                                        <h5 class="text-center mt-3"> {{ $product->name }} added to cart
                                            successfully !</h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-purple" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <button class="btn pre-btn leftLst2 leftLst">&#10094; </button>
                    <button class="btn next-btn rightLst2 rightLst"> &#10095;</button>
                </div>
            </div>
        </div>


    </section>

    {{-- section 4 start --}}
    <div class="section__title  " style="margin-top: 70px ">
        <div class="d-none d-lg-block d-md-block">
            <hr>
        </div>
        <h3 class="text-purple section__subtitle font-Lobster">We are Special</h3>
        <div class="d-none d-lg-block d-md-block">
            <hr>
        </div>
    </div>

    <div class="container">
        <div class="row flex-wrap">
            <div class="col-sm-6 col-md-5 col-lg-3  text-center">
                <img class="service__img" src="{{ asset('/images/download.jfif') }}" alt="{{ $category->name }}">
                <h4 class="mt-3 text-center text-purple font-Lobster"> <strong>Fast Delivery</strong></h4>
            </div>
            <div class="col-sm-6 col-md-5 col-lg-3 text-center">
                <img class="service__img" src="{{ asset('/images/download.png') }}" alt="{{ $category->name }}">
                <h4 class="mt-3 text-center text-purple font-Lobster"> <strong>Unique in the world</strong></h4>
            </div>
            <div class=" col-sm-6 col-md-5 col-lg-3 text-center">
                <img class="service__img text-purple " src="{{ asset('/images/mwl.jpg') }}" alt="{{ $category->name }}">
                <h4 class="mt-3 text-center text-purple font-Lobster"> <strong>Made with Love</strong></h4>
            </div>
            <div class="col-sm-6 col-md-5 col-lg-3 text-center">
                <img class="service__img" src="{{ asset('/images/made.png') }}" alt="{{ $category->name }}">
                <h4 class="mt-3 text-center font-Lobster"> <strong>100% hand made</strong></h4>
            </div>
        </div>
    </div>

</main>



@endsection
