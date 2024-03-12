@extends('layouts.app')

@section('content')
<div class="vl-bg-dark register-screen-wrapper">
    <div class="container register-screen">
        <div class="row justify-content-center">
            <div class="col-12">
                <form method="POST" action="{{ route('register') }}" class="register-form">
                    <h1 class="text-center mb-4">Sign up free</h1>
                    @csrf
                    <div class="mb-3">
                        <label class="mb-2 p-0">{{ __('I am signing up as') }}</label>
                        <div class="row px-3 vl-radio-fields">
                            <div class="col-12 col-md-6 px-0">
                              <input class="btn-check" type="radio" name="userRole" id="userRole1" value="indvidual" checked="checked">
                              <label class="btn btn-primary m-0 w-100 rounded-0 rounded-md-start" for="userRole1">Individual</label>
                            </div>
                            <div class="col-12 col-md-6 px-0">
                              <input class="btn-check" type="radio" name="userRole" id="userRole2" value="company">
                              <label class="btn btn-primary m-0 w-100 rounded-0 rounded-md-end" for="userRole2">Company</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="mb-2 p-0">{{ __('Do you sell or provide services online or offline?') }}</label>
                        <div class="row px-3 vl-radio-fields">
                            <div class="col-12 col-md-4 px-0">
                              <input class="btn-check" type="radio" name="services" id="services1" value="indvidual" checked="checked">
                              <label class="btn btn-primary m-0 w-100 rounded-0 rounded-md-start" for="services1">Online</label>
                            </div>
                            <div class="col-12 col-md-4 px-0">
                              <input class="btn-check" type="radio" name="services" id="services2" value="company">
                              <label class="btn btn-primary m-0 w-100 rounded-0" for="services2">Offline</label>
                            </div>
                            <div class="col-12 col-md-4 px-0">
                              <input class="btn-check" type="radio" name="services" id="services3" value="company">
                              <label class="btn btn-primary m-0 w-100 rounded-0 rounded-md-end" for="services3">Online & Offline</label>
                            </div>
                        </div>
                    </div>
                     <div class="mb-3">
                        <label for="businessLine" class="mb-2 p-0">{{ __('Business line') }}</label>
                        <select id="businessLine" class="form-select">
                            <option value="-1" selected disabled>-</option>
                            <option value="0">Professional &amp; Service Provider</option>
                            <option value="1">Merchant &amp; Seller</option>
                            <option value="2">Marketing &amp; Tourism</option>
                            <option value="3">Other</option>
                        </select>
                    </div>
                    <hr class="mb-3 mt-4" />
                    <div class="row mb-3">
                        <div class="col-12 col-md-6">
                            <label for="fname" class="mb-2 p-0">{{ __('First Name') }}</label>
                            <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" required autocomplete="fname" autofocus>
                            @error('fname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="lname" class="mb-2 p-0">{{ __('Last Name') }}</label>
                            <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus>
                            @error('lname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="mb-2 p-0">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 col-md-6">
                            <label for="password" class="mb-2 p-0">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="password-confirm" class="mb-2 p-0">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="row mt-4">
                         <div class="col-12 mb-4">
                            <div class="d-flex align-items-center">
                                <input class="form-control" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="p-0 mb-0 ms-2" for="remember">
                                    {{ __('Allow Free Invoice Builder to send occasional updates about additional products and services.') }}
                                </label>
                            </div>
                            <p class="my-2">By creating an account you agree to freeinvoicebuilder.com</p>
                            <p class="mb-0"><a href="#" class="btn btn-link p-0 m-0">Terms of Service</a> and <a href="#" class="btn btn-link p-0 m-0">Privacy Policy</a></p>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100">
                                {{ __('Create account') }}
                            </button>
                        </div>
                    </div>
                </form>   
            </div>
        </div>
    </div>
</div>
@endsection
