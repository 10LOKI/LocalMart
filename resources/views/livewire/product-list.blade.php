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
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .product-card:hover .product-image img {
            transform: scale(1.08);
        }

        .product-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--sage);
            color: white;
            padding: 0.4rem 1rem;
            font-size: 0.75rem;
            letter-spacing: 1px;
            font-weight: 500;
            border-radius: 20px;
        }

        .stock-badge {
            background: var(--terracotta);
        }

        .action-buttons {
            position: absolute;
            top: 15px;
            left: 15px;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            opacity: 0;
            transform: translateX(-10px);
            transition: all 0.3s;
        }

        .product-card:hover .action-buttons {
            opacity: 1;
            transform: translateX(0);
        }

        .action-btn {
            background: var(--soft-white);
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            box-shadow: 0 4px 12px var(--shadow);
            font-size: 1.1rem;
        }

        .action-btn:hover {
            background: var(--charcoal);
            color: var(--cream);
            transform: scale(1.1);
        }

        .product-info {
            padding: 1.5rem;
        }

        .product-category {
            font-size: 0.85rem;
            color: var(--charcoal);
            opacity: 0.6;
            margin-bottom: 0.5rem;
            font-weight: 300;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .product-name {
            font-size: 1.2rem;
            font-weight: 400;
            margin-bottom: 0.75rem;
            color: var(--charcoal);
            min-height: 3rem;
        }

        .product-description {
            font-size: 0.9rem;
            color: var(--charcoal);
            opacity: 0.7;
            margin-bottom: 1.25rem;
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem;
            border-top: 1px solid rgba(42, 42, 42, 0.1);
        }

        .product-price {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.75rem;
            color: var(--charcoal);
            font-weight: 600;
        }

        .stock-info {
            font-size: 0.85rem;
            color: var(--charcoal);
            opacity: 0.6;
        }

        .stock-low {
            color: var(--terracotta);
            opacity: 1;
            font-weight: 500;
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
            z-index: 1000;
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
                    <div class="product-card" style="animation-delay: {{ $index * 0.05 }}s">
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

                            <div class="action-buttons">
                                @if(auth()->user()->hasRole('seller') && $product->seller_id == auth()->id())
                                    <a href="/products/edit/{{ $product->id }}" class="action-btn" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button 
                                        wire:click="delete({{ $product->id }})" 
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

    @if(auth()->user()->hasRole('seller'))
        <div style="position: fixed; bottom: 2rem; right: 2rem;">
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