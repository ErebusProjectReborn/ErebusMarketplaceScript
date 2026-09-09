<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Mirror - Erebus Marketplace Script</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
    
</head>
<body>
    <!-- Sponsorship Banner -->
    <div class="sponsor-banner">
        <a href="/">
            <img src="{{ asset('images/logo_original.png') }}" alt="Erebus">
            <span class="sponsor-banner-text"><strong>Erebus</span>
        </a>
    </div>

    <!-- Navbar (Same as primary design) -->
    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-left">
                <div class="navbar-logo-wrapper">
                    <img src="{{ asset('images/logo_original.png') }}" alt="Erebus" class="navbar-logo-img">
                    <a href="{{ route('home') }}" class="navbar-logo">Erebus</a>
                </div>
            </div>

            <div class="navbar-right">
 		<a href="{{ route('guest-products.index') }}" class="navbar-btn">
                    HOME
                </a>
                <a href="{{ route('login') }}" class="navbar-btn">
                    LOGIN
                </a>
                <a href="{{ route('register') }}" class="navbar-btn">
                    REGISTER
                </a>
                <a href="/verify-mirror" class="navbar-btn active">
                    VERIFY URL
                </a>
                <a href="{{ route('harm-reduction') }}" class="navbar-btn">
                    HARM REDUCTION
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        <div class="verify-mirror-page">
            <div class="verify-mirror-header">
                <h1>🔐 Verify Erebus Mirror</h1>
                <p>Verify the authenticity of our official mirrors using the PGP signed message below.</p>
            </div>

            <div class="pgp-info">
                <strong>⚠️ Security Notice:</strong> Always verify the PGP signature of this message before accessing any Erebus Marketplace Script mirrors. Never trust mirrors not listed here. The only source to get our 100% verified PGP Key to verify this message is from <a href="https://www.yourwwwdomain.com/pgp.txt/ inline-ec15d1914f">our PGP key server</a> or our SubReddit.
            </div>

            <div class="pgp-message-box">-----BEGIN PGP SIGNED MESSAGE-----
Hash: SHA512

Erebus - Mirror Links
Date: xxxx-xx-xx

The following are the mirrors of Erebus

OFFICIAL MIRRORS:
Primary Onion/Mirror Distributor: https://www.yourmirrordistrubutorontheclearnet.com/

SECURITY NOTICE:
- - Always verify this message's PGP signature
- - Never trust mirrors not listed here
- - Report phishing attempts immediately
-----BEGIN PGP SIGNATURE-----

PGPSIGNATUREHERE
-----END PGP SIGNATURE-----</div>

            <div class="mirror-list">
                <h2>✓ Verified Official Mirrors</h2>
                
                <div class="mirror-item">
                    <strong>Gateway Mirror/Primary Onion (Requires Proof-of-Work)</strong>
                    <a href="https://www.yourmirrordistrubutorontheclearnet.com/" target="_blank" class="mirror-link" rel="noopener noreferrer">
                        https://www.yourmirrordistrubutorontheclearnet.com/
                    </a>
                </div>

                <div class="mirror-item">
                    <strong>Market Links</strong>
                    <p class="inline-b0c696ca51">Erebus has a unique form of OpSec requiring we do not publicly post our Market URL's, the only way to get a market link is through the gateway. Mirror links are deleted and rotated once every week.</p>
                </div>
            </div>

            <div class="verification-note">
                <strong>🔒 Verification Instructions:</strong><br><br>
                1. Copy the PGP message above<br>
                2. Use GPG or PGP software to verify the signature<br>
                3. Import our public key to verify authenticity<br>
                4. Contact us immediately if verification fails<br><br>
                <strong>Never access mirrors without verifying this message first.</strong>
            </div>

            <div class="btn-group">
                <a href="{{ route('home') }}" class="btn btn-secondary">← Back to Home</a>
                <a href="https://www.yourmirrordistrubutorontheclearnet.com/" target="_blank" class="btn btn-primary" rel="noopener noreferrer">Access Primary Mirror</a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <!-- Resources Section -->
            <div class="footer-section">
                <div class="footer-section-title">Resources</div>
                <a href="{{ route('rules') }}" class="footer-link">Market Rules</a>
                <a href="{{ route('guides.index') }}" class="footer-link">Guides</a>
                <a href="{{ url('/canary.txt') }}" class="footer-link">Canary</a>
            </div>

            <!-- Security Section -->
            <div class="footer-section">
                <div class="footer-section-title">Security</div>
                <a href="{{ url('/pgp.txt') }}" class="footer-link">Market PGP Key</a>
                <a href="/verify-mirror" class="footer-link">Verify URL</a>
            </div>

            <!-- Information Section -->
            <div class="footer-section">
                <div class="footer-section-title">Market Info</div>
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
                    <a href="https://yoursponsor.com" target="_blank" rel="noopener noreferrer" title="Sponsor Title">
                        <img src="{{ asset('images/sponsor.png') }}" alt="Sponsor">
                    </a>
                </div>
                <p class="inline-e33e56afb9">Sponsor Text</p>
            </div>
        </div>

        <div class="footer-bottom">
            <p class="inline-ff227d0632">© 2026 The Erebus Project. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
