@extends('admin/dashboard')
@section('title', 'Create User')
@section('content')

<div class="container py-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">{{ __('Sign Up') }}</h2>
            <form method="POST" action="/store-users" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
                <div class="mb-3">
                    <label for="roles" class="form-label">{{ __('Role') }}</label>
                    <select class="form-select" name="roles">
                        <option selected>Select Role</option>
                        <option value="1">Admin</option>
                        <option value="2">Recipient</option>
                        <option value="3">Stylist</option>
                        <option value="4">user</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">{{ __('Register') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection