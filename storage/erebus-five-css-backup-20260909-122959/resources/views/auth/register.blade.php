@extends('layouts.auth')

<link rel="stylesheet" href="{{ asset('css/erebus/views/auth/register.css') }}">
@section('title', 'Create Account - Erebus Marketplace Script')
@section('breadcrumb', 'Register')

@section('content')


<div class="auth-register-container">
    <div class="auth-register-card">
        <h1 class="auth-register-title">CREATE ACCOUNT</h1>
        <p class="auth-register-description">Join Erebus</p>

        @if ($errors->any())
            <div class="auth-register-error-message">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" class="auth-register-form">
            @csrf

            <!-- Username Field -->
            <div class="auth-register-form-group">
                <label for="username" class="auth-register-label">Username</label>
                <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    value="{{ old('username') }}"
                    class="auth-register-input @error('username') error @enderror"
                    placeholder="Choose a username (4-16 chars, case-sensitive, alphanumeric)"
                    required 
                    minlength="4" 
                    maxlength="16"
                    pattern="[a-zA-Z0-9]+"
                    autocomplete="username"
                >
                @error('username')
                    <div class="form-error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password Field -->
            <div class="auth-register-form-group">
                <label for="password" class="auth-register-label">Password</label>
                <div class="password-requirements">
                    <strong>Password must contain:</strong>
                    <ul class="inline-08fb7870ae">
                        <li>✓ Lowercase letters (a-z)</li>
                        <li>✓ Uppercase letters (A-Z)</li>
                        <li>✓ Numbers (0-9)</li>
                        <li>✓ Special character (#$%&@^`~.,:;"'/|_-<>*+!?={}[])</li>
                        <li>✓ 8-40 characters total</li>
                    </ul>
                </div>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    class="auth-register-input @error('password') error @enderror"
                    placeholder="Create a strong password (case-sensitive)"
                    required 
                    minlength="8" 
                    maxlength="40"
                    autocomplete="new-password"
                >
                @error('password')
                    <div class="form-error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password Confirmation Field -->
            <div class="auth-register-form-group">
                <label for="password_confirmation" class="auth-register-label">Confirm Password</label>
                <input 
                    type="password" 
                    id="password_confirmation" 
                    name="password_confirmation" 
                    class="auth-register-input @error('password_confirmation') error @enderror"
                    placeholder="Re-enter your password"
                    required 
                    minlength="8" 
                    maxlength="40"
                    autocomplete="new-password"
                >
                @error('password_confirmation')
                    <div class="form-error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- Reference Code Field (Optional) -->
            <div class="auth-register-form-group">
                <label for="reference_code" class="auth-register-label">Reference Code (Optional)</label>
                <input 
                    type="text" 
                    id="reference_code" 
                    name="reference_code" 
                    value="{{ old('reference_code') }}"
                    class="auth-register-input @error('reference_code') error @enderror"
                    placeholder="Leave blank if you have no referral code"
                    maxlength="16"
                >
                @error('reference_code')
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
                        Click "Compute PoW & Register" to solve and proceed
                    </div>
                @else
                    <div class="captcha-challenge inline-75a8ff36cb">
                        Challenge will be generated when you submit
                    </div>
                @endif
            </div>

            <!-- Register Button -->
            <button type="submit" class="auth-register-button">
                Compute PoW & Register
            </button>
        </form>

        <!-- Links -->
        <div class="auth-register-links">
            <a href="{{ route('login') }}" class="auth-register-link">Already have account?</a>
            <span class="auth-register-separator">|</span>
            <a href="{{ route('password.request') }}" class="auth-register-link">Forgot Password?</a>
        </div>
    </div>
</div>

@endsection
