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

        .order-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 4rem 2rem;
        }

        .order-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .order-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 3rem;
            font-weight: 300;
            color: var(--charcoal);
            margin-bottom: 0.5rem;
        }

        .order-number {
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

        .order-content {
            background: var(--soft-white);
            padding: 3rem;
            border-radius: 4px;
            box-shadow: 0 4px 30px var(--shadow);
        }

        .order-info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
            padding-bottom: 3rem;
            border-bottom: 2px solid rgba(42, 42, 42, 0.1);
        }

        .info-item {
            background: var(--cream);
            padding: 1.5rem;
            border-radius: 4px;
        }

        .info-label {
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--charcoal);
            opacity: 0.6;
            margin-bottom: 0.75rem;
        }

        .info-value {
            font-size: 1.25rem;
            color: var(--charcoal);
            font-weight: 500;
        }

        .info-value.total {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2rem;
            color: var(--gold);
            font-weight: 500;
        }

        .status-control {
            margin-bottom: 3rem;
            padding: 2rem;
            background: var(--cream);
            border-radius: 4px;
        }

        .status-control-title {
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--charcoal);
            margin-bottom: 1.5rem;
        }

        .status-form {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .status-select {
            flex: 1;
            padding: 1rem 1.25rem;
            border: 1px solid rgba(42, 42, 42, 0.2);
            background: var(--soft-white);
            color: var(--charcoal);
            font-size: 1rem;
            font-family: 'Outfit', sans-serif;
            transition: all 0.3s;
            border-radius: 2px;
            cursor: pointer;
        }

        .status-select:focus {
            outline: none;
            border-color: var(--gold);
        }

        .btn-update {
            background: var(--charcoal);
            color: var(--cream);
            padding: 1rem 3rem;
            font-size: 0.95rem;
            letter-spacing: 2px;
            border: none;
            cursor: pointer;
            transition: all 0.4s;
            font-weight: 500;
            text-transform: uppercase;
            position: relative;
            overflow: hidden;
        }

        .btn-update::before {
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

        .btn-update:hover::before {
            left: 0;
        }

        .btn-update:hover {
            color: var(--charcoal);
        }

        .items-section-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2rem;
            font-weight: 300;
            color: var(--charcoal);
            margin-bottom: 2rem;
        }

        .items-grid {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .item-card {
            background: var(--cream);
            padding: 1.5rem;
            border-radius: 4px;
            display: grid;
            grid-template-columns: 1fr auto auto;
            gap: 2rem;
            align-items: center;
        }

        .product-name {
            font-weight: 500;
            font-size: 1.1rem;
            color: var(--charcoal);
        }

        .product-price {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.5rem;
            color: var(--gold);
            text-align: center;
        }

        .product-quantity {
            background: var(--soft-white);
            padding: 0.75rem 1.5rem;
            border-radius: 4px;
            font-weight: 600;
            color: var(--charcoal);
            text-align: center;
        }

        /*the button dial l cancel */
        .btn-cancel {
            background: var(--terracotta);
            color: var(--soft-white);
            padding: 1rem 3rem;
            font-size: 0.95rem;
            letter-spacing: 2px;
            border: none;
            cursor: pointer;
            transition: all 0.4s;
            font-weight: 500;
            text-transform: uppercase;
            margin-top: 2rem;
            width: 100%;
        }

        .btn-cancel:hover {
            background: #A85A3A;
        }

        .btn-cancel:disabled {
            background: #ccc;
            cursor: not-allowed;
        }

        .error-message {
            background: var(--terracotta);
            color: white;
            padding: 1rem 2rem;
            border-radius: 4px;
            margin-bottom: 2rem;
            text-align: center;
            font-weight: 500;
        }
        @media (max-width: 768px) {
            .order-container {
                padding: 2rem 1rem;
            }

            .order-content {
                padding: 2rem 1.5rem;
            }

            .order-title {
                font-size: 2rem;
            }

            .order-info-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .status-form {
                flex-direction: column;
            }

            .status-select,
            .btn-update {
                width: 100%;
            }

            .item-card {
                grid-template-columns: 1fr;
                gap: 1rem;
                text-align: center;
            }
        }
    </style>

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <div class="order-container">
        <div class="order-header">
            <h1 class="order-title">Order Details</h1>
            <p class="order-number">Order #{{ $order->order_number }}</p>
        </div>

        @if(session('message'))
            <div class="flash-message">
                <i class="fas fa-check-circle"></i> {{ session('message') }}
            </div>
        @endif

        <div class="order-content">
            <div class="order-info-grid">
                <div class="info-item">
                    <span class="info-label">Customer</span>
                    <span class="info-value">{{ $order->user->name }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Total Amount</span>
                    <span class="info-value total">${{ number_format($order->total, 2) }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Delivery Address</span>
                    <span class="info-value">{{ $order->address }}</span>
                </div>
            </div>

            @can('update order status')
            <div class="status-control">
                <div class="status-control-title">Update Order Status</div>
                <div class="status-form">
                    <select wire:model="status" class="status-select">
                        <option value="on_hold">On Hold</option>
                        <option value="paid">Paid</option>
                        <option value="delivered">Delivered</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                    <button wire:click="updateStatus" class="btn-update">
                        Update Status
                    </button>
                </div>
            </div>
            @endcan

            <h3 class="items-section-title">Order Items</h3>
            <div class="items-grid">
                @foreach($order->items as $item)
                    <div class="item-card">
                        <div class="product-name">
                            <i class="fas fa-box"></i> {{ $item->product->name }}
                        </div>
                        <div class="product-price">${{ number_format($item->price, 2) }}</div>
                        <div class="product-quantity">
                            Qty: {{ $item->quantity }}
                        </div>
                    </div>
                @endforeach
            </div>

            @if(session('error'))
                <div class="error-message">
                    <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                </div>
            @endif

            @if(auth()->user()->hasRole('customer') && $order->user_id === auth()->id() && $order->status === 'on_hold')
                <button wire:click="cancelOrder" class="btn-cancel" 
                        wire:confirm="Are you sure you want to cancel this order? Stock will be restored.">
                    <i class="fas fa-times-circle"></i> Cancel Order
                </button>
            @endif
        </div>
    </div>
</div>