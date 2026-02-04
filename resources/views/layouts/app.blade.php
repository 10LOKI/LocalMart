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

        .nav-links a:not(.logo)::after {
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
            <a href="/orders">ORDERS</a>
            <a href="/reviews">REVIEWS</a>
            <a href="/cart">CART</a>
            
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="text-red-500">LOGOUT</button>
            </form>
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
                    <li><a href="/orders">My Orders</a></li>
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