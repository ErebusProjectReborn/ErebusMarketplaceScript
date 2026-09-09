@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@section('content')



<div class="a-v-panel-container">
    <div class="a-v-panel-card">
        <h1 class="a-v-panel-title">Erebus Admin Panel</h1>
        <p class="a-v-panel-welcome">Welcome to the Erebus Admin Panel. Here you can manage various aspects of the marketplace and ensure its security and efficiency.</p>
        
        <div class="a-v-panel-grid">
            <div class="a-v-panel-item">
                <h3 class="a-v-panel-item-title">User Management</h3>
                <p class="a-v-panel-item-description">View and manage user accounts, roles, and permissions across your marketplace.</p>
                <a href="{{ route('admin.users') }}" class="a-v-panel-item-link">Manage Users</a>
            </div>
            
            <div class="a-v-panel-item">
                <h3 class="a-v-panel-item-title">Manage Products</h3>
                <p class="a-v-panel-item-description">Edit or remove products listed on your marketplace.</p>
                <a href="{{ route('admin.all-products') }}" class="a-v-panel-item-link">Product Management</a>
            </div>
            
            <div class="a-v-panel-item">
                <h3 class="a-v-panel-item-title">Support Requests</h3>
                <p class="a-v-panel-item-description">View and respond to user support requests and inquiries.</p>
                <a href="{{ route('admin.support.requests') }}" class="a-v-panel-item-link">Manage Requests</a>
            </div>
            
            <div class="a-v-panel-item">
                <h3 class="a-v-panel-item-title">Bulk Message</h3>
                <p class="a-v-panel-item-description">Send bulk messages to all users or specific user roles.</p>
                <a href="{{ route('admin.bulk-message.list') }}" class="a-v-panel-item-link">Send Message</a>
            </div>

            <div class="a-v-panel-item">
                <h3 class="a-v-panel-item-title">Disputes</h3>
                <p class="a-v-panel-item-description">View and respond to marketplace disputes from both parties.</p>
                <a href="{{ route('admin.disputes.index') }}" class="a-v-panel-item-link">View Disputes</a>
            </div>

            <div class="a-v-panel-item">
                <h3 class="a-v-panel-item-title">Categories</h3>
                <p class="a-v-panel-item-description">Add, remove, or modify marketplace product categories.</p>
                <a href="{{ route('admin.categories') }}" class="a-v-panel-item-link">View Categories</a>
            </div>
            
            <div class="a-v-panel-item">
                <h3 class="a-v-panel-item-title">System Logs</h3>
                <p class="a-v-panel-item-description">Access and analyze system logs for security and performance monitoring.</p>
                <a href="{{ route('admin.logs') }}" class="a-v-panel-item-link">View Logs</a>
            </div>
            
            <div class="a-v-panel-item">
                <h3 class="a-v-panel-item-title">Canary</h3>
                <p class="a-v-panel-item-description">Update the marketplace canary with a signed message for security assurance.</p>
                <a href="{{ route('admin.canary') }}" class="a-v-panel-item-link">Update Canary</a>
            </div>

            <div class="a-v-panel-item">
                <h3 class="a-v-panel-item-title">Vendor Applications</h3>
                <p class="a-v-panel-item-description">Review and approve/deny vendor applications requiring verification on your marketplace.</p>
                <a href="{{ route('admin.vendor-applications.index') }}" class="a-v-panel-item-link">Manage Applications</a>
            </div>

            <div class="a-v-panel-item">
                <h3 class="a-v-panel-item-title">Private Mirror Requests</h3>
                <p class="a-v-panel-item-description">Review and assign private mirrors to users requesting access on your marketplace.</p>
                <a href="{{ route('admin.private-mirror-requests.list') }}" class="a-v-panel-item-link">Manage Requests</a>
            </div>

            <div class="a-v-panel-item">
                <h3 class="a-v-panel-item-title">Web Pop-Up</h3>
                <p class="a-v-panel-item-description">Create and manage website-wide pop-up notifications for marketplace users.</p>
                <a href="{{ route('admin.popup.index') }}" class="a-v-panel-item-link">Configure Popups</a>
            </div>

            <div class="a-v-panel-item">
                <h3 class="a-v-panel-item-title">Statistics</h3>
                <p class="a-v-panel-item-description">Access marketplace analytics and performance metrics dashboards.</p>
                <a href="{{ route('admin.statistics') }}" class="a-v-panel-item-link">View Stats</a>
            </div>
        </div>
    </div>
</div>
@endsection
