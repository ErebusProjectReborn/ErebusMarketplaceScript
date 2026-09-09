<link rel="stylesheet" href="{{ asset('css/erebus/views/components/footer.css') }}">
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
            <a href="{{ route('settings') }}" class="footer-link">Account Settings</a>
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
                <a href="http://sponsoronionlink.onion/" target="_blank" rel="noopener noreferrer" title="Sponsor Title">
                    <img src="{{ asset('images/sponsor.png') }}" alt="Sponsor Image">
                </a>
            </div>
            <p class="inline-a9d0194573">Sponsor Text</p>
        </div>
    </div>

    @if(config('marketplace.show_javascript_warning'))
        <div class="footer-warning js-warning-display">
            <span>⚠️ Please Disable JavaScript for Better Security</span>
        </div>
    @endif

    <div class="footer-bottom">
        <p class="inline-ff227d0632">© 2026 Erebus Development Team. All rights reserved.</p>
    </div>
</footer>

@if(config('marketplace.show_javascript_warning'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.js-warning-display').forEach(function(element) {
                element.style.display = 'flex';
            });
        });
    </script>
@endif
