@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/erebus/views/vendor/appearance.css') }}">
@section('content')



<div class="appearance-container">
    <div class="appearance-card">
        <h2 class="appearance-title">Store Appearance & Settings</h2>

        @if(session('success'))
            <div class="appearance-success">
                ✓ {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="appearance-error">
                <strong>Unable to save your changes:</strong>
                @if ($errors->count() === 1)
                    <div class="inline-36ca0aff10">{{ $errors->first() }}</div>
                @else
                    <ul class="appearance-error-list">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @endif

        <form action="{{ route('vendor.appearance.update') }}" method="POST">
            @csrf

            <div class="appearance-section">
                <h3 class="appearance-section-title">Store Status</h3>
                <p class="appearance-section-description">Manage how your store appears to customers on the marketplace.</p>

                <div class="toggle-group">
                    <label class="toggle-label">Vacation Mode</label>
                    <input type="hidden" name="vacation_mode" value="0">
                    <input type="checkbox" name="vacation_mode" value="1" class="toggle-input" {{ old('vacation_mode', $vendorProfile->vacation_mode) ? 'checked' : '' }}>
                </div>
                <p class="appearance-help-text">
                    When enabled, your store will be hidden from the marketplace and customers won't be able to place new orders. Existing orders will still be visible.
                </p>

                <div class="toggle-group inline-0ca29beddf">
                    <label class="toggle-label">Private Shop Mode</label>
                    <input type="hidden" name="private_shop_mode" value="0">
                    <input type="checkbox" name="private_shop_mode" value="1" class="toggle-input" {{ old('private_shop_mode', $vendorProfile->private_shop_mode) ? 'checked' : '' }}>
                </div>
                <p class="appearance-help-text">
                    Enable this to make your store private. Only users with direct access links will be able to view your products.
                </p>
            </div>

            <div class="appearance-section">
                <h3 class="appearance-section-title">Store Information</h3>
                <p class="appearance-section-description">Customize how customers see your store.</p>

                <div class="appearance-form-group @error('description') has-error @enderror">
                    <label for="description" class="appearance-form-label">Store Description</label>
                    <textarea 
                        name="description" 
                        id="description" 
                        class="appearance-textarea"
                        minlength="8"
                        maxlength="800"
                        required
                        onkeyup="updateCharCount(this, 'description-count')">{{ old('description', $vendorProfile->description) }}</textarea>
                    <div class="appearance-char-count" id="description-count">
                        <span class="current-count">{{ strlen(old('description', $vendorProfile->description)) }}</span>/800 characters
                    </div>
                    @error('description')
                        <div class="appearance-field-error">{{ $message }}</div>
                    @enderror
                    <p class="appearance-help-text">
                        Write a brief description about your store. This appears on your store front and helps customers learn about what you offer. (8-800 characters)
                    </p>
                </div>

                <div class="appearance-form-group @error('vendor_policy') has-error @enderror">
                    <label for="vendor_policy" class="appearance-form-label">Vendor Policy & Terms</label>
                    <textarea 
                        name="vendor_policy" 
                        id="vendor_policy" 
                        class="appearance-textarea"
                        minlength="8"
                        maxlength="1600"
                        required
                        onkeyup="updateCharCount(this, 'policy-count')">{{ old('vendor_policy', $vendorProfile->vendor_policy) }}</textarea>
                    <div class="appearance-char-count" id="policy-count">
                        <span class="current-count">{{ strlen(old('vendor_policy', $vendorProfile->vendor_policy)) }}</span>/1600 characters
                    </div>
                    @error('vendor_policy')
                        <div class="appearance-field-error">{{ $message }}</div>
                    @enderror
                    <p class="appearance-help-text">
                        Outline your store policies, shipping times, return policies, or any other important information customers should know. (8-1600 characters)
                    </p>
                </div>
            </div>

            <button type="submit" class="appearance-submit-btn">Save Changes</button>
        </form>
    </div>
</div>

<script>
    function updateCharCount(textarea, countElementId) {
        const count = textarea.value.length;
        const maxLength = parseInt(textarea.getAttribute('maxlength'));
        const countElement = document.getElementById(countElementId);
        const currentCountSpan = countElement.querySelector('.current-count');

        currentCountSpan.textContent = count;

        if (count >= maxLength * 0.9) {
            countElement.classList.add('warning');
            if (count >= maxLength) {
                countElement.classList.add('error');
                countElement.classList.remove('warning');
            }
        } else {
            countElement.classList.remove('warning', 'error');
        }
    }

    // Initialize character counts on page load
    document.addEventListener('DOMContentLoaded', function() {
        const textareas = document.querySelectorAll('textarea');
        textareas.forEach(textarea => {
            if (textarea.id === 'description') {
                updateCharCount(textarea, 'description-count');
            } else if (textarea.id === 'vendor_policy') {
                updateCharCount(textarea, 'policy-count');
            }
        });
    });
</script>

@endsection
