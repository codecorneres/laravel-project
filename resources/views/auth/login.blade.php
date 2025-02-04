
@extends('layouts.frontend-app-layout')

@section('title', 'Login')

@section('content')


<div class="container d-flex justify-content-center align-items-center h-50">
    <div class="row w-100">
        <div class="col-md-6 col-lg-4 mx-auto">
            <form method="POST" action="{{ route('login') }}" class="p-4 border rounded shadow-sm bg-white">
                @csrf

                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                    @error('email')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                    @error('password')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="mb-3 form-check">
                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                    <label class="form-check-label" for="remember_me">{{ __('Remember me') }}</label>
                </div>

                <!-- Forgot Password & Submit Button -->
                <div class="d-flex justify-content-between align-items-center">
                    @if (Route::has('password.request'))
                        <a class="text-decoration-none" href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                    @endif

                    <button type="submit" class="btn btn-primary">{{ __('Log in') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection



