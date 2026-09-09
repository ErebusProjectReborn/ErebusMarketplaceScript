@extends('layouts.app')

@section('content')



<div class="settings-container">
    <!-- Header -->
    <div class="settings-header">
        <h1>⚙️ Account Settings</h1>
        <p>Manage your account security, preferences, and payment information</p>
    </div>

    <!-- Settings Grid -->
    <div class="settings-grid">
        <!-- Change Password Card -->
        <div class="card">
            <div class="card-header">
                <div class="card-icon">🔐</div>
                <h2 class="card-title">Change Password</h2>
            </div>
            <form method="POST" action="{{ route('settings.changePassword') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="current_password">Current Password</label>
                    <input class="form-input" 
                           id="current_password" 
                           type="password" 
                           name="current_password" 
                           required 
                           minlength="8" 
                           maxlength="40" 
                           autocomplete="current-password"
                           placeholder="Enter your current password">
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">New Password</label>
                    <input class="form-input" 
                           id="password" 
                           type="password" 
                           name="password" 
                           required 
                           minlength="8" 
                           maxlength="40" 
                           autocomplete="new-password"
                           placeholder="Enter new password">
                </div>
                <div class="form-group">
                    <label class="form-label" for="password_confirmation">Confirm New Password</label>
                    <input class="form-input" 
                           id="password_confirmation" 
                           type="password" 
                           name="password_confirmation" 
                           required 
                           minlength="8" 
                           maxlength="40" 
                           autocomplete="new-password"
                           placeholder="Confirm new password">
                </div>
                <button class="btn" type="submit">Update Password</button>
            </form>
        </div>

        <!-- PGP Key Card -->
        <div class="card">
            <div class="card-header">
                <div class="card-icon">🔑</div>
                <h2 class="card-title">PGP Public Key</h2>
            </div>
            <form method="POST" action="{{ route('settings.updatePgpKey') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="public_key">PGP Public Key</label>
                    <textarea class="form-textarea" 
                              id="public_key" 
                              name="public_key" 
                              required 
                              minlength="100" 
                              maxlength="8000"
                              placeholder="Paste your PGP public key here...">{{ old('public_key', $user->pgpKey->public_key ?? '') }}</textarea>
                </div>
                <p class="form-hint">💡 Learn more about PGP in our Guides section.</p>
                <button class="btn" type="submit">
                    {{ $user->pgpKey ? '✓ Update PGP Key' : '+ Add PGP Key' }}
                </button>
            </form>
        </div>

        <!-- Secret Phrase Card -->
        <div class="card">
            <div class="card-header">
                <div class="card-icon">🛡️</div>
                <h2 class="card-title">Anti-Phishing Phrase</h2>
            </div>
            
            @if ($user->secretPhrase)
                <div class="highlight-box">
                    <div class="highlight-label">Your Secret Phrase</div>
                    <div class="highlight-value">{{ $user->secretPhrase->phrase }}</div>
                    <div class="highlight-desc">
                        ✓ This phrase will always appear on your settings page. If you don't see it when logging in, you may be on a phishing site.
                    </div>
                </div>
            @else
                <form method="POST" action="{{ route('settings.updateSecretPhrase') }}">
                    @csrf
                    <div class="alert alert-warning">
                        <p>Set a unique phrase to protect yourself from phishing attacks.</p>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="secret_phrase">Secret Phrase (4-16 letters, no numbers)</label>
                        <input class="form-input" 
                               id="secret_phrase" 
                               type="text" 
                               name="secret_phrase" 
                               required 
                               minlength="4" 
                               maxlength="16"
                               placeholder="e.g., MySecurePhrase"
                               autocomplete="off">
                    </div>
                    <p class="form-hint">💡 Choose something memorable but unique. This is a one-time setting.</p>
                    <button class="btn" type="submit">Set Secret Phrase</button>
                </form>
            @endif
        </div>

        <!-- Account Protection Card -->
        <div class="card">
            <div class="card-header">
                <div class="card-icon">🔒</div>
                <h2 class="card-title">Account Protection</h2>
            </div>
            
            @if (!$user->pgpKey || !$user->pgpKey->verified)
                <div class="alert alert-warning">
                    <p>You need to verify your PGP key to enable 2-factor authentication.</p>
                </div>
                <p class="inline-45ee5c1159">
                    👉 Add and verify a PGP key first using the PGP Public Key section.
                </p>
            @else
                <div class="alert alert-success">
                    <p>✓ Your PGP key is verified and ready for 2FA</p>
                </div>
                
                <form method="POST" action="{{ route('pgp.2fa.update') }}">
                    @csrf
                    @method('PUT')
                    <label class="form-label" for="two_fa">2-Factor Authentication</label>
                    
                    <div class="toggle-group">
                        <button class="toggle-btn{{ $user->pgpKey->two_fa_enabled ? ' active' : '' }}" 
                                type="submit" 
                                name="two_fa_enabled" 
                                value="1">
                            ✓ ON
                        </button>
                        <button class="toggle-btn{{ !$user->pgpKey->two_fa_enabled ? ' active' : '' }}" 
                                type="submit" 
                                name="two_fa_enabled" 
                                value="0">
                            ✗ OFF
                        </button>
                    </div>
                    
                    <p class="form-hint">
                        When enabled, you'll need to decrypt a PGP message during login. This prevents unauthorized access even if your password is compromised.
                    </p>
                </form>
            @endif
        </div>

        <!-- Monero Refund Address Card (Full Width) -->
        <div class="card card-full">
            <div class="card-header">
                <div class="card-icon">💰</div>
                <h2 class="card-title">Monero Refund Addresses</h2>
            </div>

            <div class="alert alert-warning">
                <p><strong>⚠️ Important:</strong> To shop at Erebus Market, you need at least one Monero address. Refunds will be sent to your primary address. For security, use a subaddress (starts with "8") instead of your main address (starts with "4").</p>
            </div>

            <form action="{{ route('return-addresses.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="monero_address">Add Monero Refund Address</label>
                    <input type="text" 
                           class="form-input" 
                           id="monero_address" 
                           name="monero_address" 
                           placeholder="Enter your Monero refund address..."
                           required
                           minlength="40"
                           maxlength="160">
                </div>
                <p class="form-hint">💡 Use a subaddress for enhanced privacy</p>
                <button type="submit" class="btn">+ Add Address</button>
            </form>

            @if($returnAddresses->count() > 0)
                <div class="table-container">
                    <table class="settings-table">
                        <thead>
                            <tr>
                                <th>Monero Address</th>
                                <th class="inline-807e51198d">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($returnAddresses as $address)
                                <tr>
                                    <td>{{ $address->monero_address }}</td>
                                    <td>
                                        <form action="{{ route('return-addresses.destroy', $address) }}" method="POST inline-434fc32ec2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="action-btn">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-icon">📭</div>
                    <div>No refund addresses added yet</div>
                    <div class="inline-5a272b8116">Add a Monero address above to get started</div>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection
