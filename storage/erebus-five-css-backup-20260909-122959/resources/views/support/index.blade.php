@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/erebus/views/support/index.css') }}">
@section('content')
<div class="support-container">
    <!-- Navigation Tabs -->
    <div class="support-tabs">
        <a href="{{ route('support.index') }}" class="support-tab active">
            Support Requests
        </a>
        <a href="{{ route('disputes.index') }}" class="support-tab">
            Disputes
        </a>
    </div>

    <!-- Header -->
    <div class="support-header">
        <div class="header-content">
            <h1>Support Requests</h1>
            <p>View and manage your support tickets</p>
        </div>
        <a href="{{ route('support.create') }}" class="btn btn-primary">
            + Create New Request
        </a>
    </div>

    <!-- Alerts -->
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Support Requests List -->
    @if ($supportRequests->isEmpty())
        <div class="support-empty">
            <p>You don't have any support requests yet.</p>
            <a href="{{ route('support.create') }}" class="btn btn-primary">
                Create Your First Request
            </a>
        </div>
    @else
        <div class="support-list">
            @foreach ($supportRequests as $request)
                <div class="support-card">
                    <div class="card-header">
                        <h3>
                            <!-- Updated to pass both parameters -->
                            <a href="{{ route('support.show', [$request->id, $request->ticket_id]) }}">
                                {{ $request->subject }}
                            </a>
                        </h3>
                        <span class="status status-{{ strtolower($request->status) }}">
                            {{ ucfirst($request->status) }}
                        </span>
                    </div>

                    <div class="card-meta">
                        <span class="meta-item">
                            <strong>Category:</strong> {{ ucfirst($request->category) }}
                        </span>
                        <span class="meta-item">
                            <strong>Created:</strong> {{ $request->created_at->format('M d, Y') }}
                        </span>
                        @if ($request->messages && $request->messages->count() > 0)
                            <span class="meta-item">
                                <strong>Replies:</strong> {{ $request->messages->count() }}
                            </span>
                        @endif
                    </div>

                    <div class="card-preview">
                        {{ Str::limit($request->message, 150) }}
                    </div>

                    <div class="card-actions">
                        <!-- Updated to pass both parameters -->
                        <a href="{{ route('support.show', [$request->id, $request->ticket_id]) }}" class="btn btn-sm btn-primary">
                            View Details
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="pagination-wrapper">
            {{ $supportRequests->links() }}
        </div>
    @endif
</div>


@endsection
