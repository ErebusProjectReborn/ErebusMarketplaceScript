@extends('layouts.auth')

@section('content')



<div class="products-show-container">
    @if($vendor_on_vacation)
        <div class="products-show-vacation-notice">
            <h2>⏰ Vendor on Vacation</h2>
            <p>This vendor is currently on vacation and is not accepting orders. Please try again later.</p>
        </div>
    @elseif($vendor_shop_private ?? false)
        <div class="products-show-private-shop-notice">
            <h2>🔒 Private Shop</h2>
            <p>This vendor operates a private shop. You need to register and save a reference code to access their products.</p>
        </div>
    @else
        <div class="products-show-main">
            {{-- Header --}}
            <div class="products-show-header">
                <h1 class="products-show-title">{{ $product->name }}</h1>
            </div>

            {{-- TOP SECTION IMAGE & DETAILS --}}
            <div class="products-show-top-section">
                {{-- GALLERY/IMAGE COLUMN --}}
                <div class="products-show-column-center">
                    <div class="products-show-gallery">
                        <div class="products-show-slider">
                            <div class="products-show-slides">
                                <div>
                                    <img src="{{ $product->getGuestProductPictureUrl() }}" alt="{{ $product->name }}" class="products-show-gallery-image" onerror="this.src='{{ asset('images/default-product-picture.png') }}'">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- RIGHT COLUMN DETAILS --}}
                <div class="products-show-column-right">
                    <div class="products-show-details">
                        {{-- PRICE --}}
                        <div class="products-show-price">
                            <span class="products-show-price-fiat">${{ number_format($product->price, 2) }}</span>
                            <span class="products-show-price-monero">Ξ {{ $xmrPrice ?? 'UNAVAILABLE' }}</span>
                        </div>

                        {{-- INFO --}}
                        <div class="products-show-info">
                            {{-- Type --}}
                            <div class="products-show-type">
                                <span class="products-show-badge">{{ ucfirst($product->type) }}</span>
                                @if($product->category)
                                    <span class="products-show-badge products-show-badge-category">{{ $product->category->name }}</span>
                                @endif
                            </div>

                            {{-- Stock --}}
                            <div class="products-show-stock">
                                <strong>Stock:</strong> {{ $product->quantity }} units available
                            </div>

                            {{-- Vendor --}}
                            <div class="products-show-vendor">
                                <div class="products-show-avatar-username">
                                    <div class="products-show-avatar">
                                        <img src="{{ $product->user->profile ? route('guest.profile.picture', basename($product->user->profile->profile_picture_url)) : asset('images/default-profile-picture.png') }}" alt="{{ $product->user->username }}" onerror="this.src='{{ asset('images/default-profile-picture.png') }}'">
                                    </div>
                                    <a href="{{ route('vendors.show', $product->user->username) }}" class="products-show-username-link">{{ $product->user->username }}</a>
                                </div>
                                <div class="products-show-vendor-button-container">
                                    <a href="{{ route('vendors.show', $product->user->username) }}" class="products-show-vendor-button">View Vendor</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- REVIEWS SECTION --}}
            <div class="products-show-column-left">
                <div class="products-show-review-stats">
                    <h3 class="products-show-review-stats-header">⭐ Customer Reviews</h3>
                    @if($totalReviews > 0)
                        <div class="products-show-review-percentage">
                            <span class="products-show-review-percentage-value">{{ $positivePercentage }}%</span>
                            <span class="products-show-review-percentage-label">Positive Reviews</span>
                        </div>
                        <div class="products-show-review-counts">
                            <div class="products-show-review-count-item">
                                <span class="products-show-review-count-label">Positive</span>
                                <span class="products-show-review-count-value">{{ $positiveCount }}</span>
                            </div>
                            <div class="products-show-review-count-item">
                                <span class="products-show-review-count-label">Mixed</span>
                                <span class="products-show-review-count-value">{{ $mixedCount }}</span>
                            </div>
                            <div class="products-show-review-count-item">
                                <span class="products-show-review-count-label">Negative</span>
                                <span class="products-show-review-count-value">{{ $negativeCount }}</span>
                            </div>
                        </div>
                    @else
                        <div class="products-show-review-empty">
                            <p>No reviews yet for this product.</p>
                        </div>
                    @endif
                </div>

                <div class="products-show-message-to-vendor">
                    <p class="inline-6156d72e7e">
                        <strong>⚠️ Guest Access:</strong> Please register to message this vendor or make purchases.
                    </p>
                    <a href="{{ route('register') }}" class="products-show-message-to-vendor-button">Register Now</a>
                </div>
            </div>

            {{-- DESCRIPTION --}}
            @if($product->description)
                <div class="products-show-description">
                    <h2>📝 Description</h2>
                    <div class="products-show-description-content">{!! nl2br(e($product->description)) !!}</div>
                </div>
            @endif

            {{-- REVIEWS --}}
            @if(count($reviews) > 0)
                <div class="products-show-reviews">
                    <h2 class="products-show-reviews-title">⭐ Customer Reviews</h2>
                    <div class="products-show-reviews-list">
                        @foreach($reviews as $review)
                            <div class="products-show-review-item">
                                <div class="products-show-review-header">
                                    <div class="products-show-review-user">
                                        <div class="products-show-review-avatar">
                                            <img src="{{ $review->user->profile ? route('guest.profile.picture', basename($review->user->profile->profile_picture_url)) : asset('images/default-profile-picture.png') }}" alt="{{ $review->user->username }}" onerror="this.src='{{ asset('images/default-profile-picture.png') }}'">
                                        </div>
                                        <div class="products-show-review-username">{{ $review->user->username }}</div>
                                    </div>
                                    <div class="products-show-review-meta">
                                        <div class="products-show-review-date">{{ $review->created_at->format('M d, Y') }}</div>
                                        <div class="products-show-review-sentiment products-show-review-sentiment-{{ strtolower($review->sentiment) }}">{{ ucfirst($review->sentiment) }}</div>
                                    </div>
                                </div>
                                <div class="products-show-review-content">{{ $review->review_text }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- VENDOR POLICY --}}
            @if(!$vendor_on_vacation && !(isset($vendor_shop_private) && $vendor_shop_private) && $product->user->vendorProfile && $product->user->vendorProfile->vendor_policy)
                <div class="inline-f016ee8bea">
                    <h2 class="inline-736c15fe80">📋 {{ $product->user->username }}'s Vendor Policy</h2>
                    <div class="inline-5c203f84c2">{!! nl2br(e($product->user->vendorProfile->vendor_policy)) !!}</div>
                </div>
            @endif
        </div>
    @endif
</div>

@endsection
