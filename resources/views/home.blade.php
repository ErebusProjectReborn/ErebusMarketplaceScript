@extends('layouts.app')

@section('content')



<!-- Pop-up Notice -->
@if($popup)
<input type="checkbox" id="pop-up-toggle" checked>
<div class="pop-up-container">
    <div class="pop-up-card">
        <h2 class="pop-up-title">{{ $popup->title }}</h2>
        <div class="pop-up-content">{{ $popup->message }}</div>
        <div class="pop-up-button-container">
            <label for="pop-up-toggle" class="pop-up-close-btn">
                ✓ Acknowledge & Continue
            </label>
        </div>
    </div>
</div>
@endif

<div class="home-wrapper">
    <!-- Featured Products Scrollable Banner (Above Welcome) -->
    @if(isset($featuredProducts) && count($featuredProducts) > 0)
        <div class="featured-banner">
            <div class="featured-banner-header">
                <h2 class="featured-banner-title">Trending Products</h2>
            </div>
            <div class="featured-banner-scroll">
                @foreach($featuredProducts as $featured)
                    <a href="{{ route('products.show', $featured['product']) }}" class="featured-banner-card inline-7c0f06feca">
                        <div class="featured-banner-card-image">
                            <img src="{{ $featured['product']->product_picture_url }}" 
                                 alt="{{ $featured['product']->name }}"
                                 onerror="this.src='{{ asset('images/placeholder.png') }}'">
                        </div>
                        <div class="featured-banner-card-content">
                            <h3 class="featured-banner-card-title">{{ $featured['product']->name }}</h3>
                            <div class="featured-banner-card-price">
                                ${{ number_format($featured['product']->price, 2) }}
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Welcome Section -->
    <div class="welcome-section">
        <h1 class="welcome-title">Welcome to Erebus</h1>
        <p class="welcome-subtitle">
            Erebus is the latest Javascript-less Monero-only marketplace script and the successor of Kabus. Erebus runs on the latest variant of Laravel 13 and PHP 8.5. Erebus will be actively maintained for the foreseeable future.
        </p>

        <!-- Features Grid -->
        <div class="welcome-list">
            <div class="welcome-list-item">
                <h3 class="welcome-list-title">Verified Vendors</h3>
                <p class="welcome-list-text">All sellers are community-rated and verified. <a href="{{ route('vendors.index') }}" class="welcome-list-link">Browse vendors →</a></p>
            </div>

            <div class="welcome-list-item">
                <h3 class="welcome-list-title">Secure Shopping</h3>
                <p class="welcome-list-text">Escrow system protects you from start to finish every transaction.</p>
            </div>

            <div class="welcome-list-item">
                <h3 class="welcome-list-title">Fast Checkout</h3>
                <p class="welcome-list-text">Multiple payment options for quick and convenient purchases.</p>
            </div>

            <div class="welcome-list-item">
                <h3 class="welcome-list-title">Global Shipping</h3>
                <p class="welcome-list-text">Products ship worldwide with various delivery options available.</p>
            </div>
        </div>

        <!-- Security Notice -->
        <div class="notice-box">
            <div class="notice-box-title">🔐 Secure Your Account</div>
            <p class="notice-box-text">
                Enable two-factor authentication for maximum security. Navigate to <strong>Account → Account Settings</strong>, add your PGP key, verify it, then enable 2FA in the Account Protection section.
            </p>
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons-section">
            <a href="{{ route('harm-reduction') }}" class="action-btn btn-danger">
                🛡️ Harm Reduction
            </a>
            
            @if(auth()->check())
                @if(auth()->user()->isVendor())
                    <a href="{{ route('vendor.index') }}" class="action-btn btn-success">
                        📦 Vendor Panel
                    </a>
                @endif

                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.index') }}" class="action-btn btn-admin">
                        ⚙️ Admin Panel
                    </a>
                @endif

                @if(!auth()->user()->isVendor() && !auth()->user()->isAdmin())
                    <a href="{{ route('become.vendor') }}" class="action-btn btn-secondary">
                        🚀 Start Selling
                    </a>
                    <a href="{{ route('products.index') }}" class="action-btn btn-primary">
                        🛍️ Browse Products
                    </a>
                @endif
            @else
                <a href="{{ route('products.index') }}" class="action-btn btn-primary">
                    🛍️ Start Browsing
                </a>
            @endif
        </div>
    </div>

    <!-- Advertised Products Section -->
    @if(isset($adSlots) && count($adSlots) > 0)
        <div class="featured-section">
            <div class="featured-header">
                <h2 class="featured-title">⭐ Featured Listings</h2>
            </div>
            <div class="featured-grid">
                @for($i = 1; $i <= 8; $i++)
                    @if(isset($adSlots[$i]))
                        <div class="featured-card">
                            <!-- Product Image -->
                            <div class="featured-card-image">
                                <img src="{{ $adSlots[$i]['product']->product_picture_url }}" 
                                     alt="{{ $adSlots[$i]['product']->name }}"
                                     onerror="this.src='{{ asset('images/placeholder.png') }}'">
                            </div>

                            <!-- Product Content -->
                            <div class="featured-card-content">
                                <h3 class="featured-card-title">{{ $adSlots[$i]['product']->name }}</h3>
                                
                                <!-- Badges -->
                                <div class="featured-card-badges">
                                    <span class="badge badge-type badge-type-{{ $adSlots[$i]['product']->type }}">
                                        {{ ucfirst($adSlots[$i]['product']->type) }}
                                    </span>
                                    <span class="badge badge-vendor">
                                        <a href="{{ route('vendors.show', ['username' => $adSlots[$i]['vendor']->username]) }}">
                                            {{ $adSlots[$i]['vendor']->username }}
                                        </a>
                                    </span>
                                    <span class="badge badge-category">
                                        {{ $adSlots[$i]['product']->category->name }}
                                    </span>
                                </div>

                                <!-- Price -->
                                <div class="featured-card-price-group">
                                    <div class="featured-card-price">
                                        ${{ number_format($adSlots[$i]['product']->price, 2) }}
                                    </div>
                                    @if(isset($adSlots[$i]['xmr_price']) && $adSlots[$i]['xmr_price'] !== null)
                                        <div class="featured-card-xmr">
                                            ≈ ɱ{{ number_format($adSlots[$i]['xmr_price'], 4) }}
                                        </div>
                                    @endif
                                </div>

                                <!-- Product Info -->
                                <div class="featured-card-info">
                                    <div class="featured-card-info-item">
                                        <span class="featured-card-info-label">Stock:</span>
                                        <span>{{ number_format($adSlots[$i]['product']->stock_amount) }} {{ $adSlots[$i]['measurement_unit'] }}</span>
                                    </div>
                                    <div class="featured-card-info-item">
                                        <span class="featured-card-info-label">Ships:</span>
                                        <span>{{ $adSlots[$i]['product']->ships_from }} → {{ $adSlots[$i]['product']->ships_to }}</span>
                                    </div>
                                    @if(!empty($adSlots[$i]['bulk_options']))
                                        <div class="featured-card-info-item">
                                            <span class="featured-card-info-label">Bulk:</span>
                                            <span>{{ count($adSlots[$i]['bulk_options']) }} offers</span>
                                        </div>
                                    @endif
                                    <div class="featured-card-info-item">
                                        <span class="featured-card-info-label">Delivery:</span>
                                        <span>{{ count($adSlots[$i]['delivery_options']) }} options</span>
                                    </div>
                                </div>

                                <!-- Action Button -->
                                <div class="featured-card-action">
                                    <a href="{{ route('products.show', $adSlots[$i]['product']) }}" class="featured-card-button">
                                        View Product →
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endfor
            </div>
        </div>
    @endif
</div>

@endsection
