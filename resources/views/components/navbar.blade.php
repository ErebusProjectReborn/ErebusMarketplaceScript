<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<nav class="navbar">
    

    <!-- Sponsorship Banner -->
    <div class="sponsor-banner">
        <a href="/home">
            <img src="{{ asset('images/logo.png') }}" alt="Erebus Marketplace Script">
            <span class="sponsor-banner-text">Welcome to <strong>Erebus Marketplace Script</strong> - A rewritten and upgraded version of Kabus Marketplace Script by Sukunetsiz. Running on the latest variant of Laravel 12 updated from Laravel 11 and a completely rewritten design.</span>
        </a>
    </div>

    <div class="navbar-container">
        <div class="navbar-left">
            <a href="{{ route('home') }}" class="navbar-logo">
            Erebus Marketplace Script
            </a>
            
            @auth
                <a href="{{ route('home') }}" class="navbar-btn">
                    <img src="{{ asset('icons/home.png') }}" alt="Home inline-9095aec1c2">
                    HOME
                </a>
                <a href="{{ route('products.index') }}" class="navbar-btn">
                🔎 SEARCH
                </a>
                <a href="{{ route('orders.index') }}" class="navbar-btn">
                <img src="{{ asset('icons/orders.png') }}" alt="Orders inline-9095aec1c2">
                ORDERS
            </a>
            <a href="{{ route('profile') }}" class="navbar-btn">
            <img src="{{ asset('icons/account.png') }}" alt="Account inline-9095aec1c2">
                ACCOUNT
            </a>
            <a href="{{ route('support.index') }}" class="navbar-btn">
            <img src="{{ asset('icons/support.png') }}" alt="Support inline-9095aec1c2">
                SUPPORT
            </a>
            @endauth
        </div>

        <div class="navbar-right">
            @auth
                <a href="{{ route('cart.index') }}" class="navbar-icon-btn" title="Shopping Cart">
                    <img src="{{ asset('icons/cart.png') }}" alt="Cart">
                    @if(auth()->user()->cartItems()->count() > 0)
                        <span class="navbar-badge">{{ auth()->user()->cartItems()->count() }}</span>
                    @endif
                </a>
                <a href="{{ route('messages.index') }}" class="navbar-btn">
            	    <img src="{{ asset('icons/messages.png') }} inline-9095aec1c2">
                </a>
		<a href="{{ route('wishlist.index') }}" class="navbar-btn">
                    <img src="{{ asset('icons/wishlist.png') }} inline-9095aec1c2">
                </a>
                <a href="{{ route('notifications.index') }}" class="navbar-icon-btn" title="Notifications">
                    <img src="{{ asset('icons/notifications.png') }}" alt="Notifications">
                    @if(auth()->user()->unread_notifications_count > 0)
                        <span class="navbar-badge">{{ auth()->user()->unread_notifications_count }}</span>
                    @endif
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST inline-434fc32ec2">
                    @csrf
                    <button type="submit" class="navbar-btn navbar-btn-logout" title="Logout">
                        LOGOUT
                        <img src="{{ asset('icons/logout.png') }}" alt="Logout inline-45999d0623">
                    </button>
                </form>
            @endauth
        </div>
    </div>
</nav>


