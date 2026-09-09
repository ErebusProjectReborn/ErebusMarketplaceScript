@extends('layouts.auth')

@section('title', 'Forgot Password - Erebus')
@section('breadcrumb', 'Forgot Password')

@section('content')



<div class="auth-forgot-container">
    <div class="auth-forgot-card">
        <h1 class="auth-forgot-title">FORGOT PASSWORD</h1>
        
        <p class="auth-forgot-description">
            Lost your password? No problem! Enter your username and your 12-word mnemonic phrase to reset your password.
        </p>

        <div class="auth-forgot-info-box">
            ⚠️ <strong>Important:</strong> You will need your 12-word mnemonic phrase that was provided during registration to recover your account.
        </div>
        
        <form method="POST" action="{{ route('password.verify') }}" class="auth-forgot-form">
            @csrf
            
            <div class="auth-forgot-form-group">
                <label for="username" class="auth-forgot-label">Username:</label>
                <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    class="auth-forgot-input" 
                    placeholder="Enter your username"
                    value="{{ old('username') }}" 
                    minlength="4" 
                    maxlength="16" 
                    required 
                    autofocus
                >
            </div>
            
            <div class="auth-forgot-form-group">
                <label for="mnemonic" class="auth-forgot-label">12-Word Mnemonic Phrase:</label>
                <textarea 
                    id="mnemonic" 
                    name="mnemonic" 
                    class="auth-forgot-textarea" 
                    placeholder="Enter your 12-word mnemonic phrase separated by spaces"
                    minlength="40" 
                    maxlength="512" 
                    required
                >{{ old('mnemonic') }}</textarea>
            </div>
            
            <button type="submit" class="auth-forgot-button">Verify Mnemonic Phrase</button>
        </form>
        
        <div class="auth-forgot-links">
            <a href="{{ route('login') }}" class="auth-forgot-link">Back to Login</a>
        </div>
    </div>
</div>

@endsection
