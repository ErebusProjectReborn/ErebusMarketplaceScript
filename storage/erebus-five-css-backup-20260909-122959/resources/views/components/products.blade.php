<link rel="stylesheet" href="{{ asset('css/erebus/views/components/products.css') }}">
@props([
    'products',  // Required: collection of products
    'route' => 'products.show',  // Optional: route name (default: products.show, use guest-products.show for guests)
    'isGuest' => false  // Optional: whether this is guest view (for image routes)
])



<div class="products-wrapper">
    <div class="products-grid">
        @forelse($products as $product)
            <a href="{{ route($route, $product->id) }}" class="product-card">
                <div class="product-card-image">
                    @if($isGuest)
                        <img src="{{ $product->getGuestProductPictureUrl() }}" alt="{{ $product->name }}" onerror="this.src='{{ asset('images/default-product-picture.png') }}'">
                    @else
                        <img src="{{ $product->product_picture_url }}" alt="{{ $product->name }}" onerror="this.src='{{ asset('images/default-product-picture.png') }}'">
                    @endif
                    
                    <div class="product-card-badges">
                        <div class="product-card-rating">
                            @if($product->getPositiveReviewPercentage() !== null)
                                <span class="product-card-rating-star">★</span>
                                <span>{{ number_format($product->getPositiveReviewPercentage(), 0) }}%</span>
                            @else
                                <span>New</span>
                            @endif
                        </div>
                        
                        @auth
                            <form action="{{ Auth::user()->hasWishlisted($product->id) 
                                ? route('wishlist.destroy', $product) 
                                : route('wishlist.store', $product) }}" method="POST" onclick="event.stopPropagation();">
                                @csrf
                                @if(Auth::user()->hasWishlisted($product->id))
                                    @method('DELETE')
                                @endif
                                <button type="submit" class="product-card-wishlist-btn {{ Auth::user()->hasWishlisted($product->id) ? 'active' : '' }}" 
                                        title="{{ Auth::user()->hasWishlisted($product->id) ? 'Remove from Wishlist' : 'Add to Wishlist' }}">
                                    <img src="{{ asset('icons/wishlist.png') }}" alt="Wishlist">
                                </button>
                            </form>
                        @endauth
                    </div>

                    <div class="product-card-vendor">
                        By {{ $product->user->username }}
                    </div>
                </div>

                <div class="product-card-content">
                    <h3 class="product-card-title">{{ $product->name }}</h3>
                    <div class="product-card-price">${{ number_format($product->price, 2) }}</div>
                </div>
            </a>
        @empty
            <div class="inline-5d2b7a940e">
                <p>No products found.</p>
            </div>
        @endforelse
    </div>

    @if($products->count() > 0)
        <div class="product-card-pagination">
            {{ $products->links() }}
        </div>
    @endif
</div>
