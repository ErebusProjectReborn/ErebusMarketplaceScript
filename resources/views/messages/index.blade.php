@extends('layouts.app')

@section('content')


<div class="messages-container">
    <div class="messages-card">
        @if(!Auth::user()->hasReachedConversationLimit())
            <a href="{{ route('messages.create') }}" class="messages-new-btn">
                ➕ Start New Conversation
            </a>
        @endif
        
        @if($conversations->isEmpty())
            <div class="messages-empty">
                📭 You don't have any conversations yet.
            </div>
        @else
            <div class="messages-list">
                @foreach($conversations as $conversation)
                    <div class="messages-item">
                        <a href="{{ route('messages.show', $conversation) }}" class="messages-item-link">
                            <div class="messages-header">
                                <h5 class="messages-username">
                                    @if($conversation->user1->id == Auth::id())
                                        {{ $conversation->user2->username }}
                                    @else
                                        {{ $conversation->user1->username }}
                                    @endif
                                </h5>
                                <span class="messages-time">
                                    @if($conversation->last_message_at)
                                        {{ $conversation->last_message_at->format('M d, Y H:i') }}
                                    @else
                                        No messages yet
                                    @endif
                                </span>
                            </div>
                            <p class="messages-preview">
                                @if($conversation->messages->isNotEmpty())
                                    {{ Str::limit($conversation->messages->last()->content, 80) }}
                                @else
                                    No messages yet
                                @endif
                            </p>
                        </a>
                        <form action="{{ route('messages.destroy', $conversation) }}" method="POST inline-ff227d0632">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="messages-delete" title="Delete conversation" onclick="return confirm('Delete this conversation?');">
                                Delete
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        @endif

        @if (Auth::user()->hasReachedConversationLimit())
            <div class="messages-limit-warning">
                ⚠️ Conversation limit of 16 reached. Please delete other conversations to create a new one.
            </div>
        @endif
    </div>
</div>
@endsection
