@extends('layouts.auth')

@section('title', '2-Factor Authentication - Erebus')
@section('breadcrumb', '2-Factor Authentication')

@section('content')



<div class="auth-2fa-container">
    <div class="auth-2fa-card">
        <h1 class="auth-2fa-title">2-STEP PGP VERIFICATION</h1>
        
        <p class="auth-2fa-description">
            A security verification is required to complete your login. Please decrypt the encrypted message below using your private PGP key.
        </p>

        <div class="auth-2fa-message-box">
            <div class="auth-2fa-message-label">Encrypted Message</div>
            <pre class="auth-2fa-message-content">{{ $encryptedMessage }}</pre>
            <p class="auth-2fa-message-instruction">
                Please decrypt this message using your private PGP key and paste the decrypted message in the field below.
            </p>
        </div>
        
        <form method="POST" action="{{ route('pgp.2fa.verify') }}" class="auth-2fa-form">
            @csrf
            
            <div class="auth-2fa-form-group">
                <label for="decrypted_message" class="auth-2fa-label">Decrypted Message:</label>
                <textarea 
                    id="decrypted_message" 
                    name="decrypted_message" 
                    class="auth-2fa-textarea" 
                    placeholder="Paste your decrypted message here"
                    required 
                    autocomplete="off"
                ></textarea>
            </div>
            
            <button type="submit" class="auth-2fa-button">Complete Verification</button>
        </form>

        <div class="auth-2fa-warning-box">
            🔒 <strong>Security Note:</strong> Never share your private key or decrypted messages with anyone. This is a secure verification process to protect your account.
        </div>
        
        <div class="auth-2fa-links">
            <a href="{{ route('login') }}" class="auth-2fa-link">Back to Login</a>
        </div>
    </div>
</div>

@endsection
