@extends('publicSite.layouts.master')

@section('content')
<main class="grid">
    {{-- section 1 start --}}
    <section class="section1">
        <h1 class="section1__heading">“Something Handmade is so Much More Meaningful”</h1>
        <div class="container section1__slider">
            <div class="row">
                <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel" data-interval="1000">
                    <div class="MultiCarousel-inner">
                        @foreach ($categories as $category)
                        <a href="">
                            <div class="item">
                                <div>
                                    <img class="item__img" width="80%" src="{{ asset($category->image) }}"
                                        alt="{{ $category->name }}">
                                    <p class="mt-3"> <strong>{{ $category->name }}</strong></p>
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
            <div><hr></div>
            <div>Featured Products</div>
            <div><hr></div>
        </div>


        <div class="container section1__slider">
            <div class="row">
                <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel" data-interval="1000">
                    <div class="MultiCarousel-inner">
                        @foreach ($categories as $category)
                        <a href="">
                            <div class="item">
                                <div>
                                    <img class="item__img" width="80%" src="{{ asset($category->image) }}"
                                        alt="{{ $category->name }}">
                                    <p class="mt-3"> <strong>{{ $category->name }}</strong></p>
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
</main>



@endsection
