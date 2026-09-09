@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/erebus/views/vendor/my-products.css') }}">
@section('content')



<div class="my-products-container">
    <div class="my-products-card">
        <div class="my-products-header">
            <h1>My Products</h1>
        </div>
        
        @if($products->isEmpty())
            <div class="my-products-empty">
                <p>You haven't added any products yet.</p>
            </div>
        @else
            <div class="my-products-grid">
                @foreach($products as $product)
                    <div class="product-card">
                        <h3 class="product-name" title="{{ $product->name }}">
                            <a href="{{ route('products.show', $product->slug) }}">
                                {{ \Str::limit($product->name, 30) }}
                            </a>
                        </h3>
                        <span class="product-type {{ strtolower($product->type) }}">
                            {{ $product->type === 'deaddrop' ? 'Dead Drop' : ucfirst($product->type) }}
                        </span>
                        <div class="product-actions">
                            <a href="{{ route('vendor.products.edit', $product) }}" class="product-btn product-btn-edit">
                                Edit
                            </a>
                            @if($product->is_advertised)
                                <span class="product-btn product-btn-ad product-btn-ad-disabled">
                                    Advertised
                                </span>
                            @else
                                <a href="{{ route('vendor.advertisement.create', $product) }}" class="product-btn product-btn-ad">
                                    Advertisement
                                </a>
                            @endif
                            <form action="{{ route('vendor.products.destroy', $product) }}" method="POST inline-856da71e50">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="product-btn product-btn-delete inline-69d66e5b2e">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

@endsection
