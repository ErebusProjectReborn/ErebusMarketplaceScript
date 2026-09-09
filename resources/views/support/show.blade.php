@extends('layouts.app')

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
        <h1>Support Request #{{ $supportRequest->ticket_id }}</h1>
        <p>{{ $supportRequest->subject }}</p>
    </div>

    <!-- Alerts -->
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

    @if (session('info'))
        <div class="alert alert-info">
            {{ session('info') }}
        </div>
    @endif

    <!-- Support Request Details -->
    <div class="support-details">
        <div class="detail-row">
            <span class="label">Status:</span>
            <span class="status status-{{ strtolower($supportRequest->status) }}">
                {{ ucfirst($supportRequest->status) }}
            </span>
        </div>
        <div class="detail-row">
            <span class="label">Category:</span>
            <span>{{ ucfirst($supportRequest->category) }}</span>
        </div>
        <div class="detail-row">
            <span class="label">Created:</span>
            <span>{{ $supportRequest->created_at->format('M d, Y H:i') }}</span>
        </div>
    </div>

    <!-- Original Message -->
    <div class="support-message original-message">
        <div class="message-header">
            <strong>Your Request</strong>
            <span class="time">{{ $supportRequest->created_at->format('M d, Y') }}</span>
        </div>
        <div class="message-body">
            {{ $supportRequest->message }}
        </div>
    </div>

    <!-- Replies Section -->
    <div class="replies-section">
        <h2>Replies</h2>

        @if ($supportRequest->messages->isEmpty())
            <div class="no-replies">
                <p>No replies yet. Please check back later.</p>
            </div>
        @else
            <div class="replies-list">
                @foreach ($supportRequest->messages as $reply)
                    <div class="support-message reply-message">
                        <div class="message-header">
                            <strong>
                                @if ($reply->user_id === Auth::id())
                                    You
                                @else
                                    Support Team
                                @endif
                            </strong>
                            <span class="time">{{ $reply->created_at->format('M d, Y H:i') }}</span>
                        </div>
                        <div class="message-body">
                            {{ $reply->message }}
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Reply Form -->
    @if ($supportRequest->status !== 'closed')
        <div class="reply-form-container">
            <h2>Add Reply</h2>

            <!-- Updated route to use solvePowReply with both parameters -->
            <form method="POST" action="{{ route('support.solve-reply-pow', [$supportRequest->id, $supportRequest->ticket_id]) }}" class="reply-form">
                @csrf

                <!-- Message Field -->
                <div class="form-group">
                    <label for="reply-message">Your Reply *</label>
                    <textarea 
                        id="reply-message" 
                        name="message" 
                        class="form-control @error('message') is-invalid @enderror"
                        rows="5"
                        placeholder="Type your reply here..."
                        required
                        minlength="5"
                        maxlength="2000"
                    >{{ old('message') }}</textarea>
                    <small>5-2000 characters</small>
                    @error('message')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <!-- PoW Verification Section -->
                <div class="pow-section">
                    <div class="pow-header">
                        <h3>🔒 Proof of Work Verification</h3>
                        <p>Click the button below to solve the computational challenge and submit your reply.</p>
                    </div>

                    <div class="pow-challenge">
                        <p>
                            <strong>Challenge Hash:</strong><br>
                            <code>{{ session('pow_challenge') ? substr(session('pow_challenge'), 0, 32) . '...' : 'Generating...' }}</code>
                        </p>
                        <p>
                            <strong>Difficulty:</strong> {{ session('pow_difficulty', 4) }} (65,536 average hashes)
                        </p>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary btn-large">
                        🔐 Compute PoW & Submit Reply
                    </button>
                </div>

                <!-- Help Text -->
                <div class="form-help">
                    <p>
                        <strong>How it works:</strong> Click "Compute PoW & Submit Reply" above. Our server will solve a 
                        computational challenge to verify you're human. Once solved, your reply will be automatically submitted. 
                        No JavaScript required.
                    </p>
                </div>
            </form>
        </div>
    @else
        <div class="reply-closed-notice">
            <p>This support request is closed. No additional replies can be added.</p>
        </div>
    @endif

    <!-- Back Button -->
    <div class="form-actions">
        <a href="{{ route('support.index') }}" class="btn btn-secondary">
            ← Back to Support Requests
        </a>
    </div>
</div>


@endsection
