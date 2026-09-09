@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/erebus/views/vendor/disputes/index.css') }}">
@section('content')



<div class="disputes-container">
    <div class="disputes-card">
        <h1 class="disputes-title">My Disputes</h1>
        
        @if($disputes->isEmpty())
            <div class="disputes-empty">
                <p>You don't have any disputes at the moment.</p>
                <a href="{{ route('vendor.sales') }}">Return to Sales</a>
            </div>
        @else
            <div class="disputes-table-container">
                <table class="disputes-table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Buyer</th>
                            <th>Reason</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($disputes as $dispute)
                            <tr>
                                <td>{{ substr($dispute->order->id, 0, 8) }}</td>
                                <td>{{ $dispute->created_at->format('Y-m-d / H:i') }}</td>
                                <td>{{ $dispute->order->user->username }}</td>
                                <td>{{ \Str::limit($dispute->reason, 30) }}</td>
                                <td>
                                    <span class="disputes-status disputes-status-{{ $dispute->status }}">
                                        {{ $dispute->getFormattedStatus() }}
                                    </span>
                                    @if($dispute->resolved_at)
                                        <div class="disputes-resolution">
                                            {{ $dispute->resolved_at->format('Y-m-d / H:i') }}
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('vendor.disputes.show', $dispute->id) }}" class="disputes-action-btn">
                                        View Dispute
                                    </a>
                                    <a href="{{ route('vendor.sales.show', $dispute->order->unique_url) }}" class="disputes-action-btn">
                                        View Order
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>

@endsection
