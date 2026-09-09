@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/erebus/views/guides/monero-guide.css') }}">
@section('content')


<div class="guides-container">
    <div class="guides-card">
        <div class="guides-header">
            <h1 class="guides-title">Monero User Guide</h1>
            <p class="inline-15f95d08d0">A complete guide to understanding and using Monero cryptocurrency</p>
        </div>

        <div class="guides-content">
            <p>Monero is a cryptocurrency designed for private and censorship-resistant transactions. While many other cryptocurrencies like Bitcoin and Ethereum have transparent blockchains where transactions can be tracked, Monero prioritizes user privacy. This means that the identities of senders and receivers, as well as transaction amounts, remain confidential.</p>

            <h2 class="guides-section-title">Core Features of Monero</h2>
            <p>Monero uses several different technologies to ensure user anonymity:</p>
            <ul class="guides-list">
                <li><strong>Stealth Addresses:</strong> These provide one-time addresses for each transaction, preventing transactions from being linked to users.</li>
                <li><strong>Ring Signatures:</strong> This technology mixes the sender's address with others, making it difficult to identify the real sender.</li>
                <li><strong>Ring Confidential Transactions:</strong> This feature adds an extra layer of privacy by hiding transaction amounts.</li>
            </ul>

            <div class="guides-highlight">
                As a result, Monero transactions are private and nearly untraceable, making it a truly fungible currency. Merchants and users don't need to worry about accepting "tainted" coins because all Monero coins are treated equally and are indistinguishable from each other.
            </div>

            <h2 class="guides-section-title">Advantages of Using Monero</h2>
            <p>Monero offers fast and inexpensive payments worldwide with no wire transfer fees, delays, or refund processes. Its decentralized structure is not limited by legal jurisdictions and provides users security from capital controls.</p>

            <p>Feather Wallet is a user-friendly wallet application that makes it easy for Monero users to send, receive, and securely store Monero while maintaining transaction privacy. Feather Wallet is designed with privacy as a priority and offers secure, fast, and practical usage.</p>

            <h2 class="guides-section-title">Downloading and Installing Feather Wallet</h2>

            <h3 class="guides-subtitle">Windows Installation</h3>
            <ol class="guides-ordered-list">
                <li>Go to the Feather Wallet website at <code>https://featherwallet.org</code></li>
                <li>Click the Download button at the top of the page</li>
                <li>Find the Windows installation file and click the Installer button</li>
                <li>After the download completes, go to your Downloads folder</li>
                <li>Right-click on the Feather Wallet file and click Open</li>
                <li>If Microsoft Defender shows a warning, continue by clicking Run</li>
                <li>Select Yes when asked to install Feather Wallet</li>
                <li>Leave the installation folder at default settings and click Next</li>
                <li>Click Install and wait for the process to complete</li>
                <li>Finally, click Finish and ensure Run Feather Wallet is active</li>
            </ol>

            <h3 class="guides-subtitle">Linux Installation</h3>
            <ol class="guides-ordered-list">
                <li>Go to the Feather Wallet website</li>
                <li>Click the Download button at the top of the page</li>
                <li>Find Linux options and look for the x64 AppImage version</li>
                <li>After downloading, go to the folder containing the file</li>
                <li>Right-click on the AppImage file and go to Properties</li>
                <li>Navigate to the Permissions tab and enable the Executable option</li>
                <li>Double-click the AppImage file to launch the program</li>
            </ol>

            <h2 class="guides-section-title">Receiving Monero</h2>
            <p>To receive Monero payments, you need to share your Monero address with the sender. Here's how to get your address:</p>
            <ol class="guides-ordered-list">
                <li>Open Feather Wallet and click the "Receive" tab</li>
                <li>Your primary Monero address will be displayed at the top</li>
                <li>You can copy this address by clicking the copy icon</li>
                <li>Share this address with anyone who wants to send you Monero</li>
                <li>You can also generate additional addresses for different purposes</li>
            </ol>

            <div class="guides-highlight">
                For maximum privacy, you can use a different address for each transaction. This prevents linking multiple transactions to the same identity.
            </div>

            <h3 class="guides-subtitle">Labeling Your Addresses</h3>
            <p>You can assign labels to your addresses to note which address you use for what purpose. Simply right-click on an address and add a description. This helps you organize your transactions and keep track of where payments came from.</p>

            <h3 class="guides-subtitle">Monitoring Incoming Payments</h3>
            <p>View all incoming payments in the "History" tab. Each transaction shows:</p>
            <ul class="guides-list">
                <li><strong>Date:</strong> When the payment was received</li>
                <li><strong>Description:</strong> Any notes you added to the transaction</li>
                <li><strong>Amount:</strong> The amount of Monero received</li>
            </ul>

            <h3 class="guides-subtitle">Transaction Confirmation</h3>
            <p>Incoming Monero transactions remain "unconfirmed" until verified by the network. According to the Monero protocol, transactions need 10 confirmations. This process takes approximately 20-30 minutes on average, during which you cannot spend the unconfirmed coins.</p>

            <div class="guides-highlight">
                When the transaction is fully confirmed, the Monero appears in your wallet irreversibly. A green checkmark indicates the transaction is complete.
            </div>

            <h2 class="guides-section-title">Sending Monero</h2>
            <p>To send Monero payments, follow these steps:</p>
            <ol class="guides-ordered-list">
                <li>Click the "Send" tab in the main Feather Wallet window</li>
                <li>Enter the recipient's Monero address in the "Pay to" field</li>
                <li>Add an optional description for your records</li>
                <li>Enter the amount of Monero you want to send</li>
                <li>Review the transaction fee</li>
                <li>Click Send to complete the transaction</li>
            </ol>

            <div class="guides-highlight">
                Always verify the recipient's address carefully. Copy the first and last 5 characters to confirm before sending.
            </div>

            <h3 class="guides-subtitle">Recipient Address Methods</h3>
            <p>You can obtain the recipient's address in two ways:</p>
            <ul class="guides-list">
                <li><strong>Manual Entry:</strong> Copy the address from a website or email and paste it in the "Pay to" field</li>
                <li><strong>QR Code Scanning:</strong> If a QR code is available, use your camera to scan it automatically</li>
            </ul>

            <h2 class="guides-section-title">Security Best Practices</h2>
            <ul class="guides-list">
                <li>Always download Feather Wallet from the official website</li>
                <li>Verify the signature of downloaded files when possible</li>
                <li>Keep your wallet backup in a secure location</li>
                <li>Use a strong password for wallet encryption</li>
                <li>Never share your private seed phrase with anyone</li>
                <li>Enable two-factor authentication if available</li>
                <li>Keep your operating system and software up to date</li>
                <li>Use Tor Browser for additional privacy when managing your wallet</li>
            </ul>

            <div class="guides-highlight">
                Your seed phrase is the master key to your wallet. If someone gains access to it, they can steal all your Monero. Store it offline in a secure location.
            </div>

            <h2 class="guides-section-title">Troubleshooting</h2>

            <h3 class="guides-subtitle">Slow Synchronization</h3>
            <p>If your wallet is synchronizing slowly, ensure you have a stable internet connection. You can also configure Feather Wallet to use a specific node for faster synchronization.</p>

            <h3 class="guides-subtitle">Transaction Not Confirming</h3>
            <p>If your transaction is not confirming, it may be due to network congestion. Check the Monero network status and wait. Your transaction will eventually be confirmed.</p>

            <h3 class="guides-subtitle">Need Additional Help?</h3>
            <p>For more information and community support, visit the official Monero website at <code>https://www.monero.org</code> or the Feather Wallet documentation.</p>
        </div>
    </div>
</div>
@endsection
