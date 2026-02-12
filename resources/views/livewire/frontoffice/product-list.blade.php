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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Outfit', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--cream);
            color: var(--charcoal);
        }

        /* Navigation Override */
        nav.bg-white {
            background: rgba(250, 247, 242, 0.95) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(42, 42, 42, 0.1);
            box-shadow: none !important;
        }

        nav a {
            font-weight: 300;
            font-size: 0.95rem;
            letter-spacing: 1px;
            transition: color 0.3s;
            position: relative;
        }

        nav a:not(form button)::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 1px;
            background: var(--gold);
            transition: width 0.3s ease;
        }

        nav a:hover::after {
            width: 100%;
        }

        nav .text-xl {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.75rem;
            font-weight: 300;
            letter-spacing: 2px;
        }

        /* Hero Section */
        .hero {
            height: 50vh;
            background: linear-gradient(135deg, #E8DED2 0%, #FAF7F2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            margin-bottom: 4rem;
        }

        .hero-content {
            text-align: center;
            animation: fadeInUp 0.8s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 4rem;
            font-weight: 300;
            line-height: 1.1;
            margin-bottom: 1rem;
            color: var(--charcoal);
        }

        .hero-subtitle {
            font-size: 1.1rem;
            font-weight: 300;
            color: var(--charcoal);
            opacity: 0.8;
        }

        /* Seller Stats Dashboard */
        .seller-stats {
            max-width: 1400px;
            margin: -2rem auto 3rem;
            padding: 0 2rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
        }

        .stat-card {
            background: var(--soft-white);
            padding: 1.5rem;
            border-radius: 4px;
            box-shadow: 0 2px 20px var(--shadow);
            text-align: center;
            border-top: 3px solid var(--gold);
        }

        .stat-card.sage { border-top-color: var(--sage); }
        .stat-card.terracotta { border-top-color: var(--terracotta); }

        .stat-number {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.5rem;
            font-weight: 300;
            color: var(--charcoal);
            margin-bottom: 0.25rem;
        }

        .stat-label {
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 1px;
            color: var(--charcoal);
            opacity: 0.6;
            text-transform: uppercase;
        }

        /* Filters Section */
        .filters-section {
            max-width: 1400px;
            margin: 0 auto 3rem;
            padding: 0 2rem;
        }

        .filters-container {
            background: var(--soft-white);
            padding: 2rem;
            border-radius: 4px;
            display: flex;
            gap: 2rem;
            align-items: center;
            box-shadow: 0 2px 20px var(--shadow);
        }

        .filter-group {
            flex: 1;
        }

        .filter-label {
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
            color: var(--charcoal);
            opacity: 0.7;
        }

        .filter-select {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid rgba(42, 42, 42, 0.2);
            background: var(--cream);
            color: var(--charcoal);
            font-size: 0.95rem;
            font-family: 'Outfit', sans-serif;
            transition: border-color 0.3s;
            cursor: pointer;
        }

        .filter-select:focus {
            outline: none;
            border-color: var(--gold);
        }

        .search-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid rgba(42, 42, 42, 0.2);
            background: var(--cream);
            color: var(--charcoal);
            font-size: 0.95rem;
            font-family: 'Outfit', sans-serif;
            transition: border-color 0.3s;
        }

        .search-input::placeholder {
            color: rgba(42, 42, 42, 0.4);
        }

        .search-input:focus {
            outline: none;
            border-color: var(--gold);
        }

        /* Products Section */
        .products-section {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem 6rem;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 3rem;
        }

        .section-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.5rem;
            font-weight: 300;
            color: var(--charcoal);
        }

        .product-count {
            font-size: 0.95rem;
            color: var(--charcoal);
            opacity: 0.6;
            font-weight: 300;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
        }

        .pagination {
            margin-top: 3rem;
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .page-btn {
            min-width: 42px;
            height: 42px;
            border: 1px solid rgba(42, 42, 42, 0.2);
            background: var(--soft-white);
            color: var(--charcoal);
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .page-btn:hover:not(.active):not(:disabled) {
            background: var(--cream);
            border-color: var(--gold);
            color: var(--charcoal);
        }

        .page-btn.active {
            background: var(--gold);
            border-color: var(--gold);
            color: var(--charcoal);
        }

        .page-btn:disabled {
            opacity: 0.4;
            cursor: not-allowed;
        }

        .product-card {
            background: var(--soft-white);
            border-radius: 0;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            animation: fadeIn 0.6s ease-out forwards;
            opacity: 0;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }

        .product-image {
            position: relative;
            width: 100%;
            height: 300px;
            overflow: hidden;
            background: var(--cream);
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .product-card:hover .product-image img {
            transform: scale(1.08);
        }

        .product-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: var(--charcoal);
            color: var(--cream);
            padding: 0.4rem 0.8rem;
            font-size: 0.7rem;
            font-weight: 500;
            letter-spacing: 1.5px;
        }

        .stock-badge {
            background: var(--terracotta);
        }

        .product-info {
            padding: 1.5rem;
        }

        .product-category {
            font-size: 0.75rem;
            font-weight: 500;
            letter-spacing: 2px;
            color: var(--charcoal);
            opacity: 0.5;
            margin-bottom: 0.5rem;
        }

        .product-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.5rem;
            font-weight: 400;
            margin-bottom: 0.5rem;
            color: var(--charcoal);
        }

        .product-description {
            font-size: 0.9rem;
            line-height: 1.6;
            color: var(--charcoal);
            opacity: 0.7;
            margin-bottom: 1rem;
        }

        .product-footer {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-top: 1rem;
        }

        .view-details-btn {
            padding: 0.75rem 1.5rem;
            background: var(--charcoal);
            color: var(--cream);
            border: none;
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s;
            font-family: 'Outfit', sans-serif;
        }

        .view-details-btn:hover {
            background: var(--gold);
            color: var(--charcoal);
        }

        .add-to-cart-btn {
            background: var(--sage);
            color: var(--soft-white);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .add-to-cart-btn:hover {
            background: var(--terracotta);
        }

        .product-price {
            font-size: 1.75rem;
            font-weight: 400;
            color: var(--charcoal);
        }

        .stock-info {
            font-size: 0.85rem;
            color: var(--sage);
            font-weight: 500;
        }

        .stock-low {
            color: var(--terracotta);
            opacity: 1;
            font-weight: 500;
        }

        /* Like Button on Card (Customer Only) */
        .like-btn {
            position: absolute;
            bottom: 1rem;
            right: 1rem;
            background: rgba(255, 255, 255, 0.95);
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
            z-index: 2;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .like-btn i {
            color: var(--charcoal);
            font-size: 1rem;
            transition: all 0.3s;
        }

        .like-btn.liked i {
            color: var(--terracotta);
        }

        .like-btn:hover {
            transform: scale(1.1);
            background: var(--cream);
        }

        /* Action Buttons for Sellers */
        .action-buttons {
            position: absolute;
            top: 1rem;
            right: 1rem;
            display: flex;
            gap: 0.5rem;
            z-index: 2;
        }

        .action-btn {
            background: rgba(255, 255, 255, 0.95);
            border: none;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            color: var(--charcoal);
        }

        .action-btn:hover {
            background: var(--gold);
            transform: scale(1.05);
        }

        .action-btn.delete:hover {
            background: var(--terracotta);
            color: var(--soft-white);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 6rem 2rem;
        }

        .empty-state-icon {
            font-size: 4rem;
            color: var(--charcoal);
            opacity: 0.2;
            margin-bottom: 1rem;
        }

        .empty-state-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2rem;
            font-weight: 300;
            color: var(--charcoal);
            margin-bottom: 0.5rem;
        }

        .empty-state-text {
            font-size: 1rem;
            color: var(--charcoal);
            opacity: 0.6;
        }

        /* Flash Message */
        .flash-message {
            position: fixed;
            top: 2rem;
            right: 2rem;
            background: var(--charcoal);
            color: var(--cream);
            padding: 1rem 1.5rem;
            border-radius: 4px;
            box-shadow: 0 10px 40px var(--shadow);
            z-index: 10000;
            animation: slideIn 0.3s ease-out;
            max-width: 400px;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        /* Modal Styles */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            padding: 2rem;
            animation: fadeInModal 0.3s ease-out;
        }

        @keyframes fadeInModal {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .modal-container {
            background: var(--soft-white);
            width: 100%;
            max-width: 1200px;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            animation: slideUpModal 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        @keyframes slideUpModal {
            from {
                transform: translateY(50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .modal-close {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            background: var(--charcoal);
            color: var(--cream);
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 10;
            transition: all 0.3s;
        }

        .modal-close:hover {
            background: var(--gold);
            color: var(--charcoal);
            transform: rotate(90deg);
        }

        .modal-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            padding: 3rem;
        }

        .modal-gallery {
            position: sticky;
            top: 0;
            height: fit-content;
        }

        .modal-main-image {
            width: 100%;
            height: 500px;
            background: var(--cream);
            margin-bottom: 1rem;
            overflow: hidden;
        }

        .modal-main-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .modal-thumbnails {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 0.5rem;
        }

        .modal-thumbnail {
            height: 80px;
            background: var(--cream);
            cursor: pointer;
            overflow: hidden;
            transition: all 0.3s;
            border: 2px solid transparent;
        }

        .modal-thumbnail:hover,
        .modal-thumbnail.active {
            border-color: var(--gold);
        }

        .modal-thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .modal-details {
            padding-right: 1rem;
        }

        .modal-category {
            font-size: 0.75rem;
            font-weight: 500;
            letter-spacing: 2px;
            color: var(--charcoal);
            opacity: 0.5;
            margin-bottom: 0.5rem;
        }

        .modal-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.5rem;
            font-weight: 300;
            margin-bottom: 1rem;
            color: var(--charcoal);
        }

        .modal-price {
            font-size: 2rem;
            font-weight: 400;
            color: var(--gold);
            margin-bottom: 1.5rem;
        }

        .modal-description {
            font-size: 1rem;
            line-height: 1.8;
            color: var(--charcoal);
            opacity: 0.8;
            margin-bottom: 2rem;
        }

        .modal-meta {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
            margin-bottom: 2rem;
            padding: 1.5rem;
            background: var(--cream);
        }

        .meta-item {
            text-align: center;
        }

        .meta-label {
            font-size: 0.7rem;
            font-weight: 500;
            letter-spacing: 1.5px;
            color: var(--charcoal);
            opacity: 0.5;
            margin-bottom: 0.5rem;
        }

        .meta-value {
            font-size: 1.1rem;
            font-weight: 400;
            color: var(--charcoal);
        }

        /* Quantity Control */
        .quantity-control {
            margin-bottom: 2rem;
        }

        .quantity-label {
            font-size: 0.75rem;
            font-weight: 500;
            letter-spacing: 1.5px;
            color: var(--charcoal);
            opacity: 0.7;
            margin-bottom: 0.75rem;
        }

        .quantity-selector {
            display: flex;
            align-items: center;
            gap: 1rem;
            background: var(--cream);
            padding: 0.5rem;
            width: fit-content;
        }

        .quantity-btn {
            background: var(--charcoal);
            color: var(--cream);
            border: none;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
        }

        .quantity-btn:hover:not(:disabled) {
            background: var(--gold);
            color: var(--charcoal);
        }

        .quantity-btn:disabled {
            opacity: 0.3;
            cursor: not-allowed;
        }

        .quantity-display {
            font-size: 1.25rem;
            font-weight: 500;
            min-width: 50px;
            text-align: center;
        }

        .modal-actions {
            display: flex;
            gap: 1rem;
            margin: 2rem 0;
        }

        .modal-add-to-cart-btn, .modal-checkout-btn {
            flex: 1;
            padding: 1rem 1.5rem;
            border: none;
            font-size: 0.9rem;
            font-weight: 500;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s;
            font-family: 'Outfit', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .modal-add-to-cart-btn {
            background: var(--sage);
            color: var(--soft-white);
        }

        .modal-add-to-cart-btn:hover {
            background: var(--terracotta);
        }

        .modal-checkout-btn {
            background: var(--gold);
            color: var(--charcoal);
        }

        .modal-checkout-btn:hover {
            background: var(--charcoal);
            color: var(--cream);
        }

<<<<<<< HEAD
        .product-price {
            font-size: 1.75rem;
            font-weight: 400;
            color: var(--charcoal);
        }

        .stock-info {
            font-size: 0.85rem;
            color: var(--sage);
            font-weight: 500;
        }

        .stock-low {
            color: var(--terracotta);
            opacity: 1;
            font-weight: 500;
        }

        /* Like Button on Card */
        .like-btn {
            position: absolute;
            bottom: 1rem;
            right: 1rem;
            background: var(--soft-white);
            border: none;
            border-radius: 50%;
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 12px var(--shadow);
            z-index: 2;
        }

        .like-btn:hover {
            transform: scale(1.1);
            background: var(--terracotta);
            color: white;
        }

        .like-btn.liked {
            background: var(--terracotta);
            color: white;
        }

        .like-btn i {
            font-size: 1.1rem;
        }

        /* Modal Styles */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(42, 42, 42, 0.8);
            backdrop-filter: blur(5px);
            z-index: 9998;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            animation: fadeInOverlay 0.3s ease-out;
        }

        @keyframes fadeInOverlay {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .modal-container {
            background: var(--soft-white);
            border-radius: 8px;
            max-width: 1100px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            animation: scaleIn 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.3);
        }

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.9) translateY(20px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        .modal-close {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            background: var(--charcoal);
            color: var(--cream);
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
            z-index: 10;
        }

        .modal-close:hover {
            background: var(--gold);
            transform: rotate(90deg);
        }

        .modal-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            padding: 3rem;
        }

        .modal-image-section {
            position: relative;
        }

        .modal-image {
            width: 100%;
            height: 500px;
            border-radius: 4px;
            overflow: hidden;
            background: var(--cream);
        }

        .modal-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .modal-like-btn {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: var(--soft-white);
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 20px var(--shadow);
        }

        .modal-like-btn:hover {
            transform: scale(1.1);
            background: var(--terracotta);
            color: white;
        }

        .modal-like-btn.liked {
            background: var(--terracotta);
            color: white;
        }

        .modal-like-btn i {
            font-size: 1.3rem;
        }

        .modal-info-section {
            display: flex;
            flex-direction: column;
        }

        .modal-category {
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 1.5px;
            color: var(--gold);
            margin-bottom: 0.5rem;
        }

        .modal-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.5rem;
            font-weight: 400;
            margin-bottom: 1rem;
            color: var(--charcoal);
            line-height: 1.2;
        }

        .modal-price {
            font-size: 2rem;
            font-weight: 500;
            color: var(--charcoal);
            margin-bottom: 1rem;
        }

        .modal-description {
            font-size: 1rem;
            line-height: 1.8;
            color: var(--charcoal);
            opacity: 0.8;
            margin-bottom: 1.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid rgba(42, 42, 42, 0.1);
        }

        .modal-meta {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .meta-item {
            background: var(--cream);
            padding: 1rem;
            border-radius: 4px;
        }

        .meta-label {
            font-size: 0.8rem;
            font-weight: 500;
            letter-spacing: 1px;
            color: var(--charcoal);
            opacity: 0.6;
            margin-bottom: 0.3rem;
        }

        .meta-value {
            font-size: 1.1rem;
            font-weight: 500;
            color: var(--charcoal);
        }

        /* Quantity Control */
        .quantity-control {
            margin: 2rem 0;
        }

        .quantity-label {
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 1px;
            margin-bottom: 0.75rem;
            color: var(--charcoal);
            opacity: 0.7;
        }

        .quantity-selector {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .quantity-btn {
            width: 45px;
            height: 45px;
            border: 1px solid rgba(42, 42, 42, 0.2);
            background: var(--soft-white);
            color: var(--charcoal);
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .quantity-btn:hover:not(:disabled) {
            background: var(--charcoal);
            color: var(--cream);
            border-color: var(--charcoal);
        }

        .quantity-btn:disabled {
            opacity: 0.4;
            cursor: not-allowed;
        }

        .quantity-display {
            width: 80px;
            height: 45px;
            border: 1px solid rgba(42, 42, 42, 0.2);
            background: var(--cream);
            color: var(--charcoal);
            font-size: 1.1rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: center;
        }

=======
>>>>>>> 88e84881e59668fbfb56a59ae221eb778e98face
        /* Reviews Section */
        .reviews-section {
            margin-top: 3rem;
            padding-top: 3rem;
            border-top: 1px solid rgba(42, 42, 42, 0.1);
        }

        .reviews-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .reviews-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.75rem;
            font-weight: 300;
        }

        .rating-summary {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .rating-number {
            font-size: 1.5rem;
            font-weight: 500;
        }

        .rating-stars i {
            color: var(--gold);
            font-size: 1rem;
        }

        .rating-count {
            font-size: 0.9rem;
            opacity: 0.6;
        }

        /* Comment Form */
        .comment-form {
            background: var(--cream);
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 1px;
            margin-bottom: 0.75rem;
            color: var(--charcoal);
            opacity: 0.7;
        }

        .rating-input {
            display: flex;
            gap: 0.5rem;
        }

        .star-btn {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1.5rem;
            color: var(--charcoal);
            opacity: 0.2;
            transition: all 0.2s;
        }

        .star-btn.active {
            color: var(--gold);
            opacity: 1;
        }

        .star-btn:hover {
            transform: scale(1.1);
        }

        .comment-textarea {
            width: 100%;
            min-height: 120px;
            padding: 1rem;
            border: 1px solid rgba(42, 42, 42, 0.2);
            background: var(--soft-white);
            font-family: 'Outfit', sans-serif;
            font-size: 0.95rem;
            resize: vertical;
            transition: border-color 0.3s;
        }

        .comment-textarea:focus {
            outline: none;
            border-color: var(--gold);
        }

        .submit-btn {
            background: var(--charcoal);
            color: var(--cream);
            border: none;
            padding: 0.75rem 1.5rem;
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s;
            font-family: 'Outfit', sans-serif;
        }

        .submit-btn:hover {
            background: var(--gold);
            color: var(--charcoal);
        }

        /* Comments List */
        .comments-list {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .comment-item {
            padding: 1.5rem;
            background: var(--cream);
        }

        .comment-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .comment-author {
            font-weight: 500;
            font-size: 0.95rem;
        }

        .comment-date {
            font-size: 0.8rem;
            opacity: 0.6;
            margin-left: 1rem;
        }

        .comment-rating i {
            color: var(--gold);
            font-size: 0.9rem;
        }

        .comment-text {
            font-size: 0.95rem;
            line-height: 1.6;
            color: var(--charcoal);
            opacity: 0.8;
        }

        .delete-comment-btn {
            background: transparent;
            border: none;
            color: var(--terracotta);
            cursor: pointer;
            padding: 0.25rem 0.5rem;
            transition: all 0.3s;
        }

        .delete-comment-btn:hover {
            color: var(--charcoal);
        }

        .empty-comments {
            text-align: center;
            padding: 3rem;
            color: var(--charcoal);
            opacity: 0.5;
            font-style: italic;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .modal-content {
                grid-template-columns: 1fr;
            }

            .modal-gallery {
                position: relative;
            }
        }

        @media (max-width: 768px) {
            .filters-container {
                flex-direction: column;
            }

            .product-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .modal-content {
                padding: 2rem 1.5rem;
            }

            .modal-meta {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <!-- Flash Message -->
    @if(session('message'))
        <div class="flash-message">
            {{ session('message') }}
        </div>
    @endif

    <!-- Hero Section -->
    <div class="hero">
        <div class="hero-content">
            @if($isSeller)
                <h1 class="hero-title">Your Product Inventory</h1>
                <p class="hero-subtitle">Manage & showcase your artisan creations</p>
            @else
                <h1 class="hero-title">Discover Artisan Treasures</h1>
                <p class="hero-subtitle">Curated collection of handcrafted goods</p>
            @endif
        </div>
    </div>

    <!-- Seller Stats Dashboard -->
    @if($isSeller)
        <div class="seller-stats">
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">{{ $products->count() }}</div>
                    <div class="stat-label">Total Products</div>
                </div>
                <div class="stat-card sage">
                    <div class="stat-number">{{ $products->where('stock', '>', 10)->count() }}</div>
                    <div class="stat-label">In Stock</div>
                </div>
                <div class="stat-card terracotta">
                    <div class="stat-number">{{ $products->whereBetween('stock', [1, 10])->count() }}</div>
                    <div class="stat-label">Low Stock</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ $products->sum(function($p) { return $p->likes->count(); }) }}</div>
                    <div class="stat-label">Total Likes</div>
                </div>
            </div>
        </div>
    @endif

    <!-- Filters Section -->
    <div class="filters-section">
        <div class="filters-container">
            <div class="filter-group">
                <input 
                    type="text" 
                    class="search-input" 
                    wire:model.live="search" 
                    placeholder="Search products..."
                >
            </div>

            <div class="filter-group">
                <select class="filter-select" wire:model.live="selectedCategory">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="filter-group">
                <select class="filter-select" wire:model.live="sortBy">
                    <option value="newest">Newest First</option>
                    <option value="name">Name (A-Z)</option>
                    <option value="price_low">Price: Low to High</option>
                    <option value="price_high">Price: High to Low</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Products Section -->
    <div class="products-section">
        <div class="section-header">
            <h2 class="section-title">
                @if($isSeller)
                    Your Products
                @else
                    Featured Collection
                @endif
            </h2>
<<<<<<< HEAD
            <div class="product-count">{{ $products->total() }} {{ Str::plural('product', $products->total()) }}</div>
=======
            <span class="product-count">{{ $products->count() }} {{ $products->count() == 1 ? 'item' : 'items' }}</span>
>>>>>>> 88e84881e59668fbfb56a59ae221eb778e98face
        </div>

        @if($products->count() > 0)
            <div class="product-grid">
                @foreach($products as $product)
                    <div class="product-card" wire:key="product-{{ $product->id }}" style="animation-delay: {{ $loop->index * 0.1 }}s">
                        <div class="product-image" wire:click="preview({{ $product->id }})">
                            @if($product->photos->first())
                                <img src="{{ Storage::url($product->photos->first()->image) }}" alt="{{ $product->name }}">
                            @else
                                <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; font-size: 3rem; color: var(--charcoal); opacity: 0.2;">
                                    <i class="fas fa-image"></i>
                                </div>
                            @endif

                            @if($product->stock < 10 && $product->stock > 0)
                                <div class="product-badge stock-badge">LOW STOCK</div>
                            @elseif($product->stock == 0)
                                <div class="product-badge stock-badge">OUT OF STOCK</div>
                            @endif

                            @hasanyrole('seller|moderator')
                                <div class="action-buttons">
                                    @role('seller')
                                    <a href="/products/edit/{{ $product->id }}" class="action-btn" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endrole
                                    @hasanyrole('seller|moderator')
                                    <button
                                    class="action-btn delete"
                                    title="Delete"
                                    onclick="confirm('Are you sure you want to delete this product?') || event.stopImmediatePropagation()"
                                    wire:click="delete({{ $product->id }})"
                                    >
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    @endhasanyrole
                                       
                                </div>
                            @endhasanyrole
                            @role('customer')
                                <!-- Customer Like Button -->
                                <button 
                                    wire:click.stop="toggleLike({{ $product->id }})" 
                                    class="like-btn {{ $this->isLiked($product->id) ? 'liked' : '' }}"
                                >
                                    <i class="fas fa-heart"></i>
                                </button>
                            @endrole
                        </div>

                        <div class="product-info">
                            <div class="product-category">{{ $product->category->name }}</div>
                            <h3 class="product-name">{{ $product->name }}</h3>
                            <p class="product-description">{{ Str::limit($product->description, 80) }}</p>

                            <div class="product-footer">
                                <div>
                                    <div class="product-price">${{ number_format($product->price, 2) }}</div>
                                    @if($isSeller)
                                        <div class="{{ $product->stock < 10 ? 'stock-low' : 'stock-info' }}">
                                            Stock: {{ $product->stock }}
                                        </div>
                                    @else
                                        @if($product->reviews->count() > 0)
                                            <div style="display: flex; align-items: center; gap: 0.5rem; margin-top: 0.5rem;">
                                                <div style="color: var(--gold);">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        @if($i <= $this->getAverageRating($product))
                                                            <i class="fas fa-star"></i>
                                                        @else
                                                            <i class="far fa-star"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                                <span style="font-size: 0.85rem; opacity: 0.6;">({{ $product->reviews->count() }})</span>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                                <button wire:click="preview({{ $product->id }})" class="view-details-btn">
                                    {{ $isSeller ? 'VIEW' : 'DETAILS' }}
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @if($products->hasPages())
                <div class="pagination">
                    <button
                        class="page-btn"
                        wire:click="previousPage"
                        @disabled($products->onFirstPage())
                    >
                        <i class="fas fa-chevron-left"></i>
                    </button>

                    @foreach(range(1, $products->lastPage()) as $page)
                        <button
                            class="page-btn {{ $page === $products->currentPage() ? 'active' : '' }}"
                            wire:click="gotoPage({{ $page }})"
                        >
                            {{ $page }}
                        </button>
                    @endforeach

                    <button
                        class="page-btn"
                        wire:click="nextPage"
                        @disabled(! $products->hasMorePages())
                    >
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            @endif
        @else
            <div class="empty-state">
                <div class="empty-state-icon">
                    <i class="fas fa-box-open"></i>
                </div>
                <h3 class="empty-state-title">No Products Found</h3>
                <p class="empty-state-text">
                    @if($isSeller)
                        Start by adding your first product to showcase your work.
                    @else
                        Try adjusting your search or filters.
                    @endif
                </p>
            </div>
        @endif
    </div>

    <!-- Product Modal -->
    @if($showModal && $selectedProduct)
        <div class="modal-overlay" wire:click="closeModal">
            <div class="modal-container" wire:click.stop>
                <button class="modal-close" wire:click="closeModal">
                    <i class="fas fa-times"></i>
                </button>

                <div class="modal-content">
                    <!-- Gallery -->
                    <div class="modal-gallery">
                        @if($selectedProduct->photos->count() > 0)
                            <div class="modal-main-image">
                                <img src="{{ Storage::url($selectedProduct->photos->first()->image) }}" alt="{{ $selectedProduct->name }}">
                            </div>
                            @if($selectedProduct->photos->count() > 1)
                                <div class="modal-thumbnails">
                                    @foreach($selectedProduct->photos as $photo)
                                        <div class="modal-thumbnail">
                                            <img src="{{ Storage::url($photo->image) }}" alt="{{ $selectedProduct->name }}">
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        @endif
                    </div>

                    <!-- Details -->
                    <div class="modal-details">
                        <div class="modal-category">{{ $selectedProduct->category->name }}</div>
                        <h2 class="modal-title">{{ $selectedProduct->name }}</h2>
                        <div class="modal-price">${{ number_format($selectedProduct->price, 2) }}</div>
                        <p class="modal-description">{{ $selectedProduct->description }}</p>

                        <!-- Meta Information -->
                        <div class="modal-meta">
                            <div class="meta-item">
                                <div class="meta-label">STOCK</div>
                                <div class="meta-value">{{ $selectedProduct->stock }} units</div>
                            </div>
                            <div class="meta-item">
                                <div class="meta-label">SELLER</div>
                                <div class="meta-value">{{ $selectedProduct->seller->name ?? 'Unknown' }}</div>
                            </div>
                            <div class="meta-item">
                                <div class="meta-label">LIKES</div>
                                <div class="meta-value">{{ $selectedProduct->likes->count() }}</div>
                            </div>
                            <div class="meta-item">
                                <div class="meta-label">REVIEWS</div>
                                <div class="meta-value">{{ $selectedProduct->reviews->count() }}</div>
                            </div>
                        </div>

<<<<<<< HEAD
                        <!-- Quantity Control -->
                        @role('customer')
=======
                        <!-- Quantity Control (Customer Only) -->
                        @if($isCustomer)
>>>>>>> 88e84881e59668fbfb56a59ae221eb778e98face
                            <div class="quantity-control">
                                <div class="quantity-label">QUANTITY</div>
                                <div class="quantity-selector">
                                    <button 
                                        wire:click="decrementQuantity" 
                                        class="quantity-btn"
                                        {{ $quantity <= 1 ? 'disabled' : '' }}
                                    >
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <div class="quantity-display">{{ $quantity }}</div>
                                    <button 
                                        wire:click="incrementQuantity" 
                                        class="quantity-btn"
                                        {{ $quantity >= $selectedProduct->stock ? 'disabled' : '' }}
                                    >
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
<<<<<<< HEAD
                        @endrole

                        <!-- Action Buttons -->
                        @role('customer')
=======

                            <!-- Action Buttons -->
>>>>>>> 88e84881e59668fbfb56a59ae221eb778e98face
                            <div class="modal-actions">
                                <button wire:click="addToCart({{ $selectedProduct->id }})" class="modal-add-to-cart-btn">
                                    <i class="fas fa-shopping-cart"></i> ADD TO CART
                                </button>
                                
                            </div>
                        @endif

                        <!-- Reviews Section -->
                        <div class="reviews-section">
                            <div class="reviews-header">
                                <h3 class="reviews-title">Reviews & Ratings</h3>
                                @if($selectedProduct->reviews->count() > 0)
                                    <div class="rating-summary">
                                        <span class="rating-number">{{ $this->getAverageRating($selectedProduct) }}</span>
                                        <span class="rating-stars">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $this->getAverageRating($selectedProduct))
                                                    <i class="fas fa-star"></i>
                                                @else
                                                    <i class="far fa-star"></i>
                                                @endif
                                            @endfor
                                        </span>
                                        <span class="rating-count">({{ $selectedProduct->reviews->count() }})</span>
                                    </div>
                                @endif
                            </div>

                            <!-- Comment Form (Customer Only) -->
                            @if($isCustomer)
                                <div class="comment-form">
                                    <div class="form-group">
                                        <label class="form-label">Your Rating</label>
                                        <div class="rating-input">
                                            @for($i = 1; $i <= 5; $i++)
                                                <button 
                                                    type="button" 
                                                    wire:click="$set('newRating', {{ $i }})"
                                                    class="star-btn {{ $newRating >= $i ? 'active' : '' }}"
                                                >
                                                    <i class="fas fa-star"></i>
                                                </button>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Your Review</label>
                                        <textarea 
                                            wire:model="newComment" 
                                            class="comment-textarea" 
                                            placeholder="Share your thoughts about this product..."
                                        ></textarea>
                                    </div>
                                    <button wire:click="submitComment" class="submit-btn">
                                        SUBMIT REVIEW
                                    </button>
                                </div>
                            @endif

                            <!-- Comments List -->
                            @if($selectedProduct->reviews->count() > 0)
                                <div class="comments-list">
                                    @foreach($selectedProduct->reviews->sortByDesc('created_at') as $review)
                                        <div class="comment-item" wire:key="review-{{ $review->id }}">
                                            <div class="comment-header">
                                                <div>
                                                    <span class="comment-author">{{ $review->user->name }}</span>
                                                    <span class="comment-date">{{ $review->created_at->diffForHumans() }}</span>
                                                </div>
                                                <div style="display: flex; align-items: center; gap: 0.5rem;">
                                                    <span class="comment-rating">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            @if($i <= $review->rating)
                                                                <i class="fas fa-star"></i>
                                                            @else
                                                                <i class="far fa-star"></i>
                                                            @endif
                                                        @endfor
                                                    </span>
                                                    @if($review->user_id === auth()->id() || auth()->user()->hasAnyRole(['moderator']))
                                                        <button 
                                                            wire:click="deleteComment({{ $review->id }})" 
                                                            class="delete-comment-btn"
                                                            title="Delete"
                                                        >
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                            <p class="comment-text">{{ $review->comment }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="empty-comments">
                                    No reviews yet. Be the first to review this product!
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Floating Add Button (for sellers) -->
    @if($isSeller)
        <div style="position: fixed; bottom: 2rem; right: 2rem; z-index: 9997;">
            <a 
                href="{{ route('products.create') }}" 
                style="
                    background: var(--charcoal);
                    color: var(--cream);
                    width: 60px;
                    height: 60px;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 1.5rem;
                    text-decoration: none;
                    box-shadow: 0 10px 40px var(--shadow);
                    transition: all 0.3s;
                "
                onmouseover="this.style.transform='scale(1.1) rotate(90deg)'; this.style.background='var(--gold)'"
                onmouseout="this.style.transform='scale(1) rotate(0deg)'; this.style.background='var(--charcoal)'"
                title="Add New Product"
            >
                <i class="fas fa-plus"></i>
            </a>
        </div>
    @endif
<<<<<<< HEAD

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</div>
=======
</div>
>>>>>>> 88e84881e59668fbfb56a59ae221eb778e98face
