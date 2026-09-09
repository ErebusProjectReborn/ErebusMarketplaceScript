@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/erebus/views/profile/index.css') }}">
@section('content')



<!-- ===== UNIFIED PROFILE HEADER ===== -->
<div class="profile-header">
<!-- TOP: Avatar, Name, Role, Meta, PGP, Settings -->
<div class="profile-header-top">
<div class="profile-avatar-wrapper">
<img src="{{ $profile->profile_picture_url }}" alt="{{ $user->username }}" class="profile-avatar">
<div class="profile-avatar-badge" title="Active">✓</div>
</div>

<div class="profile-header-content">
<h1 class="profile-header-name">{{ $user->username }}</h1>
<span class="profile-header-role">
<span>●</span> {{ $userRole }}
</span>
<div class="profile-header-meta">
<div class="meta-badge">
<span class="meta-badge-label">Joined</span>
<span class="meta-badge-value">{{ $user->created_at->format('M Y') }}</span>
</div>
<div class="meta-badge">
<span class="meta-badge-label">Account Age</span>
<span class="meta-badge-value">{{ $user->created_at->diffForHumans() }}</span>
</div>
</div>
</div>

<div class="profile-header-actions">
@if($pgpKey)
@if($pgpKey->verified)
<span class="pgp-status-large verified">✓ PGP Verified</span>
@else
<span class="pgp-status-large unverified">⚠ PGP Unverified</span>
@endif
@else
<span class="pgp-status-large">No PGP Key</span>
@endif
<a href="{{ route('settings') }}" class="btn btn-secondary">Account Settings</a>
</div>
</div>

<!-- PROFILE DESCRIPTION -->
<div class="profile-description-section">
<h2 class="section-title">Profile Description</h2>
<div class="description-display">
{!! $profile && $profile->description ? nl2br(e(Crypt::decryptString($profile->description))) : '<em>No description added yet.</em>' !!}
</div>
</div>

<!-- PGP SECTION IN HEADER -->
<div class="pgp-header-section">
<h2 class="pgp-header-title">🔐 PGP Public Key</h2>
@if($user->pgpKey)
@if($user->pgpKey->verified)
<span class="pgp-badge-status verified">✓ Verified</span>
@else
<span class="pgp-badge-status unverified">⚠ Unverified</span>
@endif
@else
<span class="pgp-badge-status unverified">Not Added</span>
@endif
</div>

<!-- EDIT SECTION (COLLAPSIBLE WITH DETAILS/SUMMARY) -->
<details class="edit-details">
<summary class="edit-summary">✎ Edit Your Profile</summary>

<div class="edit-content">
<form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="edit-grid">
<!-- Picture Sidebar -->
<div>
<div class="picture-edit-card">
<div class="picture-preview">
<img src="{{ $profile->profile_picture_url }}" alt="Profile Picture">
</div>
<label class="file-input-label">
Change Picture
<input type="file" name="profile_picture" accept="image/*">
</label>
<p class="file-hint">JPG, PNG, GIF, WebP. Max 800KB.</p>
</div>
</div>

<!-- Form -->
<div class="form-card">
<h3 class="inline-495855dbcd">
Edit Description
</h3>
<div class="form-group">
<label for="description" class="form-label">Your Profile Description</label>
<textarea name="description" id="description" rows="10" required minlength="4" maxlength="800" class="form-textarea" placeholder="Write something about yourself...">{{ old('description', $profile->description ? e(Crypt::decryptString($profile->description)) : '') }}</textarea>
<small class="form-hint">4–800 characters. Letters, numbers, spaces, and punctuation allowed.</small>
</div>
<button type="submit" class="form-submit">💾 Save Changes</button>
</div>
</div>
</form>
</div>
</details>
</div>

<!-- ===== MAIN GRID (Mirror + Referrals) ===== -->
<div class="profile-main-grid">
<!-- Private Mirror Card -->
<div class="card">
<div class="card-header">
<h2 class="card-title">Private Mirror</h2>
</div>
<div class="card-content">
@if($assignedMirrorUrl)
<div class="mirror-status-box assigned">
<span class="mirror-status-icon">✓</span>
<div class="mirror-status-content">
<div class="mirror-status-title">Mirror Assigned</div>
<div class="mirror-status-desc">You have a private mirror</div>
</div>
</div>
<div class="mirror-url">{{ $assignedMirrorUrl }}</div>
<p class="inline-45ee5c1159">
Keep this URL safe and share only with trusted individuals.
</p>

