@extends('publicSite.layouts.master')
@section('title'," $product->name ")
@section('content')
<section class="ftco-section bg-white">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            {{-- breedcrumbs section --}}
            <div class="page_link mb-sm-5 mb-md-5 ms-3">
                <a class="text-decoration-none h6 text-capitalize text-purple " href="{{ route('home') }}">Home</a>
                <a class="text-decoration-none h6 text-capitalize text-purple "
                    href="{{ route('allCategories') }}">&#10095;
                    Categories</a>
                <a class="text-decoration-none h6 text-capitalize text-purple "
                    href="{{ route('singleCategory',$product->category_id)}}">&#10095;
                    {{ $product->category->name }}</a>
                <a class="text-decoration-none h6 text-capitalize text-purple ">
                    &#10095; <span class="text-decoration-underline">{{ $product->name }}</span></a>
            </div>
            {{-- --}}
            <div class="container ">
                <div class="row mb-5 justify-content-lg-between">
                    <div class="col-md-4 col-lg-5 p-b-30">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active" data-bs-interval="6000">
                                    <img src="{{ asset($product->main_image) }}" class="d-block w-100"
                                        alt="{{ $product->name }}">
                                </div>
                                <div class="carousel-item " data-bs-interval="6000">
                                    <img src="{{ asset($product->main_image) }}" class="d-block w-100"
                                        alt="{{ $product->name }}">
                                </div>
                                <div class="carousel-item" data-bs-interval="6000">
                                    <img src="{{ asset($product->main_image) }}" class="d-block w-100"
                                        alt="{{ $product->name }}">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex flex-column col-lg-7 p-b-30">
                        <h1 class=""> {{ $product->name }} </h1>
                        <a class="text-decoration-none text-purple fw-light mt-2"
                            href="{{ route('singleCategory',$product->category_id) }}">
                            <h6 class="mb-3 text-truncate ">Categort : <i class="category_link">
                                    {{$product->category->name }}</i> </h6>
                        </a>
                        <p class="text-purple ">{{ $product->description }}</p>
                        <span class="mtext-106 cl2">
                            <h5 class="mb-3">
                                <span
                                    class="{{ $product->is_onSale == 1 ? 'text-decoration-line-through fw-light' : ''  }}">
                                    {{$product->price}} {{ $product->is_onSale == 0 ? "JD" :''}}</span>
                                @if ($product->is_onSale == 1)
                                <span class="text-danger h4">{{ $product->sale_price }} JD</span>
                                @endif
                            </h5>
                        </span>
                        <p class="stext-102 cl3 p-t-23 w-100"></p>
                        <form method="POST" action="{{ route('cart.store') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}" />
                            <input type="hidden" name="name" value="{{ $product->name }}" />
                            <input type="hidden" name="price"
                                value=" @if($product->is_onSalre == 0) {{$product->price}}@else {{$product->sale_price}} @endif " />
                            <input type="hidden" name="image" value="{{ $product->main_image }}" />

                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-204 flex-w flex-m respon6-next">
                                    <div class="d-flex">
                                        <p class="me-3">Size : </p>
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="radio" name="size"
                                                id="flexRadioDefault1" value="s">
                                            <label class="form-check-label h5" for="flexRadioDefault1"> S </label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="radio" name="size"
                                                id="flexRadioDefault2" value="m" checked>
                                            <label class="form-check-label h5" for="flexRadioDefault2">M</label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="radio" name="size" value="l"
                                                id="flexRadioDefault3">
                                            <label class="form-check-label h5" for="flexRadioDefault3"> l</label>
                                        </div>
                                    </div>
                                    <div class="mb-5 mt-3 d-flex">
                                        <div class="btn-minus" type="button" onclick="decrementValue()">
                                            &#9866;
                                        </div>
                                        <input type="text" id="quantity" name="quantity" class="mx-0 quantity-input"
                                            value="1" placeholder="" aria-label="Example text with button addon"
                                            aria-describedby="button-addon1" readOnly />
                                        <div class="btn-plus" type="button" onclick="incrementValue()">
                                            &#10011;
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-purple  py-2 px-3" data-toggle="modal"
                                        data-target="#exampleModalCenter"> Add to cart </button>
                        </form>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered " role="document">
                                <div class="modal-content">
                                    <div class="modal-body p-5 d-flex flex-column align-items-center">
                                        <img width="100px" src="{{ asset('images/success.png') }}"
                                            alt="add to cart successfully">
                                        <h5 class="text-center mt-3"> {{ $product->name }} added to cart successfully!
                                        </h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-purple" data-dismiss="modal">Ok</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- comment  -->
                <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                </div>
            </div>
        </div>
        <div class="bor10 m-t-50 p-t-43 p-b-40">
            <!-- Tab01 -->
            <div class="tab01">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item p-b-10">
                        <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
                    </li>
                    <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews ({{ $count }})</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content p-t-43">
                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <div class="how-pos2 p-lr-15-md">
                            <p class="stext-102 cl6">
                                {{ $product->description }}
                            </p>
                        </div>
                    </div>
                    <div class="tab-pane fade m-5" id="reviews" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                <div class="p-b-30 m-lr-15-sm scroll">
                                    <!-- Review -->
                                    <div class="flex-w flex-t p-b-68">
                                        @if(Auth::check())
                                        <form class="w-full" method="POST" action="{{ route('addComment') }}">
                                            @csrf
                                            <div class="row flex-column">
                                                <div class="col-12 d-flex flex-column p-b-5">
                                                    <label class="" for="review">Your review</label>
                                                    <textarea class="" id="review" name="review"></textarea>
                                                </div>
                                                <input id="name" type="hidden" name="user_id"
                                                    value="{{ auth()->user()->id }}">
                                                <input id="name" type="hidden" name="product_id"
                                                    value="{{ $product->id }}">
                                            </div>
                                            <button class="btn btn-purple mt-3"> Submit </button>
                                        </form>
                                        @else
                                        <a href="{{ route('login') }}" class="btn btn-purple mt-3"> Add Comment </a>
                                        @endif
                                        <div class="size-207">
                                            <div class="flex-w flex-sb-m p-b-17">
                                                <span class="mtext-107 cl2 p-r-20"></span>
                                            </div>
                                            <p class="stext-102 cl6"></p>
                                        </div>
                                    </div>
                                    <!-- End review -->
                                </div>
                            </div>
                        </div>
                        {{-- display comment --}}
                        <div class="row">
                            <div class="col-12 p-5 " style="min-height: 300px">
                                @foreach ($comments as $comment)
                                @if($comment->status !== 'pending')
                                <div class="item mb-5 bg-light p-2 rounded-2">
                                    <div class="d-flex">
                                        <div class="">
                                        <img width="100px" height="100px" src="{{ asset($comment->user->image) }}" alt="user-img-{{ $comment->user->name }}">
                                        </div>
                                        <div class="text pl-4 ">
                                            <h4 class=""><strong>{{ $comment->user->name}}</strong></h4>
                                            <p class="text-break">{{ $comment->content}}</p>
                                            <span class="float-right"> {{ $comment->created_at}} </span>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                {{-- pagination part --}}
                                <div style="justify-content: center; margin-left:50%;margin-top:5%;margin-bottom:2%">
                                    {!! $comments->links() !!}
                                </div>
                                {{-- end pagination part --}}
                            </div>
                        </div>
                        {{-- end display comment --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<section class="section3">
    <div class="section__title">
        <div class="d-none d-lg-block d-md-block">
            <hr>
        </div>
        <h3 class="text-purple section__subtitle font-Lobster">Related products</h3>
        <div class="d-none d-lg-block d-md-block">
            <hr>
        </div>
    </div>
    <div class="container section2__slider">
        <div class="row">
            <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel" data-interval="1000">
                <div class="MultiCarousel-inner">
                    @foreach ($relatedProducts as $product)
                    <div class="item section2__item ">
                        <div class="border-0  card">
                            <a class="" href="{{ route('singleProduct',$product->id) }}"><img height="150"
                                    src="{{asset($product->main_image)}}" class="card-img-top" alt="Company-logo"></a>
                            <div class="ps-0  card-body">
                                <a class="text-decoration-none" href="{{ route('singleProduct',$product->id)
                                        }}">
                                    <h5 class="">{{ $product->name
                                        }}</h5>
                                </a>
                                <a class="text-decoration-none text-purple "
                                    href="{{ route('singleCategory',$product->category_id) }}">
                                    <h6 class="mb-3 text-truncate "><i class="category_link"> {{$product->category->name
                                            }}</i> </h6>
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
                    @endforeach
                </div>
                <button class="btn pre-btn leftLst2 leftLst">&#10094; </button>
                <button class="btn next-btn rightLst2 rightLst"> &#10095;</button>
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
</section>
@endsection
