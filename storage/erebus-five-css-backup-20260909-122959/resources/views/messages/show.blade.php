@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/erebus/views/messages/show.css') }}">
@section('content')


<div class="messages-container">
    <div class="messages-card">
        <div class="messages-header">
            <h2 class="messages-header-title">Conversation</h2>
        </div>

        <div class="messages-list" id="messageContainer">
            @forelse($messages as $message)
                <div class="message-item {{ $message->sender_id == Auth::id() ? 'message-sent' : 'message-received' }}">
                    <div>
                        <div class="message-bubble">
                            {{ $message->content }}
                        </div>
                        <div class="message-meta">
                            <strong>{{ $message->sender->username }}</strong> • {{ $message->created_at->format('M d, Y H:i') }}
                        </div>
                    </div>
                </div>
            @empty
                <div class="inline-3ce4f7703f">
                    <p>No messages in this conversation yet.</p>
                </div>
            @endforelse
        </div>

        @if ($conversation->hasReachedMessageLimit())
            <div class="messages-limit-alert">
                ⚠️ Message limit of 40 reached. Please delete this conversation to start a new one.
            </div>
        @else
            <form action="{{ route('messages.store', $conversation) }}" method="POST" class="messages-form">
                @csrf
                <textarea 
                    name="content" 
                    class="messages-textarea" 
                    placeholder="Type your message..." 
                    required 
                    minlength="4"
                    maxlength="1600"
                ></textarea>
                <button type="submit" class="messages-button">Send</button>
            </form>
        @endif
    </div>
</div>

<script>
    // Auto-scroll to bottom
    const container = document.getElementById('messageContainer');
    if (container) {
        container.scrollTop = container.scrollHeight;
    }
</script>
@endsection
