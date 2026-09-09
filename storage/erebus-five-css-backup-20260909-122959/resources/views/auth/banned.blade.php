@extends('layouts.auth')

<link rel="stylesheet" href="{{ asset('css/erebus/views/auth/banned.css') }}">
@section('title', 'Account Banned - Erebus Marketplace Script')
@section('breadcrumb', 'Account Banned')

@section('content')



<div class="auth-banned-container">
    <div class="auth-banned-card">
        <h1 class="auth-banned-title">⛔ YOUR ACCOUNT HAS BEEN BANNED</h1>
        
        <p class="auth-banned-message">
            Your account has been temporarily banned for violating our site rules and terms of service.
        </p>
        
        <div class="auth-banned-details">
            <div class="auth-banned-detail-item">
                <span class="auth-banned-detail-label">Reason:</span><br>
                {{ $bannedUser->bannedUser->reason }}
            </div>
            <div class="auth-banned-detail-item">
                <span class="auth-banned-detail-label">Ban Until:</span><br>
                {{ $bannedUser->bannedUser->banned_until->format('Y-m-d \a\t H:i:s') }}
            </div>
        </div>
        
        <div class="auth-banned-contact-info">
            💬 If you believe this is a mistake or want to appeal, you can create a new account and open a support ticket to contest the ban. Our moderators will review your case.
        </div>

        <div class="auth-banned-warning">
            ⚠️ <strong>Note:</strong> If you continue to violate our rules after your ban is lifted, your account will be permanently banned and all funds will be forfeited.
        </div>
        
        <div class="auth-banned-links inline-1ce678f876">
            <a href="{{ route('login') }}" class="auth-banned-link">Return to Login</a>
        </div>
    </div>
</div>

@endsection
