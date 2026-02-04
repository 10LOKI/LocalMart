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

        .cart-content {
            background: var(--soft-white);
            padding: 3rem;
            border-radius: 4px;
            box-shadow: 0 4px 30px var(--shadow);
        }

        .cart-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-bottom: 2rem;
        }

        .cart-table thead {
            background: var(--cream);
        }

        .cart-table th {
            padding: 1.25rem 1.5rem;
            text-align: left;
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--charcoal);
            border-bottom: 2px solid rgba(42, 42, 42, 0.1);
        }

        .cart-table tbody tr {
            border-bottom: 1px solid rgba(42, 42, 42, 0.05);
            transition: background 0.3s;
        }

        .cart-table tbody tr:hover {
            background: var(--cream);
        }

        .cart-table td {
            padding: 1.5rem;
            color: var(--charcoal);
        }

        .product-name {
            font-weight: 500;
            font-size: 1.05rem;
        }

        .product-price {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.25rem;
            color: var(--gold);
        }

        .product-quantity {
            font-weight: 500;
        }

        .remove-btn {
            background: transparent;
            color: var(--terracotta);
            border: 1px solid var(--terracotta);
            padding: 0.5rem 1.25rem;
            font-size: 0.85rem;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s;
            text-transform: uppercase;
            font-weight: 500;
        }

        .remove-btn:hover {
            background: var(--terracotta);
            color: var(--soft-white);
        }

        .cart-summary {
            display: flex;
            justify-content: flex-end;
            padding-top: 2rem;
            border-top: 2px solid rgba(42, 42, 42, 0.1);
        }

        .cart-total {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2rem;
            font-weight: 400;
            color: var(--charcoal);
        }

        .cart-total span {
            color: var(--gold);
        }

        .empty-cart {
            text-align: center;
            padding: 6rem 2rem;
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

        @media (max-width: 768px) {
            .cart-container {
                padding: 2rem 1rem;
            }

            .cart-content {
                padding: 1.5rem;
            }

            .cart-title {
                font-size: 2rem;
            }

            .cart-table {
                display: block;
                overflow-x: auto;
            }

            .cart-table th,
            .cart-table td {
                padding: 1rem;
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

        @if($cart && $cart->items->count())
            <div class="cart-content">
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart->items as $item)
                        <tr>
                            <td class="product-name">{{ $item->product->name }}</td>
                            <td class="product-price">${{ number_format($item->product->price, 2) }}</td>
                            <td class="product-quantity">{{ $item->quantity }}</td>
                            <td>
                                <button wire:click="remove({{ $item->id }})" class="remove-btn">
                                    Remove
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="cart-summary">
                    <p class="cart-total">Total: <span>${{ number_format($total, 2) }}</span></p>
                </div>
            </div>
        @else
            <div class="cart-content">
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