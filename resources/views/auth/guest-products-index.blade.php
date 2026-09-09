@extends('layouts.auth')

@section('content')



<div class="products-container">
    {{-- Welcome Header --}}
    <div class="welcome-header">
        <h1>Erebus Marketplace Script</h1>
        <p>Developed by The Erebus Development Team based off of Kabus Marketplace Script by Sukunetsiz.</p>
        <a href="{{ route('register') }}" class="welcome-header-cta">Register Now</a>
    </div>

    {{-- Search Section --}}
    <div class="search-section">
        <form action="{{ route('guest-products.index') }}" method="GET" class="search-form">
            {{-- Search by Product Title --}}
            <div class="search-group">
                <label for="search" class="search-label">Search Products</label>
                <input type="text" name="search" id="search" value="{{ $filters['search'] ?? '' }}" placeholder="Enter product title..." class="search-input">
            </div>

            {{-- Filter by Category --}}
            <div class="search-group">
                <label for="category" class="search-label">Category</label>
                <select name="category" id="category" class="search-select">
                    <option value="">All Categories</option>
                    @php
                        function renderCategoryOptions($categories, $selectedId = null) {
                            foreach ($categories as $category) {
                                $isSelected = $selectedId == $category->id ? 'selected' : '';
                                
                                // Add proper spacing based on level
                                if ($category->level == 1) {
                                    $spacing = '';
                                } elseif ($category->level == 2) {
                                    $spacing = '→ ';
                                } elseif ($category->level == 3) {
                                    $spacing = '→→ ';
                                }
                                
                                echo '<option value="' . $category->id . '" ' . $isSelected . '>' . $spacing . $category->name . '</option>';
                                
                                // Recursively render children
                                if ($category->children->isNotEmpty()) {
                                    renderCategoryOptions($category->children, $selectedId);
                                }
                            }
                        }
                    @endphp
                    @foreach($categories as $category)
                        @php renderCategoryOptions($category->children, $filters['category'] ?? null) @endphp
                    @endforeach
                </select>
            </div>

            {{-- Buttons --}}
            <div class="inline-51ff6198ad">
                <button type="submit" class="search-button">Search</button>
                <a href="{{ route('guest-products.index') }}" class="reset-button">Reset</a>
            </div>
        </form>
    </div>

    {{-- Products Grid --}}
    @if($products->isEmpty())
        <div class="products-empty">
            <p>No products found matching your criteria. Try adjusting your search or browse all products.</p>
        </div>
    @else
        <x-products :products="$products" route="guest-products.show" :isGuest="true" />
    @endif
</div>

@endsection
