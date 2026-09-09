@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/erebus/views/admin/users/list.css') }}">
@section('content')



<div class="users-list-container">
    <div class="users-list-header">
        <h1 class="users-list-title">Marketplace Users</h1>
    </div>

    <div class="users-list-card">
        <div class="users-list-table-container">
            <table class="users-list-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Last Login</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->last_login ? $user->last_login->format('Y-m-d / H:i') : 'N/A' }}</td>
                            <td>
                                <a href="{{ route('admin.users.details', $user->id) }}" class="users-list-btn">User Details</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if($users->hasPages())
            <div class="users-list-pagination">
                {{ $users->links() }}
            </div>
        @endif
    </div>
</div>

@endsection
