@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/erebus/views/admin/pop-up/create.css') }}">
@section('content')



<div class="popup-create-container">
    <div class="popup-create-card">
        <div class="popup-create-header">
            <h2 class="popup-create-title">Create New Pop-up</h2>
            <a href="{{ route('admin.popup.index') }}" class="popup-create-back-btn">Back To List</a>
        </div>

        <div class="popup-create-body">
            <form action="{{ route('admin.popup.store') }}" method="POST">
                @csrf

                <div class="popup-create-form-group">
                    <label class="popup-create-label">Pop-up Title</label>
                    <input type="text" 
                           class="popup-create-input" 
                           name="title" 
                           value="{{ old('title') }}"
                           placeholder="Enter pop-up title"
                           required>
                </div>

                <div class="popup-create-form-group">
                    <label class="popup-create-label">Message Content</label>
                    <textarea class="popup-create-input popup-create-textarea" 
                              name="message" 
                              placeholder="Write your pop-up message here..."
                              required>{{ old('message') }}</textarea>
                </div>

                <div class="popup-create-toggle-group">
                    <label class="popup-create-switch">
                        <input type="checkbox" 
                               id="active" 
                               name="active" 
                               value="1" 
                               {{ old('active') ? 'checked' : '' }}>
                        <span class="popup-create-slider"></span>
                    </label>
                    <label for="active" class="popup-create-label-toggle">Activate This Pop-up</label>
                </div>
                <p class="popup-create-note">
                    Only one pop-up can be active at a time. Activating this will automatically deactivate others.
                </p>

                <div class="popup-create-btn-container">
                    <button type="submit" class="popup-create-submit">Publish Pop-up</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
