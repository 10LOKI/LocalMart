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

        .checkout-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 4rem 2rem;
        }

        .checkout-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .checkout-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 3rem;
            font-weight: 300;
            color: var(--charcoal);
            margin-bottom: 0.5rem;
        }

        .checkout-subtitle {
            font-size: 1rem;
            color: var(--charcoal);
            opacity: 0.6;
            font-weight: 300;
        }

        .checkout-grid {
            display: grid;
            grid-template-columns: 1fr 380px;
            gap: 2rem;
            align-items: start;
        }

        .panel {
            background: var(--soft-white);
            padding: 2rem;
            border-radius: 4px;
            box-shadow: 0 2px 20px var(--shadow);
        }

        .panel-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2rem;
            font-weight: 300;
            margin-bottom: 1.5rem;
            color: var(--charcoal);
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            font-size: 0.85rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--charcoal);
            opacity: 0.6;
            display: block;
            margin-bottom: 0.5rem;
        }

        .form-input {
            width: 100%;
            padding: 0.9rem 1rem;
            border: 1px solid rgba(42, 42, 42, 0.2);
            background: var(--cream);
            color: var(--charcoal);
            font-size: 0.95rem;
            transition: border-color 0.3s;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--gold);
        }

        .error-text {
            color: var(--terracotta);
            font-size: 0.85rem;
            margin-top: 0.4rem;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
            padding: 0.75rem 0;
            border-bottom: 1px solid rgba(42, 42, 42, 0.08);
            font-size: 0.95rem;
        }

        .summary-item strong {
            color: var(--charcoal);
        }

        .summary-total {
            display: flex;
            justify-content: space-between;
            padding-top: 1.5rem;
            font-size: 1.3rem;
            font-weight: 600;
        }

        .place-order-btn {
            width: 100%;
            background: var(--charcoal);
            color: var(--cream);
            padding: 1.1rem;
            font-size: 0.95rem;
            letter-spacing: 2px;
            border: none;
            cursor: pointer;
            text-transform: uppercase;
            font-weight: 500;
            margin-top: 1.5rem;
            transition: all 0.3s;
        }

        .place-order-btn:hover {
            background: var(--gold);
            color: var(--charcoal);
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

        @media (max-width: 968px) {
            .checkout-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">

    <div class="checkout-container">
        <div class="checkout-header">
            <h1 class="checkout-title">Checkout</h1>
            <p class="checkout-subtitle">Enter your shipping details and confirm your order</p>
        </div>

        @if(session('message'))
            <div class="flash-message">
                {{ session('message') }}
            </div>
        @endif

        @if(session('error'))
            <div class="flash-message flash-error">
                {{ session('error') }}
            </div>
        @endif

        <div class="checkout-grid">
            <div class="panel">
                <div class="panel-title">Shipping Details</div>
                <form wire:submit.prevent="placeOrder">
                    <div class="form-group">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-input" wire:model="shipping_name">
                        @error('shipping_name') <div class="error-text">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Phone</label>
                        <input type="text" class="form-input" wire:model="shipping_phone">
                        @error('shipping_phone') <div class="error-text">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-input" wire:model="shipping_address">
                        @error('shipping_address') <div class="error-text">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">City</label>
                        <input type="text" class="form-input" wire:model="shipping_city">
                        @error('shipping_city') <div class="error-text">{{ $message }}</div> @enderror
                    </div>
                    <button type="submit" class="place-order-btn">
                        Place Order
                    </button>
                </form>
            </div>

            <div class="panel">
                <div class="panel-title">Order Summary</div>
                @if($cart && $cart->items->count())
                    @foreach($cart->items as $item)
                        <div class="summary-item">
                            <div>
                                <strong>{{ $item->product->name ?? 'Product' }}</strong>
                                <div>Qty: {{ $item->quantity }}</div>
                            </div>
                            <div>
                                ${{ number_format(($item->product->price ?? 0) * $item->quantity, 2) }}
                            </div>
                        </div>
                    @endforeach
                    <div class="summary-total">
                        <span>Total</span>
                        <span>${{ number_format($total, 2) }}</span>
                    </div>
                @else
                    <p>Your cart is empty.</p>
                @endif
            </div>
        </div>
    </div>
</div>