@elseif($hasPendingMirrorRequest)
<div class="mirror-status-box pending">
<span class="mirror-status-icon">⏳</span>
<div class="mirror-status-content">
<div class="mirror-status-title">Request Pending</div>
<div class="mirror-status-desc">Admin review in progress</div>
</div>
</div>
<p class="inline-0f2eef63bf">
An administrator is reviewing your request. You'll be notified once a mirror is assigned.
</p>

@else
<div class="mirror-status-box none">
<span class="mirror-status-icon">○</span>
<div class="mirror-status-content">
<div class="mirror-status-title">No Mirror Yet</div>
<div class="mirror-status-desc">Request a private mirror below</div>
</div>
</div>
<form action="{{ route('profile.private-mirror.request') }}" method="POST inline-0ca29beddf">
@csrf
<button type="submit" class="btn inline-b52608060a">Request Mirror</button>
</form>
@endif
</div>
</div>

<!-- Referrals Card -->
<div class="card">
<div class="card-header">
<h2 class="card-title">Your Referrals</h2>
</div>
<div class="card-content">
@if($referrals->count() > 0)
<p class="inline-adcfae145f">
{{ $referrals->count() }} {{ $referrals->count() === 1 ? 'user' : 'users' }} used your reference code:
</p>
<div class="referral-list">
@foreach($referrals as $referral)
<div class="referral-item">✓ {{ $referral->username }}</div>
@endforeach
</div>
@else
<div class="empty-state">
<div class="empty-state-icon">📭</div>
<div>No referrals yet</div>
<div class="inline-5a272b8116">When someone uses your code, they'll appear here</div>
</div>
@endif
</div>
</div>
</div>

<!-- ===== REFERENCES SECTION ===== -->
<div class="inline-754cf639d9">
<h2 class="inline-099f200e92">
Referrals & Vendors
</h2>

<div class="references-grid">
<!-- Your Reference -->
<div class="ref-card">
<h3 class="ref-card-title">Your Reference ID</h3>
<p class="inline-adcfae145f">
Share this unique ID with trusted individuals:
</p>
<div class="ref-display">{{ $referenceId }}</div>
<div class="ref-info-grid">
<div class="ref-info-box">
<span class="ref-info-label">Used a Code?</span>
<span class="ref-info-value">{{ $usedReferenceCode ? '✓ Yes' : '✗ No' }}</span>
</div>
@if($usedReferenceCode && $referrerUsername)
<div class="ref-info-box">
<span class="ref-info-label">Referred By</span>
<span class="ref-info-value">{{ $referrerUsername }}</span>
</div>
@endif
</div>
<p class="inline-f6e4c4978e">
⚠ Only share with trusted individuals.
</p>
</div>

<!-- Saved Vendors -->
<div class="ref-card">
<h3 class="ref-card-title">Saved Vendors</h3>
<p class="inline-adcfae145f">
Add vendor reference IDs to save their shops:
</p>
<form action="{{ route('references.store', auth()->user()->id) }}" method="POST" class="ref-form">
@csrf
<div class="ref-input-group">
<input type="text" name="vendor_reference_id" placeholder="Vendor Reference ID" required minlength="12" maxlength="20" class="ref-input">
<button type="submit" class="ref-button">Add</button>
</div>
</form>
<div class="vendor-note">
<p>💡 Only vendor reference IDs can be added. Personal user IDs will be rejected.</p>
</div>

@if(isset($privateShops) && $privateShops->count() > 0)
<div class="inline-0ca29beddf">
<h4 class="inline-91cf8b6969">
Vendors ({{ $privateShops->count() }})
</h4>
<div class="vendor-list">
@foreach($privateShops as $shop)
<div class="vendor-item">
<div class="vendor-info">
<div class="vendor-name">{{ $shop->vendor_username }}</div>
<div class="vendor-id">{{ $shop->vendor_reference_id }}</div>
</div>
<form action="{{ route('references.remove', $shop->id) }}" method="POST inline-ff227d0632">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger inline-93b9740504">Remove</button>
</form>
</div>
@endforeach
</div>
</div>
@else
<div class="empty-state">
<div class="empty-state-icon">🏪</div>
<div>No vendors saved yet</div>
</div>
@endif
</div>
</div>
</div>

@endsection
