@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/vendor.css') }}">
@section('content')



<div class="rate-limit-container">
    <div class="rate-limit-card">
        <div class="rate-limit-icon">⏱️</div>
        <h1 class="rate-limit-title">Rate Limited</h1>
        <p class="rate-limit-message">
            You're creating advertisements too frequently. Please wait before creating another advertisement.
        </p>

        <div class="rate-limit-explanation">
            <h2 class="rate-limit-explanation-title">Why this is happening</h2>
            <p class="rate-limit-explanation-text">
                To ensure fair access for all vendors and maintain marketplace health, we limit advertisement creation frequency. This helps prevent abuse and ensures everyone has equal opportunities.
            </p>
        </div>

        <div class="cooldown-label">Time until next advertisement:</div>
        <div class="cooldown-timer" id="cooldown-timer">
            @if($cooldownEnds)
                {{ $cooldownEnds->diffForHumans() }}
            @else
                Calculating...
            @endif
        </div>

        <a href="{{ route('vendor.my-products') }}" class="rate-limit-return-btn">
            Return to My Products
        </a>
    </div>
</div>

<script>
    @if($cooldownEnds)
        function updateCooldownTimer() {
            const now = new Date();
            const end = new Date('{{ $cooldownEnds->toDateTimeString() }}');
            const diff = Math.max(0, Math.floor((end - now) / 1000));

            if (diff <= 0) {
                document.getElementById('cooldown-timer').textContent = 'Ready!';
                clearInterval(timerInterval);
                return;
            }

            const hours = Math.floor(diff / 3600);
            const minutes = Math.floor((diff % 3600) / 60);
            const seconds = diff % 60;

            let timerText = '';
            if (hours > 0) timerText += hours + 'h ';
            if (minutes > 0 || hours > 0) timerText += minutes + 'm ';
            timerText += seconds + 's';

            document.getElementById('cooldown-timer').textContent = timerText;
        }

        updateCooldownTimer();
        const timerInterval = setInterval(updateCooldownTimer, 1000);
    @endif
</script>

@endsection
