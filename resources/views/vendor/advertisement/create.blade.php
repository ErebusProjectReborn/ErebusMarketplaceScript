@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/vendor.css') }}">
@section('content')



<div class="advertisement-create-container">
    <div class="advertisement-create-card">
        <h2 class="advertisement-create-title">Create Advertisement</h2>

        <div class="advertisement-section">
            <h3 class="advertisement-section-title">Product Details</h3>
            <div class="product-details-card">
                <div class="product-details-image">
                    <img src="{{ $product->product_picture_url }}" alt="{{ $product->name }}">
                </div>
                <div class="product-details-content">
                    <h4 class="product-details-name">{{ $product->name }}</h4>
                    <p class="product-details-description">{{ \Str::limit($product->description, 150) }}</p>
                </div>
            </div>
        </div>

        <form action="{{ route('vendor.advertisement.store', $product) }}" method="POST">
            @csrf

            <div class="advertisement-section">
                <h3 class="advertisement-section-title">Select Advertisement Slot</h3>
                <div class="slots-selection">
                    @forelse($slots as $slot)
                        <div class="slot-option">
                            <input 
                                type="radio" 
                                id="slot_{{ $slot->position }}" 
                                name="slot_id" 
                                value="{{ $slot->id }}"
                                {{ $slot->is_occupied ? 'disabled' : '' }}
                                required
                            >
                            <label for="slot_{{ $slot->position }}" class="slot-option-label">
                                <span class="slot-number">Slot {{ $slot->position }}</span>
                                @if($slot->is_occupied)
                                    <span class="slot-occupied">Occupied</span>
                                @else
                                    <span class="slot-price">${{ number_format($slot->price_per_day, 2) }}/day</span>
                                @endif
                            </label>
                        </div>
                    @empty
                        <p>No slots available at this time.</p>
                    @endforelse
                </div>
            </div>

            <div class="advertisement-section">
                <div class="advertisement-form-group">
                    <label for="duration" class="advertisement-form-label">Duration (Days)</label>
                    <select name="duration" id="duration" class="advertisement-form-select" required onchange="updatePricing()">
                        <option value="">Select duration</option>
                        <option value="1">1 Day</option>
                        <option value="3">3 Days</option>
                        <option value="7">7 Days (1 Week)</option>
                        <option value="30">30 Days (1 Month)</option>
                        <option value="90">90 Days (3 Months)</option>
                    </select>
                </div>
            </div>

            <div class="pricing-info">
                <div class="pricing-row">
                    <span class="pricing-label">Daily Rate</span>
                    <span class="pricing-value" id="daily-rate">$0.00</span>
                </div>
                <div class="pricing-row">
                    <span class="pricing-label">Duration</span>
                    <span class="pricing-value" id="duration-display">-</span>
                </div>
                <div class="pricing-row">
                    <span class="pricing-label">Total XMR Price</span>
                    <span class="pricing-value" id="total-xmr">0.00 XMR</span>
                </div>
            </div>

            <button type="submit" class="advertisement-submit-btn">Proceed to Payment</button>
        </form>
    </div>
</div>

<script>
    const slotRadios = document.querySelectorAll('input[name="slot_id"]');
    const durationSelect = document.getElementById('duration');

    function updatePricing() {
        const selectedSlot = document.querySelector('input[name="slot_id"]:checked');
        const duration = durationSelect.value;

        if (selectedSlot && duration) {
            const dailyRate = parseFloat(selectedSlot.closest('.slot-option').querySelector('.slot-price')?.textContent || 0);
            const durationDays = parseInt(duration);
            const total = (dailyRate * durationDays).toFixed(2);
            const xmrPrice = (total / 60).toFixed(4); // Assuming 1 XMR = $60

            document.getElementById('daily-rate').textContent = '$' + dailyRate.toFixed(2);
            document.getElementById('duration-display').textContent = durationDays + ' day' + (durationDays !== 1 ? 's' : '');
            document.getElementById('total-xmr').textContent = xmrPrice + ' XMR';
        }
    }

    slotRadios.forEach(radio => {
        radio.addEventListener('change', updatePricing);
    });

    durationSelect.addEventListener('change', updatePricing);
</script>

@endsection
