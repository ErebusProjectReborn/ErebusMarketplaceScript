@extends('layouts.auth')

<link rel="stylesheet" href="{{ asset('css/erebus/views/auth/reset-password.css') }}">
@section('title', 'Reset Password - Erebus')
@section('breadcrumb', 'Reset Password')

@section('content')



<div class="auth-reset-container">
<div class="auth-reset-card">
<h1 class="auth-reset-title">Reset Your Password</h1>

@if ($errors->any())
<div class="auth-reset-error">
<strong>Error:</strong>
@foreach ($errors->all() as $error)
<div>{{ $error }}</div>
@endforeach
</div>
@endif

@if (session('success'))
<div class="auth-reset-success">
{{ session('success') }}
</div>
@endif

<form method="POST" action="{{ route('password.update') }}" class="auth-reset-form">
@csrf

<!-- Hidden token field -->
<input type="hidden" name="token" value="{{ $token }}">

<!-- Username field (REQUIRED) -->
<div class="auth-reset-form-group">
<label for="username" class="auth-reset-label">Username:</label>
<input
type="text"
id="username"
name="username"
class="auth-reset-input @error('username') is-invalid @enderror"
placeholder="Enter your username"
value="{{ old('username') }}"
minlength="3"
maxlength="20"
required
autofocus
>
@error('username')
<small class="inline-194006b2fc">{{ $message }}</small>
@enderror
</div>

<!-- Password field -->
<div class="auth-reset-form-group">
<label for="password" class="auth-reset-label">New Password:</label>
<input
type="password"
id="password"
name="password"
class="auth-reset-input @error('password') is-invalid @enderror"
placeholder="Enter your new password"
minlength="8"
maxlength="40"
required
>
@error('password')
<small class="inline-194006b2fc">{{ $message }}</small>
@enderror
</div>

<!-- Password confirmation field -->
<div class="auth-reset-form-group">
<label for="password_confirmation" class="auth-reset-label">Confirm New Password:</label>
<input
type="password"
id="password_confirmation"
name="password_confirmation"
class="auth-reset-input @error('password_confirmation') is-invalid @enderror"
placeholder="Confirm your new password"
minlength="8"
maxlength="40"
required
>
@error('password_confirmation')
<small class="inline-194006b2fc">{{ $message }}</small>
@enderror
</div>

<button type="submit" class="auth-reset-button">Reset Password</button>
</form>

<div class="auth-reset-links">
<a href="{{ route('login') }}" class="auth-reset-link">Back to Login</a>
<a href="{{ route('password.request') }}" class="auth-reset-link">Forgot Password?</a>
</div>
</div>
</div>

@endsection
