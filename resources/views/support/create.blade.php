@extends('layouts.app')

@section('content')
<div class="support-create-container">
    <div class="support-header">
        <h1>Create Support Request</h1>
        <p>We're here to help. Describe your issue below.</p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Please fix the following errors:</strong>
            @foreach ($errors->all() as $error)
                <p>• {{ $error }}</p>
            @endforeach
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('support.solve-pow-create') }}" method="POST" class="support-form">
        @csrf

        <!-- Subject Field -->
        <div class="form-group">
            <label for="subject">Subject *</label>
            <input 
                type="text" 
                id="subject" 
                name="subject" 
                class="form-control @error('subject') is-invalid @enderror" 
                placeholder="Brief description of your issue"
                value="{{ old('subject') }}"
                required
                minlength="5"
                maxlength="100"
            >
            <small>5-100 characters</small>
            @error('subject')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <!-- Category Field -->
        <div class="form-group">
            <label for="category">Category *</label>
            <select id="category" name="category" class="form-control @error('category') is-invalid @enderror" required>
                <option value="">-- Select a category --</option>
                <option value="billing" {{ old('category') === 'billing' ? 'selected' : '' }}>
                    Billing & Payments
                </option>
                <option value="technical" {{ old('category') === 'technical' ? 'selected' : '' }}>
                    Technical Issue
                </option>
                <option value="account" {{ old('category') === 'account' ? 'selected' : '' }}>
                    Account & Settings
                </option>
                <option value="other" {{ old('category') === 'other' ? 'selected' : '' }}>
                    Other
                </option>
            </select>
            @error('category')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <!-- Message Field -->
        <div class="form-group">
            <label for="message">Message *</label>
            <textarea 
                id="message" 
                name="message" 
                class="form-control @error('message') is-invalid @enderror" 
                placeholder="Please provide details about your issue..."
                rows="6"
                required
                minlength="10"
                maxlength="2000"
            >{{ old('message') }}</textarea>
            <small>10-2000 characters</small>
            @error('message')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <!-- PoW Info -->
        <div class="pow-info">
            <h4>🔐 Proof of Work Verification</h4>
            <p>To prevent spam, we require proof of work verification. When you click the button below, our server will solve a computational challenge. This takes 2-3 seconds and no JavaScript is needed.</p>
        </div>

        <!-- Submit Button -->
        <div class="form-actions">
            <button type="submit" class="btn btn-primary btn-large">
                🔐 Compute PoW & Submit
            </button>
            <a href="{{ route('support.index') }}" class="btn btn-secondary">
                Cancel
            </a>
        </div>
    </form>
</div>


@endsection
