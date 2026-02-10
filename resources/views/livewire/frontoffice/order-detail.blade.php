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

        .detail-container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 4rem 2rem;
        }

        .detail-card {
            background: var(--soft-white);
            padding: 3rem;
            border-radius: 4px;
            box-shadow: 0 4px 30px var(--shadow);
        }

        .detail-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.6rem;
            font-weight: 300;
            color: var(--charcoal);
            margin-bottom: 0.5rem;
        }

        .detail-subtitle {
            font-size: 1rem;
            color: var(--charcoal);
            opacity: 0.6;
            margin-bottom: 2rem;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .detail-section h3 {
            font-size: 0.85rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--charcoal);
            opacity: 0.6;
            margin-bottom: 0.75rem;
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

        .back-link {
            margin-top: 2rem;
            display: inline-block;
            color: var(--charcoal);
            text-decoration: none;
            border: 1px solid var(--charcoal);
            padding: 0.7rem 1.4rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.85rem;
            transition: all 0.3s;
        }

        .back-link:hover {
            background: var(--charcoal);
            color: var(--cream);
        }

        @media (max-width: 768px) {
            .detail-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">

    <div class="detail-container">
        <div class="detail-card">
            <h1 class="detail-title">Order #{{ $order->order_number }}</h1>
            <p class="detail-subtitle">Placed on {{ $order->created_at->format('M d, Y') }}</p>

            <div class="detail-grid">
                <div class="detail-section">
                    <h3>Status</h3>
                    <p>{{ ucfirst(str_replace('_', ' ', $order->status)) }}</p>
                </div>
                <div class="detail-section">
                    <h3>Shipping</h3>
                    <p>{{ $order->shipping_name }}</p>
                    <p>{{ $order->shipping_phone }}</p>
                    <p>{{ $order->shipping_address }}</p>
                    <p>{{ $order->shipping_city }}</p>
                </div>
            </div>

            <div class="detail-section">
                <h3>Items</h3>
                @foreach($order->items as $item)
                    <div class="item-row">
                        <div>{{ $item->product->name ?? 'Product' }} (x{{ $item->quantity }})</div>
                        <div>${{ number_format($item->price * $item->quantity, 2) }}</div>
                    </div>
                @endforeach
                <div class="total-row">
                    <span>Total</span>
                    <span>${{ number_format($order->total, 2) }}</span>
                </div>
            </div>

            <a href="{{ route('my-orders.index') }}" class="back-link">Back to Orders</a>
        </div>
    </div>
</div>
