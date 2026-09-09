@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/vendor.css') }}">
@section('content')



<div class="vendor-index-container">
    <div class="vendor-index-header">
        <h1 class="vendor-index-title">Vendor Dashboard</h1>
        <p class="vendor-index-subtitle">Manage your products, sales, and store settings</p>
    </div>

        <!-- Quick Actions Section -->
    <div class="vendor-section">
        <h2 class="vendor-section-title">Quick Actions</h2>
        <p class="vendor-section-description">Common tasks and settings you might need</p>
        <div class="vendor-links-grid">
            <a href="{{ route('vendor.my-products') }}" class="vendor-link-btn vendor-link-btn-primary">
                View All Products
            </a>
            <a href="{{ route('vendor.sales') }}" class="vendor-link-btn">
                View All Sales
            </a>
            <a href="{{ route('vendor.disputes.index') }}" class="vendor-link-btn">
                View All Disputes
            </a>
            <a href="{{ route('vendor.appearance') }}" class="vendor-link-btn">
                Edit Store Info
            </a>
        </div>
    </div>

    <!-- Action Cards Grid -->
    <div class="vendor-actions-grid">
        <a href="{{ route('vendor.products.create', 'digital') }}" class="vendor-action-card">
            <div class="vendor-action-icon">💾</div>
            <h3 class="vendor-action-title">Add Digital Product</h3>
            <p class="vendor-action-description">Create a new digital product listing</p>
            <div class="vendor-action-arrow">→</div>
        </a>

        <a href="{{ route('vendor.products.create', 'cargo') }}" class="vendor-action-card">
            <div class="vendor-action-icon">📦</div>
            <h3 class="vendor-action-title">Add Cargo Product</h3>
            <p class="vendor-action-description">Create a new cargo/physical product</p>
            <div class="vendor-action-arrow">→</div>
        </a>

        <a href="{{ route('vendor.products.create', 'deaddrop') }}" class="vendor-action-card">
            <div class="vendor-action-icon">🎯</div>
            <h3 class="vendor-action-title">Add Dead Drop</h3>
            <p class="vendor-action-description">Create a new dead drop listing</p>
            <div class="vendor-action-arrow">→</div>
        </a>

        <a href="{{ route('vendor.my-products') }}" class="vendor-action-card">
            <div class="vendor-action-icon">📸</div>
            <h3 class="vendor-action-title">My Products</h3>
            <p class="vendor-action-description">View and manage all your products</p>
            <div class="vendor-action-arrow">→</div>
        </a>

        <a href="{{ route('vendor.sales') }}" class="vendor-action-card">
            <div class="vendor-action-icon">💰</div>
            <h3 class="vendor-action-title">My Sales</h3>
            <p class="vendor-action-description">Track all your orders and sales</p>
            <div class="vendor-action-arrow">→</div>
        </a>

        <a href="{{ route('vendor.disputes.index') }}" class="vendor-action-card">
            <div class="vendor-action-icon">⚖️</div>
            <h3 class="vendor-action-title">Disputes</h3>
            <p class="vendor-action-description">Manage open and resolved disputes</p>
            <div class="vendor-action-arrow">→</div>
        </a>

        <a href="{{ route('vendor.appearance') }}" class="vendor-action-card">
            <div class="vendor-action-icon">🎨</div>
            <h3 class="vendor-action-title">Store Settings</h3>
            <p class="vendor-action-description">Customize your store appearance</p>
            <div class="vendor-action-arrow">→</div>
        </a>
    </div>

    <!-- Help & Resources Section -->
    <div class="vendor-section">
        <h2 class="vendor-section-title">Help & Resources</h2>
        <p class="vendor-section-description">
            Need help? Here are some resources to get you started. Visit our help center for detailed guides on managing products, handling disputes, and optimizing your sales.
        </p>
        <div class="vendor-links-grid">
            <a href="#HELP_LINK_1" class="vendor-link-btn">
                Getting Started Guide
            </a>
            <a href="#HELP_LINK_2" class="vendor-link-btn">
                Product Management
            </a>
            <a href="#HELP_LINK_3" class="vendor-link-btn">
                Orders & Fulfillment
            </a>
            <a href="#HELP_LINK_4" class="vendor-link-btn">
                Dispute Resolution
            </a>
            <a href="#HELP_LINK_5" class="vendor-link-btn">
                Payment & Withdrawals
            </a>
            <a href="#HELP_LINK_6" class="vendor-link-btn">
                Contact Support
            </a>
        </div>
    </div>
</div>

@endsection
