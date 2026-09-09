@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/erebus/views/products/index.css') }}">
@section('content')



<div class="products-container">
    {{-- Search and Filter Form --}}
    <div class="filter-card">
        <form action="{{ route('products.index') }}" method="GET">
            {{-- Top Row: Vendor + Dropdowns --}}
            <div class="filter-row">
                <div class="filter-left">
                    <div class="form-group">
                        <label for="vendor" class="form-label">By Vendor</label>
                        <input type="text" 
                               name="vendor" 
                               id="vendor" 
                               value="{{ $filters['vendor'] ?? '' }}"
                               placeholder="Search vendor 🔎"
                               minlength="1"
                               maxlength="16"
                               class="form-input">
                    </div>
                </div>
                
                <div class="filter-right">
                    <div class="form-group">
                        <label for="type" class="form-label">By Product Type</label>
                        <select name="type" 
                                id="type" 
                                class="products-select">
                            <option value="">All Types</option>
                            <option value="digital" {{ ($currentType === 'digital') ? 'selected' : '' }}>Digital</option>
                            <option value="cargo" {{ ($currentType === 'cargo') ? 'selected' : '' }}>Cargo</option>
                            <option value="deaddrop" {{ ($currentType === 'deaddrop') ? 'selected' : '' }}>Dead Drop</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="category" class="form-label">By Category</label>
                        <select name="category" 
                                id="category" 
                                class="form-select">
                            <option value="">All Categories</option>
                            @php
                                function renderCategoryOptions($categories, $selectedId = null) {
                                    foreach ($categories as $category) {
                                        $isSelected = ($selectedId == $category->id) ? 'selected' : '';
                                        
                                        // Add proper spacing based on level
                                        $spacing = '';
                                        if ($category->level === 1) {
                                            $spacing = '';
                                        } elseif ($category->level === 2) {
                                            $spacing = '→ ';
                                        } elseif ($category->level === 3) {
                                            $spacing = '→ → ';
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
                                @php renderCategoryOptions([$category], $filters['category'] ?? null) @endphp
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="sort_price" class="form-label">Sort by Price</label>
                        <select name="sort_price" 
                                id="sort_price" 
                                class="products-select">
                            <option value="">Most Recent</option>
                            <option value="asc" {{ ($filters['sort_price'] ?? '') === 'asc' ? 'selected' : '' }}>Price: Low to High</option>
                            <option value="desc" {{ ($filters['sort_price'] ?? '') === 'desc' ? 'selected' : '' }}>Price: High to Low</option>
                        </select>
                    </div>
                </div>
            </div>

            {{-- Middle Row: Main Search --}}
            <div class="search-container">
                <div class="main-search">
                    <label for="search" class="main-search-label">Search Product</label>
                    <input type="text" 
                           name="search" 
                           id="search" 
                           value="{{ $filters['search'] ?? '' }}"
                           placeholder="Search by product title 🔎"
                           minlength="1"
                           maxlength="80"
                           class="main-search-input">
                </div>
            </div>

            {{-- Bottom Row: Buttons --}}
            <div class="filter-actions">
                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                    Reset Filters
                </a>
                <button type="submit" class="btn btn-primary">
                    Apply Filters
                </button>
            </div>
        </form>
    </div>

    @if($products->isEmpty())
        <div class="products-empty">
            <p>No products found matching your criteria.</p>
        </div>
    @else
        <x-products 
            :products="$products"
        />
    @endif
</div>

@endsection
