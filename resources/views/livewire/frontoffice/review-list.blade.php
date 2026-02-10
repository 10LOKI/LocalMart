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

        .reviews-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 4rem 2rem;
        }

        .reviews-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .reviews-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 3rem;
            font-weight: 300;
            color: var(--charcoal);
            margin-bottom: 0.5rem;
        }

        .reviews-subtitle {
            font-size: 1rem;
            color: var(--charcoal);
            opacity: 0.6;
            font-weight: 300;
        }

        .reviews-card {
            background: var(--soft-white);
            padding: 3rem;
            border-radius: 4px;
            box-shadow: 0 4px 30px var(--shadow);
        }

        .reviews-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .reviews-table thead {
            background: var(--cream);
        }

        .reviews-table th {
            padding: 1.25rem 1.5rem;
            text-align: left;
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--charcoal);
            border-bottom: 2px solid rgba(42, 42, 42, 0.1);
        }

        .reviews-table tbody tr {
            border-bottom: 1px solid rgba(42, 42, 42, 0.05);
            transition: background 0.3s;
        }

        .reviews-table tbody tr:hover {
            background: var(--cream);
        }

        .reviews-table td {
            padding: 1.5rem;
            color: var(--charcoal);
        }

        .product-name {
            font-weight: 500;
            font-size: 1.05rem;
        }

        .user-name {
            font-weight: 400;
        }

        .rating-stars {
            display: flex;
            gap: 0.25rem;
            align-items: center;
        }

        .rating-stars i {
            color: var(--gold);
        }

        .rating-text {
            font-weight: 600;
            color: var(--charcoal);
            margin-left: 0.5rem;
        }

        .review-comment {
            max-width: 350px;
            line-height: 1.6;
            color: var(--charcoal);
            opacity: 0.8;
        }

        .btn-delete {
            color: var(--terracotta);
            border: 1px solid var(--terracotta);
            padding: 0.5rem 1.25rem;
            font-size: 0.85rem;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s;
            text-transform: uppercase;
            font-weight: 500;
            background: transparent;
        }

        .btn-delete:hover {
            background: var(--terracotta);
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
            .reviews-container {
                padding: 2rem 1rem;
            }

            .reviews-card {
                padding: 1.5rem;
            }

            .reviews-title {
                font-size: 2rem;
            }

            .reviews-table {
                display: block;
                overflow-x: auto;
            }

            .reviews-table th,
            .reviews-table td {
                padding: 1rem;
                font-size: 0.9rem;
            }

            .review-comment {
                max-width: 200px;
            }
        }
    </style>

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <div class="reviews-container">
        <div class="reviews-header">
            <h1 class="reviews-title">Customer Reviews</h1>
            <p class="reviews-subtitle">Manage product feedback and ratings</p>
        </div>

        <div class="reviews-card">
            @if(count($reviews) > 0)
                <table class="reviews-table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Customer</th>
                            <th>Rating</th>
                            <th>Comment</th>
                            <th style="text-align: right;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reviews as $review)
                        <tr>
                            <td class="product-name">{{ $review->product->name }}</td>
                            <td class="user-name">{{ $review->user->name }}</td>
                            <td>
                                <div class="rating-stars">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $review->rating)
                                            <i class="fas fa-star"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                    <span class="rating-text">{{ $review->rating }}/5</span>
                                </div>
                            </td>
                            <td>
                                <div class="review-comment">{{ $review->comment }}</div>
                            </td>
                            <td style="text-align: right;">
                                @can('delete', $review)
                                    <button 
                                        wire:click="delete({{ $review->id }})" 
                                        class="btn-delete"
                                        onclick="return confirm('Are you sure you want to delete this review?')"
                                    >
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3 class="empty-title">No Reviews Yet</h3>
                    <p class="empty-text">Customer reviews will appear here once products receive ratings</p>
                </div>
            @endif
        </div>
    </div>
</div>
