@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@section('content')



<div class="categories-index-container">
    <div class="categories-index-header">
        <h1 class="categories-index-title">Erebus Category Management</h1>
        <p class="inline-0961202324">Manage Parent Categories, Child Categories, and Sub Categories</p>
    </div>

    <!-- Alert Messages -->
    @if ($errors->any())
        <div class="inline-510455f1d4">
            <strong>Error:</strong>
            <ul class="inline-c116f066a9">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="inline-ca868691de">
            {{ session('success') }}
        </div>
    @endif

    <div class="categories-index-grid">
        <!-- Create Category Form -->
        <div class="categories-index-card">
            <h2 class="categories-index-card-title">Create New Category</h2>
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div class="categories-index-form-group">
                    <label for="name" class="categories-index-label">Category Name</label>
                    <input type="text" name="name" id="name" 
                           class="categories-index-input"
                           required minlength="1" maxlength="16" 
                           value="{{ old('name') }}"
                           placeholder="Enter category name">
                    <p class="categories-index-help-text">Between 1 and 16 characters</p>
                </div>

                <div class="categories-index-form-group">
                    <label for="parent_id" class="categories-index-label">Parent Category (Optional)</label>
                    <select name="parent_id" id="parent_id" class="categories-index-select">
                        <option value="">None (Parent Category)</option>
                        @php
                            function printCategoryOptions($categories, $prefix = '') {
                                foreach ($categories as $category) {
                                    $displayPrefix = '';
                                    if ($category->level === 2) {
                                        $displayPrefix = '→ ';
                                    } elseif ($category->level === 3) {
                                        $displayPrefix = '→→ ';
                                    }
                                    echo '<option value="' . $category->id . '" ' . (old('parent_id') == $category->id ? 'selected' : '') . '>' . $prefix . $displayPrefix . $category->name . '</option>';
                                    if ($category->children->isNotEmpty()) {
                                        printCategoryOptions($category->children, $prefix . '  ');
                                    }
                                }
                            }
                        @endphp
                        @foreach ($mainCategories as $category)
                            <option value="{{ $category->id }}" {{ old('parent_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }} (Parent)
                            </option>
                            @foreach ($category->children as $child)
                                <option value="{{ $child->id }}" {{ old('parent_id') == $child->id ? 'selected' : '' }}>
                                    → {{ $child->name }} (Child)
                                </option>
                                @foreach ($child->children as $sub)
                                    <option value="{{ $sub->id }}" {{ old('parent_id') == $sub->id ? 'selected' : '' }}>
                                        → → {{ $sub->name }} (Sub)
                                    </option>
                                @endforeach
                            @endforeach
                        @endforeach
                    </select>
                    <p class="categories-index-help-text">Leave empty to create a Parent Category, select a Parent for Child Category, or select a Child for Sub Category</p>
                </div>

                <button type="submit" class="categories-index-submit">
                    Create Category
                </button>
            </form>
        </div>
    </div>

    <!-- Categories List -->
    <div class="categories-index-card">
        <h2 class="categories-index-card-title">Category Hierarchy</h2>
        
        @if($mainCategories->isEmpty())
            <p class="categories-index-empty">No categories found. Create your first Parent Category above.</p>
        @else
            <div class="categories-index-list">
                @foreach($mainCategories as $parentCategory)
                    <div class="categories-index-parent">
                        <!-- Parent Category -->
                        <div class="categories-index-parent-header">
                            <div class="inline-b4edaa7885">
                                <span class="categories-index-level-indicator">Parent</span>
                                <span class="categories-index-parent-name">{{ $parentCategory->name }}</span>
                            </div>
                            <form action="{{ route('admin.categories.delete', $parentCategory) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="categories-index-delete-btn" onclick="return confirm('Delete this category and all its subcategories?')">
                                    Delete
                                </button>
                            </form>
                        </div>

                        <!-- Child Categories -->
                        @if($parentCategory->children->isNotEmpty())
                            <div class="categories-index-children">
                                @foreach($parentCategory->children as $childCategory)
                                    <div class="categories-index-child">
                                        <div class="categories-index-child-header">
                                            <div class="inline-b4edaa7885">
                                                <span class="categories-index-level-indicator inline-38bcfe9821">Child</span>
                                                <span class="categories-index-child-name">{{ $childCategory->name }}</span>
                                            </div>
                                            <form action="{{ route('admin.categories.delete', $childCategory) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="categories-index-delete-btn" onclick="return confirm('Delete this category and all its subcategories?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>

                                        <!-- Sub Categories -->
                                        @if($childCategory->children->isNotEmpty())
                                            <div class="categories-index-subcategories">
                                                @foreach($childCategory->children as $subCategory)
                                                    <div class="categories-index-subcategory">
                                                        <div class="inline-258c54218d">
                                                            <span class="categories-index-level-indicator inline-d0ddda4c1e">Sub</span>
                                                            <span class="categories-index-subcategory-name">{{ $subCategory->name }}</span>
                                                        </div>
                                                        <form action="{{ route('admin.categories.delete', $subCategory) }}" method="POST" class="inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="categories-index-delete-btn">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <p class="inline-6a508bcca9">No Sub Categories yet</p>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="inline-f62b4d1c2c">No Child Categories yet</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

@endsection
