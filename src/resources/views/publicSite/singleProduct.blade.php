@extends('publicSite.layouts.master')
@section('title'," $product->name ")
@section('content')
<section class="ftco-section">
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
                    <div class="col-md-6 col-lg-7 p-b-30">
                        <div class="p-r-50 p-t-5 p-lr-0-lg">
                            <h1 class="mtext-105 cl2 js-name-detail p-b-14 font-weight-bold mb-3">
                                {{ $product->name }}
                            </h1>
                            <a class="text-decoration-none text-purple fw-light mt-5" href="{{ route("singleCategory",$product->category_id) }}"><p class="mb-3 text-truncate">{{
                                    $product->category->name }}</p></a>
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
                            <p class="stext-102 cl3 p-t-23 w-100">

                            </p>
                            <form method="post">
                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-204 flex-w flex-m respon6-next">
                                        <button class="input-number-decrement">–</button>
                                        <input class="input-number" type="text" value="1" min="1" max="10">
                                        <span class="input-number-increment">+</span>
                                        <input type="hidden" name="product_id" value="">
                                        <input type="hidden" name="product_name" value="">
                                        <input type="hidden" name="product_price" value="">
                                        <input type="hidden" name="product_img" value="">
                                        <button name="add-to-cart"
                                            class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                            Add to cart
                                        </button>
                            </form>
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
                        <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews (1)</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content p-t-43">
                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <div class="how-pos2 p-lr-15-md">
                            <p class="stext-102 cl6">
                                Aenean sit amet gravida nisi. Nam fermentum est felis, quis feugiat nunc fringilla sit
                                amet. Ut
                                in blandit ipsum. Quisque luctus dui at ante aliquet, in hendrerit lectus interdum.
                                Morbi
                                elementum sapien rhoncus pretium maximus. Nulla lectus enim, cursus et elementum sed,
                                sodales
                                vitae eros. Ut ex quam, porta consequat interdum in, faucibus eu velit. Quisque rhoncus
                                ex ac
                                libero varius molestie. Aenean tempor sit amet orci nec iaculis. Cras sit amet nulla
                                libero.
                                Curabitur dignissim, nunc nec laoreet consequat, purus nunc porta lacus, vel efficitur
                                tellus
                                augue in ipsum. Cras in arcu sed metus rutrum iaculis. Nulla non tempor erat. Duis in
                                egestas
                                nunc.
                            </p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                <div class="p-b-30 m-lr-15-sm scroll">
                                    <!-- Review -->
                                    <div class="flex-w flex-t p-b-68">
                                        <form class="w-full" method="POST">
                                            <h5 class="mtext-108 cl2 p-b-7">
                                                Add a review
                                            </h5>
                                            <div class="flex-w flex-m p-t-50 p-b-23">
                                                <span class="stext-102 cl3 m-r-16">
                                                    Your Rating
                                                </span>

                                            </div>
                                            <div class="row p-b-25">
                                                <div class="col-12 p-b-5">
                                                    <label class="stext-102 cl3" for="review">Your review</label>
                                                    <textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10"
                                                        id="review" name="review"></textarea>
                                                </div>
                                                <div class="col-sm-6 p-b-5">
                                                    <label class="stext-102 cl3" for="name">Name</label>
                                                    <input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name"
                                                        type="text" name="name">
                                                </div>
                                            </div>
                                            <button
                                                class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10"
                                                name="add-btn">
                                                Submit
                                            </button>
                                        </form>

                                        <div class="size-207">
                                            <div class="flex-w flex-sb-m p-b-17">
                                                <span class="mtext-107 cl2 p-r-20">
                                                </span>

                                            </div>
                                            <p class="stext-102 cl6">

                                            </p>
                                        </div>
                                    </div>

                                    <!-- Add review -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</section>


{{-- <div class="row">
    <div class="col-5">
        <img width="90%" height="400px" src="{{asset($product->main_image)}}" alt="{{ $product->name }}">
    </div>

    <div class="col-5 d-flex justify-content-start mt-2 mb-5 ms-3">
        <div class="banner_content d-md-flex justify-content-between align-items-center">
            <div class="mb-sm-5 mb-md-5">
                <h2> Company</h2>
                <p class="text-break"></p>
                <p><strong>Company rate:</strong></p>
                <p><strong>Total Reviews: </strong></p>
            </div>
        </div>
    </div>


</div> --}}
</div>
</div>
<div class="container">
    <div class="row w-100 justify-content-start">
        {{-- <div class="col-12">
            <div class="row  ">
                <form action="{{ route('comments.store') }}" method="post" class=" ">
                    @csrf
                    <div class="row justify-content-start">
                        <div class="col-10">
                            <div class="form-group">
                                <label for=" Email1msg">Write your review:</label>
                                <textarea style="position:relative; width:450px;"
                                    class="form-control bg-light p-3 pt-5 rounded" name="comment" rows="6"
                                    placeholder="Review Us!"></textarea>
                            </div>
                        </div>
                        <div class="col-8 " style="position:absolute; top:50px; ">
                            <div class="d-flex " style="justify-content:flex-end; margin-right: 145px;">

                                <div class="rate-container ">
                                    <input type="radio" name="like" id="star1" value="5"><label for="star1"></label>
                                    <input type="radio" name="like" id="star2" value="4"><label for="star2"></label>
                                    <input type="radio" name="like" id="star3" value="3"><label for="star3"></label>
                                    <input type="radio" name="like" id="star4" value="2"><label for="star4"></label>
                                    <input type="radio" name="like" id="star5" value="1"><label for="star5"></label>
                                </div>
                                <div class="" style="margin-left:-70px"><label for=" Email1msg">Select
                                        Rating</label></div>
                            </div>
                        </div>
                        <div class="col-8 ">
                            @if(!empty(Auth::user()))
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="owner_id" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-primary ml-5">Add Review</button>
                            @else
                            <a class="btn btn-primary " href="{{ route('login') }}">Add Review</a>
                            @endif
                        </div>
                    </div>
                    </fieldset>
                </form>
            </div>
        </div> --}}

        <!-- Modal -->

        <div class="col-12 mt-5 p-5 " style="height: 700px">
            @foreach ($comments as $comment)
            @if($comment->status !== 'pending')
            <div class="item mb-5">
                <div class="testimony-wrap d-flex">
                    <div class="user-img" style="background-image: url({{ asset($comment->user->image) }})">
                    </div>
                    <div class="text pl-4 ">
                        <span class="quote d-flex align-items-center justify-content-center">
                            <i class="icon-quote-left"></i>
                        </span>
                        <h4 class=""><strong>{{ $comment->user->name}}</strong></h4>
                        <p class="text-break">{{ $comment->content}}</p>
                        <h6> <strong> Ratted {{ $comment->rate}} out of 5</strong></h6>
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
</div>
</section>

@endsection
@section('scripts')
<script>
// input-number-decrement
//  $(document).ready(function (){
//      $('.input-number-increment').click(function(e){
//       e.preventDefualt();
//       var inc_value =$('.input-number').val();
//       var value = parseInt(inc_value,10);
//       value =isNaN(value) ? 0: value;
//       $('.input-number').val(value);

//      })
//  })

// console.log(1);
</script>
@endsection

