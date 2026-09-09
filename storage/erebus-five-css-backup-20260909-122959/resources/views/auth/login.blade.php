@extends('layouts.auth')

<link rel="stylesheet" href="{{ asset('css/erebus/views/auth/login.css') }}">
@section('title', 'Login - Erebus Marketplace Script')
@section('breadcrumb', 'Login')

@section('content')


<div class="auth-login-container">
    <div class="auth-login-card">
        <h1 class="auth-login-title">LOGIN</h1>
        <p class="auth-login-description">Access your Erebus account</p>

        @if ($errors->any())
            <div class="auth-login-error-message">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="auth-login-form">
            @csrf

            <!-- Username Field -->
            <div class="auth-login-form-group">
                <label for="username" class="auth-login-label">Username</label>
                <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    value="{{ old('username') }}"
                    class="auth-login-input @error('username') error @enderror"
                    placeholder="Enter your username (case-sensitive)"
                    required 
                    minlength="4" 
                    maxlength="16"
                    autocomplete="username"
                >
                @error('username')
                    <div class="form-error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password Field -->
            <div class="auth-login-form-group">
                <label for="password" class="auth-login-label">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    class="auth-login-input @error('password') error @enderror"
                    placeholder="Enter your password (case-sensitive)"
                    required 
                    minlength="8" 
                    maxlength="40"
                    autocomplete="current-password"
                >
                @error('password')
                    <div class="form-error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- PoW Captcha Section -->
            <div class="captcha-section">
                <div class="captcha-title">PoWeRebus - Proof of Work Challenge</div>
                <p class="captcha-description">
                    This system uses a javascript-less computational challenge to prevent automated attacks.
                    The challenge will be solved using secure server-side logic.
                </p>

                <!-- Challenge Display -->
                @if (session()->has('pow_challenge'))
                    <div class="captcha-challenge">
                        {{ substr(session('pow_challenge'), 0, 16) }}...
                    </div>
                    <div class="captcha-info">
                        Challenge difficulty: {{ session('pow_difficulty', 4) }}
                        <br>
                        Click "Compute PoW & Login" to solve and proceed
                    </div>
                @else
                    <div class="captcha-challenge inline-75a8ff36cb">
                        Challenge will be generated when you submit
                    </div>
                @endif
            </div>

            <!-- Submit Button -->
            <button type="submit" class="auth-login-button">
                Compute PoW & Login
            </button>
        </form>

        <!-- Links -->
        <div class="auth-login-links">
            <a href="{{ route('register') }}" class="auth-login-link">Create Account</a>
            <span class="auth-login-separator">|</span>
            <a href="{{ route('password.request') }}" class="auth-login-link">Forgot Password?</a>
        </div>
    </div>
</div>

@endsection
