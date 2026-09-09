<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Erebus')</title>
<link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">

</head>
<body>
<!-- Sponsorship Banner -->
<div class="sponsor-banner">
<a href="/">
<img src="{{ asset('images/logo.png') }}" alt="Erebus">
<span class="sponsor-banner-text">Welcome to <strong>Erebus</strong> - The latest privacy focused marketplace script, running on the latest variant of Laravel 13 and PHP 8.5.</span>
</a>
</div>

<!-- Navbar (Same as primary design) -->
<nav class="navbar">
<div class="navbar-container">
<div class="navbar-left">
<div class="navbar-logo-wrapper">
<img src="{{ asset('images/logo.png') }}" alt="Erebus" class="navbar-logo-img">
<a href="{{ route('login-home') }}" class="navbar-logo">Erebus</a>
</div>
</div>

<div class="navbar-right">
<a href="{{ route('guest-products.index') }}" class="navbar-btn @if(request()->routeIs('guest-products.index') || request()->routeIs('guest-products.show')) active @endif">
HOME
</a>
<a href="{{ route('login') }}" class="navbar-btn @if(request()->routeIs('login')) active @endif">
LOGIN
</a>
<a href="{{ route('register') }}" class="navbar-btn @if(request()->routeIs('register')) active @endif">
REGISTER
</a>
<a href="/verify-mirror" class="navbar-btn @if(request()->path() === 'verify-mirror') active @endif">
VERIFY URL
</a>
<a href="{{ route('harm-reduction') }}" class="navbar-btn @if(request()->path() == 'harm-reduction') active @endif">
HARM REDUCTION
</a>
</div>
</div>
</nav>

<!-- Alerts Component -->
@include('components.alerts')

<!-- Main Content -->
<main>
@yield('content')
</main>

<!-- Footer -->
<footer class="footer">
<div class="footer-container">
<!-- Resources Section -->
<div class="footer-section">
<div class="footer-section-title">Onion Mirror Guidelines</div>
<a href="{{ url('/pgp.txt') }}" class="footer-link">Market PGP Key</a>
<a href="{{ url('/canary.txt') }}" class="footer-link">Canary</a>
<a href="{{ url('/mirrors.txt') }}" class="footer-link">Mirrors</a>
<a href="{{ url('/related.txt') }}" class="footer-link">Related Services</a>
<a href="{{ url('/omg.txt') }}" class="footer-link">Onion Mirror Guidelines</a>
</div>

<!-- Security Section -->
<div class="footer-section">
<div class="footer-section-title">Security</div>
<a href="/verify-mirror" class="footer-link">Verify URL</a>
</div>

<!-- Information Section -->
<div class="footer-section">
<div class="footer-section-title">Market Info</div>
<a href="{{ route('rules') }}" class="footer-link">Market Rules</a>
<div class="footer-info">

<div>
<strong>XMR/USD Rate:</strong><br>
<span class="footer-xmr-price">
@php
$xmrPrice = app(App\Http\Controllers\XmrPriceController::class)->getXmrPrice();
@endphp
@if($xmrPrice !== 'UNAVAILABLE')
${{ $xmrPrice }}
@else
UNAVAILABLE
@endif
</span>
</div>
</div>
</div>

<!-- Support Section -->
<div class="footer-section">
<div class="footer-section-title"></div>
<div class="footer-sponsor">
<a href="http://sponsorurl.onion/" target="_blank" rel="noopener noreferrer" title="Sponsor Text">
<img src="{{ asset('images/sponsor.png') }}" alt="Sponsor Text">
</a>
</div>
<p class="inline-e33e56afb9">Sponsor Text</p>
</div>
</div>

<div class="footer-bottom">
<p class="inline-ff227d0632">© 2026 Erebus Labs Inc., All rights reserved.</p>
</div>
</footer>
</body>
</html>
