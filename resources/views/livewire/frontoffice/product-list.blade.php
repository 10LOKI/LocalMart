<div>
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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Outfit', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--cream);
            color: var(--charcoal);
        }

        /* Navigation Override */
        nav.bg-white {
            background: rgba(250, 247, 242, 0.95) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(42, 42, 42, 0.1);
            box-shadow: none !important;
        }

        nav a {
            font-weight: 300;
            font-size: 0.95rem;
            letter-spacing: 1px;
            transition: color 0.3s;
            position: relative;
        }

        nav a:not(form button)::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 1px;
            background: var(--gold);
            transition: width 0.3s ease;
        }

        nav a:hover::after {
            width: 100%;
        }

        nav .text-xl {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.75rem;
            font-weight: 300;
            letter-spacing: 2px;
        }

        /* Hero Section */
        .hero {
            height: 50vh;
            background: linear-gradient(135deg, #E8DED2 0%, #FAF7F2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            margin-bottom: 4rem;
        }

        .hero-content {
            text-align: center;
            animation: fadeInUp 0.8s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 4rem;
            font-weight: 300;
            line-height: 1.1;
            margin-bottom: 1rem;
            color: var(--charcoal);
        }

        .hero-subtitle {
            font-size: 1.1rem;
            font-weight: 300;
            color: var(--charcoal);
            opacity: 0.8;
        }

        /* Filters Section */
        .filters-section {
            max-width: 1400px;
            margin: 0 auto 3rem;
            padding: 0 2rem;
        }

        .filters-container {
            background: var(--soft-white);
            padding: 2rem;
            border-radius: 4px;
            display: flex;
            gap: 2rem;
            align-items: center;
            box-shadow: 0 2px 20px var(--shadow);
        }

        .filter-group {
            flex: 1;
        }

        .filter-label {
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
            color: var(--charcoal);
            opacity: 0.7;
        }

        .filter-select {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid rgba(42, 42, 42, 0.2);
            background: var(--cream);
            color: var(--charcoal);
            font-size: 0.95rem;
            font-family: 'Outfit', sans-serif;
            transition: border-color 0.3s;
            cursor: pointer;
        }

        .filter-select:focus {
            outline: none;
            border-color: var(--gold);
        }

        .search-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid rgba(42, 42, 42, 0.2);
            background: var(--cream);
            color: var(--charcoal);
            font-size: 0.95rem;
            font-family: 'Outfit', sans-serif;
            transition: border-color 0.3s;
        }

        .search-input::placeholder {
            color: rgba(42, 42, 42, 0.4);
        }

        .search-input:focus {
            outline: none;
            border-color: var(--gold);
        }

        /* Products Section */
        .products-section {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem 6rem;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 3rem;
        }

        .section-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.5rem;
            font-weight: 300;
            color: var(--charcoal);
        }

        .product-count {
            font-size: 1rem;
            color: var(--charcoal);
            opacity: 0.6;
            font-weight: 300;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2.5rem;
        }

        .product-card {
            background: var(--soft-white);
            border-radius: 4px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            position: relative;
            animation: fadeIn 0.6s ease-out both;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 60px rgba(0,0,0,0.15);
        }

        .product-image {
            width: 100%;
            height: 350px;
            overflow: hidden;
            position: relative;
            background: var(--cream);
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .product-card:hover .product-image img {
            transform: scale(1.08);
        }

        .product-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            padding: 0.4rem 1rem;
            font-size: 0.75rem;
            font-weight: 500;
            letter-spacing: 1px;
            border-radius: 2px;
            z-index: 2;
        }

        .stock-badge {
            background: var(--terracotta);
            color: white;
        }

        .action-buttons {
            position: absolute;
            top: 1rem;
            right: 1rem;
            display: flex;
            gap: 0.5rem;
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.3s;
            z-index: 3;
        }

        .product-card:hover .action-buttons {
            opacity: 1;
            transform: translateY(0);
        }

        .action-btn {
            width: 40px;
            height: 40px;
            background: var(--soft-white);
            border: none;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
            color: var(--charcoal);
            text-decoration: none;
        }

        .action-btn:hover {
            background: var(--gold);
            color: white;
            transform: scale(1.1);
        }

        .product-info {
            padding: 1.5rem;
        }

        .product-category {
            font-size: 0.8rem;
            font-weight: 500;
            letter-spacing: 1.5px;
            color: var(--gold);
            margin-bottom: 0.5rem;
        }

        .product-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.5rem;
            font-weight: 400;
            margin-bottom: 0.75rem;
            color: var(--charcoal);
            line-height: 1.3;
        }

        .product-description {
            font-size: 0.9rem;
            line-height: 1.6;
            color: var(--charcoal);
            opacity: 0.7;
            margin-bottom: 1rem;
        }

        .product-footer {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid rgba(42, 42, 42, 0.1);
        }

        .card-actions {
            margin-top: 1.5rem;
            display: flex;
            gap: 0.75rem;
        }

        .view-btn, .add-to-cart-btn {
            flex: 1;
            padding: 0.75rem 1rem;
            border: none;
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s;
            font-family: 'Outfit', sans-serif;
        }

        .view-btn {
            background: var(--charcoal);
            color: var(--cream);
        }

        .view-btn:hover {
            background: var(--gold);
            color: var(--charcoal);
        }

        .add-to-cart-btn {
            background: var(--sage);
            color: var(--soft-white);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .add-to-cart-btn:hover {
            background: var(--terracotta);
        }

        .modal-actions {
            display: flex;
            gap: 1rem;
            margin: 2rem 0;
        }

        .modal-add-to-cart-btn, .modal-checkout-btn {
            flex: 1;
            padding: 1rem 1.5rem;
            border: none;
            font-size: 0.9rem;
            font-weight: 500;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s;
            font-family: 'Outfit', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .modal-add-to-cart-btn {
            background: var(--sage);
            color: var(--soft-white);
        }

        .modal-add-to-cart-btn:hover {
            background: var(--terracotta);
        }

        .modal-checkout-btn {
            background: var(--gold);
            color: var(--charcoal);
        }

        .modal-checkout-btn:hover {
            background: var(--charcoal);
            color: var(--cream);
        }

        .product-price {
            font-size: 1.75rem;
            font-weight: 400;
            color: var(--charcoal);
        }

        .stock-info {
            font-size: 0.85rem;
            color: var(--sage);
            font-weight: 500;
        }

        .stock-low {
            color: var(--terracotta);
            opacity: 1;
            font-weight: 500;
        }

        /* Like Button on Card */
        .like-btn {
            position: absolute;
            bottom: 1rem;
            right: 1rem;
            background: var(--soft-white);
            border: none;
            border-radius: 50%;
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 12px var(--shadow);
            z-index: 2;
        }

        .like-btn:hover {
            transform: scale(1.1);
            background: var(--terracotta);
            color: white;
        }

        .like-btn.liked {
            background: var(--terracotta);
            color: white;
        }

        .like-btn i {
            font-size: 1.1rem;
        }

        /* Modal Styles */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(42, 42, 42, 0.8);
            backdrop-filter: blur(5px);
            z-index: 9998;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            animation: fadeInOverlay 0.3s ease-out;
        }

        @keyframes fadeInOverlay {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .modal-container {
            background: var(--soft-white);
            border-radius: 8px;
            max-width: 1100px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            animation: scaleIn 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.3);
        }

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.9) translateY(20px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        .modal-close {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            background: var(--charcoal);
            color: var(--cream);
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
            z-index: 10;
        }

        .modal-close:hover {
            background: var(--gold);
            transform: rotate(90deg);
        }

        .modal-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            padding: 3rem;
        }

        .modal-image-section {
            position: relative;
        }

        .modal-image {
            width: 100%;
            height: 500px;
            border-radius: 4px;
            overflow: hidden;
            background: var(--cream);
        }

        .modal-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .modal-like-btn {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: var(--soft-white);
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 20px var(--shadow);
        }

        .modal-like-btn:hover {
            transform: scale(1.1);
            background: var(--terracotta);
            color: white;
        }

        .modal-like-btn.liked {
            background: var(--terracotta);
            color: white;
        }

        .modal-like-btn i {
            font-size: 1.3rem;
        }

        .modal-info-section {
            display: flex;
            flex-direction: column;
        }

        .modal-category {
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 1.5px;
            color: var(--gold);
            margin-bottom: 0.5rem;
        }

        .modal-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.5rem;
            font-weight: 400;
            margin-bottom: 1rem;
            color: var(--charcoal);
            line-height: 1.2;
        }

        .modal-price {
            font-size: 2rem;
            font-weight: 500;
            color: var(--charcoal);
            margin-bottom: 1rem;
        }

        .modal-description {
            font-size: 1rem;
            line-height: 1.8;
            color: var(--charcoal);
            opacity: 0.8;
            margin-bottom: 1.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid rgba(42, 42, 42, 0.1);
        }

        .modal-meta {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .meta-item {
            background: var(--cream);
            padding: 1rem;
            border-radius: 4px;
        }

        .meta-label {
            font-size: 0.8rem;
            font-weight: 500;
            letter-spacing: 1px;
            color: var(--charcoal);
            opacity: 0.6;
            margin-bottom: 0.3rem;
        }

        .meta-value {
            font-size: 1.1rem;
            font-weight: 500;
            color: var(--charcoal);
        }

        /* Quantity Control */
        .quantity-control {
            margin: 2rem 0;
        }

        .quantity-label {
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 1px;
            margin-bottom: 0.75rem;
            color: var(--charcoal);
            opacity: 0.7;
        }

        .quantity-selector {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .quantity-btn {
            width: 45px;
            height: 45px;
            border: 1px solid rgba(42, 42, 42, 0.2);
            background: var(--soft-white);
            color: var(--charcoal);
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .quantity-btn:hover:not(:disabled) {
            background: var(--charcoal);
            color: var(--cream);
            border-color: var(--charcoal);
        }

        .quantity-btn:disabled {
            opacity: 0.4;
            cursor: not-allowed;
        }

        .quantity-display {
            width: 80px;
            height: 45px;
            border: 1px solid rgba(42, 42, 42, 0.2);
            background: var(--cream);
            color: var(--charcoal);
            font-size: 1.1rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Reviews Section */
        .reviews-section {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(42, 42, 42, 0.1);
        }

        .reviews-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .reviews-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.5rem;
            font-weight: 400;
            color: var(--charcoal);
        }

        .rating-summary {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .rating-number {
            font-size: 1.5rem;
            font-weight: 500;
            color: var(--gold);
        }

        .rating-stars {
            color: var(--gold);
            font-size: 1rem;
        }

        .rating-count {
            font-size: 0.9rem;
            color: var(--charcoal);
            opacity: 0.6;
            margin-left: 0.5rem;
        }

        /* Comment Form */
        .comment-form {
            background: var(--cream);
            padding: 1.5rem;
            border-radius: 4px;
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-label {
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--charcoal);
            margin-bottom: 0.5rem;
            display: block;
        }

        .rating-input {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .star-btn {
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #ddd;
            cursor: pointer;
            transition: all 0.2s;
        }

        .star-btn:hover,
        .star-btn.active {
            color: var(--gold);
            transform: scale(1.1);
        }

        .comment-textarea {
            width: 100%;
            padding: 1rem;
            border: 1px solid rgba(42, 42, 42, 0.2);
            background: var(--soft-white);
            color: var(--charcoal);
            font-size: 0.95rem;
            font-family: 'Outfit', sans-serif;
            border-radius: 4px;
            resize: vertical;
            min-height: 100px;
            transition: border-color 0.3s;
        }

        .comment-textarea:focus {
            outline: none;
            border-color: var(--gold);
        }

        .submit-btn {
            background: var(--charcoal);
            color: var(--cream);
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 4px;
            font-size: 0.95rem;
            font-weight: 500;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .submit-btn:hover {
            background: var(--gold);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px var(--shadow);
        }

        /* Comments List */
        .comments-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            max-height: 300px;
            overflow-y: auto;
            padding-right: 0.5rem;
        }

        .comment-item {
            background: var(--cream);
            padding: 1rem;
            border-radius: 4px;
            position: relative;
        }

        .comment-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.5rem;
        }

        .comment-author {
            font-weight: 500;
            color: var(--charcoal);
            font-size: 0.95rem;
        }

        .comment-rating {
            color: var(--gold);
            font-size: 0.9rem;
        }

        .comment-date {
            font-size: 0.8rem;
            color: var(--charcoal);
            opacity: 0.5;
            margin-left: 0.5rem;
        }

        .comment-text {
            font-size: 0.9rem;
            line-height: 1.6;
            color: var(--charcoal);
            opacity: 0.8;
        }

        .delete-comment-btn {
            background: none;
            border: none;
            color: var(--terracotta);
            cursor: pointer;
            font-size: 0.85rem;
            padding: 0.3rem;
            opacity: 0.7;
            transition: opacity 0.3s;
        }

        .delete-comment-btn:hover {
            opacity: 1;
        }

        .empty-comments {
            text-align: center;
            padding: 2rem;
            color: var(--charcoal);
            opacity: 0.5;
            font-style: italic;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 6rem 2rem;
        }

        .empty-icon {
            font-size: 5rem;
            margin-bottom: 1rem;
            opacity: 0.3;
        }

        .empty-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2rem;
            font-weight: 300;
            margin-bottom: 0.5rem;
            color: var(--charcoal);
        }

        .empty-text {
            font-size: 1rem;
            color: var(--charcoal);
            opacity: 0.6;
        }

        /* Success/Error Messages */
        .flash-message {
            position: fixed;
            top: 100px;
            right: 2rem;
            background: var(--sage);
            color: white;
            padding: 1rem 2rem;
            border-radius: 4px;
            box-shadow: 0 10px 40px var(--shadow);
            animation: slideInRight 0.3s ease-out;
            z-index: 10000;
        }

        @keyframes slideInRight {
            from {
                transform: translateX(400px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            .filters-container {
                flex-direction: column;
                gap: 1rem;
            }
            .product-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 1.5rem;
            }
            .products-section,
            .filters-section {
                padding-left: 1rem;
                padding-right: 1rem;
            }
            .modal-content {
                grid-template-columns: 1fr;
                padding: 2rem;
                gap: 2rem;
            }
            .modal-image {
                height: 300px;
            }
        }

        /* Loading State */
        .loading {
            opacity: 0.6;
            pointer-events: none;
        }

        /* Wire Loading Indicator */
        [wire\:loading] {
            opacity: 0.6;
        }

        /* Scrollbar Styling */
        .comments-list::-webkit-scrollbar {
            width: 6px;
        }

        .comments-list::-webkit-scrollbar-track {
            background: var(--cream);
            border-radius: 3px;
        }

        .comments-list::-webkit-scrollbar-thumb {
            background: var(--gold);
            border-radius: 3px;
        }
    </style>

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Hero Section -->
    <div class="hero">
        <div class="hero-content">
            <h1 class="hero-title">Our Collection</h1>
            <p class="hero-subtitle">Discover handpicked products crafted with care</p>
        </div>
    </div>

    <!-- Filters Section -->
    <div class="filters-section">
        <div class="filters-container">
            <div class="filter-group">
                <div class="filter-label">SEARCH</div>
                <input 
                    type="text" 
                    class="search-input" 
                    placeholder="Search products..."
                    wire:model.live="search"
                >
            </div>
            <div class="filter-group">
                <div class="filter-label">CATEGORY</div>
                <select class="filter-select" wire:model.live="selectedCategory">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="filter-group">
                <div class="filter-label">SORT BY</div>
                <select class="filter-select" wire:model.live="sortBy">
                    <option value="newest">Newest First</option>
                    <option value="price_low">Price: Low to High</option>
                    <option value="price_high">Price: High to Low</option>
                    <option value="name">Name A-Z</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Flash Message -->
    @if (session()->has('message'))
        <div class="flash-message" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
            {{ session('message') }}
        </div>
    @endif

    <!-- Products Section -->
    <div class="products-section">
        <div class="section-header">
            <h2 class="section-title">
                @if($selectedCategory)
                    {{ $categories->find($selectedCategory)->name ?? 'Products' }}
                @else
                    All Products
                @endif
            </h2>
            <div class="product-count">{{ count($products) }} {{ Str::plural('product', count($products)) }}</div>
        </div>

        @if(count($products) > 0)
            <div class="product-grid">
                @foreach($products as $index => $product)
                    <div class="product-card" style="animation-delay: {{ $index * 0.05 }}s" wire:click="preview({{ $product->id }})">
                        <div class="product-image">
                            @if($product->photos && $product->photos->count() > 0)
                                <img src="{{ Storage::url($product->photos->first()->image) }}" alt="{{ $product->name }}">
                            @else
                                <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=400&q=80" alt="{{ $product->name }}">
                            @endif
                            
                            @if($product->stock < 10 && $product->stock > 0)
                                <span class="product-badge stock-badge">LOW STOCK</span>
                            @elseif($product->stock == 0)
                                <span class="product-badge stock-badge">OUT OF STOCK</span>
                            @endif

                            <!-- Like Button on Card -->
                            @role('customer')
                            <button 
                                wire:click.stop="toggleLike({{ $product->id }})" 
                                class="like-btn {{ $this->isLiked($product->id) ? 'liked' : '' }}"
                                title="{{ $this->isLiked($product->id) ? 'Unlike' : 'Like' }}"
                            >
                                <i class="fas fa-heart"></i>
                            </button>
                            @endrole
                            <!-- Action Buttons (Edit/Delete for sellers) -->
                            <div class="action-buttons" onclick="event.stopPropagation()">
                                @if(auth()->user()->hasRole('seller') && $product->seller_id == auth()->id())
                                    <a href="/products/edit/{{ $product->id }}" class="action-btn" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button 
                                        wire:click.stop="delete({{ $product->id }})" 
                                        class="action-btn" 
                                        title="Delete"
                                        onclick="return confirm('Are you sure you want to delete this product?')"
                                    >
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                @endif
                            </div>
                        </div>

                        <div class="product-info">
                            <div class="product-category">{{ $product->category->name ?? 'Uncategorized' }}</div>
                            <h3 class="product-name">{{ $product->name }}</h3>
                            <p class="product-description">{{ Str::limit($product->description, 80) }}</p>
                            
                            <div class="product-footer">
                                <div>
                                    <div class="product-price">${{ number_format($product->price, 2) }}</div>
                                    <div class="stock-info {{ $product->stock < 10 ? 'stock-low' : '' }}">
                                        {{ $product->stock }} in stock
                                    </div>
                                </div>
                                <div style="display: flex; align-items: center; gap: 0.5rem;">
                                    <span style="color: var(--gold); font-size: 0.9rem;">
                                        <i class="fas fa-heart"></i> {{ $product->likes->count() }}
                                    </span>
                                    <span style="color: var(--charcoal); opacity: 0.6; font-size: 0.9rem;">
                                        <i class="fas fa-comment"></i> {{ $product->reviews->count() }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <div class="empty-icon"><i class="fas fa-box-open"></i></div>
                <h3 class="empty-title">No Products Found</h3>
                <p class="empty-text">Try adjusting your filters or search terms</p>
            </div>
        @endif
    </div>

    <!-- Product Detail Modal -->
    @if($showModal && $selectedProduct)
        <div class="modal-overlay" wire:click="closeModal">
            <div class="modal-container" wire:click.stop>
                <button wire:click="closeModal" class="modal-close">
                    <i class="fas fa-times"></i>
                </button>

                <div class="modal-content">
                    <!-- Image Section -->
                    <div class="modal-image-section">
                        <div class="modal-image">
                            @if($selectedProduct->photos && $selectedProduct->photos->count() > 0)
                                <img src="{{ Storage::url($selectedProduct->photos->first()->image) }}" alt="{{ $selectedProduct->name }}">
                            @else
                                <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=800&q=80" alt="{{ $selectedProduct->name }}">
                            @endif
                        </div>
                        
                        <!-- Like Button on Modal -->
                        @role('customer')
                        <button 
                            wire:click="toggleLike({{ $selectedProduct->id }})" 
                            class="modal-like-btn {{ $this->isLiked($selectedProduct->id) ? 'liked' : '' }}"
                        >
                            <i class="fas fa-heart"></i>
                        </button>
                        @endrole
                    </div>
                    
                    <!-- Info Section -->
                    <div class="modal-info-section">
                        <div class="modal-category">{{ $selectedProduct->category->name ?? 'Uncategorized' }}</div>
                        <h2 class="modal-title">{{ $selectedProduct->name }}</h2>
                        <div class="modal-price">${{ number_format($selectedProduct->price, 2) }}</div>
                        <p class="modal-description">{{ $selectedProduct->description }}</p>

                        <!-- Meta Information -->
                        <div class="modal-meta">
                            <div class="meta-item">
                                <div class="meta-label">STOCK</div>
                                <div class="meta-value">{{ $selectedProduct->stock }} units</div>
                            </div>
                            <div class="meta-item">
                                <div class="meta-label">SELLER</div>
                                <div class="meta-value">{{ $selectedProduct->seller->name ?? 'Unknown' }}</div>
                            </div>
                            <div class="meta-item">
                                <div class="meta-label">LIKES</div>
                                <div class="meta-value">{{ $selectedProduct->likes->count() }}</div>
                            </div>
                            <div class="meta-item">
                                <div class="meta-label">REVIEWS</div>
                                <div class="meta-value">{{ $selectedProduct->reviews->count() }}</div>
                            </div>
                        </div>

                        <!-- Quantity Control -->
                        @role('customer')
                            <div class="quantity-control">
                                <div class="quantity-label">QUANTITY</div>
                                <div class="quantity-selector">
                                    <button 
                                        wire:click="decrementQuantity" 
                                        class="quantity-btn"
                                        {{ $quantity <= 1 ? 'disabled' : '' }}
                                    >
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <div class="quantity-display">{{ $quantity }}</div>
                                    <button 
                                        wire:click="incrementQuantity" 
                                        class="quantity-btn"
                                        {{ $quantity >= $selectedProduct->stock ? 'disabled' : '' }}
                                    >
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        @endrole

                        <!-- Action Buttons -->
                        @role('customer')
                            <div class="modal-actions">
                                <button wire:click="addToCart({{ $selectedProduct->id }})" class="modal-add-to-cart-btn">
                                    <i class="fas fa-shopping-cart"></i> ADD TO CART
                                </button>
                                <button wire:click="checkout" class="modal-checkout-btn">
                                    <i class="fas fa-credit-card"></i> CHECKOUT
                                </button>
                            </div>
                        @endrole

                        <!-- Reviews Section -->
                        <div class="reviews-section">
                            <div class="reviews-header">
                                <h3 class="reviews-title">Reviews & Ratings</h3>
                                @if($selectedProduct->reviews->count() > 0)
                                    <div class="rating-summary">
                                        <span class="rating-number">{{ $this->getAverageRating($selectedProduct) }}</span>
                                        <span class="rating-stars">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $this->getAverageRating($selectedProduct))
                                                    <i class="fas fa-star"></i>
                                                @else
                                                    <i class="far fa-star"></i>
                                                @endif
                                            @endfor
                                        </span>
                                        <span class="rating-count">({{ $selectedProduct->reviews->count() }})</span>
                                    </div>
                                @endif
                            </div>

                            <!-- Comment Form -->
                            @role('customer')
                            <div class="comment-form">
                                <div class="form-group">
                                    <label class="form-label">Your Rating</label>
                                    <div class="rating-input">
                                        @for($i = 1; $i <= 5; $i++)
                                            <button 
                                                type="button" 
                                                wire:click="$set('newRating', {{ $i }})"
                                                class="star-btn {{ $newRating >= $i ? 'active' : '' }}"
                                            >
                                                <i class="fas fa-star"></i>
                                            </button>
                                        @endfor
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Your Review</label>
                                    <textarea 
                                        wire:model="newComment" 
                                        class="comment-textarea" 
                                        placeholder="Share your thoughts about this product..."
                                    ></textarea>
                                </div>
                                <button wire:click="submitComment" class="submit-btn">
                                    SUBMIT REVIEW
                                </button>
                            </div>
                            @endrole

                            <!-- Comments List -->
                            @if($selectedProduct->reviews->count() > 0)
                                <div class="comments-list">
                                    @foreach($selectedProduct->reviews->sortByDesc('created_at') as $review)
                                        <div class="comment-item">
                                            <div class="comment-header">
                                                <div>
                                                    <span class="comment-author">{{ $review->user->name }}</span>
                                                    <span class="comment-date">{{ $review->created_at->diffForHumans() }}</span>
                                                </div>
                                                <div style="display: flex; align-items: center; gap: 0.5rem;">
                                                    <span class="comment-rating">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            @if($i <= $review->rating)
                                                                <i class="fas fa-star"></i>
                                                            @else
                                                                <i class="far fa-star"></i>
                                                            @endif
                                                        @endfor
                                                    </span>
                                                    @if($review->user_id == auth()->id())
                                                        <button 
                                                            wire:click="deleteComment({{ $review->id }})" 
                                                            class="delete-comment-btn"
                                                            title="Delete"
                                                        >
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                            <p class="comment-text">{{ $review->comment }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="empty-comments">
                                    No reviews yet. Be the first to review this product!
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Floating Add Button (for sellers) -->
    @if(auth()->user()->hasRole('seller'))
        <div style="position: fixed; bottom: 2rem; right: 2rem; z-index: 9997;">
            <a 
                href="/products/create" 
                style="
                    background: var(--charcoal);
                    color: var(--cream);
                    width: 60px;
                    height: 60px;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 1.5rem;
                    text-decoration: none;
                    box-shadow: 0 10px 40px var(--shadow);
                    transition: all 0.3s;
                "
                onmouseover="this.style.transform='scale(1.1) rotate(90deg)'; this.style.background='var(--gold)'"
                onmouseout="this.style.transform='scale(1) rotate(0deg)'; this.style.background='var(--charcoal)'"
                title="Add New Product"
            >
                <i class="fas fa-plus"></i>
            </a>
        </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</div>