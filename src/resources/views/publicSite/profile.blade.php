@extends('publicSite.layouts.master')
@section('title','My Account')
@section('content')
<section class="ftco-section" style="margin: 50px auto">
    <div class="container">
        <div class="container">
            <div class="row">
                {{-- start aside div --}}
                <div class="col-lg-2 col-md-4  profile__aside">
                    <div class="left_sidebar_area ">
                        <aside class="left_widgets p_filter_widgets">
                            <div class="widgets_inner">
                                <ul class="list-group list-group-flush ">
                                    <a href="{{ route('userProfile.index') }}"
                                        class="w-100 category-title bg-transparent list-group-item text-purple account__link  {{ request()->is('userProfile') ? 'active_link':'' }} {{ request()->is('userProfile/*') ? 'active_link':'' }}">Account
                                        Detailes</a>
                                    <a href="{{ route('UserOrders') }}"
                                        class="category-title bg-transparent list-group-item  w-100 text-purple account__link {{ request()->is('UserOrders') ? 'active_link':'' }}{{ request()->is('UserOrders/*') ? 'active_link':'' }}">Orders</a>
                                    <a href="{{ route('UserAddress') }}"
                                        class="w-100 category-title bg-transparent list-group-item text-purple account__link {{ request()->is('UserAddress') ? 'active_link':'' }} {{ request()->is('UserAddress/*') ? 'active_link':'' }}">Adresses</a>
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
                {{-- End aside div --}}

                {{-- main content --}}
                <div class="col-lg-10 col-md-8 d-flex justify-content-start flex-wrap  m-auto">
                    {{-- profile info --}}
                    @if (request()->is('userProfile'))
                    <div class="row border w-75 m-auto flex-column flex-column py-3">
                        <h1 class='cart-notation m2-5 m-auto my-3 text-center'>My Account</h1>
                        <div class="col-lg-4 col-sm-10 m-auto">
                            <img width="200px" height="200px" class="m-auto rounded-circle"
                                src="{{ asset(auth()->user()->image) }}" alt="{{ auth()->user()->name }}">
                        </div>
                        <div class="col-8 m-auto d-flex flex-column justify-content-center ">
                            <div class="row w-100  my-2 ">
                                <div class="col-sm-4 col-lg-3 col-md-5 ">User Name : </div>
                                <div class="col-sm-8 col-lg-3 col-md-7 ">
                                    <h5>{{ auth()->user()->name }}</h5>
                                </div>
                            </div>
                            <div class="row w-75  my-2">
                                <div class="col-sm-4 col-lg-3 col-md-5 ">Email : </div>
                                <div class="col-sm-8 col-lg-3 col-md-7 ">
                                    <h5>{{ auth()->user()->email }}</h5>
                                </div>
                            </div>
                            <div class="row my-2 m-auto w-lg-25 w-md-25  ">
                                <a href="{{ route('userProfile.edit',auth()->user()->id) }}"
                                    class="btn btn-purple float-end">Edit
                                    Profile</a>
                            </div>
                        </div>
                    </div>
                    @endif

                    {{-- edit prodile info --}}
                    @if (request()->is('userProfile/*'))
                    <div class="card py-5 w-75 m-auto">
                        <div class="text-center h1 form-title mb-2">{{ __('Eidt Profile') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('userProfile.update',auth()->user()->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <div class="col-md-10 m-auto">
                                        <label for="name" class=" col-form-label text-purple ">{{ __('Name') }}</label>
                                        <input id="name" type="text"
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
                                        <input id="email" type="email"
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
                                        <label for="password" class=" col-form-label text-purple ">{{ __('New Password')
                                            }}</label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            autocomplete="new-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-0 justify-content-center">
                                    <div class="col-sm-10 col-lg-3">
                                        <a href="{{ route('userProfile.index') }}" type="submit"
                                            class="btn mx-lg-3 btn-purple w-100 mt-3">
                                            {{ __('Cancle') }}
                                        </a>

                                    </div>
                                    <div class="col-sm-10 col-lg-3  ">
                                        <button type="submit" class="btn mx-lg-3 w-100 btn-purple mt-3 ">
                                            {{ __('Save changes') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif

                    {{-- user order table --}}
                    @if (request()->is('UserOrders'))
                    @if ($orders[0] != null)
                    <div class="table-responsive">
                        <h1 class='cart-notation m2-5 text-center'>Orders</h1>
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th class="text-purple">Order Code</th>
                                    <th class="text-purple">Order Date</th>
                                    <th class="text-purple">Total Price</th>
                                    <th class="text-purple">Total Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td class="text-purple align-middle">{{ $order->id }}</td>
                                    <td class="text-purple align-middle">{{ $order->created_at }}</td>
                                    <td class="text-purple align-middle">{{ $order->total_price }} JD</td>
                                    @if ($order->status === 'pending')
                                    <td class="ps-4 rounded text-warning align-middle">{{ $order->status }} <i
                                            class="fas fa-spinner h6 text-warning ps-2"></i> </td>
                                    @else
                                    <td class="ps-4 rounded text-success align-middle">{{ $order->status }} <i
                                            class="fas fa-check h6 text-success ps-2"></i></td>
                                    @endif
                                    <td><a class="category_link text-decoration-none"
                                            href="{{ route('viewDetails',$order->id) }}"><i class="text-purple">
                                                view details</i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="d-flex flex-column align-items-center m-auto ">
                    <h1 class='cart-notation my-5'>Thers is no Order Yet!</h1>
                    <a href="{{ route('allCategories') }}" class='btn btn-purple p-2'>Go shopping </a>
                    </div>
                    @endif
                    @endif

                    {{-- Address Section --}}
                    @if (request()->is('UserAddress'))
                    @if (count($address) != 0)
                    <div class="row border w-75 m-auto flex-column flex-column py-3">
                        <h1 class='cart-notation m2-5 text-center'>Address</h1>
                        {{-- Operation Message --}}
                        @if (session('message'))
                        <div class=" col-10 m-auto alert alert-success alert-dismissible fade show text-white bg-success  my-4 "
                            role="alert">
                            <strong> {{ session('message') }}</strong>
                            <button type="button" class="btn-close opacity-1 text-white me-3" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                        @endif
                        <div class="col-8 m-auto d-flex flex-column justify-content-center m-lg-auto">
                            <div class="row w-100  my-2 ">
                                <div class="col-sm-4 col-lg-3 col-md-5 ">Country: </div>
                                <div class="col-sm-8 col-lg-3 col-md-7 ">
                                    <h5>{{ $address[0]->country }}</h5>
                                </div>
                            </div>
                            <div class="row w-75  my-2">
                                <div class="col-sm-4 col-lg-3 col-md-5 ">City: </div>
                                <div class="col-sm-8 col-lg-3 col-md-7 ">
                                    <h5>{{ $address[0]->city }}</h5>
                                </div>
                            </div>
                            <div class="row w-75  my-2">
                                <div class="col-sm-4 col-lg-3 col-md-5 ">Street: </div>
                                <div class="col-sm-8 col-lg-3 col-md-7 ">
                                    <h5>{{ $address[0]->street }}</h5>
                                </div>
                            </div>
                            <div class="row my-2 m-auto w-lg-25 w-md-25  justify-content-end">
                                <a href="{{ route('editAddress',auth()->user()->id) }}" class="btn btn-purple">Edit
                                    Address</a>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="d-flex flex-column align-items-center m-auto">
                        <h1 class='cart-notation mb-5'>You did not register your address! </h1>
                        <a href="{{ route('UserAddress.show') }}" class='btn btn-purple p-2'>Add address</a>
                    </div>
                    @endif
                    @endif

                    {{-- store address form --}}
                    @if ($show==true)
                    <div class="card py-5 w-75 m-auto">
                        <div class="text-center h1 form-title mb-2">{{ __('Address') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('UserAddress.create') }}">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-10 m-auto">
                                        <label for="country" class=" col-form-label text-purple ">{{ __('Country')
                                            }}</label>
                                        <input id="country" type="text"
                                            class="form-control @error('country') is-invalid @enderror" name="country"
                                            required autofocus>
                                        @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-10 m-auto">
                                        <label for="city" class=" col-form-label text-purple ">{{ __('City')
                                            }}</label>
                                        <input id="city" type="text"
                                            class="form-control @error('city') is-invalid @enderror" name="city"
                                            required autocomplete="city">
                                        @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-10 m-auto">
                                        <label for="street" class=" col-form-label text-purple ">{{ __('Street')
                                            }}</label>
                                        <input id="street" type="text"
                                            class="form-control @error('street') is-invalid @enderror" name="street"
                                            autocomplete="new-street">
                                        @error('street')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-10 col-lg-3  ">
                                    <button type="submit" class="btn mx-lg-3 w-100 btn-purple mt-3 ">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif

                    {{-- edit address form --}}
                    @isset($edit)
                    <div class="card py-5 w-75 m-auto">
                        <div class="text-center h1 form-title mb-2">{{ __('Address') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('updateAddress', $address[0]->id ) }}">
                                @csrf

                                <div class="row mb-3">
                                    <div class="col-md-10 m-auto">
                                        <label for="country" class=" col-form-label text-purple ">{{ __('Country')
                                            }}</label>
                                        <input id="country" type="text"
                                            class="form-control @error('country') is-invalid @enderror" name="country"
                                            value="{{ $address[0]->country }}" required autofocus>
                                        @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-10 m-auto">
                                        <label for="city" class=" col-form-label text-purple ">{{ __('City')
                                            }}</label>
                                        <input id="city" type="text"
                                            class="form-control @error('city') is-invalid @enderror" name="city"
                                            value="{{ $address[0]->city }}" required autocomplete="city">
                                        @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-10 m-auto">
                                        <label for="street" class=" col-form-label text-purple ">{{ __('Street')
                                            }}</label>
                                        <input id="street" type="text"
                                            class="form-control @error('street') is-invalid @enderror" name="street"
                                            value="{{ $address[0]->street }}" required autocomplete="new-street">
                                        @error('street')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-10 m-auto">
                                        <button type="submit" class="btn btn-purple mt-3 float-end ">
                                            {{ __('Save') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endisset

                    {{-- view details table --}}
                    @if (request()->is('UserOrders/details/*'))

                    <div class="table-responsive">
                        <h1 class='cart-notation m2-5 text-center'>Orders</h1>
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th class="text-purple">Product</th>
                                    <th class="text-purple">quantity</th>
                                    <th class="text-purple">size</th>
                                    <th class="text-purple">price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderDetails as $order)
                                <tr>
                                    <td><img width="100px" src="{{ asset($order->product->main_image) }}" alt=""></td>
                                    <td class="text-purple align-middle">{{ $order->product->name }}</td>
                                    <td class="text-purple align-middle">{{ $order->quantity }}</td>
                                    <td class="text-purple align-middle">{{ $order->size }} </td>
                                    <td class="text-purple align-middle">{{ $order->price }} JD</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                       <a href="{{ route('UserOrders') }}" type="submit" class="btn mx-lg-3 float-end btn-purple  mt-3">
                        {{ __('Go Back') }}
                    </a>
                    </div>@endif
                </div>
            </div>
            {{-- end main content --}}

        </div>
    </div>


</section>
@endsection
