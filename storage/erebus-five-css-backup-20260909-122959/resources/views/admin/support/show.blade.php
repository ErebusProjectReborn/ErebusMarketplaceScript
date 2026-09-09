@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/erebus/views/admin/support/show.css') }}">
@section('content')
<div class="support-show-container">
    <div class="support-show-card">
        <div class="support-show-header">
            <div class="support-show-title-group">
                <h1 class="support-show-username">Support Request from {{ $supportRequest->user->username }}</h1>
                <div class="support-show-subject">{{ $supportRequest->subject ?? $supportRequest->title }}</div>
                <div class="support-show-meta">
                    <span>Created at {{ $supportRequest->created_at->format('Y-m-d H:i') }}</span>
                    <span>Category: <strong>{{ ucfirst($supportRequest->category ?? 'N/A') }}</strong></span>
                </div>
            </div>

            <!-- Status Update Form -->
            <form action="{{ route('admin.support.status', [$supportRequest, $supportRequest->ticket_id]) }}" method="POST" class="support-show-status-form">
                @csrf
                @method('PUT')
                <select name="status" class="support-show-status-select">
                    <option value="open" @if($supportRequest->status === 'open') selected @endif>Open</option>
                    <option value="in_progress" @if($supportRequest->status === 'in_progress') selected @endif>In Progress</option>
                    <option value="closed" @if($supportRequest->status === 'closed') selected @endif>Closed</option>
                </select>
                <button type="submit" class="support-show-status-btn">Update Status</button>
            </form>
        </div>

        <!-- Alert Messages -->
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Messages Thread -->
        <div class="support-show-messages">
            <!-- Original Request -->
            <div class="support-show-message">
                <div class="support-show-message-header">
                    <a href="{{ route('dashboard', $supportRequest->user->username) }}" class="support-show-message-user">
                        {{ $supportRequest->user->username }}
                    </a>
                    <div class="support-show-message-time">{{ $supportRequest->created_at->format('Y-m-d H:i') }}</div>
                </div>
                <div class="support-show-message-content">
                    {{ $supportRequest->message }}
                </div>
            </div>

            <!-- All Replies -->
            @forelse ($messages as $message)
                <div class="support-show-message @if($message->is_admin_reply) admin-reply @endif">
                    <div class="support-show-message-header">
                        <div>
                            <a href="{{ route('dashboard', $message->user->username) }}" class="support-show-message-user">
                                {{ $message->user->username }}
                            </a>
                            @if ($message->is_admin_reply)
                                <span class="support-show-admin-badge">Admin</span>
                            @endif
                        </div>
                        <div class="support-show-message-time">{{ $message->created_at->format('Y-m-d H:i') }}</div>
                    </div>
                    <div class="support-show-message-content">
                        {{ $message->message }}
                    </div>
                </div>
            @empty
                <p class="inline-d986471da9">No replies yet.</p>
            @endforelse
        </div>

        <!-- Reply Section -->
        @if ($supportRequest->status !== 'closed')
            <div class="support-show-reply-section">
                <!-- Form with correct route parameters: [$supportRequest, $supportRequest->ticket_id] -->
                <form action="{{ route('admin.support.reply', [$supportRequest, $supportRequest->ticket_id]) }}" method="POST" class="support-show-form">
                    @csrf
                    <div class="support-show-form-group">
                        <label for="message" class="support-show-label">Admin Reply</label>
                        <textarea name="message" id="message" class="support-show-textarea @error('message') is-invalid @enderror" required rows="4" placeholder="Write your reply here...">{{ old('message') }}</textarea>
                        @error('message')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="support-show-submit">
                        <button type="submit" class="support-show-submit-btn">Send Reply</button>
                    </div>
                </form>
            </div>
        @else
            <div class="support-show-closed-message">
                This request is closed. Please change the status to open or in progress to reply.
            </div>
        @endif

        <!-- Back Button -->
        <a href="{{ route('admin.support.requests') }}" class="support-show-back-btn">Return to Requests</a>
    </div>
</div>


@endsection
