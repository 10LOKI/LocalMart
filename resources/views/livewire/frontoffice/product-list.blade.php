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
            letter-spacing: 1px;
        }

        .results-count {
            font-size: 0.95rem;
            color: var(--charcoal);
            opacity: 0.6;
        }

        /* Product Grid */
        .products-grid {
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
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 60px var(--shadow);
        }

        .product-image-container {
            position: relative;
            width: 100%;
            height: 350px;
            overflow: hidden;
            background: var(--cream);
        }

        .product-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .product-card:hover .product-image {
            transform: scale(1.08);
        }

        .product-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: var(--gold);
            color: var(--charcoal);
            padding: 0.4rem 0.8rem;
            font-size: 0.75rem;
            font-weight: 500;
            letter-spacing: 1px;
            border-radius: 2px;
        }

        .like-btn {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: var(--soft-white);
            color: var(--charcoal);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
            z-index: 10;
        }

        .like-btn:hover {
            background: var(--terracotta);
            color: var(--soft-white);
            transform: scale(1.1);
        }

        .like-btn.liked {
            background: var(--terracotta);
            color: var(--soft-white);
        }

        .product-info {
            padding: 1.5rem;
        }

        .product-category {
            font-size: 0.8rem;
            color: var(--charcoal);
            opacity: 0.6;
            letter-spacing: 2px;
            margin-bottom: 0.5rem;
        }

        .product-name {
            font-size: 1.3rem;
            font-weight: 400;
            margin-bottom: 0.5rem;
            color: var(--charcoal);
        }

        .product-description {
            font-size: 0.9rem;
            color: var(--charcoal);
            opacity: 0.7;
            margin-bottom: 1rem;
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .product-price {
            font-size: 1.4rem;
            font-weight: 500;
            color: var(--charcoal);
        }

        .product-stats {
            display: flex;
            gap: 1rem;
            font-size: 0.85rem;
            color: var(--charcoal);
            opacity: 0.6;
        }

        .product-stat {
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .product-actions {
            display: flex;
            gap: 0.5rem;
        }

        .action-btn {
            flex: 1;
            padding: 0.75rem;
            border: 1px solid var(--charcoal);
            background: transparent;
            color: var(--charcoal);
            font-size: 0.85rem;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .action-btn:hover {
            background: var(--charcoal);
            color: var(--cream);
        }

        .action-btn.primary {
            background: var(--charcoal);
            color: var(--cream);
        }

        .action-btn.primary:hover {
            background: var(--gold);
            border-color: var(--gold);
            color: var(--charcoal);
        }

        .action-btn.danger {
            border-color: var(--terracotta);
            color: var(--terracotta);
        }

        .action-btn.danger:hover {
            background: var(--terracotta);
            color: var(--soft-white);
        }

        /* Modal Styles */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9998;
            padding: 2rem;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .modal-container {
            background: var(--soft-white);
            border-radius: 4px;
            max-width: 1200px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
            animation: slideUp 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.3);
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal-close {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: var(--soft-white);
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            transition: all 0.3s;
            z-index: 10;
        }

        .modal-close:hover {
            background: var(--terracotta);
            color: var(--soft-white);
            transform: rotate(90deg);
        }

        .modal-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            padding: 2rem;
        }

        .modal-image-section {
            position: relative;
        }

        .modal-image {
            width: 100%;
            height: 600px;
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
            left: 1rem;
            background: var(--soft-white);
            color: var(--charcoal);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            transition: all 0.3s;
        }

        .modal-like-btn:hover {
            background: var(--terracotta);
            color: var(--soft-white);
            transform: scale(1.1);
        }

        .modal-like-btn.liked {
            background: var(--terracotta);
            color: var(--soft-white);
        }

        .modal-info-section {
            display: flex;
            flex-direction: column;
        }

        .modal-category {
            font-size: 0.85rem;
            letter-spacing: 2px;
            color: var(--charcoal);
            opacity: 0.6;
            margin-bottom: 0.5rem;
        }

        .modal-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.5rem;
            font-weight: 300;
            margin-bottom: 1rem;
            color: var(--charcoal);
        }

        .modal-price {
            font-size: 2rem;
            font-weight: 500;
            color: var(--gold);
            margin-bottom: 1.5rem;
        }

        .modal-description {
            font-size: 1rem;
            line-height: 1.8;
            color: var(--charcoal);
            opacity: 0.8;
            margin-bottom: 2rem;
        }

        .modal-meta {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
            margin-bottom: 2rem;
            padding: 1.5rem;
            background: var(--cream);
            border-radius: 4px;
        }

        .meta-item {
            display: flex;
            flex-direction: column;
            gap: 0.3rem;
        }

        .meta-label {
            font-size: 0.75rem;
            letter-spacing: 1px;
            color: var(--charcoal);
            opacity: 0.6;
        }

        .meta-value {
            font-size: 1rem;
            font-weight: 500;
            color: var(--charcoal);
        }

        /* Quantity Selector Styles */
        .quantity-selector {
            margin-bottom: 2rem;
        }

        .quantity-label {
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 1px;
            color: var(--charcoal);
            opacity: 0.7;
            margin-bottom: 0.75rem;
            display: block;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .quantity-btn {
            width: 40px;
            height: 40px;
            border: 1px solid rgba(42, 42, 42, 0.2);
            background: var(--cream);
            color: var(--charcoal);
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .quantity-btn:hover {
            background: var(--charcoal);
            color: var(--cream);
            border-color: var(--charcoal);
        }

        .quantity-input {
            width: 80px;
            height: 40px;
            text-align: center;
            border: 1px solid rgba(42, 42, 42, 0.2);
            background: var(--soft-white);
            color: var(--charcoal);
            font-size: 1rem;
            font-family: 'Outfit', sans-serif;
            border-radius: 4px;
        }

        .quantity-input:focus {
            outline: none;
            border-color: var(--gold);
        }

        .modal-actions {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .modal-add-to-cart-btn,
        .modal-checkout-btn {
            flex: 1;
            padding: 1rem;
            border: none;
            font-size: 0.85rem;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .modal-add-to-cart-btn {
            background: var(--charcoal);
            color: var(--cream);
        }

        .modal-add-to-cart-btn:hover {
            background: var(--gold);
            color: var(--charcoal);
        }

        .modal-checkout-btn {
            background: var(--sage);
            color: var(--soft-white);
        }

        .modal-checkout-btn:hover {
            background: var(--terracotta);
        }

        /* Reviews Section */
        .reviews-section {
            margin-top: 3rem;
            padding-top: 3rem;
            border-top: 1px solid rgba(42, 42, 42, 0.1);
        }

        .reviews-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .reviews-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.8rem;
            font-weight: 300;
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
        }

        /* Comment Form */
        .comment-form {
            background: var(--cream);
            padding: 1.5rem;
            border-radius: 4px;
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
            color: var(--charcoal);
            opacity: 0.7;
        }

        .rating-input {
            display: flex;
            gap: 0.5rem;
        }

        .star-btn {
            background: none;
            border: none;
            font-size: 1.5rem;
            color: rgba(42, 42, 42, 0.2);
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
            min-height: 100px;
            padding: 0.75rem;
            border: 1px solid rgba(42, 42, 42, 0.2);
            background: var(--soft-white);
            color: var(--charcoal);
            font-family: 'Outfit', sans-serif;
            font-size: 0.95rem;
            resize: vertical;
            border-radius: 4px;
        }

        .comment-textarea:focus {
            outline: none;
            border-color: var(--gold);
        }

        .submit-btn {
            background: var(--charcoal);
            color: var(--cream);
            padding: 0.75rem 2rem;
            border: none;
            font-size: 0.85rem;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .submit-btn:hover {
            background: var(--gold);
            color: var(--charcoal);
        }

        /* Comments List */
        .comments-list {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .comment-item {
            background: var(--cream);
            padding: 1.5rem;
            border-radius: 4px;
        }

        .comment-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.75rem;
        }

        .comment-author {
            font-weight: 500;
            color: var(--charcoal);
            margin-right: 0.5rem;
        }

        .comment-date {
            font-size: 0.85rem;
            color: var(--charcoal);
            opacity: 0.5;
        }

        .comment-rating {
            color: var(--gold);
            font-size: 0.9rem;
        }

        .delete-comment-btn {
            background: transparent;
            border: none;
            color: var(--terracotta);
            cursor: pointer;
            font-size: 0.9rem;
            padding: 0.25rem 0.5rem;
            transition: all 0.3s;
        }

        .delete-comment-btn:hover {
            color: var(--charcoal);
        }

        .comment-text {
            font-size: 0.95rem;
            line-height: 1.6;
            color: var(--charcoal);
            opacity: 0.8;
        }

        .empty-comments {
            text-align: center;
            padding: 3rem;
            color: var(--charcoal);
            opacity: 0.5;
            font-style: italic;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 6rem 2rem;
        }

        .empty-state-icon {
            font-size: 4rem;
            color: var(--charcoal);
            opacity: 0.2;
            margin-bottom: 1.5rem;
        }

        .empty-state-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2rem;
            font-weight: 300;
            margin-bottom: 0.5rem;
            color: var(--charcoal);
        }

        .empty-state-text {
            font-size: 1rem;
            color: var(--charcoal);
            opacity: 0.6;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .modal-content {
                grid-template-columns: 1fr;
            }

            .modal-image {
                height: 400px;
            }
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .filters-container {
                flex-direction: column;
            }

            .products-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 1.5rem;
            }

            .modal-meta {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <!-- Hero Section -->
    <div class="hero">
        <div class="hero-content">
            <h1 class="hero-title">Curated Collection</h1>
            <p class="hero-subtitle">Discover timeless pieces for modern living</p>
        </div>
    </div>

    <!-- Filters Section -->
    <div class="filters-section">
        <div class="filters-container">
            <div class="filter-group">
                <label class="filter-label">SEARCH</label>
                <input 
                    type="text" 
                    wire:model.live="search" 
                    placeholder="Search products..." 
                    class="search-input"
                >
            </div>
            <div class="filter-group">
                <label class="filter-label">CATEGORY</label>
                <select wire:model.live="selectedCategory" class="filter-select">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="filter-group">
                <label class="filter-label">SORT BY</label>
                <select wire:model.live="sortBy" class="filter-select">
                    <option value="newest">Newest</option>
                    <option value="price_low">Price: Low to High</option>
                    <option value="price_high">Price: High to Low</option>
                    <option value="name">Name</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Products Section -->
    <div class="products-section">
        <div class="section-header">
            <h2 class="section-title">Products</h2>
            <span class="results-count">{{ $products->count() }} {{ $products->count() == 1 ? 'Product' : 'Products' }}</span>
        </div>

        @if($products->count() > 0)
            <div class="products-grid">
                @foreach($products as $product)
                    <div class="product-card" wire:click="preview({{ $product->id }})">
                        <div class="product-image-container">
                            @if($product->photos && $product->photos->count() > 0)
                                <img src="{{ Storage::url($product->photos->first()->image) }}" alt="{{ $product->name }}" class="product-image">
                            @else
                                <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=800&q=80" alt="{{ $product->name }}" class="product-image">
                            @endif
                            
                            @if($product->stock < 10)
                                <div class="product-badge">LOW STOCK</div>
                            @endif

                            @role('customer')
                            <button 
                                wire:click.stop="toggleLike({{ $product->id }})" 
                                class="like-btn {{ $this->isLiked($product->id) ? 'liked' : '' }}"
                            >
                                <i class="fas fa-heart"></i>
                            </button>
                            @endrole
                        </div>
                        
                        <div class="product-info">
                            <div class="product-category">{{ $product->category->name ?? 'UNCATEGORIZED' }}</div>
                            <h3 class="product-name">{{ $product->name }}</h3>
                            <p class="product-description">{{ Str::limit($product->description, 80) }}</p>
                            
                            <div class="product-meta">
                                <span class="product-price">${{ number_format($product->price, 2) }}</span>
                                <div class="product-stats">
                                    <span class="product-stat">
                                        <i class="fas fa-heart"></i> {{ $product->likes->count() }}
                                    </span>
                                    <span class="product-stat">
                                        <i class="fas fa-star"></i> {{ $this->getAverageRating($product) }}
                                    </span>
                                </div>
                            </div>

                            <div class="product-actions">
                                @role('customer')
                                    <button wire:click.stop="addToCart({{ $product->id }})" class="action-btn primary">
                                        <i class="fas fa-shopping-cart"></i> ADD TO CART
                                    </button>
                                @endrole

                                @role('seller')
                                    @if($product->seller_id == auth()->id())
                                        <a href="{{ route('products.edit', $product) }}" class="action-btn">
                                            <i class="fas fa-edit"></i> EDIT
                                        </a>
                                        <button wire:click.stop="delete({{ $product->id }})" class="action-btn danger">
                                            <i class="fas fa-trash"></i> DELETE
                                        </button>
                                    @endif
                                @endrole
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <div class="empty-state-icon">
                    <i class="fas fa-box-open"></i>
                </div>
                <h3 class="empty-state-title">No Products Found</h3>
                <p class="empty-state-text">Try adjusting your filters or search terms</p>
            </div>
        @endif
    </div>

    <!-- Product Modal -->
    @if($showModal && $selectedProduct)
        <div class="modal-overlay" wire:click.self="closeModal">
            <div class="modal-container">
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

                        <!-- Quantity Selector -->
                        @role('customer')
                        <div class="quantity-selector">
                            <label class="quantity-label">QUANTITY</label>
                            <div class="quantity-controls">
                                <button 
                                    wire:click="$set('quantity', quantity > 1 ? quantity - 1 : 1)" 
                                    class="quantity-btn"
                                >
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input 
                                    type="number" 
                                    wire:model="quantity" 
                                    min="1" 
                                    class="quantity-input"
                                >
                                <button 
                                    wire:click="$set('quantity', quantity + 1)" 
                                    class="quantity-btn"
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