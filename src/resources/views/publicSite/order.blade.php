@extends('publicSite.layouts.master')
@section('title','Check out ')
@section('content')
<section class="ftco-section">
    <main class="d-flex flex-column align-items-center mb-5">
        <img class=" mr-3 m-auto" width="15%" src="{{ asset('images/mwl.jpg') }}" alt="Empty Cart" />
        <h1 class='cart-notation my-3'>Thanke you <span class="text-danger"> {{ auth()->user()->name }}</span> ! We recived you order.</h1>
        <h2 class='cart-notation my-2'>  Your order code is <span class="text-danger">{{ $orderId->id }}</span>, You can see the details in your profile.</h2>
        <div>
        <a href="{{ route('UserOrders') }}" class='btn btn-purple p-2 my-3 '>My Orders </a>
        <a href="{{ route('allCategories') }}" class='btn btn-purple p-2 my-3'>Go shopping </a>
        </div>
    </main>
</section>
@endsection
