@extends('publicSite.layouts.master')

@section('content')
<div class="container my-5 w-lg-50 w-md-50 w-sm-100">
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-10 rounded ">
            <div class="card py-5">
                <div class="text-center h1 form-title mb-2">{{ __('Register') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <input type="hidden" value="3" name="role_id" id="role_id">
                        <div class="row mb-3">
                            <div class="col-md-10 m-auto">
                                <label for="name" class=" col-form-label text-purple ">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-10 m-auto">
                                <label for="password" class=" col-form-label text-purple ">{{ __('Password')
                                    }}</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-10 m-auto">
                                <label for="password-confirm" class=" col-form-label text-purple ">{{ __('Confirm
                                    Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="row mb-0 ">
                            <div class="col-md-10 m-auto offset-md-4 d-flex justify-content-end">
                                <button type="submit" class="btn btn-purple w-25 mt-3">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
