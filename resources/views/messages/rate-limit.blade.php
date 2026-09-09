@extends('layouts.app')

@section('content')


<div class="rate-limit-wrapper">
    <div class="rate-limit-card">
        <div class="rate-limit-icon">⏱️</div>
        <h2 class="rate-limit-title">Rate Limit Exceeded</h2>
        
        <div class="rate-limit-alert">
            <h4 class="rate-limit-alert-heading">Too Many Messages</h4>
            <p class="rate-limit-message">
                For security reasons, we have temporarily limited your message sending frequency.
            </p>
            <div class="rate-limit-divider"></div>
            <p class="rate-limit-submessage">
                Please wait a while before sending another message.
            </p>
        </div>

        <div class="rate-limit-action">
            <a href="{{ route('messages.index') }}" class="rate-limit-button">
                Return to Messages
            </a>
        </div>
    </div>
</div>
@endsection
