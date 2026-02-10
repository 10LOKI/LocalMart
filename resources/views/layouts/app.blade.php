<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lumière - Premium Shopping</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
    <style>
        :root {
            --cream: #FAF7F2;
            --charcoal: #2A2A2A;
            --gold: #D4AF37;
            --sage: #9CAF88;
            --terracotta: #C97757;
            --soft-white: #FFFFFF;
            --shadow: rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: var(--cream);
            color: var(--charcoal);
        }

        /* Navigation */
        nav {
            position: sticky;
            top: 0;
            width: 100%;
            padding: 1.5rem 4rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(250, 247, 242, 0.95);
            backdrop-filter: blur(10px);
            z-index: 1000;
            border-bottom: 1px solid rgba(42, 42, 42, 0.1);
            box-shadow: none !important;
        }

        .logo {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.75rem;
            font-weight: 300;
            letter-spacing: 2px;
            color: var(--charcoal);
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 2.5rem;
            align-items: center;
        }

        .nav-links a,
        .nav-links button {
            text-decoration: none;
            color: var(--charcoal);
            font-weight: 300;
            font-size: 0.95rem;
            letter-spacing: 1px;
            position: relative;
            transition: color 0.3s;
            background: none;
            border: none;
            cursor: pointer;
            font-family: 'Outfit', sans-serif;
        }

        .nav-links a:not(.logo):not(.profile-trigger)::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 1px;
            background: var(--gold);
            transition: width 0.3s ease;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .nav-links .text-red-500 {
            color: var(--terracotta) !important;
        }

        .nav-links .text-red-500:hover {
            opacity: 0.7;
        }

        /* Cart Badge */
        .cart-link {
            position: relative;
        }

        /* Profile Dropdown */
        .profile-dropdown {
            position: relative;
        }

        .profile-trigger {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            cursor: pointer;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            transition: all 0.3s;
            border: 1px solid transparent;
        }

        .profile-trigger:hover {
            background: var(--soft-white);
            border-color: rgba(42, 42, 42, 0.1);
        }

        .profile-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--gold), var(--sage));
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--soft-white);
            font-weight: 600;
            font-size: 0.9rem;
            letter-spacing: 0;
        }

        .profile-info {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .profile-name {
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--charcoal);
            letter-spacing: 0;
        }

        .profile-role {
            font-size: 0.75rem;
            color: var(--charcoal);
            opacity: 0.6;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .dropdown-menu {
            position: absolute;
            top: calc(100% + 1rem);
            right: 0;
            background: var(--soft-white);
            border-radius: 8px;
            box-shadow: 0 8px 32px var(--shadow);
            min-width: 240px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            z-index: 1000;
            border: 1px solid rgba(42, 42, 42, 0.1);
        }

        .profile-dropdown:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-header {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(42, 42, 42, 0.1);
        }

        .dropdown-header-name {
            font-size: 1rem;
            font-weight: 600;
            color: var(--charcoal);
            margin-bottom: 0.25rem;
        }

        .dropdown-header-email {
            font-size: 0.85rem;
            color: var(--charcoal);
            opacity: 0.6;
        }

        .dropdown-section {
            padding: 0.5rem 0;
        }

        .dropdown-section-title {
            padding: 0.75rem 1.5rem;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--charcoal);
            opacity: 0.5;
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1.5rem;
            color: var(--charcoal);
            text-decoration: none;
            transition: all 0.2s;
            font-size: 0.9rem;
        }

        .dropdown-item:hover {
            background: var(--cream);
            padding-left: 2rem;
        }

        .dropdown-item i {
            width: 20px;
            opacity: 0.6;
        }

        .dropdown-divider {
            height: 1px;
            background: rgba(42, 42, 42, 0.1);
            margin: 0.5rem 0;
        }

        .dropdown-logout {
            color: var(--terracotta);
            background: none;
            border: none;
            width: 100%;
            text-align: left;
            font-family: 'Outfit', sans-serif;
            cursor: pointer;
        }

        .dropdown-logout:hover {
            background: rgba(201, 119, 87, 0.1);
        }

        /* Footer */
        footer {
            padding: 4rem 4rem 2rem;
            background: var(--soft-white);
            margin-top: 4rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 4rem;
            margin-bottom: 3rem;
            max-width: 1400px;
            margin-left: auto;
            margin-right: auto;
        }

        .footer-brand {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2rem;
            margin-bottom: 1rem;
            color: var(--charcoal);
        }

        .footer-desc {
            font-size: 0.9rem;
            line-height: 1.6;
            color: var(--charcoal);
            opacity: 0.7;
            font-weight: 300;
        }

        .footer-section h4 {
            font-size: 1rem;
            margin-bottom: 1.5rem;
            font-weight: 500;
            letter-spacing: 1px;
            color: var(--charcoal);
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.75rem;
        }

        .footer-links a {
            text-decoration: none;
            color: var(--charcoal);
            opacity: 0.7;
            font-size: 0.9rem;
            transition: opacity 0.3s;
            font-weight: 300;
        }

        .footer-links a:hover {
            opacity: 1;
        }

        .footer-bottom {
            border-top: 1px solid rgba(42, 42, 42, 0.1);
            padding-top: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.85rem;
            color: var(--charcoal);
            opacity: 0.6;
            max-width: 1400px;
            margin-left: auto;
            margin-right: auto;
        }

        .social-links {
            display: flex;
            gap: 1.5rem;
        }

        .social-links a {
            color: var(--charcoal);
            opacity: 0.6;
            transition: opacity 0.3s;
            font-size: 1.2rem;
            text-decoration: none;
        }

        .social-links a:hover {
            opacity: 1;
        }

        /* Responsive */
        @media (max-width: 768px) {
            nav {
                padding: 1rem 2rem;
                flex-direction: column;
                gap: 1rem;
            }
            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
                gap: 1rem;
            }
            .profile-info {
                display: none;
            }
            .footer-content {
                grid-template-columns: 1fr;
                gap: 2rem;
                padding: 0 2rem;
            }
            footer {
                padding: 3rem 2rem 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav>
        <a href="/" class="logo">LUMIÈRE</a>
        
        @auth
        <div class="nav-links">
            <a href="/categories">CATEGORIES</a>
            <a href="/products">PRODUCTS</a>
            <a href="/my-orders">MY ORDERS</a>
            <a href="/reviews">REVIEWS</a>
            <a href="/cart" class="cart-link flex items-center gap-2">
                <i class="fa-solid fa-cart-shopping"></i>
                <span>CART</span>
            </a>
            
            <!-- Profile Dropdown -->
            <div class="profile-dropdown">
                <div class="profile-trigger">
                    <div class="profile-avatar">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <div class="profile-info">
                        <span class="profile-name">{{ auth()->user()->name }}</span>
                        <span class="profile-role">
                            @if(auth()->user()->hasRole('admin'))
                                Admin
                            @elseif(auth()->user()->hasRole('seller'))
                                Seller
                                @elseif(auth()->user()->hasRole('moderator'))
                                Moderator
                            @else
                                Customer
                            @endif
                        </span>
                    </div>
                    <i class="fa-solid fa-chevron-down" style="font-size: 0.75rem; opacity: 0.6;"></i>
                </div>

                <div class="dropdown-menu">
                    <!-- User Info Header -->
                    <div class="dropdown-header">
                        <div class="dropdown-header-name">{{ auth()->user()->name }}</div>
                        <div class="dropdown-header-email">{{ auth()->user()->email }}</div>
                    </div>

                    <!-- Account Section -->
                    <div class="dropdown-section">
                        <div class="dropdown-section-title">Account</div>
                        <a href="/profile" class="dropdown-item">
                            <i class="fa-solid fa-user"></i>
                            <span>My Profile</span>
                        </a>
                        <a href="/my-orders" class="dropdown-item">
                            <i class="fa-solid fa-receipt"></i>
                            <span>My Orders</span>
                        </a>
                        <a href="/cart" class="dropdown-item">
                            <i class="fa-solid fa-shopping-cart"></i>
                            <span>Shopping Cart</span>
                        </a>
                    </div>

                    <div class="dropdown-divider"></div>

                    <!-- Role-Based Section -->
                    @if(auth()->user()->hasRole('admin'))
                    <div class="dropdown-section">
                        <div class="dropdown-section-title">Admin</div>
                        <a href="/categories" class="dropdown-item">
                            <i class="fa-solid fa-tags"></i>
                            <span>Manage Categories</span>
                        </a>
                        <a href="/admin/dashboard" class="dropdown-item">
                            <i class="fa-solid fa-chart-line"></i>
                            <span>Dashboard</span>
                        </a>
                    </div>
                    <div class="dropdown-divider"></div>
                    @endif

                    @if(auth()->user()->hasRole('seller'))
                    <div class="dropdown-section">
                        <div class="dropdown-section-title">Seller</div>
                        <a href="/products" class="dropdown-item">
                            <i class="fa-solid fa-box"></i>
                            <span>My Products</span>
                        </a>
                        <a href="/products/create" class="dropdown-item">
                            <i class="fa-solid fa-plus-circle"></i>
                            <span>Add Product</span>
                        </a>
                        <a href="/my-orders" class="dropdown-item">
                            <i class="fa-solid fa-truck"></i>
                            <span>Manage Orders</span>
                        </a>
                    </div>
                    <div class="dropdown-divider"></div>
                    @endif

                    <!-- Logout -->
                    <div class="dropdown-section">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item dropdown-logout">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="nav-links">
            <a href="/login">LOGIN</a>
            <a href="/register">REGISTER</a>
        </div>
        @endauth
    </nav>

    <!-- Main Content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div>
                <div class="footer-brand">LUMIÈRE</div>
                <p class="footer-desc">Elevating everyday moments with carefully curated products that inspire and delight.</p>
            </div>
            <div class="footer-section">
                <h4>SHOP</h4>
                <ul class="footer-links">
                    <li><a href="/products">All Products</a></li>
                    <li><a href="/categories">Categories</a></li>
                    <li><a href="#">New Arrivals</a></li>
                    <li><a href="#">Sale</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>HELP</h4>
                <ul class="footer-links">
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Shipping</a></li>
                    <li><a href="#">Returns</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>ACCOUNT</h4>
                <ul class="footer-links">
                    @auth
                    <li><a href="/my-orders">My Orders</a></li>
                    <li><a href="/cart">My Cart</a></li>
                    <li><a href="/profile">Profile</a></li>
                    @else
                    <li><a href="/login">Login</a></li>
                    <li><a href="/register">Register</a></li>
                    @endauth
                    <li><a href="#">Privacy</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2024 Lumière. All rights reserved.</p>
            <div class="social-links">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-pinterest-p"></i></a>
            </div>
        </div>
    </footer>

    @livewireScripts
</body>
</html>