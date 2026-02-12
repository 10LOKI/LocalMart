<div>
    @if($count > 0)
    <span class="cart-count-badge">{{ $count > 99 ? '99+' : $count }}</span>
    @endif

    <style>
        .cart-count-badge {
            position: absolute;
            top: -12px;
            right: -12px;
            background: linear-gradient(135deg, #D4AF37, #C9A961);
            color: #2A2A2A;
            font-size: 0.65rem;
            font-weight: 700;
            padding: 0.2rem 0.45rem;
            border-radius: 12px;
            min-width: 22px;
            height: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 3px 10px rgba(212, 175, 55, 0.4);
            border: 2px solid #FAF7F2;
            letter-spacing: 0;
            line-height: 1;
            z-index: 10;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .cart-count-badge {
                top: -10px;
                right: -10px;
                font-size: 0.6rem;
                padding: 0.15rem 0.4rem;
                min-width: 20px;
                height: 20px;
            }
        }
    </style>
</div>