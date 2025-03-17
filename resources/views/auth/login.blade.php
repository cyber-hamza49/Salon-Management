@extends('layouts.app')
@section('title', 'BarberX - Login')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <img src="{{asset('logo.jpg')}}" alt="">
        </div>
        <div class="col-md-6">
            <h2 class="text-center mb-4">{{ __('Sign In') }}</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn w-100" style="background-color: #D5B981; color: black;">{{ __('Login') }}</button>
                <p class="text-center mt-3">
                    <a style="color: black;" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a> |
                    <a style="color: black;" href="{{ route('register') }}">Create an Account</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
