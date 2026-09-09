@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/erebus/views/vendor/products/create.css') }}">
@section('content')



<div class="product-create-container">
    <div class="product-create-card">
        <h2 class="product-create-title">➕ Add New {{ ucfirst($type) }} Product</h2>

        <form action="{{ route('vendor.products.store', $type) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="product-create-section">
                <h3 class="product-create-section-title">📷 Product Pictures</h3>
                
                <div class="product-create-field">
                    <label class="product-create-label">Main Product Picture</label>
                    <label for="product_picture" class="product-create-submit-btn product-create-file-btn">
                        📁 Choose Picture
                    </label>
                    <input type="file" name="product_picture" id="product_picture" class="hidden" accept="image/jpeg,image/png,image/gif,image/webp">
                    <p class="product-create-help-text">📝 Optional. Formats: JPEG, PNG, GIF, WebP. Max 800KB.</p>
                </div>

                <div class="product-create-field">
                    <label class="product-create-label">Additional Photos (Up to 3)</label>
                    <label for="additional_photos" class="product-create-submit-btn product-create-file-btn">
                        📁 Choose Additional Photos
                    </label>
                    <input type="file" name="additional_photos[]" id="additional_photos" class="hidden" accept="image/jpeg,image/png,image/gif,image/webp" multiple>
                    <p class="product-create-help-text">📝 Optional. Select up to 3 additional photos. Max 800KB each.</p>
                </div>
            </div>

            <div class="product-create-section">
                <h3 class="product-create-section-title">📝 Product Details</h3>

                <div class="product-create-field">
                    <label for="name" class="product-create-label">Product Name</label>
                    <input type="text" name="name" id="name" class="product-create-input" required minlength="4" maxlength="240" value="{{ old('name') }}" placeholder="Enter product name">
                </div>

                <div class="product-create-field">
                    <label for="description" class="product-create-label">Description</label>
                    <textarea name="description" id="description" class="product-create-textarea" required minlength="4" maxlength="2400" placeholder="Describe your product...">{{ old('description') }}</textarea>
                </div>

                <div class="product-create-field">
                    <label for="price" class="product-create-label">Price (USD)</label>
                    <div class="product-create-price-wrapper">
                        <div class="product-create-price-symbol">$</div>
                        <input type="number" name="price" id="price" class="product-create-input product-create-price-input" required step="0.01" min="0" max="80000" value="{{ old('price') }}" placeholder="0.00">
                    </div>
                </div>

                <div class="product-create-field">
                    <label for="category_id" class="product-create-label">Category</label>
                    <select name="category_id" id="category_id" class="product-create-select" required>
                        <option value="">Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @if(old('category_id') == $category->id) selected @endif>
                                {{ $category->name }}
                            </option>
                            @foreach($category->children as $child)
                                <option value="{{ $child->id }}" @if(old('category_id') == $child->id) selected @endif>
                                    {{ $category->name }} - {{ $child->name }}
                                </option>
                                @foreach($child->children as $grandchild)
                                    <option value="{{ $grandchild->id }}" @if(old('category_id') == $grandchild->id) selected @endif>
                                        {{ $category->name }} - {{ $child->name }} - {{ $grandchild->name }}
                                    </option>
                                @endforeach
                            @endforeach
                        @endforeach
                    </select>
                </div>

                <div class="product-create-field">
                    <label for="stock_amount" class="product-create-label">Stock Amount</label>
                    <input type="number" name="stock_amount" id="stock_amount" class="product-create-input" required min="0" max="80000" value="{{ old('stock_amount', 0) }}" placeholder="0">
                </div>

                <div class="product-create-field">
                    <label for="measurement_unit" class="product-create-label">Measurement Unit</label>
                    <select name="measurement_unit" id="measurement_unit" class="product-create-select" required>
                        <option value="">Select a measurement unit</option>
                        @foreach($measurementUnits as $value => $label)
                            <option value="{{ $value }}" @if(old('measurement_unit') == $value) selected @endif>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="product-create-section">
                <h3 class="product-create-section-title">📍 Shipping Options</h3>

                <div class="product-create-field">
                    <label for="ships_from" class="product-create-label">Ships From</label>
                    <select name="ships_from" id="ships_from" class="product-create-select" required>
                        <option value="">-- Select Country --</option>
                        @foreach($countries as $country)
                            <option value="{{ $country }}" @if(old('ships_from') === $country) selected @endif>
                                {{ $country }}
                            </option>
                        @endforeach
                    </select>
                    @error('ships_from')
                        <p class="product-create-help-text inline-fc23f87a8c">{{ $message }}</p>
                    @enderror
                </div>

                <div class="product-create-field">
                    <label for="ships_to" class="product-create-label">Ships To</label>
                    <select name="ships_to" id="ships_to" class="product-create-select" required>
                        <option value="">-- Select Country --</option>
                        @foreach($countries as $country)
                            <option value="{{ $country }}" @if(old('ships_to') === $country) selected @endif>
                                {{ $country }}
                            </option>
                        @endforeach
                    </select>
                    @error('ships_to')
                        <p class="product-create-help-text inline-fc23f87a8c">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="product-create-section">
                <h3 class="product-create-section-title">📦 Delivery Options</h3>
                <p class="product-create-help-text">Add 1-4 delivery options with descriptions and prices.</p>
                
                @for ($i = 0; $i < 4; $i++)
                    <div class="product-option-card">
                        <h4 class="product-option-title">Delivery Option {{ $i + 1 }}</h4>
                        <div class="product-create-field">
                            <label for="delivery_options_{{ $i }}_description" class="product-create-label">Description</label>
                            <input type="text" name="delivery_options[{{ $i }}][description]" id="delivery_options_{{ $i }}_description" class="product-create-input" minlength="4" maxlength="160" placeholder="e.g., Standard Shipping (5-7 days)" value="{{ old('delivery_options.'.$i.'.description') }}">
                        </div>
                        <div class="product-create-field">
                            <label for="delivery_options_{{ $i }}_price" class="product-create-label">Shipping Price (USD)</label>
                            <div class="product-create-price-wrapper">
                                <div class="product-create-price-symbol">$</div>
                                <input type="number" name="delivery_options[{{ $i }}][price]" id="delivery_options_{{ $i }}_price" class="product-create-input product-create-price-input" step="0.01" min="0" max="80000" placeholder="0.00" value="{{ old('delivery_options.'.$i.'.price') }}">
                            </div>
                        </div>
                    </div>
                @endfor
                @error('delivery_options')
                    <p class="product-create-help-text inline-fc23f87a8c">{{ $message }}</p>
                @enderror
            </div>

            <div class="product-create-section">
                <h3 class="product-create-section-title">📦 Bulk Options</h3>
                <p class="product-create-help-text">Optionally add up to 8 bulk purchase options. Leave empty if not offering bulk pricing.</p>
                
                @for ($i = 0; $i < 8; $i++)
                    <div class="product-option-card">
                        <h4 class="product-option-title">Bulk Option {{ $i + 1 }}</h4>
                        <div class="product-create-field">
                            <label for="bulk_options_{{ $i }}_amount" class="product-create-label">Bulk Amount (Quantity)</label>
                            <input type="number" name="bulk_options[{{ $i }}][amount]" id="bulk_options_{{ $i }}_amount" class="product-create-input" step="1" min="0" max="80000" placeholder="Enter bulk quantity" value="{{ old('bulk_options.'.$i.'.amount') }}">
                        </div>
                        <div class="product-create-field">
                            <label for="bulk_options_{{ $i }}_price" class="product-create-label">Bulk Price (USD)</label>
                            <div class="product-create-price-wrapper">
                                <div class="product-create-price-symbol">$</div>
                                <input type="number" name="bulk_options[{{ $i }}][price]" id="bulk_options_{{ $i }}_price" class="product-create-input product-create-price-input" step="0.01" min="0" max="80000" placeholder="0.00" value="{{ old('bulk_options.'.$i.'.price') }}">
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

            <button type="submit" class="product-create-submit-btn">✓ Create {{ ucfirst($type) }} Product</button>
        </form>
    </div>
</div>

@endsection
