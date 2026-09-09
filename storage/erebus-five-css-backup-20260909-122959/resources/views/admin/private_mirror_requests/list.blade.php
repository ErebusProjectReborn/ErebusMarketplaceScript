@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/erebus/views/admin/private_mirror_requests/list.css') }}">
@section('content')



<div class="admin-container">
    <div class="admin-card">
        <h1 class="admin-title">Erebus Private Mirror Requests</h1>

        @if ($requests->count() > 0)
            <table class="mirror-table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Requested</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requests as $req)
                        <tr>
                            <td>
                                @if ($req->user)
                                    <strong>{{ $req->user->username }}</strong>
                                @else
                                    <span class="inline-75a8ff36cb">User Not Found</span>
                                @endif
                            </td>
                            <td>
                                @if ($req->user)
                                    {{ $req->user->email }}
                                @else
                                    <span class="inline-75a8ff36cb">N/A</span>
                                @endif
                            </td>
                            <td>
                                <span class="status-badge status-{{ strtolower($req->status) }}">
                                    {{ ucfirst($req->status) }}
                                </span>
                            </td>
                            <td>
                                {{ $req->created_at->format('M d, Y H:i') }}
                            </td>
                            <td>
                                <a href="{{ route('admin.private-mirror-requests.show', $req->id) }}" class="action-button">
                                    View
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="pagination">
                {{ $requests->links() }}
            </div>
        @else
            <div class="empty-message">
                No private mirror requests yet.
            </div>
        @endif
    </div>
</div>

@endsection
