@extends('layouts.app')

@section('content')


<div class="guides-container">
    <div class="guides-card">
        <div class="guides-header">
            <h1 class="guides-title">KeePassXC User Guide</h1>
            <p class="inline-15f95d08d0">Secure Password Management Made Easy</p>
        </div>

        <div class="guides-content">
            <h2 class="guides-section-title">What is KeePassXC?</h2>
            <p>KeePassXC is a free, open-source password manager that helps you create and manage strong passwords for all your online accounts. It uses advanced encryption to protect your passwords securely on your computer.</p>

            <h2 class="guides-section-title">Downloading KeePassXC</h2>
            <p>KeePassXC is available for Windows and Linux. Go to <code>https://keepassxc.org/download</code> to download the appropriate version for your system.</p>

            <h3 class="guides-subtitle">Windows Installation</h3>
            <ol class="guides-ordered-list">
                <li>Visit <code>https://keepassxc.org/download/windows</code></li>
                <li>Download the Windows MSI installer</li>
                <li>Double-click the KeePassXC installer file</li>
                <li>Follow the on-screen installation wizard</li>
                <li>Select your preferred installation location</li>
                <li>Choose additional options (desktop shortcut, startup option)</li>
                <li>Click Install and wait for completion</li>
                <li>Launch KeePassXC when installation is finished</li>
            </ol>

            <h3 class="guides-subtitle">Linux Installation</h3>
            <p>You have multiple options to install KeePassXC on Linux systems:</p>

            <h4 class="inline-2c140ee9ae">AppImage Method</h4>
            <ol class="guides-ordered-list">
                <li>Go to <code>https://keepassxc.org/download/#linux</code></li>
                <li>Download the AppImage version</li>
                <li>Right-click the downloaded file and select Properties</li>
                <li>Go to the Permissions tab</li>
                <li>Check "Allow executing file as program"</li>
                <li>Double-click the AppImage to launch it</li>
            </ol>

            <h4 class="inline-2c140ee9ae">Flatpak Method</h4>
            <div class="guides-code-block">
                <pre>flatpak remote-add --user --if-not-exists flathub https://flathub.org/repo/flathub.flatpakrepo
flatpak install --user flathub org.keepassxc.KeePassXC</pre>
            </div>

            <h4 class="inline-2c140ee9ae">Snap Method</h4>
            <div class="guides-code-block">
                <pre>sudo snap install keepassxc</pre>
            </div>

            <h4 class="inline-2c140ee9ae">Ubuntu PPA Method</h4>
            <div class="guides-code-block">
                <pre>sudo add-apt-repository ppa:phoerious/keepassxc
sudo apt update
sudo apt install keepassxc</pre>
            </div>

            <h2 class="guides-section-title">Understanding the Interface</h2>

            <h3 class="guides-subtitle">Main Layout Areas</h3>
            <ul class="guides-list">
                <li><strong>Groups Panel:</strong> Organize your passwords into logical groups and subgroups</li>
                <li><strong>Tags Panel:</strong> Create custom tags for quick filtering and searching</li>
                <li><strong>Entries Panel:</strong> View all passwords for the selected group</li>
                <li><strong>Preview Panel:</strong> Quick view of username and password for selected entry</li>
            </ul>

            <h3 class="guides-subtitle">Toolbar Functions</h3>
            <p>The toolbar provides quick access to common tasks:</p>
            <ul class="guides-list">
                <li>Database operations (open, save, lock database)</li>
                <li>Entry management (create, edit, delete entries)</li>
                <li>Password data (copy username, password, URL)</li>
                <li>Tools (password generator, settings)</li>
                <li>Search functionality</li>
            </ul>

            <h2 class="guides-section-title">Creating Your First Database</h2>

            <ol class="guides-ordered-list">
                <li>Open KeePassXC</li>
                <li>Click File → New Database</li>
                <li>Choose a location and filename for your database</li>
                <li>Set a strong master password (your most important password)</li>
                <li>Optionally add a key file for additional security</li>
                <li>Click Save to create your database</li>
            </ol>

            <div class="guides-highlight">
                Your master password is the only key to your entire password database. Choose something strong and memorable, but don't write it down.
            </div>

            <h2 class="guides-section-title">Managing Passwords</h2>

            <h3 class="guides-subtitle">Creating a New Entry</h3>
            <ol class="guides-ordered-list">
                <li>Select the group where you want to add the password</li>
                <li>Click the "New Entry" button in the toolbar</li>
                <li>Fill in the entry details:
                    <ul class="guides-list">
                        <li>Title (website or service name)</li>
                        <li>Username or email</li>
                        <li>Password (use the password generator)</li>
                        <li>URL (optional, for auto-fill)</li>
                        <li>Notes (any additional information)</li>
                    </ul>
                </li>
                <li>Click OK to save the entry</li>
            </ol>

            <h3 class="guides-subtitle">Using the Password Generator</h3>
            <ol class="guides-ordered-list">
                <li>Click the Tools menu → Password Generator</li>
                <li>Configure password options:
                    <ul class="guides-list">
                        <li>Length (12+ characters recommended)</li>
                        <li>Character types (uppercase, lowercase, numbers, symbols)</li>
                        <li>Exclude similar characters option</li>
                    </ul>
                </li>
                <li>Click Generate to create a random password</li>
                <li>Click Copy or Accept to use the password</li>
            </ol>

            <h2 class="guides-section-title">Password Generator Tips</h2>
            <ul class="guides-list">
                <li>Use at least 12 characters for strong passwords</li>
                <li>Include a mix of uppercase, lowercase, numbers, and symbols</li>
                <li>Enable "Exclude similar characters" to avoid confusion</li>
                <li>Generate new passwords for each new account</li>
                <li>Never reuse passwords across different sites</li>
            </ul>

            <h2 class="guides-section-title">Security Best Practices</h2>
            <ul class="guides-list">
                <li>Use a strong master password with at least 12 characters</li>
                <li>Enable key file authentication for additional security</li>
                <li>Backup your database regularly to a secure location</li>
                <li>Keep KeePassXC updated to the latest version</li>
                <li>Lock your database when stepping away from your computer</li>
                <li>Use unique passwords for every online account</li>
                <li>Never share your master password with anyone</li>
                <li>Store sensitive information only in your database</li>
            </ul>

            <h2 class="guides-section-title">Backing Up Your Database</h2>
            <ol class="guides-ordered-list">
                <li>Go to File → Export</li>
                <li>Choose your export format (KDBX recommended)</li>
                <li>Select a secure location for the backup</li>
                <li>Consider storing backups on encrypted external drives</li>
                <li>Keep multiple backup copies in different locations</li>
            </ol>

            <div class="guides-highlight">
                Regular backups protect you against accidental data loss. Store them securely and keep them updated.
            </div>

            <h2 class="guides-section-title">Troubleshooting</h2>

            <h3 class="guides-subtitle">Forgotten Master Password</h3>
            <p>Unfortunately, if you forget your master password, your database is inaccessible. This is by design for security reasons. Keep your password in a safe place.</p>

            <h3 class="guides-subtitle">Database Won't Open</h3>
            <p>If your database won't open, try the following:</p>
            <ul class="guides-list">
                <li>Ensure you're entering the correct master password</li>
                <li>Check that the database file hasn't been corrupted</li>
                <li>Verify you have a recent backup</li>
                <li>Try opening your backup copy</li>
            </ul>

            <h3 class="guides-subtitle">Need Help?</h3>
            <p>For additional support, visit the KeePassXC documentation at <code>https://keepassxc.org/docs/</code></p>
        </div>
    </div>
</div>
@endsection
