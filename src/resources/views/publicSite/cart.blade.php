@extends('publicSite.layouts.master')
@section('title','Cart')
@section('content')
<section class="ftco-section">

    <div class="container ">
        <div class="row flex-sm-column flex-lg-row flex-md-row m-3">
            <div class=" col-sm-12 col-md-8 col-lg-8  table-responsive">
                <table id="cart" style="overflow-x:auto;" class="table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th style="width:20%">Product</th>
                            <th style="width:20%"></th>
                            <th style="width:20%">Price</th>
                            <th style="width:22">Quantity</th>
                            <th style="width:20%" class="text-center">Subtotal</th>
                            <th style="width:10%"></th>
                            <th style="width:10%"></th>
                        </tr>
                    </thead>
                    <tbody>

                        @php $total = 0 @endphp
                        @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                        @php $total += $details['price'] * $details['quantity'] @endphp
                        <tr >
                            <form action="{{ route('updateCart') }}" method="POST">
                            @csrf
                            <td data-th="Product" class="align-middle">
                                <img src="{{ asset($details['image']) }}" width="100" height="100"
                                class="img-responsive" />
                            </td>
                            <td class="align-middle">{{ $details['name'] }}</td>
                            <td data-th="Price" class="align-middle">${{ $details['price'] }}</td>
                            <td data-th="Quantity" class="align-middle">
                                    <div class="d-flex">
                                    <div class="btn-minus update-cart" type="button" onclick="cartDecrementValue({{ $id }})">
                                        &#9866;
                                    </div>
                                        <input type="hidden" name="id" value="{{ $id }}">
                                        <input type="number" id="{{ $id }}" name="quantity" class="quantity update-cart quantity-input mx-0 "
                                        value="{{ $details['quantity'] }}" readonly />
                                        <div class="btn-plus update-cart" type="button" onclick="cartIncrementValue({{ $id }})">
                                            &#10011;
                                        </div>
                                    </div>
                                </td>
                                <td data-th="Subtotal" class="text-center align-middle">${{ $details['price'] * $details['quantity'] }}
                                </td>
                                <td class="align-middle">
                                <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                                </td>
                                </form>
                              <td class="actions align-middle" data-th="">
                                <form method="POST" action="{{ route('cart.destroy',$id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm remove-from-cart"><i
                                        class="fa fa-trash-o"></i></button>
                                    </form>
                                    </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    <tfoot colspan="5">

                    </tfoot>

                </table>
            </div>
            <div class=" col-lg-4 col-sm-12 col-md-4 border border-1 p-3 h-25 ">
                <div class="border-bottom d-flex justify-content-between">
                    <h3><strong>Total Cart</strong></h3>
                    <h3>{{ $total + 4 }} JD</h3>
                </div>
                <div class="border-bottom my-4 ms-2 pb-4">
                    <h5>Sub Total : <span> {{ $total }} JD</span></strong></h5>
                    <h5>Shipping : <span>4 JD</span> </h5>
                </div>

                <div colspan="5" class="d-flex flex-column align-items-end">
                    @if(Auth::check())
                    <a href="{{ route('viewCheckOut') }}" class="btn btn-purple w-75 ">Checkout</a>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-purple w-75">Checkout</a>
                    @endif
                    <a href=" {{ route('allCategories') }}" class="btn btn-purple mt-3 w-75"><i
                            class="fa fa-angle-left"></i>
                        Continue Shopping</a>
                </div>
            </div>
        </div>
</section>
@endsection
