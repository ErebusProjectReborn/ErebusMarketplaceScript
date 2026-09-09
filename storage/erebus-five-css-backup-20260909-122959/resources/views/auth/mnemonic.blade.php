@extends('layouts.auth')

<link rel="stylesheet" href="{{ asset('css/erebus/views/auth/mnemonic.css') }}">
@section('title', 'Your Mnemonic Phrase - Erebus')
@section('breadcrumb', 'Mnemonic Phrase')

@section('content')



<div class="auth-mnemonic-container">
    <div class="auth-mnemonic-card">
        <h1 class="auth-mnemonic-title">YOUR MNEMONIC PHRASE</h1>
        
        <div class="auth-mnemonic-warning-box">
            <div class="auth-mnemonic-warning-title">⚠️ IMPORTANT - READ CAREFULLY</div>
            <p class="inline-ff227d0632">
                This is the ONLY time you will see this 12-word mnemonic phrase. Please write it down and store it securely OFFLINE in a safe place. You will need this to recover your account if you forget your password. Anyone with access to this phrase can access your account.
            </p>
        </div>

        <div class="auth-mnemonic-display-box">
            <pre class="auth-mnemonic-words">{{ $mnemonic }}</pre>
            <p class="auth-mnemonic-description">
                ☝️ Your 12-word mnemonic phrase is displayed above. Make sure to store it safely.
            </p>
        </div>

        <div class="auth-mnemonic-checklist">
            <div class="auth-mnemonic-checklist-item">✓ I have written down my 12-word mnemonic phrase</div>
            <div class="auth-mnemonic-checklist-item">✓ I have stored it securely offline in a safe place</div>
            <div class="auth-mnemonic-checklist-item">✓ I understand that losing this phrase means losing access to my account</div>
            <div class="auth-mnemonic-checklist-item">✓ I understand that sharing this phrase gives others access to my account</div>
        </div>
        
        <form method="GET" action="{{ route('login') }}" class="auth-mnemonic-form">
            <button type="submit" class="auth-mnemonic-button">Continue to Login</button>
        </form>
    </div>
</div>

@endsection
