@extends('publicSite.layouts.master')
@section('title','Cart')
@section('content')
<section class="ftco-section">
    <main class="d-flex flex-column align-items-center m-5">
        <img class=" mr-3 m-auto" width="22%" src="{{ asset('images/emptyCart.png') }}" alt="Empty Cart" />
        <h1 class='cart-notation my-5'>Your Cart is Empty!</h1>
        <a href="{{ route('allCategories') }}" class='btn btn-purple p-2'>Go shopping  </a>
    </main>
</section>
@endsection
