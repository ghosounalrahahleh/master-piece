@extends('publicSite.layouts.master')
@section('title','All Categories')
@section('content')
<section class="ftco-section ">
    {{-- Bread crumb --}}
    <div class="row justify-content-center align-items-center mb-5 mx-auto pb-2">
        <div class="col-md-5  heading-section ftco-animate">
            <div class="page_link">
                <a class="text-decoration-none h6 text-capitalize text-purple" href="/">Home</a>
                <a class="text-decoration-none h6 text-capitalize text-purple" href="{{ route('allCategories') }}">/
                    Categories</a>
            </div>
        </div>
        <div class="col-md-5 d-flex justify-content-end">
        </div>
    </div>
    <div class="container">
        <div class="row">
            {{-- start aside div - top categories --}}
            <div class="col-lg-2" id="categories__List">
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
                                    <a href="{{ route('singleCategory', $category->id ) }}"class="text-decoration-none h6 text-capitalize text-purple "
                                        >
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
            <div class="col-lg-10 col-sm-12 d-flex justify-content-center flex-wrap m-auto ">
                @foreach ($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4 ">
                    <div class="card">
                        <a href="{{ route('singleProduct',$product->id) }}">
                            <img height="220px" class="card-img-top" src="{{asset($product->main_image)}}"  alt="{{$product->name }}"></a>
                        <div class="card-body">
                            <a class="text-decoration-none text-truncate"
                                href="{{ route( 'singleProduct',$product->id) }}">
                                <h5 class="text-truncate">{{$product->name }}</h5>
                            </a>
                            <a class="text-decoration-none text-purple fw-light "
                                href="{{ route('singleCategory',$product->category_id) }}">
                                <h6 class="mb-3 text-truncate "><i class="category_link"> {{$product->category->name
                                        }}</i> </h6>
                            </a>
                            <h5 class="mb-3">
                                <span
                                    class="{{ $product->is_onSale == 1 ? 'text-decoration-line-through fw-light' : ''  }}">
                                    {{$product->price}} {{ $product->is_onSale == 0 ? "JD" :''}}</span>
                                @if ($product->is_onSale == 1)
                                <span class="text-danger h4">{{ $product->sale_price }} JD</span>
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
                @endforeach
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
            {{-- end main content --}}
            <div class="d-flex justify-content-center mt-4">
                {!! $products->links() !!}
            </div>
            {{-- end pagination part --}}
        </div>
    </div>

</section>
@endsection
