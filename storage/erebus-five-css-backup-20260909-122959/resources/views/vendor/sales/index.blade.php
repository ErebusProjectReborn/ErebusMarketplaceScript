@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/erebus/views/vendor/sales/index.css') }}">
@section('content')



<div class="sales-container">
    <div class="sales-card">
        <h1 class="sales-title">My Sales</h1>
        
        @if($sales->isEmpty())
            <div class="sales-empty">
                <p>You don't have any sales yet.</p>
            </div>
        @else
            <div class="sales-table-container">
                <table class="sales-table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Buyer</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sales as $sale)
                            <tr>
                                <td>{{ substr($sale->id, 0, 8) }}</td>
                                <td>{{ $sale->created_at->format('Y-m-d / H:i') }}</td>
                                <td>{{ $sale->user->username }}</td>
                                <td>${{ number_format($sale->total, 2) }}</td>
                                <td>
                                    <span class="sales-status sales-status-{{ strtolower($sale->status) }}">
                                        {{ $sale->getFormattedStatus() }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('vendor.sales.show', $sale->unique_url) }}" class="sales-action-btn">
                                        View Details
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
