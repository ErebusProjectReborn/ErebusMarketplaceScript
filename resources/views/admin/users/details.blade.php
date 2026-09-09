@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@section('content')



<div class="users-details-container">
    <div class="users-details-card">
        <div class="users-details-header">
            <h2 class="users-details-username">{{ $user->username }}</h2>
            <p class="users-details-id">ID: {{ $user->id }}</p>
        </div>

        <div class="users-details-body">
            <div class="users-details-grid">
                <div class="users-details-column">
                    <div class="users-details-info">
                        <p><strong>Reference ID:</strong> {{ $user->reference_id }}</p>
                        <p><strong>Used Reference Code:</strong> {{ $user->referred_by ? 'Yes' : 'No' }}</p>
                        @if($user->referred_by)
                            <p><strong>Referred By:</strong> {{ $user->referrer->username }}</p>
                        @endif
                        <p><strong>Last Login:</strong> {{ $user->last_login ? $user->last_login->format('Y-m-d H:i:s') : 'N/A' }}</p>
                        <p><strong>Account Creation Date:</strong> {{ $user->created_at->format('Y-m-d H:i:s') }}</p>
                    </div>

                    <form action="{{ route('admin.users.update-roles', $user) }}" method="POST" class="users-details-form">
                        @csrf
                        @method('PUT')
                        <h3 class="users-details-subtitle">User Roles</h3>
                        <div class="users-details-roles">
                            <div class="users-details-role">
                                <input type="checkbox" name="roles[]" value="admin" id="adminRole" {{ $user->hasRole('admin') ? 'checked' : '' }}>
                                <label for="adminRole">Administrator</label>
                            </div>
                            <div class="users-details-role">
                                <input type="checkbox" name="roles[]" value="vendor" id="vendorRole" {{ $user->hasRole('vendor') ? 'checked' : '' }}>
                                <label for="vendorRole">Vendor</label>
                            </div>
                        </div>
                        <button type="submit" class="users-details-btn users-details-btn-primary">Save Changes</button>
                    </form>
                </div>

                <div class="users-details-column">
                    @if ($user->isBanned())
                        <div class="users-details-ban-info">
                            <h3 class="users-details-subtitle inline-1926b8fb1f">Ban Information</h3>
                            <p><strong>Banned Until:</strong> {{ $user->bannedUser->banned_until->format('Y-m-d H:i:s') }}</p>
                            <p><strong>Reason:</strong> {{ $user->bannedUser->reason }}</p>
                            <form action="{{ route('admin.users.unban', $user) }}" method="POST">
                                @csrf
                                <button type="submit" class="users-details-btn users-details-btn-success">Remove Ban</button>
                            </form>
                        </div>
                    @else
                        <form action="{{ route('admin.users.ban', $user) }}" method="POST" class="users-details-form">
                            @csrf
                            <h3 class="users-details-subtitle">Ban User</h3>
                            <div class="users-details-input-group">
                                <label for="reason">Ban Reason</label>
                                <input type="text" id="reason" name="reason" required>
                            </div>
                            <div class="users-details-input-group">
                                <label for="duration">Ban Duration (in Days)</label>
                                <input type="number" id="duration" name="duration" min="1" required>
                            </div>
                            <button type="submit" class="users-details-btn users-details-btn-danger">Ban User</button>
                        </form>
                    @endif
                </div>
            </div>

            <div class="users-details-actions">
                <a href="{{ route('dashboard', ['username' => $user->username]) }}" class="users-details-btn users-details-btn-info" target="_blank">View User Profile</a>
                <a href="{{ route('admin.users') }}" class="users-details-btn users-details-btn-secondary">Back to User List</a>
            </div>
        </div>
    </div>
</div>

@endsection
