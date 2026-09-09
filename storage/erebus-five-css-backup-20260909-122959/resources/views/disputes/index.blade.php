@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/erebus/views/disputes/index.css') }}">
@section('content')
    

    <div class="disputes-index-container">
        <!-- Navigation - Links Back to Support -->
        <div class="disputes-nav">
            <a href="{{ route('support.index') }}" class="disputes-nav-link">
                📝 Support Requests
            </a>
            <a href="{{ route('disputes.index') }}" class="disputes-nav-link active">
                ⚖️ Disputes
            </a>
        </div>

        <div class="disputes-index-card">
            <h1 class="disputes-index-title">My Disputes</h1>

            @if($disputes->isEmpty())
                <div class="disputes-index-empty">
                    <p>You don't have any disputes at the moment.</p>
                </div>
            @else
                <div class="disputes-index-table-container">
                    <table class="disputes-index-table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Date</th>
                                <th>Vendor</th>
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
                                    <td>{{ $dispute->order->vendor->username }}</td>
                                    <td>{{ Str::limit($dispute->reason, 30) }}</td>
                                    <td>
                                        <span class="disputes-index-status disputes-index-status-{{ strtolower($dispute->status) }}">
                                            {{ $dispute->getFormattedStatus() }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('disputes.show', $dispute->id) }}" class="disputes-index-action-btn">
                                            View Dispute
                                        </a>
                                        <a href="{{ route('orders.show', $dispute->order->unique_url) }}" class="disputes-index-action-btn">
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
