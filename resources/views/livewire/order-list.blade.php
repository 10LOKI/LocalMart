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

        .orders-card {
            background: var(--soft-white);
            padding: 3rem;
            border-radius: 4px;
            box-shadow: 0 4px 30px var(--shadow);
        }

        .orders-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .orders-table thead {
            background: var(--cream);
        }

        .orders-table th {
            padding: 1.25rem 1.5rem;
            text-align: left;
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--charcoal);
            border-bottom: 2px solid rgba(42, 42, 42, 0.1);
        }

        .orders-table tbody tr {
            border-bottom: 1px solid rgba(42, 42, 42, 0.05);
            transition: background 0.3s;
        }

        .orders-table tbody tr:hover {
            background: var(--cream);
        }

        .orders-table td {
            padding: 1.5rem;
            color: var(--charcoal);
        }

        .order-number {
            font-weight: 600;
            font-size: 1.05rem;
            color: var(--charcoal);
        }

        .customer-name {
            font-weight: 400;
        }

        .order-total {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.25rem;
            color: var(--gold);
            font-weight: 500;
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

        .btn-view {
            color: var(--sage);
            border: 1px solid var(--sage);
            padding: 0.5rem 1.25rem;
            font-size: 0.85rem;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s;
            text-transform: uppercase;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
        }

        .btn-view:hover {
            background: var(--sage);
            color: var(--soft-white);
        }

        .empty-state {
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
        }

        @media (max-width: 768px) {
            .orders-container {
                padding: 2rem 1rem;
            }

            .orders-card {
                padding: 1.5rem;
            }

            .orders-title {
                font-size: 2rem;
            }

            .orders-table {
                display: block;
                overflow-x: auto;
            }

            .orders-table th,
            .orders-table td {
                padding: 1rem;
                font-size: 0.9rem;
            }
        }
    </style>

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <div class="orders-container">
        <div class="orders-header">
            <h1 class="orders-title">Orders</h1>
            <p class="orders-subtitle">Manage all customer orders</p>
        </div>

        <div class="orders-card">
            @if(count($orders) > 0)
                <table class="orders-table">
                    <thead>
                        <tr>
                            <th>Order Number</th>
                            <th>Customer</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th style="text-align: right;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td class="order-number">#{{ $order->order_number }}</td>
                            <td class="customer-name">{{ $order->user->name }}</td>
                            <td class="order-total">${{ number_format($order->total, 2) }}</td>
                            <td>
                                <span class="order-status status-{{ $order->status }}">
                                    {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                                </span>
                            </td>
                            <td style="text-align: right;">
                                <a href="/orders/{{ $order->id }}" class="btn-view">
                                    <i class="fas fa-eye"></i> View Details
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-receipt"></i>
                    </div>
                    <h3 class="empty-title">No Orders Yet</h3>
                    <p class="empty-text">Orders will appear here once customers make purchases</p>
                </div>
            @endif
        </div>
    </div>
</div>