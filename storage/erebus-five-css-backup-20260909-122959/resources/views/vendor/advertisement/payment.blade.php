@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/erebus/views/vendor/advertisement/payment.css') }}">
@section('content')



<div class="payment-container">
    <div class="payment-grid">
        <div class="payment-details-card">
            <h2 class="payment-title">Payment Details</h2>

            <span class="payment-status-badge payment-status-{{ strtolower($advertisement->payment_status) }}">
                {{ $advertisement->getFormattedPaymentStatus() }}
            </span>

            <div class="payment-info-group">
                <div class="payment-info-label">Product</div>
                <div class="payment-info-value">{{ $advertisement->product->name }}</div>
            </div>

            <div class="payment-info-group">
                <div class="payment-info-label">Advertisement Slot</div>
                <div class="payment-info-value">Slot {{ $advertisement->slot->position }}</div>
            </div>

            <div class="payment-info-group">
                <div class="payment-info-label">Duration</div>
                <div class="payment-info-value">{{ $advertisement->duration }} day{{ $advertisement->duration !== 1 ? 's' : '' }}</div>
            </div>

            <div class="payment-info-group">
                <div class="payment-info-label">Required Amount</div>
                <div class="payment-info-value amount">{{ $advertisement->amount_required }} XMR</div>
            </div>

            @if($advertisement->amount_received > 0)
                <div class="payment-info-group">
                    <div class="payment-info-label">Amount Received</div>
                    <div class="payment-info-value">{{ $advertisement->amount_received }} XMR</div>
                </div>

                <div class="payment-info-group">
                    <div class="payment-info-label">Remaining</div>
                    <div class="payment-info-value">{{ $advertisement->amount_required - $advertisement->amount_received }} XMR</div>
                </div>
            @endif

            @if($advertisement->payment_status === 'completed')
                <div class="payment-success-message">
                    <div class="inline-b4edaa7885">
                        <span class="payment-success-icon">✓</span>
                        <span class="payment-success-text">Payment completed successfully!</span>
                    </div>
                </div>
            @endif
        </div>

        <div class="payment-details-card">
            <h2 class="payment-title">Send Payment</h2>

            @if($advertisement->payment_status === 'awaiting' || $advertisement->payment_status === 'insufficient')
                <div class="qr-code-container">
                    <div class="qr-code-image">
                        {!! $qrCode !!}
                    </div>
                    <button class="payment-refresh-btn" onclick="location.reload()">Refresh Status</button>
                </div>

                <div class="payment-address-box">
                    <div class="payment-address-label">Monero Payment Address</div>
                    <div class="payment-address">{{ $advertisement->payment_address }}</div>
                    <button class="payment-refresh-btn" onclick="copyToClipboard('{{ $advertisement->payment_address }}')">Copy Address</button>
                </div>

                <div class="payment-instructions">
                    <h3 class="payment-instructions-title">How to Pay</h3>
                    <p class="payment-instructions-text">
                        Send exactly <strong>{{ $advertisement->amount_required }} XMR</strong> to the address above using your Monero wallet. Payments are confirmed on the blockchain and may take a few minutes to appear in this interface.
                    </p>
                </div>

                @if($advertisement->payment_status === 'insufficient')
                    <div class="payment-warning">
                        <p class="payment-warning-text">
                            <strong>⚠️ Insufficient Payment:</strong> We've received {{ $advertisement->amount_received }} XMR, but we need {{ $advertisement->amount_required }} XMR. Please send the remaining amount to complete your advertisement.
                        </p>
                    </div>
                @endif
            @else
                <div class="inline-db69d67f42">
                    <p class="payment-success-text">✓ Your payment has been completed!</p>
                    <p class="inline-cf9cc3cfa1">Your advertisement will be live shortly.</p>
                </div>
            @endif

            <a href="{{ route('vendor.my-products') }}" class="payment-return-btn inline-0ca29beddf">
                Return to My Products
            </a>
        </div>
    </div>
</div>

<script>
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(() => {
            alert('Address copied to clipboard!');
        });
    }
</script>

@endsection
