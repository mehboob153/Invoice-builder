@extends('layouts.app')

@section('content')
<div class="vl-bg-dark login-screen-wrapper">
    <div class="container login-screen">
        <div class="row justify-content-center">
            <div class="col-12">
                <form method="POST" action="{{ route('login') }}" class="login-form">
                    <div class="text-center mb-4">
                        <img src="{{asset('images/InvoiceBuilder_CW.Invoice.png')}}">
                        <h1 class="mt-4">Free invoice builder login</h1>
                    </div>
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="mb-2 p-0">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="mb-2 p-0">{{ __('Password') }}</label>
                         <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-6 col-md-6 my-auto">
                            <div class="d-flex align-items-center">
                                <input class="form-control" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="p-0 mb-0 ms-2" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-6 col-md-6 my-auto text-end">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link p-0 m-0" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 my-4">
                            <button type="submit" class="btn btn-primary w-100">
                                {{ __('Login') }}
                            </button>
                        </div>
                        <div class="col-12 my-0 text-center">
                            @if (Route::has('register'))
                                <p class="mb-0 p-0">Dont have an account? <a class="p-0 my-0 ms-3 btn btn-link" href="{{ route('register') }}">{{ __('Sign up here') }}</a>
                                </p>
                            @endif
                        </div>

                        <div class="col-12 my-4">
                            <a class="btn btn-primary w-100" href="/invoice-builder/invoice-details">
                                <i class="fas fa-file"></i>
                                {{ __('Continue as guest') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
