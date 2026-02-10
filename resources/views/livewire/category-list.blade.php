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

        .categories-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 4rem 2rem;
        }

        .categories-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 3rem;
        }

        .categories-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 3rem;
            font-weight: 300;
            color: var(--charcoal);
        }

        .btn-add {
            background: var(--charcoal);
            color: var(--cream);
            padding: 1rem 2.5rem;
            font-size: 0.95rem;
            letter-spacing: 2px;
            text-decoration: none;
            transition: all 0.4s;
            font-weight: 500;
            position: relative;
            overflow: hidden;
            text-transform: uppercase;
            display: inline-block;
        }

        .btn-add::before {
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

        .btn-add:hover::before {
            left: 0;
        }

        .btn-add:hover {
            color: var(--charcoal);
        }

        .categories-card {
            background: var(--soft-white);
            padding: 3rem;
            border-radius: 4px;
            box-shadow: 0 4px 30px var(--shadow);
        }

        .categories-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .categories-table thead {
            background: var(--cream);
        }

        .categories-table th {
            padding: 1.25rem 1.5rem;
            text-align: left;
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--charcoal);
            border-bottom: 2px solid rgba(42, 42, 42, 0.1);
        }

        .categories-table tbody tr {
            border-bottom: 1px solid rgba(42, 42, 42, 0.05);
            transition: background 0.3s;
        }

        .categories-table tbody tr:hover {
            background: var(--cream);
        }

        .categories-table td {
            padding: 1.5rem;
            color: var(--charcoal);
        }

        .category-name {
            font-weight: 500;
            font-size: 1.05rem;
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn-edit,
        .btn-delete {
            padding: 0.5rem 1.25rem;
            font-size: 0.85rem;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s;
            text-transform: uppercase;
            font-weight: 500;
            text-decoration: none;
            border: none;
            background: transparent;
        }

        .btn-edit {
            color: var(--sage);
            border: 1px solid var(--sage);
        }

        .btn-edit:hover {
            background: var(--sage);
            color: var(--soft-white);
        }

        .btn-delete {
            color: var(--terracotta);
            border: 1px solid var(--terracotta);
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
            .categories-container {
                padding: 2rem 1rem;
            }

            .categories-header {
                flex-direction: column;
                gap: 1.5rem;
                align-items: flex-start;
            }

            .categories-title {
                font-size: 2rem;
            }

            .categories-card {
                padding: 1.5rem;
            }

            .categories-table {
                display: block;
                overflow-x: auto;
            }

            .categories-table th,
            .categories-table td {
                padding: 1rem;
            }

            .action-buttons {
                flex-direction: column;
                gap: 0.5rem;
            }

            .btn-edit,
            .btn-delete {
                width: 100%;
            }
        }
    </style>

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <div class="categories-container">
        @if(session('message'))
            <div style="background: #9CAF88; color: white; padding: 1rem 2rem; border-radius: 4px; margin-bottom: 2rem; text-align: center;">
                {{ session('message') }}
            </div>
        @endif
        
        <div class="categories-header">
            <h1 class="categories-title">Categories</h1>
            <a href="{{ request()->is('backoffice/*') ? route('backoffice.categories.create') : route('categories.create') }}" class="btn-add">
                <i class="fas fa-plus"></i> Add Category
            </a>
        </div>

        <div class="categories-card">
            @if(count($categories) > 0)
                <table class="categories-table">
                    <thead>
                        <tr>
                            <th>Category Name</th>
                            <th style="text-align: right;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $cat)
                        <tr>
                            <td class="category-name">{{ $cat->name }}</td>
                            <td style="text-align: right;">
                                <div class="action-buttons" style="justify-content: flex-end;">
                                    <a href="{{ request()->is('backoffice/*') ? route('backoffice.categories.edit', $cat->id) : route('categories.edit', $cat->id) }}" class="btn-edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <button 
                                        wire:click="delete({{ $cat->id }})" 
                                        class="btn-delete"
                                        onclick="return confirm('Are you sure you want to delete this category?')"
                                    >
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-folder-open"></i>
                    </div>
                    <h3 class="empty-title">No Categories Yet</h3>
                    <p class="empty-text">Create your first category to organize products</p>
                </div>
            @endif
        </div>
    </div>
</div>