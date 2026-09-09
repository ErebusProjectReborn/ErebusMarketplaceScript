@extends('layouts.app')

@section('content')


<div class="messages-container">
    <div class="messages-card">
        <h2 class="messages-title">Start New Conversation</h2>
        <form action="{{ route('messages.start') }}" method="POST" class="messages-form">
            @csrf
            <div class="messages-form-group">
                <label for="username" class="messages-label">Username</label>
                <input 
                    type="text" 
                    name="username" 
                    id="username" 
                    class="messages-input" 
                    required 
                    maxlength="16"
                    placeholder="Enter recipient's username" 
                    value="{{ old('username', $username ?? '') }}"
                >
                @error('username')
                    <span class="inline-cc2db7f2f5">{{ $message }}</span>
                @enderror
            </div>

            <div class="messages-form-group">
                <label for="content" class="messages-label">Message</label>
                <textarea 
                    name="content" 
                    id="content" 
                    class="messages-textarea" 
                    required 
                    minlength="4"
                    maxlength="1600"
                    placeholder="Type your message here..."
                >{{ old('content') }}</textarea>
                @error('content')
                    <span class="inline-cc2db7f2f5">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="messages-button">
                Start Conversation
            </button>
        </form>
    </div>
</div>
@endsection
