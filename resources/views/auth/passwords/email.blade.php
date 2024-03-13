@extends('layouts.app')

@section('content')
<div class="vl-bg-dark forgot-password-screen-wrapper">
    <div class="container forgot-password-screen">
        <div class="row justify-content-center">
            <div class="col-12">
                <form method="POST" action="{{ route('password.email') }}" class="forgot-password-form">
                    <div class="text-center mb-4">
                        <img src="{{asset('images/InvoiceBuilder_CW.Invoice.png')}}">
                        <h1 class="text-center mt-4 mb-3">Forgot password?</h1>
                        <p class="text-center mb-0">Enter your email to recover your password</p>
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
                   

                    <div class="row mb-0">
                        <div class="col-12 mb-2">
                            <button type="submit" class="btn btn-primary w-100">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                        <div class="col-12 my-0 text-center">
                            @if (Route::has('login'))
                                <p class="mb-0 p-0"><a class="p-0 my-0 ms-3 btn btn-link" href="{{ route('login') }}">{{ __('Go Back') }}</a>
                                </p>
                            @endif
                        </div>
                    </div>
                </form>
            </div>    
        </div>
    </div>
</div>
@endsection
