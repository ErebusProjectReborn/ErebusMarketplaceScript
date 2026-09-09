@extends('layouts.app')

@section('content')



<div class="vendor-container">
    @if($vacation_mode)
        <div class="vendor-vacation-alert">
            <h2>On Vacation</h2>
            <p>This vendor is currently taking a break. Please check back later.</p>
        </div>
    @endif

    <div class="vendor-header">
        <h1>Vendor Profile</h1>
        <a href="{{ route('vendors.index') }}" class="vendor-back-btn">← Back to Vendors</a>
    </div>

    @if(!$vacation_mode)
        <div class="vendor-card">
            <!-- Profile Section -->
            <div class="vendor-profile">
                <div class="vendor-profile-header">
                    <div class="vendor-avatar-wrapper">
                        <div class="vendor-avatar">
                            <img src="{{ $vendor->profile ? $vendor->profile->profile_picture_url : asset('images/default-profile-picture.png') }}" 
                                 alt="{{ $vendor->username }}">
                        </div>
                    </div>

                    <div class="vendor-info">
                        <h2>
                            <a href="{{ route('dashboard', $vendor->username) }}">{{ $vendor->username }}</a>
                        </h2>

                        <div class="vendor-badges">
                            @if(!$vendor->pgpKey)
                                <span class="vendor-badge vendor-badge--none">No PGP Key</span>
                            @elseif($vendor->pgpKey->verified)
                                <span class="vendor-badge vendor-badge--verified">✓ Verified PGP</span>
                            @else
                                <span class="vendor-badge vendor-badge--unverified">⚠ Unverified PGP</span>
                            @endif
                        </div>

                        @if($vendor->vendorProfile && $vendor->vendorProfile->description)
                            <p class="vendor-description">
                                {{ $vendor->vendorProfile->description }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Review Statistics -->
            <div class="vendor-stats-section">
                <h3>📊 Review Statistics</h3>

                @if($totalReviews > 0)
                    <div class="vendor-stats-percentage">
                        <div class="vendor-stats-percentage-value">{{ number_format($positivePercentage, 1) }}%</div>
                        <div class="vendor-stats-percentage-label">Positive Reviews</div>
                    </div>

                    <div class="vendor-stats-grid">
                        <div class="vendor-stat-card">
                            <span class="vendor-stat-label">Positive</span>
                            <span class="vendor-stat-value inline-2ab631d078">{{ $positiveCount }}</span>
                        </div>
                        <div class="vendor-stat-card">
                            <span class="vendor-stat-label">Mixed</span>
                            <span class="vendor-stat-value inline-7e65b65c5e">{{ $mixedCount }}</span>
                        </div>
                        <div class="vendor-stat-card">
                            <span class="vendor-stat-label">Negative</span>
                            <span class="vendor-stat-value inline-f75d63c1ee">{{ $negativeCount }}</span>
                        </div>
                        <div class="vendor-stat-card">
                            <span class="vendor-stat-label">Total</span>
                            <span class="vendor-stat-value">{{ $totalReviews }}</span>
                        </div>
                    </div>
                @else
                    <div class="vendor-empty-state">
                        No reviews yet for this vendor's products.
                    </div>
                @endif
            </div>

            <!-- Dispute Statistics -->
            <div class="vendor-stats-section">
                <h3>⚖️ Dispute Statistics</h3>

                @if($totalDisputes > 0)
                    <div class="vendor-stats-grid">
                        <div class="vendor-stat-card">
                            <span class="vendor-stat-label">Won</span>
                            <span class="vendor-stat-value inline-2ab631d078">{{ $disputesWon }}</span>
                        </div>
                        <div class="vendor-stat-card">
                            <span class="vendor-stat-label">Open</span>
                            <span class="vendor-stat-value inline-7e65b65c5e">{{ $disputesOpen }}</span>
                        </div>
                        <div class="vendor-stat-card">
                            <span class="vendor-stat-label">Lost</span>
                            <span class="vendor-stat-value inline-f75d63c1ee">{{ $disputesLost }}</span>
                        </div>
                        <div class="vendor-stat-card">
                            <span class="vendor-stat-label">Total</span>
                            <span class="vendor-stat-value">{{ $totalDisputes }}</span>
                        </div>
                    </div>
                @else
                    <div class="vendor-empty-state">
                        No disputes yet for this vendor.
                    </div>
                @endif
            </div>

            <!-- Products -->
            <div class="vendor-products-section">
                <h3>🛍️ Products</h3>

                @if($products->isEmpty())
                    <div class="vendor-empty-state">
                        No products available at the moment.
                    </div>
                @else
                    <x-products :products="$products" />
                @endif
            </div>

            <!-- Vendor Policy -->
            @if($vendor->vendorProfile && $vendor->vendorProfile->vendor_policy)
                <div class="vendor-content-section">
                    <h3>📋 Vendor Policy</h3>
                    <p class="vendor-policy-text">{{ $vendor->vendorProfile->vendor_policy }}</p>
                </div>
            @endif

            <!-- PGP Key -->
            <div class="vendor-content-section">
                <h3>🔐 PGP Public Key</h3>
                @if($vendor->pgpKey)
                    <div class="vendor-pgp-key">{{ $vendor->pgpKey->public_key }}</div>
                @else
                    <div class="vendor-pgp-empty">
                        No PGP key has been added yet.
                    </div>
                @endif
            </div>
        </div>

        <!-- Reviews -->
        @if(isset($allReviews) && !$allReviews->isEmpty())
            <div class="vendor-reviews-section">
                <h2 class="vendor-reviews-title">⭐ All Reviews</h2>

                <div class="vendor-reviews-list">
                    @foreach($allReviews as $review)
                        <div class="vendor-review-card">
                            <div class="vendor-review-header">
                                <div class="vendor-review-author">
                                    <div class="vendor-review-avatar">
                                        <img src="{{ $review->user->profile ? $review->user->profile->profile_picture_url : asset('images/default-profile-picture.png') }}" 
                                             alt="{{ $review->user->username }}">
                                    </div>
                                    <div class="vendor-review-info">
                                        <h4>
                                            <a href="{{ route('dashboard', $review->user->username) }}">{{ $review->user->username }}</a>
                                        </h4>
                                        <div class="vendor-review-product">
                                            Reviewed: <a href="{{ route('products.show', $review->product->slug) }} inline-12d670ecf6">{{ $review->product->name }}</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="vendor-review-meta">
                                    <span class="vendor-review-date">{{ $review->getFormattedDate() }}</span>
                                    <span class="vendor-review-sentiment vendor-review-sentiment--{{ strtolower($review->sentiment) }}">
                                        {{ ucfirst($review->sentiment) }}
                                    </span>
                                </div>
                            </div>

                            <div class="vendor-review-text">{{ $review->review_text }}</div>
                        </div>
                    @endforeach
                </div>

                <div class="vendor-pagination">
                    {{ $allReviews->appends(request()->except('reviews_page'))->links() }}
                </div>
            </div>
        @endif
    @endif
</div>

@endsection
