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

        .cart-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 4rem 2rem;
        }

        .cart-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .cart-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 3rem;
            font-weight: 300;
            color: var(--charcoal);
            margin-bottom: 0.5rem;
        }

        .cart-subtitle {
            font-size: 1rem;
            color: var(--charcoal);
            opacity: 0.6;
            font-weight: 300;
        }

        .flash-message {
            background: var(--sage);
            color: white;
            padding: 1rem 2rem;
            border-radius: 4px;
            margin-bottom: 2rem;
            text-align: center;
            font-weight: 500;
        }

        .flash-error {
            background: var(--terracotta);
        }

        .cart-grid {
            display: grid;
            grid-template-columns: 1fr 350px;
            gap: 2rem;
            align-items: start;
        }

        .cart-items {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .cart-item-card {
            background: var(--soft-white);
            padding: 2rem;
            border-radius: 4px;
            box-shadow: 0 2px 20px var(--shadow);
            display: grid;
            grid-template-columns: 100px 1fr auto;
            gap: 1.5rem;
            align-items: center;
            transition: transform 0.3s;
        }

        .cart-item-card:hover {
            transform: translateY(-2px);
        }

        .item-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 4px;
            background: var(--cream);
        }

        .item-details {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .item-name {
            font-size: 1.25rem;
            font-weight: 500;
            color: var(--charcoal);
        }

        .item-price {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.5rem;
            color: var(--gold);
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-top: 0.5rem;
        }

        .qty-btn {
            background: var(--cream);
            border: 1px solid rgba(42, 42, 42, 0.2);
            width: 30px;
            height: 30px;
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }

        .qty-btn:hover {
            background: var(--charcoal);
            color: var(--soft-white);
        }

        .qty-display {
            font-size: 1rem;
            font-weight: 600;
            color: var(--charcoal);
            min-width: 40px;
            text-align: center;
        }

        .item-actions {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            align-items: flex-end;
        }

        .item-subtotal {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.75rem;
            color: var(--charcoal);
            font-weight: 500;
        }

        .remove-btn {
            background: transparent;
            color: var(--terracotta);
            border: 1px solid var(--terracotta);
            padding: 0.5rem 1.5rem;
            font-size: 0.85rem;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s;
            text-transform: uppercase;
            font-weight: 500;
            border-radius: 2px;
        }

        .remove-btn:hover {
            background: var(--terracotta);
            color: var(--soft-white);
        }

        .cart-summary {
            background: var(--soft-white);
            padding: 2rem;
            border-radius: 4px;
            box-shadow: 0 4px 30px var(--shadow);
            position: sticky;
            top: 2rem;
        }

        .summary-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2rem;
            font-weight: 300;
            margin-bottom: 2rem;
            color: var(--charcoal);
        }

        .summary-line {
            display: flex;
            justify-content: space-between;
            padding: 1rem 0;
            border-bottom: 1px solid rgba(42, 42, 42, 0.1);
        }

        .summary-label {
            font-size: 0.95rem;
            color: var(--charcoal);
            opacity: 0.7;
        }

        .summary-value {
            font-size: 1rem;
            color: var(--charcoal);
            font-weight: 500;
        }

        .summary-total {
            display: flex;
            justify-content: space-between;
            padding: 2rem 0 0;
            border-top: 2px solid rgba(42, 42, 42, 0.1);
            margin-top: 1rem;
        }

        .total-label {
            font-size: 1.25rem;
            font-weight: 500;
            color: var(--charcoal);
        }

        .total-value {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.5rem;
            color: var(--gold);
            font-weight: 500;
        }

        .checkout-btn {
            width: 100%;
            background: var(--charcoal);
            color: var(--cream);
            padding: 1.25rem;
            font-size: 1rem;
            letter-spacing: 2px;
            border: none;
            cursor: pointer;
            transition: all 0.4s;
            text-transform: uppercase;
            font-weight: 500;
            margin-top: 2rem;
            position: relative;
            overflow: hidden;
        }

        .checkout-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--gold);
            transition: left 0.4s;
            z-index: -1;
        }

        .checkout-btn:hover::before {
            left: 0;
        }

        .checkout-btn:hover {
            color: var(--charcoal);
        }

        .checkout-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .continue-shopping {
            width: 100%;
            background: transparent;
            color: var(--sage);
            padding: 1rem;
            font-size: 0.9rem;
            letter-spacing: 1px;
            border: 1px solid var(--sage);
            cursor: pointer;
            transition: all 0.3s;
            text-transform: uppercase;
            font-weight: 500;
            margin-top: 1rem;
            text-align: center;
            text-decoration: none;
            display: block;
        }

        .continue-shopping:hover {
            background: var(--sage);
            color: var(--soft-white);
        }

        .empty-cart {
            grid-column: 1 / -1;
            text-align: center;
            padding: 6rem 2rem;
            background: var(--soft-white);
            border-radius: 4px;
            box-shadow: 0 4px 30px var(--shadow);
        }

        .empty-icon {
            font-size: 5rem;
            margin-bottom: 1.5rem;
            color: var(--charcoal);
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
            margin-bottom: 2rem;
        }

        .btn-shop {
            display: inline-block;
            background: var(--charcoal);
            color: var(--cream);
            padding: 1rem 3rem;
            font-size: 0.95rem;
            letter-spacing: 2px;
            text-decoration: none;
            text-transform: uppercase;
            transition: all 0.4s;
            font-weight: 500;
            position: relative;
            overflow: hidden;
        }

        .btn-shop::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--gold);
            transition: left 0.4s;
            z-index: -1;
        }

        .btn-shop:hover::before {
            left: 0;
        }

        .btn-shop:hover {
            color: var(--charcoal);
        }

        @media (max-width: 968px) {
            .cart-grid {
                grid-template-columns: 1fr;
            }

            .cart-summary {
                position: static;
            }

            .cart-item-card {
                grid-template-columns: 80px 1fr;
                gap: 1rem;
            }

            .item-actions {
                grid-column: 2;
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
            }
        }
    </style>

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <div class="cart-container">
        <div class="cart-header">
            <h1 class="cart-title">Shopping Cart</h1>
            <p class="cart-subtitle">Review your selected items</p>
        </div>

        @if(session('message'))
            <div class="flash-message">
                <i class="fas fa-check-circle"></i> {{ session('message') }}
            </div>
        @endif

        @if(session('error'))
            <div class="flash-message flash-error">
                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
            </div>
        @endif

        @if($cart && $cart->items->count())
            <div class="cart-grid">
                <div class="cart-items">
                    @foreach($cart->items as $item)
                        <div class="cart-item-card">
                            @if($item->product->photos->first())
                                <img src="{{ asset('storage/' . $item->product->photos->first()->image) }}" alt="{{ $item->product->name }}" class="item-image">
                            @else
                                <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=200&q=80" alt="{{ $item->product->name }}" class="item-image">
                            @endif
                            
                            <div class="item-details">
                                <div class="item-name">{{ $item->product->name }}</div>
                                <div class="item-price">${{ number_format($item->price, 2) }}</div>
                                
                                <div class="quantity-controls">
                                    <button wire:click="updateQuantity({{ $item->id }}, {{ $item->quantity - 1 }})" class="qty-btn">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <span class="qty-display">{{ $item->quantity }}</span>
                                    <button wire:click="updateQuantity({{ $item->id }}, {{ $item->quantity + 1 }})" class="qty-btn">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="item-actions">
                                <div class="item-subtotal">${{ number_format($item->price * $item->quantity, 2) }}</div>
                                <button wire:click="remove({{ $item->id }})" class="remove-btn">
                                    <i class="fas fa-trash-alt"></i> Remove
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="cart-summary">
                    <h2 class="summary-title">Order Summary</h2>
                    
                    <div class="summary-line">
                        <span class="summary-label">Items ({{ $cart->items->count() }})</span>
                        <span class="summary-value">${{ number_format($total, 2) }}</span>
                    </div>

                    <div class="summary-total">
                        <span class="total-label">Total</span>
                        <span class="total-value">${{ number_format($total, 2) }}</span>
                    </div>

                    <button wire:click="checkout" class="checkout-btn">
                        <i class="fas fa-lock"></i> Proceed to Checkout
                    </button>

                    <a href="/products" class="continue-shopping">
                        <i class="fas fa-arrow-left"></i> Continue Shopping
                    </a>
                </div>
            </div>
        @else
            <div class="cart-grid">
                <div class="empty-cart">
                    <div class="empty-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h3 class="empty-title">Your Cart is Empty</h3>
                    <p class="empty-text">Discover our collection and add items to your cart</p>
                    <a href="/products" class="btn-shop">Continue Shopping</a>
                </div>
            </div>
        @endif
    </div>
</div>