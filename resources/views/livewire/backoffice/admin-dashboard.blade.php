<div>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
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

        body {
            font-family: 'Outfit', sans-serif;
            background: var(--cream);
            color: var(--charcoal);
        }

        .admin-hero {
            height: 40vh;
            background: linear-gradient(135deg, #E8DED2 0%, #FAF7F2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 3rem;
            position: relative;
            overflow: hidden;
        }

        .admin-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 20% 50%, rgba(212, 175, 55, 0.1) 0%, transparent 50%),
                        radial-gradient(circle at 80% 80%, rgba(156, 175, 136, 0.1) 0%, transparent 50%);
        }

        .admin-hero-content {
            text-align: center;
            position: relative;
            z-index: 1;
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

        .admin-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 3.5rem;
            font-weight: 300;
            line-height: 1.1;
            margin-bottom: 0.5rem;
            color: var(--charcoal);
        }

        .admin-subtitle {
            font-size: 1rem;
            font-weight: 300;
            color: var(--charcoal);
            opacity: 0.7;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        /* Tabs */
        .tabs-container {
            max-width: 1400px;
            margin: 0 auto 3rem;
            padding: 0 2rem;
        }

        .tabs-wrapper {
            background: var(--soft-white);
            border-radius: 4px;
            box-shadow: 0 2px 20px var(--shadow);
            overflow: hidden;
        }

        .tabs-nav {
            display: flex;
            border-bottom: 1px solid rgba(42, 42, 42, 0.1);
            padding: 0 2rem;
            overflow-x: auto;
        }

        .tab-button {
            padding: 1.25rem 2rem;
            background: none;
            border: none;
            border-bottom: 2px solid transparent;
            color: var(--charcoal);
            opacity: 0.5;
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 1px;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.3s;
            white-space: nowrap;
            font-family: 'Outfit', sans-serif;
        }

        .tab-button:hover {
            opacity: 0.8;
        }

        .tab-button.active {
            opacity: 1;
            border-bottom-color: var(--gold);
            color: var(--charcoal);
        }

        /* Content */
        .content-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem 4rem;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .stat-card {
            background: var(--soft-white);
            padding: 2rem;
            border-radius: 4px;
            box-shadow: 0 2px 20px var(--shadow);
            border-top: 3px solid var(--gold);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px var(--shadow);
        }

        .stat-card.sage { border-top-color: var(--sage); }
        .stat-card.terracotta { border-top-color: var(--terracotta); }
        .stat-card.gold { border-top-color: var(--gold); }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            font-size: 1.25rem;
        }

        .stat-icon.blue { background: rgba(100, 150, 200, 0.1); color: #6496C8; }
        .stat-icon.green { background: rgba(156, 175, 136, 0.2); color: var(--sage); }
        .stat-icon.yellow { background: rgba(212, 175, 55, 0.2); color: var(--gold); }
        .stat-icon.purple { background: rgba(150, 100, 200, 0.1); color: #9664C8; }

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

        /* White Card */
        .white-card {
            background: var(--soft-white);
            border-radius: 4px;
            box-shadow: 0 2px 20px var(--shadow);
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2rem;
        }

        .card-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.75rem;
            font-weight: 300;
            color: var(--charcoal);
        }

        /* Inputs */
        .search-input, .filter-select, .date-input {
            padding: 0.75rem 1rem;
            border: 1px solid rgba(42, 42, 42, 0.2);
            background: var(--cream);
            color: var(--charcoal);
            font-size: 0.95rem;
            border-radius: 4px;
            transition: all 0.3s;
            font-family: 'Outfit', sans-serif;
        }

        .search-input {
            width: 100%;
            max-width: 300px;
        }

        .search-input:focus, .filter-select:focus, .date-input:focus {
            outline: none;
            border-color: var(--gold);
            background: var(--soft-white);
        }

        .filter-select {
            cursor: pointer;
        }

        /* Table */
        .data-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .data-table thead {
            background: var(--cream);
        }

        .data-table th {
            padding: 1rem 1.5rem;
            text-align: left;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--charcoal);
            opacity: 0.6;
            border-bottom: 1px solid rgba(42, 42, 42, 0.1);
        }

        .data-table td {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid rgba(42, 42, 42, 0.05);
            font-size: 0.95rem;
        }

        .data-table tbody tr {
            transition: background 0.2s;
        }

        .data-table tbody tr:hover {
            background: var(--cream);
        }

        /* Badges */
        .role-badge {
            display: inline-block;
            padding: 0.35rem 0.75rem;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            border-radius: 3px;
            margin-right: 0.25rem;
            margin-bottom: 0.25rem;
        }

        .role-badge.admin { background: rgba(201, 119, 87, 0.15); color: var(--terracotta); }
        .role-badge.seller { background: rgba(100, 150, 200, 0.15); color: #6496C8; }
        .role-badge.moderator { background: rgba(150, 100, 200, 0.15); color: #9664C8; }
        .role-badge.client { background: rgba(156, 175, 136, 0.15); color: var(--sage); }

        .status-badge {
            padding: 0.35rem 0.75rem;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            border-radius: 3px;
        }

        .status-badge.pending { background: rgba(212, 175, 55, 0.15); color: var(--gold); }
        .status-badge.paid { background: rgba(100, 150, 200, 0.15); color: #6496C8; }
        .status-badge.delivered { background: rgba(156, 175, 136, 0.15); color: var(--sage); }
        .status-badge.low-stock { background: rgba(212, 175, 55, 0.15); color: var(--gold); }
        .status-badge.out-stock { background: rgba(201, 119, 87, 0.15); color: var(--terracotta); }
        .status-badge.in-stock { background: rgba(156, 175, 136, 0.15); color: var(--sage); }

        /* Buttons */
        .action-btn {
            background: none;
            border: none;
            color: var(--charcoal);
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            padding: 0.5rem 1rem;
            margin-right: 0.5rem;
            font-family: 'Outfit', sans-serif;
            letter-spacing: 0.5px;
        }

        .action-btn:hover { opacity: 0.6; }
        .action-btn.primary { color: var(--gold); }
        .action-btn.danger { color: var(--terracotta); }

        .primary-btn {
            background: var(--charcoal);
            color: var(--cream);
            border: none;
            padding: 0.75rem 1.5rem;
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 1px;
            text-transform: uppercase;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s;
            font-family: 'Outfit', sans-serif;
        }

        .primary-btn:hover {
            background: var(--gold);
            transform: translateY(-2px);
            box-shadow: 0 5px 20px var(--shadow);
        }

        .secondary-btn {
            background: var(--cream);
            color: var(--charcoal);
            border: 1px solid rgba(42, 42, 42, 0.2);
            padding: 0.75rem 1.5rem;
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 1px;
            text-transform: uppercase;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s;
            font-family: 'Outfit', sans-serif;
        }

        .secondary-btn:hover {
            background: var(--soft-white);
            border-color: var(--charcoal);
        }

        /* Modal */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(42, 42, 42, 0.7);
            backdrop-filter: blur(5px);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            padding: 2rem;
        }

        .modal-container {
            background: var(--soft-white);
            border-radius: 4px;
            max-width: 500px;
            width: 100%;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            animation: modalFadeIn 0.3s ease-out;
        }

        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: scale(0.95) translateY(-20px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        .modal-header {
            padding: 2rem;
            border-bottom: 1px solid rgba(42, 42, 42, 0.1);
        }

        .modal-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.75rem;
            font-weight: 300;
            color: var(--charcoal);
        }

        .modal-body {
            padding: 2rem;
        }

        .modal-footer {
            padding: 1.5rem 2rem;
            background: var(--cream);
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
        }

        .checkbox-group {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            cursor: pointer;
            padding: 0.75rem;
            border-radius: 4px;
            transition: background 0.2s;
        }

        .checkbox-label:hover {
            background: var(--cream);
        }

        .checkbox-label input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: var(--gold);
        }

        .checkbox-label span {
            font-size: 0.95rem;
            color: var(--charcoal);
        }

        /* Review Card */
        .review-card {
            border: 1px solid rgba(42, 42, 42, 0.1);
            border-radius: 4px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            transition: all 0.3s;
        }

        .review-card:hover {
            box-shadow: 0 4px 20px var(--shadow);
        }

        .review-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 0.75rem;
        }

        .review-author {
            font-weight: 500;
            color: var(--charcoal);
        }

        .review-date {
            font-size: 0.85rem;
            color: var(--charcoal);
            opacity: 0.5;
            margin-left: 0.5rem;
        }

        .review-stars {
            color: var(--gold);
            font-size: 0.9rem;
        }

        .review-text {
            color: var(--charcoal);
            opacity: 0.8;
            line-height: 1.6;
            margin-bottom: 0.5rem;
        }

        .review-product {
            font-size: 0.85rem;
            color: var(--charcoal);
            opacity: 0.6;
        }

        .review-product span {
            font-weight: 500;
            opacity: 1;
        }

        /* List Item */
        .list-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.75rem 0;
            border-bottom: 1px solid rgba(42, 42, 42, 0.05);
        }

        .list-item:last-child {
            border-bottom: none;
        }

        .list-label {
            color: var(--charcoal);
            opacity: 0.8;
            font-size: 0.95rem;
        }

        .list-value {
            font-weight: 600;
            color: var(--charcoal);
        }

        /* Chart */
        .chart-container {
            height: 300px;
            display: flex;
            align-items: flex-end;
            gap: 0.5rem;
            padding: 2rem;
            background: var(--cream);
            border-radius: 4px;
        }

        .chart-bar {
            flex: 1;
            background: var(--gold);
            border-radius: 4px 4px 0 0;
            transition: all 0.3s;
            cursor: pointer;
            position: relative;
        }

        .chart-bar:hover {
            background: var(--charcoal);
            transform: scaleY(1.05);
        }

        /* Filters Row */
        .filters-row {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .admin-title {
                font-size: 2.5rem;
            }

            .tabs-nav {
                padding: 0 1rem;
            }

            .tab-button {
                padding: 1rem 1.5rem;
                font-size: 0.8rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .card-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .search-input,
            .filter-select {
                max-width: 100%;
                width: 100%;
            }

            .data-table {
                font-size: 0.85rem;
            }

            .data-table th,
            .data-table td {
                padding: 0.75rem;
            }
        }

        /* Flash Messages */
        .flash-message {
            max-width: 1400px;
            margin: 0 auto 2rem;
            padding: 0 2rem;
        }

        .flash-message-content {
            padding: 1rem 1.5rem;
            border-radius: 4px;
            font-size: 0.95rem;
        }

        .flash-success {
            background: rgba(156, 175, 136, 0.2);
            border: 1px solid rgba(156, 175, 136, 0.3);
            color: var(--charcoal);
        }

        .flash-error {
            background: rgba(201, 119, 87, 0.2);
            border: 1px solid rgba(201, 119, 87, 0.3);
            color: var(--charcoal);
        }
    </style>

    <!-- Hero Header -->
    <div class="admin-hero">
        <div class="admin-hero-content">
            <h1 class="admin-title">Admin Dashboard</h1>
            <p class="admin-subtitle">Welcome, {{ auth()->user()->name }}</p>
        </div>
    </div>

    <!-- Flash Messages -->
    @if (session()->has('message'))
        <div class="flash-message">
            <div class="flash-message-content flash-success">
                {{ session('message') }}
            </div>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="flash-message">
            <div class="flash-message-content flash-error">
                {{ session('error') }}
            </div>
        </div>
    @endif

    <!-- Navigation Tabs -->
    <div class="tabs-container">
        <div class="tabs-wrapper">
            <nav class="tabs-nav">
                <button wire:click="switchTab('overview')" class="tab-button @if($activeTab === 'overview') active @endif">
                    Overview
                </button>
                <button wire:click="switchTab('users')" class="tab-button @if($activeTab === 'users') active @endif">
                    Users & Roles
                </button>
                <button wire:click="switchTab('products')" class="tab-button @if($activeTab === 'products') active @endif">
                    Products
                </button>
                <button wire:click="switchTab('categories')" class="tab-button @if($activeTab === 'categories') active @endif">
                    Categories
                </button>
                <button wire:click="switchTab('reviews')" class="tab-button @if($activeTab === 'reviews') active @endif">
                    Reviews
                </button>
                <button wire:click="switchTab('analytics')" class="tab-button @if($activeTab === 'analytics') active @endif">
                    Analytics
                </button>
            </nav>
        </div>
    </div>

    <!-- Overview Tab -->
    @if($activeTab === 'overview')
        <div class="content-container">
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon blue">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <div class="stat-number">{{ number_format($stats['total_users']) }}</div>
                    <div class="stat-label">Total Users</div>
                </div>

                <div class="stat-card sage">
                    <div class="stat-icon green">
                        <i class="fa-solid fa-box"></i>
                    </div>
                    <div class="stat-number">{{ number_format($stats['total_products']) }}</div>
                    <div class="stat-label">Total Products</div>
                </div>

                <div class="stat-card terracotta">
                    <div class="stat-icon yellow">
                        <i class="fa-solid fa-tags"></i>
                    </div>
                    <div class="stat-number">{{ number_format($stats['total_categories']) }}</div>
                    <div class="stat-label">Total Categories</div>
                </div>

                <div class="stat-card gold">
                    <div class="stat-icon purple">
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <div class="stat-number">{{ number_format($stats['total_reviews']) }}</div>
                    <div class="stat-label">Total Reviews</div>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
                <div class="white-card">
                    <h3 class="card-title" style="margin-bottom: 1.5rem;">Category Distribution</h3>
                    <div style="display: flex; flex-direction: column; gap: 1rem;">
                        @foreach($stats['products_per_category']->take(5) as $category)
                            <div class="list-item">
                                <span class="list-label">{{ $category->name }}</span>
                                <span class="list-value" style="color: var(--sage);">{{ $category->products_count }} products</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="white-card">
                    <h3 class="card-title" style="margin-bottom: 1.5rem;">Product & Reviews</h3>
                    <div style="display: flex; flex-direction: column; gap: 1rem;">
                        <div class="list-item">
                            <span class="list-label">Low Stock Products</span>
                            <span class="list-value" style="color: var(--terracotta);">{{ $stats['low_stock_products'] }}</span>
                        </div>
                        <div class="list-item">
                            <span class="list-label">Total Reviews</span>
                            <span class="list-value">{{ $stats['total_reviews'] }}</span>
                        </div>
                        <div class="list-item">
                            <span class="list-label">Average Rating</span>
                            <span class="list-value">{{ number_format($stats['avg_rating'], 2) }} / 5</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Users & Roles Tab -->
    @if($activeTab === 'users')
        <div class="content-container">
            <div class="white-card">
                <div class="card-header">
                    <h2 class="card-title">User Management</h2>
                    <input type="text" wire:model.live="searchUsers" placeholder="Search users..." class="search-input">
                </div>

                <div style="overflow-x: auto;">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th>Joined</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>
                                        <div style="font-weight: 500;">{{ $user->name }}</div>
                                    </td>
                                    <td>
                                        <div style="opacity: 0.7;">{{ $user->email }}</div>
                                    </td>
                                    <td>
                                        <div style="display: flex; flex-wrap: wrap; gap: 0.25rem;">
                                            @foreach($user->roles as $role)
                                                <span class="role-badge {{ $role->name }}">
                                                    {{ ucfirst($role->name) }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td style="opacity: 0.6;">
                                        {{ $user->created_at->format('M d, Y') }}
                                    </td>
                                    <td>
                                        <button wire:click="openUserRoleModal({{ $user->id }})" class="action-btn primary">
                                            Edit Roles
                                        </button>
                                        @if(auth()->id() !== $user->id)
                                            <button wire:click="deleteUser({{ $user->id }})" 
                                                    onclick="return confirm('Are you sure?')"
                                                    class="action-btn danger">
                                                Delete
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div style="margin-top: 2rem;">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    @endif

    <!-- Products Tab -->
    @if($activeTab === 'products')
        <div class="content-container">
            <div class="white-card">
                <div class="card-header">
                    <h2 class="card-title">Product Management</h2>
                    <select wire:model.live="productStatusFilter" class="filter-select">
                        <option value="">All Products</option>
                        <option value="low_stock">Low Stock</option>
                        <option value="out_of_stock">Out of Stock</option>
                    </select>
                </div>

                <div style="overflow-x: auto;">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Seller</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        <div style="font-weight: 500;">{{ $product->name }}</div>
                                    </td>
                                    <td style="opacity: 0.7;">
                                        {{ $product->seller->name }}
                                    </td>
                                    <td style="opacity: 0.7;">
                                        {{ $product->category->name }}
                                    </td>
                                    <td>
                                        ${{ number_format($product->price, 2) }}
                                    </td>
                                    <td>
                                        <span class="status-badge 
                                            @if($product->stock == 0) out-stock
                                            @elseif($product->stock < 10) low-stock
                                            @else in-stock
                                            @endif">
                                            {{ $product->stock }}
                                        </span>
                                    </td>
                                    <td>
                                        <button wire:click="deleteProduct({{ $product->id }})" 
                                                onclick="return confirm('Are you sure?')"
                                                class="action-btn danger">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div style="margin-top: 2rem;">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    @endif

    <!-- Categories Tab -->
    @if($activeTab === 'categories')
        <div class="content-container">
            <div class="white-card">
                <div class="card-header">
                    <h2 class="card-title">Category Management</h2>
                    <div class="filters-row">
                        <input type="text" 
                               wire:model.live="searchCategories" 
                               placeholder="Search categories..." 
                               class="search-input"
                               style="padding: 0.75rem 1rem; border: 1px solid rgba(42, 42, 42, 0.1); border-radius: 4px; width: 300px; font-family: 'Outfit', sans-serif;">
                        <a href="{{ route('categories.create') }}" class="primary-btn">
                            <i class="fas fa-plus"></i> Add Category
                        </a>
                    </div>
                </div>

                <div style="overflow-x: auto;">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Products Count</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>
                                        <div style="font-weight: 500;">{{ $category->id }}</div>
                                    </td>
                                    <td>
                                        <div style="font-weight: 500;">{{ $category->name }}</div>
                                    </td>
                                    <td>
                                        <span class="status-badge 
                                            @if($category->products_count > 0) paid @else pending @endif">
                                            {{ $category->products_count }} products
                                        </span>
                                    </td>
                                    <td style="opacity: 0.6;">
                                        {{ $category->created_at->format('M d, Y') }}
                                    </td>
                                    <td>
                                        <div style="display: flex; gap: 0.5rem;">
                                            <a href="{{ route('categories.edit', $category->id) }}" 
                                               class="action-btn primary">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <button wire:click="deleteCategory({{ $category->id }})" 
                                                    onclick="return confirm('Are you sure you want to delete this category?')"
                                                    class="action-btn danger"
                                                    @if($category->products_count > 0) disabled title="Cannot delete category with products" @endif>
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div style="margin-top: 2rem;">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    @endif

    <!-- Reviews Tab -->
    @if($activeTab === 'reviews')
        <div class="content-container">
            <div class="white-card">
                <h2 class="card-title" style="margin-bottom: 2rem;">Review Moderation</h2>

                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    @foreach($reviews as $review)
                        <div class="review-card">
                            <div class="review-header">
                                <div>
                                    <span class="review-author">{{ $review->user->name }}</span>
                                    <span class="review-date">{{ $review->created_at->diffForHumans() }}</span>
                                </div>
                                <div style="display: flex; align-items: center; gap: 1rem;">
                                    <span class="review-stars">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $review->rating)
                                                <i class="fas fa-star"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                    </span>
                                    <button wire:click="deleteReview({{ $review->id }})" 
                                            onclick="return confirm('Are you sure?')"
                                            class="action-btn danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>
                            <p class="review-text">{{ $review->comment }}</p>
                            <p class="review-product">Product: <span>{{ $review->product->name }}</span></p>
                        </div>
                    @endforeach
                </div>

                <div style="margin-top: 2rem;">
                    {{ $reviews->links() }}
                </div>
            </div>
        </div>
    @endif

    <!-- Analytics Tab -->
    @if($activeTab === 'analytics')
        <div class="content-container">
            <div class="white-card">
                <h2 class="card-title" style="margin-bottom: 2rem;">Category Distribution</h2>
                <div class="chart-container">
                    @foreach($category_distribution as $data)
                        <div class="chart-bar" 
                             style="height: {{ $category_distribution->max('products_count') > 0 ? ($data->products_count / $category_distribution->max('products_count')) * 100 : 0 }}%"
                             title="{{ $data->name }}: {{ $data->products_count }} products">
                        </div>
                    @endforeach
                </div>
                <div style="display: flex; flex-wrap: wrap; gap: 1rem; margin-top: 1rem; justify-content: center;">
                    @foreach($category_distribution as $data)
                        <span style="font-size: 0.85rem; color: var(--charcoal); opacity: 0.7;">{{ $data->name }}</span>
                    @endforeach
                </div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem; margin-top: 2rem;">
                <div class="white-card">
                    <h2 class="card-title" style="margin-bottom: 1.5rem;">Top 10 Products</h2>
                    <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                        @foreach($top_products as $product)
                            <div class="list-item">
                                <span class="list-label" style="max-width: 70%; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $product->name }}</span>
                                <span class="list-value">{{ $product->order_items_count }} sales</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="white-card">
                    <h2 class="card-title" style="margin-bottom: 1.5rem;">Top 10 Sellers</h2>
                    <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                        @foreach($top_sellers as $seller)
                            <div class="list-item">
                                <span class="list-label">{{ $seller->name }}</span>
                                <span class="list-value">{{ $seller->products_count }} products</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- User Role Modal -->
    @if($showUserRoleModal && $selectedUser)
        <div class="modal-overlay">
            <div class="modal-container">
                <div class="modal-header">
                    <h3 class="modal-title">Edit Roles for {{ $selectedUser->name }}</h3>
                </div>
                
                <div class="modal-body">
                    <div class="checkbox-group">
                        @foreach($roles as $role)
                            <label class="checkbox-label">
                                <input type="checkbox" wire:model="selectedRoles" value="{{ $role->name }}">
                                <span>{{ ucfirst($role->name) }}</span>
                            </label>
                        @endforeach
                    </div>

                    @error('selectedRoles')
                        <p style="margin-top: 1rem; color: var(--terracotta); font-size: 0.9rem;">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="modal-footer">
                    <button wire:click="$set('showUserRoleModal', false)" class="secondary-btn">
                        Cancel
                    </button>
                    <button wire:click="updateUserRoles" class="primary-btn">
                        Update Roles
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>