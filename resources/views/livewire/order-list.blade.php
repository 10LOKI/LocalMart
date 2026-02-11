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

        .orders-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 4rem 2rem;
        }

        .orders-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .orders-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 3rem;
            font-weight: 300;
            color: var(--charcoal);
            margin-bottom: 0.5rem;
        }

        .orders-subtitle {
            font-size: 1rem;
            color: var(--charcoal);
            opacity: 0.6;
            font-weight: 300;
        }

        .orders-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
        }

        .order-card {
            background: var(--soft-white);
            padding: 2rem;
            border-radius: 4px;
            box-shadow: 0 2px 20px var(--shadow);
            transition: transform 0.3s, box-shadow 0.3s;
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .order-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 40px var(--shadow);
        }

        .order-card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .order-number {
            font-weight: 600;
            font-size: 1.25rem;
            color: var(--charcoal);
        }

        .order-status {
            display: inline-block;
            padding: 0.5rem 1rem;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            border-radius: 20px;
        }

        .status-on_hold {
            background: rgba(212, 175, 55, 0.15);
            color: var(--gold);
        }

        .status-paid {
            background: rgba(156, 175, 136, 0.15);
            color: var(--sage);
        }

        .status-delivered {
            background: rgba(42, 42, 42, 0.1);
            color: var(--charcoal);
        }

        .status-cancelled {
            background: rgba(201, 119, 87, 0.15);
            color: var(--terracotta);
        }

        .order-info {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 0;
            border-bottom: 1px solid rgba(42, 42, 42, 0.05);
        }

        .info-label {
            font-size: 0.85rem;
            color: var(--charcoal);
            opacity: 0.6;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .info-value {
            font-size: 1rem;
            color: var(--charcoal);
            font-weight: 500;
        }

        .customer-name {
            font-size: 1.1rem;
        }

        .order-total {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.75rem;
            color: var(--gold);
            font-weight: 500;
        }

        .btn-view {
            width: 100%;
            color: var(--soft-white);
            background: var(--sage);
            padding: 1rem 1.5rem;
            font-size: 0.9rem;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s;
            text-transform: uppercase;
            font-weight: 500;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            border: none;
        }

        .btn-view:hover {
            background: var(--charcoal);
        }

        .empty-state {
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
        }

        @media (max-width: 768px) {
            .orders-container {
                padding: 2rem 1rem;
            }

            .orders-title {
                font-size: 2rem;
            }

            .orders-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <div class="orders-container">
        <div class="orders-header">
            <h1 class="orders-title">Orders</h1>
            <p class="orders-subtitle">Manage all your orders</p>
        </div>

        @if(count($orders) > 0)
            <div class="orders-grid">
                @foreach($orders as $order)
                    <div class="order-card">
                        <div class="order-card-header">
                            <div class="order-number">#{{ $order->order_number }}</div>
                            <span class="order-status status-{{ $order->status }}">
                                {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                            </span>
                        </div>

                        <div class="order-info">
                            <div class="info-row">
                                <span class="info-label">Customer</span>
                                <span class="info-value customer-name">{{ $order->user->name }}</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Total</span>
                                <span class="order-total">${{ number_format($order->total, 2) }}</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Date</span>
                                <span class="info-value">{{ $order->created_at->format('M d, Y') }}</span>
                            </div>
                        </div>

                        <a href="/orders/{{ $order->id }}" class="btn-view">
                            <i class="fas fa-eye"></i> View Details
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="orders-grid">
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-receipt"></i>
                    </div>
                    <h3 class="empty-title">No Orders Yet</h3>
                    <p class="empty-text">Orders will appear here once you make purchases</p>
                </div>
            </div>
        @endif
    </div>
</div>