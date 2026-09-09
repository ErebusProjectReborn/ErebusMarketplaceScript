@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/erebus/views/vendor/disputes/show.css') }}">
@section('content')



<div class="dispute-show-container">
    <div class="dispute-show-header">
        <h1 class="dispute-show-title">Dispute Details</h1>
        <a href="{{ route('vendor.disputes.index') }}" class="dispute-show-back">← Return to Disputes</a>
    </div>

    <div class="dispute-show-card">
        <h2 class="dispute-show-section-title">Order Information</h2>
        <div class="dispute-status-badge dispute-status-{{ $dispute->status }}">
            {{ $dispute->getFormattedStatus() }}
        </div>
        
        <div class="dispute-info-grid">
            <div class="dispute-info-item">
                <div class="dispute-info-label">Order ID</div>
                <div class="dispute-info-value">{{ substr($dispute->order->id, 0, 8) }}</div>
            </div>
            <div class="dispute-info-item">
                <div class="dispute-info-label">Created</div>
                <div class="dispute-info-value">{{ $dispute->created_at->format('Y-m-d / H:i') }}</div>
            </div>
            <div class="dispute-info-item">
                <div class="dispute-info-label">Buyer</div>
                <div class="dispute-info-value">{{ $dispute->order->user->username }}</div>
            </div>
            <div class="dispute-info-item">
                <div class="dispute-info-label">Reason</div>
                <div class="dispute-info-value">{{ $dispute->reason }}</div>
            </div>
            @if($dispute->resolved_at)
                <div class="dispute-info-item">
                    <div class="dispute-info-label">Resolved On</div>
                    <div class="dispute-info-value">{{ $dispute->resolved_at->format('Y-m-d / H:i') }}</div>
                </div>
            @endif
        </div>

        <a href="{{ route('vendor.sales.show', $dispute->order->unique_url) }}" class="dispute-order-btn">
            View Order Details
        </a>
    </div>

    <div class="dispute-show-card">
        <h2 class="dispute-show-section-title">Dispute Messages</h2>
        
        <div class="messages-list">
            @if($dispute->messages->isEmpty())
                <p class="inline-76067bc39e">No messages in this dispute yet.</p>
            @else
                @foreach($dispute->messages as $message)
                    <div class="message @if($message->isFromAdmin()) message-admin @endif">
                        <div class="message-header">
                            <span class="message-user @if($message->isFromAdmin()) message-user-admin @elseif($message->isFromBuyer()) message-user-buyer @elseif($message->isFromVendor()) message-user-vendor @endif">
                                @if($message->isFromAdmin())
                                    Admin: {{ $message->user->username }}
                                @elseif($message->isFromBuyer())
                                    Buyer: {{ $message->user->username }}
                                @elseif($message->isFromVendor())
                                    Vendor: {{ $message->user->username }}
                                @else
                                    {{ $message->user->username }}
                                @endif
                            </span>
                            <span class="message-time">{{ $message->created_at->format('Y-m-d / H:i') }}</span>
                        </div>
                        <div class="message-content">{{ $message->message }}</div>
                    </div>
                @endforeach
            @endif
        </div>
        
        @if($dispute->status === 'active' || $dispute->status === 'open' || $dispute->status === 'in_progress')
            <div class="dispute-form-group">
                <form action="{{ route('disputes.add-message', $dispute->id) }}" method="POST">
                    @csrf
                    <label class="dispute-form-label">Add a Message</label>
                    <textarea 
                        name="message" 
                        class="dispute-textarea"
                        placeholder="Type your message here..." 
                        required 
                        minlength="1" 
                        maxlength="1000"
                        rows="4"></textarea>
                    <button type="submit" class="dispute-btn inline-125fc45c42">Send Message</button>
                </form>
            </div>
        @else
            <div class="dispute-resolved-message">
                <p>This dispute has been resolved. No new messages can be added.</p>
            </div>
        @endif
    </div>
</div>

@endsection
