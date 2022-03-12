@extends('publicSite.layouts.master')
@section('title','All Categories')
@section('content')
<section class="ftco-section ">
    {{-- Bread crumb --}}
    <div class="row justify-content-center align-items-center mb-5 mx-auto pb-2">
        <div class="col-md-5  heading-section ftco-animate">
            <div class="page_link">
                <a class="text-decoration-none h6 text-capitalize text-purple" href="/Crafty">Home</a>
                <a class="text-decoration-none h6 text-capitalize text-purple" href="{{ route('allCategories') }}">&#10095;
                    Categories</a>
            </div>
        </div>
        <div class="col-md-5 d-flex justify-content-end">

        </div>

    </div>
    <div class="container">
        <div class="row">
            {{-- start aside div - top categories --}}
            <div class="col-lg-2 " >
                <div class="left_sidebar_area">
                    <aside class="left_widgets p_filter_widgets">
                        <div>
                            <h5 class=""><strong> Categories</strong></h5>
                        </div>
                        <div class="widgets_inner">
                            <ul class="list-group list-group-flush ">
                                <li class="category-title bg-transparent list-group-item">
                                    <a class="text-decoration-none h6 text-capitalize text-purple"
                                        href="{{ route('allCategories') }}"> all catregories</a>
                                </li>
                                @foreach ($categories as $category)
                                <li class="category-title bg-transparent list-group-item">
                                    <a class="text-decoration-none h6 text-capitalize text-purple"
                                        href="{{ route('categories.show', $category->id ) }}">
                                        {{ $category->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
            {{-- End aside div --}}

            {{-- main content --}}
            <div class="col-10 d-flex justify-content-center flex-wrap gap-5 m-auto">
                @foreach ($products as $product)
                <div class="col-md-3 col-sm-8 mb-2 ">
                    <div class="card">
                        <a class="" href="{{ route("singleProduct",$product->id) }}"><img height="220px"
                                src="{{asset($product->main_image)}}" class="card-img-top" alt="Company-logo"></a>
                        <div class="card-body">
                            <a class="text-decoration-none" href="{{ route("singleProduct",$product->id) }}"><h5
                                    class="">{{ $product->name }}</h5></a>
                            <a class="text-decoration-none text-purple fw-light " href="{{ route("categories.show",$product->category_id) }}"><p class="mb-1 text-truncate">{{
                                    $product->category->name }}</p></a>
                            <h5 class="mb-3">
                                <span
                                    class="{{ $product->is_onSale == 1 ? 'text-decoration-line-through fw-light' : ''  }}">
                                    {{$product->price}} {{ $product->is_onSale == 0 ? "JD" :''}}</span>
                                @if ($product->is_onSale == 1)
                                <span class="text-danger h4">{{ $product->sale_price }} JD</span>
                                @endif

                            </h5>

                            <button class="btn btn-purple rounded-0">Add to cart</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        {{-- end main content --}}
        {{-- pagination part --}}
        <div style="justify-content: center; margin-left:50%;margin-top:5%;margin-bottom:2%">
            {!! $products->links() !!}
        </div>
        {{-- end pagination part --}}
    </div>
    </div>

</section>
@endsection
