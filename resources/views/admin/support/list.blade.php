@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@section('content')
<div class="support-list-container">
    <div class="support-list-header">
        <h1 class="support-list-title">Support Requests</h1>
        <p class="support-list-subtitle">Manage all user support tickets</p>
    </div>

    @if ($requests->count() > 0)
        <div class="support-list-card">
            <div class="support-list-table-container">
                <table class="support-list-table">
                    <thead>
                        <tr>
                            <th>Ticket ID</th>
                            <th>User</th>
                            <th>Subject</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Last Update</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requests as $request)
                            <tr>
                                <td>
                                    <span class="support-list-ticket-id">{{ substr($request->ticket_id, 0, 12) }}...</span>
                                </td>
                                <td>
                                    <span class="support-list-username">{{ $request->user->username }}</span>
                                </td>
                                <td>
                                    <span class="support-list-title-text">{{ Str::limit($request->subject ?? $request->title, 40) }}</span>
                                </td>
                                <td>
                                    <span class="support-list-category">
                                        {{ ucfirst($request->category ?? 'N/A') }}
                                    </span>
                                </td>
                                <td>
                                    <span class="support-list-status support-list-status-{{ $request->status }}">
                                        @if ($request->status === 'open')
                                            🔴 Open
                                        @elseif ($request->status === 'in_progress')
                                            🟡 In Progress
                                        @else
                                            ✅ Closed
                                        @endif
                                    </span>
                                </td>
                                <td>
                                    <span class="support-list-time">{{ $request->created_at->format('Y-m-d H:i') }}</span>
                                </td>
                                <td>
                                    <span class="support-list-time">
                                        @if ($request->messages && $request->messages->count() > 0)
                                            {{ $request->messages->last()->created_at->format('Y-m-d H:i') }}
                                        @else
                                            No updates
                                        @endif
                                    </span>
                                </td>
                                <td>
                                    <!-- Route expects: {supportRequest}/{ticketId} -->
                                    <a href="{{ route('admin.support.show', [$request, $request->ticket_id]) }}" class="support-list-action-btn">
                                        View
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if ($requests->hasPages())
                <div class="support-list-pagination">
                    {{ $requests->links() }}
                </div>
            @endif
        </div>
    @else
        <div class="support-list-empty">
            <p>No support requests found.</p>
        </div>
    @endif
</div>


@endsection
