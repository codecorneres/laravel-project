
@extends('layouts.frontend-app-layout')

@section('title', 'Login')

@section('content')

<div class="container d-flex justify-content-center align-items-center">
    <div class="row w-100">
        <div class="col-md-6 col-lg-4 mx-auto">
            <form method="POST" action="{{ route('register') }}" class="p-4 border rounded shadow-sm bg-white">
                @csrf

    
                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                    @error('name')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="username">
                    @error('email')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

    
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                    @error('password')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

        
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    @error('password_confirmation')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <a class="text-decoration-none" href="{{ route('login') }}">{{ __('Already registered?') }}</a>
                    <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

