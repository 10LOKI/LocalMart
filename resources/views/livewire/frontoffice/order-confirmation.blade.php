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

        .confirm-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 4rem 2rem;
        }

        .confirm-card {
            background: var(--soft-white);
            padding: 3rem;
            border-radius: 4px;
            box-shadow: 0 4px 30px var(--shadow);
        }

        .confirm-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.8rem;
            font-weight: 300;
            color: var(--charcoal);
            margin-bottom: 0.5rem;
        }

        .confirm-subtitle {
            font-size: 1rem;
            color: var(--charcoal);
            opacity: 0.6;
            margin-bottom: 2rem;
        }

        .confirm-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .confirm-section h3 {
            font-size: 0.85rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--charcoal);
            opacity: 0.6;
            margin-bottom: 0.75rem;
        }

        .confirm-section p {
            margin: 0.2rem 0;
            color: var(--charcoal);
        }

        .items-list {
            margin-top: 1.5rem;
            border-top: 1px solid rgba(42, 42, 42, 0.1);
            padding-top: 1.5rem;
        }

        .item-row {
            display: flex;
            justify-content: space-between;
            padding: 0.75rem 0;
            border-bottom: 1px solid rgba(42, 42, 42, 0.08);
        }

        .item-row:last-child {
            border-bottom: none;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            font-size: 1.2rem;
            font-weight: 600;
            margin-top: 1.5rem;
        }

        .confirm-actions {
            margin-top: 2rem;
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn {
            padding: 0.9rem 1.6rem;
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.85rem;
            transition: all 0.3s;
        }

        .btn-primary {
            background: var(--charcoal);
            color: var(--cream);
        }

        .btn-primary:hover {
            background: var(--gold);
            color: var(--charcoal);
        }

        .btn-outline {
            border: 1px solid var(--charcoal);
            color: var(--charcoal);
        }

        .btn-outline:hover {
            background: var(--charcoal);
            color: var(--cream);
        }

        @media (max-width: 768px) {
            .confirm-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">

    <div class="confirm-container">
        <div class="confirm-card">
            <h1 class="confirm-title">Order Confirmed</h1>
            <p class="confirm-subtitle">Thank you for your purchase. Your order has been placed successfully.</p>

            <div class="confirm-grid">
                <div class="confirm-section">
                    <h3>Order Info</h3>
                    <p><strong>Order Number:</strong> {{ $order->order_number }}</p>
                    <p><strong>Status:</strong> {{ ucfirst(str_replace('_', ' ', $order->status)) }}</p>
                    <p><strong>Date:</strong> {{ $order->created_at->format('M d, Y') }}</p>
                </div>
                <div class="confirm-section">
                    <h3>Shipping</h3>
                    <p>{{ $order->shipping_name }}</p>
                    <p>{{ $order->shipping_phone }}</p>
                    <p>{{ $order->shipping_address }}</p>
                    <p>{{ $order->shipping_city }}</p>
                </div>
            </div>

            <div class="items-list">
                @foreach($order->items as $item)
                    <div class="item-row">
                        <div>{{ $item->product?->name ?? 'Deleted Product' }} (x{{ $item->quantity }})</div>
                        <div>${{ number_format($item->price * $item->quantity, 2) }}</div>
                    </div>
                @endforeach
                <div class="total-row">
                    <span>Total</span>
                    <span>${{ number_format($order->total, 2) }}</span>
                </div>
            </div>

            <div class="confirm-actions">
                <a href="{{ route('my-orders.show', $order->id) }}" class="btn btn-primary">View Order</a>
                <a href="{{ route('products.index') }}" class="btn btn-outline">Continue Shopping</a>
            </div>
        </div>
    </div>
</div>
