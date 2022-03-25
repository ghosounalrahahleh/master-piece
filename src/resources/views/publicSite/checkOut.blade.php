@extends('publicSite.layouts.master')
@section('title','Check Out')
@section('content')
<section class="ftco-section">

    <div class="container ">
        <div class="row flex-sm-column flex-lg-row flex-md-row m-3">
            <div class=" col-sm-12 col-md-8 col-lg-7 p-4 mx-4 border ">
                <h1 class='cart-notation my-2 text-center'>Check Out</h1>
                <form action="{{ route('CheckOut') }}" method="post">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-10 m-auto">
                            <label for="name" class=" col-form-label text-purple ">{{ __('Name') }}</label>
                            <input readonly id="name" type="text"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ auth()->user()->name }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-10 m-auto">
                            <label for="email" class=" col-form-label text-purple ">{{ __('E-Mail Address')
                                }}</label>
                            <input readonly id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ auth()->user()->email}}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-10 m-auto">
                            <label for="country" class=" col-form-label text-purple ">{{ __('Country')
                                }}</label>
                            <input id="country" type="text" class="form-control @error('country') is-invalid @enderror"
                                name="country"
                                value="@if (count($address) != 0){{  $address[0]->country}} @else {{ "" }}  @endif "
                                @if(count($address) != 0 ) readonly @endif  autofocus required />
                            @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-10 m-auto">
                            <label for="city" class=" col-form-label text-purple ">{{ __('City')}}</label>
                            <input id="city" type="text" class="form-control @error('city') is-invalid @enderror"
                             @if(count($address) !=0) readonly @endif name="city"
                                value="@if(count($address) != 0){{  $address[0]->city}} @else {{ "" }}  @endif" required />
                            @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-10 m-auto">
                            <label for="street" class=" col-form-label text-purple ">{{ __('Street') }}</label>
                            <input id="street" type="text" class="form-control @error('street') is-invalid @enderror"
                                @if (count($address) !=0) readonly @endif name="street" autocomplete="new-street"
                                value="@if (count($address) != 0){{  $address[0]->street}} @else {{ "" }}  @endif" required />
                            @error('street')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-0 ">
                        <div class="col-md-10 m-auto d-flex justify-content-end">
                            {{-- <a href=" {{ route('allCategories') }}" class="btn w-25 btn-purple "> Cancel</a> --}}
                            <button type="submit" class="btn btn-purple w-25 ">Checkout</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class=" col-lg-4 col-sm-12 col-md-4 border border-1 p-3 h-25 ">
                @php $total = 0 @endphp
                @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp
                @endforeach
                <div class="border-bottom d-flex justify-content-between">
                    <h3><strong>Total Cart</strong></h3>
                    <h3>{{ $total + 4 }} JD</h3>
                </div>
                <div class="border-bottom my-4 ms-2 pb-4">
                    <h5>Sub Total : <span> {{ $total }} JD</span></strong></h5>
                    <h5>Shipping : <span>4 JD</span> </h5>
                </div>
                @endif
            </div>
        </div>
</section>
@endsection
