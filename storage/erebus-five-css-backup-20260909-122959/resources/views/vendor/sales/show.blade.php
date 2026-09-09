@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/erebus/views/vendor/sales/show.css') }}">
@section('content')



<div class="sales-show-container">
    <div class="sales-show-header">
        <h1 class="sales-show-title">Sale Details</h1>
        <div class="sales-show-id">ID: {{ substr($sale->id, 0, 8) }}</div>
    </div>

    <div class="sales-show-card">
        <h2 class="sales-show-status-title">Status: {{ $sale->getFormattedStatus() }}</h2>
        
        <div class="timeline">
            <div class="timeline-step {{ $sale->status === 'waiting_payment' || $sale->is_paid || $sale->is_sent || $sale->is_completed ? 'active' : '' }}">
                <div class="timeline-step-number">1</div>
                <div class="timeline-step-label">Waiting for Payment</div>
                @if($sale->created_at)
                    <div class="timeline-step-date">{{ $sale->created_at->format('Y-m-d / H:i') }}</div>
                @endif
            </div>
            <div class="timeline-step {{ $sale->is_paid || $sale->is_sent || $sale->is_completed ? 'active' : '' }}">
                <div class="timeline-step-number">2</div>
                <div class="timeline-step-label">Payment Received</div>
                @if($sale->paid_at)
                    <div class="timeline-step-date">{{ $sale->paid_at->format('Y-m-d / H:i') }}</div>
                @endif
            </div>
            <div class="timeline-step {{ $sale->is_sent || $sale->is_completed ? 'active' : '' }}">
                <div class="timeline-step-number">3</div>
                <div class="timeline-step-label">Product Sent</div>
                @if($sale->sent_at)
                    <div class="timeline-step-date">{{ $sale->sent_at->format('Y-m-d / H:i') }}</div>
                @endif
            </div>
            <div class="timeline-step {{ $sale->is_completed ? 'active' : '' }}">
                <div class="timeline-step-number">4</div>
                <div class="timeline-step-label">Order Completed</div>
                @if($sale->completed_at)
                    <div class="timeline-step-date">{{ $sale->completed_at->format('Y-m-d / H:i') }}</div>
                @endif
            </div>
        </div>

        @if($sale->status === 'payment_received')
            <div class="auto-cancel-notice">
                <strong>Important Notice:</strong> This order will be automatically cancelled if not marked as sent within <strong>96 hours (4 days)</strong> after payment was received.
                @if($sale->getAutoCancelDeadline())
                    <br>Auto-cancel deadline: <strong>{{ $sale->getAutoCancelDeadline()->format('Y-m-d H:i') }}</strong>
                @endif
            </div>

            <form action="{{ route('vendor.sales.update-delivery-text', $sale->unique_url) }}" method="POST" class="delivery-form">
                @csrf
                <h3 class="sales-show-status-title">Delivery Information</h3>
                <p>Please enter delivery information for each product below before marking the order as sent</p>
                
                @foreach($sale->items as $item)
                    @if($item->product)
                        <div class="inline-c090b8915f">
                            <label class="delivery-label">
                                <strong>{{ $item->product_name }}</strong>
                                <br><span class="inline-0c2cda0f1f">Enter delivery details (e.g., GPS coordinates, a website link, or cargo tracking number)</span>
                            </label>
                            <textarea 
                                name="delivery_text[{{ $item->product_id }}]" 
                                class="delivery-textarea"
                                rows="3" 
                                minlength="8"
                                maxlength="800"
                                placeholder="Enter delivery details (8-800 characters)"
                                required>{{ $item->delivery_text }}</textarea>
                        </div>
                    @endif
                @endforeach
                
                <button type="submit" class="sales-action-btn">Update Delivery Information</button>
            </form>

            <form action="{{ route('orders.mark-sent', $sale->unique_url) }}" method="POST inline-434fc32ec2">
                @csrf
                <button type="submit" class="sales-action-btn">Deliver Products</button>
            </form>
        @endif

        @if($sale->status !== 'completed' && $sale->status !== 'cancelled' && !$sale->dispute)
            <form action="{{ route('orders.mark-cancelled', $sale->unique_url) }}" method="POST inline-434fc32ec2">
                @csrf
                <button type="submit" class="sales-action-btn sales-action-btn-cancel">Cancel Sale</button>
            </form>
        @endif
    </div>

    @if($sale->dispute)
        <div class="sales-show-card">
            <div class="dispute-card">
                <h2 class="dispute-title">Dispute Information</h2>
                <div class="dispute-status">{{ $sale->dispute->getFormattedStatus() }}</div>
                <p><strong>Reason:</strong> {{ $sale->dispute->reason }}</p>
                @if($sale->dispute->resolved_at)
                    <p><strong>Resolved on:</strong> {{ $sale->dispute->resolved_at->format('Y-m-d / H:i') }}</p>
                @endif
                <a href="{{ route('vendor.disputes.show', $sale->dispute->id) }}" class="sales-action-btn">View Dispute Chat</a>
            </div>
        </div>
    @endif
</div>

@endsection
