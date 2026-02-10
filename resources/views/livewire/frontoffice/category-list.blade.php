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

        .hero {
            height: 40vh;
            background: linear-gradient(135deg, #E8DED2 0%, #FAF7F2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 4rem;
        }

        .hero-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 3.5rem;
            font-weight: 300;
            color: var(--charcoal);
        }

        .categories-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem 6rem;
        }

        .category-section {
            margin-bottom: 5rem;
        }

        .category-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--gold);
        }

        .category-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.5rem;
            font-weight: 300;
            color: var(--charcoal);
        }

        .product-count {
            font-size: 1rem;
            color: var(--charcoal);
            opacity: 0.6;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
        }

        .product-card {
            background: var(--soft-white);
            border-radius: 4px;
            overflow: hidden;
            transition: all 0.3s;
            cursor: pointer;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px var(--shadow);
        }

        .product-image {
            width: 100%;
            height: 250px;
            overflow: hidden;
            background: var(--cream);
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s;
        }

        .product-card:hover .product-image img {
            transform: scale(1.05);
        }

        .product-info {
            padding: 1.5rem;
        }

        .product-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.3rem;
            font-weight: 400;
            margin-bottom: 0.5rem;
            color: var(--charcoal);
        }

        .product-price {
            font-size: 1.25rem;
            font-weight: 500;
            color: var(--gold);
        }

        .empty-category {
            text-align: center;
            padding: 3rem;
            color: var(--charcoal);
            opacity: 0.5;
            font-style: italic;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            .category-title {
                font-size: 2rem;
            }
            .product-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 1.5rem;
            }
        }
    </style>

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">

    <div class="hero">
        <h1 class="hero-title">Shop by Category</h1>
    </div>

    <div class="categories-container">
        @foreach($categories as $category)
            <div class="category-section">
                <div class="category-header">
                    <h2 class="category-title">{{ $category->name }}</h2>
                    <span class="product-count">{{ $category->products_count }} {{ Str::plural('product', $category->products_count) }}</span>
                </div>

                @if($category->products->count() > 0)
                    <div class="product-grid">
                        @foreach($category->products as $product)
                            <a href="{{ route('products.index') }}" class="product-card">
                                <div class="product-image">
                                    @if($product->photos && $product->photos->count() > 0)
                                        <img src="{{ Storage::url($product->photos->first()->image) }}" alt="{{ $product->name }}">
                                    @else
                                        <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=400&q=80" alt="{{ $product->name }}">
                                    @endif
                                </div>
                                <div class="product-info">
                                    <h3 class="product-name">{{ $product->name }}</h3>
                                    <div class="product-price">${{ number_format($product->price, 2) }}</div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <div class="empty-category">No products in this category yet</div>
                @endif
            </div>
        @endforeach
    </div>
</div>
