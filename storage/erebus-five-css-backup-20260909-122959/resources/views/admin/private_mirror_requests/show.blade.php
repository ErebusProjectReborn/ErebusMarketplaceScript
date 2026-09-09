@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/erebus/views/admin/private_mirror_requests/show.css') }}">
@section('content')



<div class="admin-container">
<a href="{{ route('admin.private-mirror-requests.list') }}" class="back-link">← Back to Requests</a>

@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger">
{{ $error }}
</div>
@endforeach
@endif

<div class="admin-card">
<h1 class="admin-title">Mirror Request Details</h1>

<div class="info-grid">
<div class="info-item">
<span class="info-label">Username</span>
<span class="info-value">
@if ($mirrorRequest->user)
{{ $mirrorRequest->user->username }}
@else
<span class="inline-75a8ff36cb">User Not Found</span>
@endif
</span>
</div>

<div class="info-item">
<span class="info-label">Email</span>
<span class="info-value">
@if ($mirrorRequest->user)
{{ $mirrorRequest->user->email }}
@else
<span class="inline-75a8ff36cb">N/A</span>
@endif
</span>
</div>

<div class="info-item">
<span class="info-label">Status</span>
<span class="status-badge status-{{ strtolower($mirrorRequest->status) }}">
{{ ucfirst($mirrorRequest->status) }}
</span>
</div>

<div class="info-item">
<span class="info-label">Requested Date</span>
<span class="info-value">
@if ($mirrorRequest->created_at)
{{ $mirrorRequest->created_at->format('M d, Y H:i:s') }}
@else
<span class="inline-75a8ff36cb">N/A</span>
@endif
</span>
</div>

@if ($mirrorRequest->assigned_mirror)
<div class="info-item">
<span class="info-label">Assigned Mirror URL</span>
<span class="info-value">
<a href="{{ $mirrorRequest->assigned_mirror }}" target="_blank" rel="noopener noreferrer">
{{ $mirrorRequest->assigned_mirror }}
</a>
</span>
</div>

<div class="info-item">
<span class="info-label">Assigned Date</span>
<span class="info-value">
@if ($mirrorRequest->assigned_at)
{{ $mirrorRequest->assigned_at->format('M d, Y H:i:s') }}
@else
<span class="inline-75a8ff36cb">N/A</span>
@endif
</span>
</div>
@endif
</div>

@if ($mirrorRequest->status !== 'assigned' && $mirrorRequest->status !== 'denied')
<div class="inline-6fe761e07f">
<h3 class="inline-509a889085">Assign Mirror</h3>

<form method="POST" action="/admin/private-mirror-requests/{{ $mirrorRequest->id ?? $mirrorRequest }}/assign" novalidate>
@csrf

<div class="form-group">
<label class="form-label" for="mirror_url">Mirror URL *</label>
<input
type="url"
id="mirror_url"
name="mirror_url"
class="form-input"
placeholder="https://example.com/mirror"
required
value="{{ old('mirror_url') }}"
>
@error('mirror_url')
<span class="inline-07d3a534bb">
{{ $message }}
</span>
@enderror
</div>

<div class="action-buttons">
<button type="submit" class="button button-primary">Assign Mirror</button>
</div>
</form>

<form method="POST" action="/admin/private-mirror-requests/{{ $mirrorRequest->id ?? $mirrorRequest }}/deny inline-c7160a350e">
@csrf
<button type="submit" class="button button-danger" onclick="return confirm('Are you sure you want to deny this request?');">Deny Request</button>
</form>
</div>
@elseif ($mirrorRequest->status === 'denied')
<div class="alert alert-danger">
This request has been denied.
</div>
@elseif ($mirrorRequest->status === 'assigned')
<div class="alert alert-success">
This request has been assigned a mirror.
</div>
@endif
</div>
</div>

@endsection
