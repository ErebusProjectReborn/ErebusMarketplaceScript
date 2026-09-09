@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/erebus/views/cart/index.css') }}">
@section('content')



<div class="cart-index-container">
<div class="cart-index-breadcrumb">
<a href="{{ route('products.index') }}">Products</a>
<span>/</span>
<span>Shopping Cart</span>
</div>

@if($cartItems->isEmpty())
<div class="cart-index-empty-card">
<h2 class="cart-index-empty-title">Your Cart is Empty</h2>
<p class="cart-index-empty-text">Browse our products and add items to your cart.</p>
<a href="{{ route('products.index') }}" class="cart-index-browse-btn">Browse Products</a>
</div>
@else
<div class="cart-index-main-card">
@foreach($cartItems as $item)
<div class="cart-index-item">
<div class="cart-index-item-image">
<img src="{{ $item->product->product_picture_url }}" alt="{{ $item->product->name }}">
</div>

<div class="cart-index-item-details">
<div class="cart-index-item-header">
<div>
<h3 class="cart-index-item-title">
{{ $item->product->name }}
<span>({{ $item->selected_bulk_option ? ($item->quantity * $item->selected_bulk_option['amount']) : $item->quantity }} {{ $measurementUnits[$item->product->measurement_unit] ?? $item->product->measurement_unit }})</span>
</h3>
<p class="cart-index-item-vendor">Sold by: {{ $item->product->user->username }}</p>
</div>
<div class="cart-index-item-price">
<div class="cart-index-price-fiat">${{ number_format($item->getTotalPrice(), 2) }}</div>
@if(is_numeric($xmrPrice) && $xmrPrice > 0)
<div class="cart-index-price-crypto">≈ ɱ{{ number_format($item->getTotalPrice() / $xmrPrice, 4) }}</div>
@endif
</div>
</div>

<div class="cart-index-item-controls">
<form action="{{ route('cart.update', $item) }}" method="POST" class="cart-index-quantity-form">
@csrf
@method('PUT')
<label for="quantity_{{ $item->id }}" class="cart-index-quantity-label">
{{ $item->selected_bulk_option ? 'Sets:' : 'Qty:' }}
</label>
<input type="number" id="quantity_{{ $item->id }}" name="quantity" value="{{ $item->quantity }}" min="1" max="80000" class="cart-index-quantity-input">
<button type="submit" class="cart-index-update-btn">Update</button>
</form>

<div class="cart-index-option-badge">
Delivery: {{ $item->selected_delivery_option['description'] }}
({{ $item->selected_delivery_option['price'] > 0 ? '+$' . number_format($item->selected_delivery_option['price'], 2) : 'Free' }})
</div>
</div>

<div class="cart-index-additional-controls">
<form action="{{ route('cart.destroy', $item) }}" method="POST" class="cart-index-remove-form">
@csrf
@method('DELETE')
<button type="submit" class="cart-index-remove-btn">Remove</button>
</form>

@if($item->selected_bulk_option)
<div class="cart-index-bulk-badge">
Bulk: {{ $item->quantity }} × {{ $item->selected_bulk_option['amount'] }}
@ ${{ number_format($item->selected_bulk_option['price'], 2) }}/set
</div>
@endif
</div>
</div>
</div>
@endforeach

<div class="cart-index-bottom-row">
<div class="cart-index-message-container">
@foreach($cartItems as $item)
@if($item->encrypted_message)
<div class="cart-index-message-encrypted">
<label class="cart-index-message-label">🔐 Encrypted Message for {{ $item->product->user->username }}</label>
<textarea readonly>{{ $item->encrypted_message }}</textarea>
</div>
@endif
@endforeach

@php
$hasEncryptedMessage = $cartItems->contains(fn($item) => $item->encrypted_message);
$firstItem = $cartItems->first();
@endphp

@if(!$hasEncryptedMessage && $firstItem)
<form action="{{ route('cart.message.save', $firstItem) }}" method="POST" class="cart-index-message-form">
@csrf
<label for="message_{{ $firstItem->id }}" class="cart-index-message-label">
🔐 PGP Encrypted Message Required
</label>
<span class="cart-index-message-hint">
⚠️ REQUIRED: Paste your PGP encrypted message (starts with -----BEGIN PGP MESSAGE-----). Plain text messages will be rejected.
</span>
<textarea id="message_{{ $firstItem->id }}" name="message" class="cart-index-message-textarea" placeholder="-----BEGIN PGP MESSAGE-----&#10;...your encrypted message here...&#10;-----END PGP MESSAGE-----" required minlength="50" maxlength="4000"></textarea>
<button type="submit" class="cart-index-message-button">Save Encrypted Message</button>
</form>

@if($errors->any())
<div class="cart-index-message-encrypted inline-fafdae6ae9">
<label class="cart-index-message-label inline-c4976e7bbe">❌ Error</label>
@foreach($errors->all() as $error)
<p class="inline-5439fd881e">{{ $error }}</p>
@endforeach
</div>
@endif
@endif
</div>

<div class="cart-index-summary">
<div class="cart-index-total">
<span class="cart-index-total-label">Total:</span>
<div class="cart-index-total-amount">
<div class="cart-index-total-fiat">${{ number_format($cartTotal, 2) }}</div>
@if(is_numeric($xmrTotal))
<div class="cart-index-total-crypto">≈ ɱ{{ number_format($xmrTotal, 4) }}</div>
@endif
</div>
</div>

<div class="cart-index-actions">
<form action="{{ route('cart.clear') }}" method="POST">
@csrf
@method('DELETE')
<button type="submit" class="cart-index-clear-btn">Clear Cart</button>
</form>

<a href="{{ route('cart.checkout') }}" class="cart-index-checkout-btn">Proceed to Checkout</a>
</div>
</div>
</div>
</div>
@endif
</div>

@endsection
