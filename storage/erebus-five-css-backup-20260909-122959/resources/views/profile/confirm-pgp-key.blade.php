@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/erebus/views/profile/confirm-pgp-key.css') }}">
@section('content')



<div class="pgp-container">
<div class="pgp-card">
<h1 class="pgp-title">🔐 Verify PGP Public Key</h1>

<div class="pgp-expiry-notice">
<strong>⏱ Verification Expiry:</strong> This verification code will expire on {{ $expirationTime->format('M d, Y \a\t H:i') }}. Please complete verification within this time.
</div>

<h5 class="pgp-card-title">Encrypted Message</h5>
<pre class="pgp-encrypted-message">{{ $encryptedMessage }}</pre>

<p class="pgp-instruction">Please decrypt this message using your private key and enter the decrypted message below. The message format is: <code class="inline-108542dc9f">EREBUS-{10-digit number}-MARKETPLACE</code></p>

<form method="POST" action="{{ route('pgp.confirm.submit') }}">
@csrf
<div class="pgp-form-group">
<label for="decrypted_message" class="pgp-label">Decrypted Message</label>
<textarea
name="decrypted_message"
id="decrypted_message"
class="pgp-textarea"
required
minlength="16"
maxlength="40"
autocomplete="off"
spellcheck="false"
placeholder="Paste your decrypted message here"
></textarea>
</div>
<div class="pgp-submit-wrapper">
<button type="submit" class="pgp-submit-btn">✓ Verify PGP Key</button>
</div>
</form>

<div class="pgp-back-link">
<a href="{{ route('settings') }}">← Back to Settings</a>
</div>
</div>
</div>

@endsection
