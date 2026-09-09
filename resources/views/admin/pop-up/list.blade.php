@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@section('content')



<div class="popup-list-container">
    <div class="popup-list-header">
        <h1 class="popup-list-title">Popup Management</h1>
        <a href="{{ route('admin.popup.create') }}" class="popup-list-create-btn">Create New</a>
    </div>

    <div class="popup-list-card">
        @if($popups->count())
            <div class="popup-list-table-container">
                <table class="popup-list-table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Preview</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($popups as $popup)
                            <tr>
                                <td>{{ $popup->title }}</td>
                                <td>{{ Str::limit($popup->message, 40) }}</td>
                                <td>
                                    <span class="popup-list-status-badge {{ $popup->active ? 'popup-list-status-active' : 'popup-list-status-inactive' }}">
                                        {{ $popup->active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>{{ $popup->created_at->format('Y-m-d / H:i') }}</td>
                                <td>
                                    <div class="popup-list-actions">
                                        @if(!$popup->active)
                                            <form action="{{ route('admin.popup.activate', $popup) }}" method="POST inline-434fc32ec2">
                                                @csrf
                                                <button type="submit" class="popup-list-action-btn popup-list-action-activate">Activate</button>
                                            </form>
                                        @endif
                                        <form action="{{ route('admin.popup.destroy', $popup) }}" method="POST inline-434fc32ec2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="popup-list-action-btn popup-list-action-delete">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($popups->hasPages())
                <div class="popup-list-pagination">
                    {{ $popups->links() }}
                </div>
            @endif
        @else
            <div class="popup-list-empty">
                <p>No popup messages found</p>
            </div>
        @endif
    </div>
</div>

@endsection
