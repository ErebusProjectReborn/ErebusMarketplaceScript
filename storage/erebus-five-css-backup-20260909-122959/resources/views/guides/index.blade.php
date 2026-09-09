@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/erebus/views/guides/index.css') }}">
@section('content')


<div class="guides-container">
    <div class="guides-card">
        <div class="guides-header">
            <h1 class="guides-title">Security Guides</h1>
            <p class="guides-description">
                Explore our comprehensive guides to help you securely use the {{ config('app.name') }} marketplace and protect your privacy.
            </p>
        </div>

        <div class="guides-grid">
            <div class="guides-item">
                <h3 class="guides-item-title">💰 Monero Guide</h3>
                <p class="guides-item-description">
                    Learn how to create and safely use a Monero wallet for private and untraceable cryptocurrency transactions.
                </p>
                <a href="{{ route('guides.monero') }}" class="guides-item-link">View Guide</a>
            </div>

            <div class="guides-item">
                <h3 class="guides-item-title">🧅 Tor Browser Guide</h3>
                <p class="guides-item-description">
                    Understand how to use Tor Browser for anonymous browsing and protecting your online privacy.
                </p>
                <a href="{{ route('guides.tor') }}" class="guides-item-link">View Guide</a>
            </div>

            <div class="guides-item">
                <h3 class="guides-item-title">🔐 KeePassXC Guide</h3>
                <p class="guides-item-description">
                    Master the art of secure password management with KeePassXC and protect your accounts.
                </p>
                <a href="{{ route('guides.keepassxc') }}" class="guides-item-link">View Guide</a>
            </div>

            <div class="guides-item">
                <h3 class="guides-item-title">🔑 Kleopatra Guide</h3>
                <p class="guides-item-description">
                    Learn PGP encryption and digital signatures for secure communication with Kleopatra.
                </p>
                <a href="{{ route('guides.kleopatra') }}" class="guides-item-link">View Guide</a>
            </div>
        </div>
    </div>
</div>
@endsection
