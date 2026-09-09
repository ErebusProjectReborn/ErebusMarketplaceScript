@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@section('content')



<div class="vendor-apps-container">
    <div class="vendor-apps-header">
        <h1 class="vendor-apps-title">Vendor Applications</h1>
    </div>

    <div class="vendor-apps-card">
        @if($applications->count() > 0)
            <div class="vendor-apps-table-container">
                <table class="vendor-apps-table">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Status</th>
                            <th>Submitted</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($applications as $application)
                            <tr>
                                <td>{{ $application->user->username }}</td>
                                <td>
                                    <span class="vendor-apps-status vendor-apps-status-{{ $application->application_status }}">
                                        {{ ucfirst($application->application_status) }}
                                    </span>
                                </td>
                                <td>{{ $application->application_submitted_at->format('Y-m-d / H:i') }}</td>
                                <td>
                                    <a href="{{ route('admin.vendor-applications.show', $application) }}" class="vendor-apps-action-btn">
                                        Review
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($applications->hasPages())
                <div class="vendor-apps-pagination">
                    {{ $applications->links() }}
                </div>
            @endif
        @else
            <div class="vendor-apps-empty">
                <p>No vendor applications found.</p>
            </div>
        @endif
    </div>
</div>

@endsection
