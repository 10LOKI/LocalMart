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

        .category-form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 4rem 2rem;
        }

        .form-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .form-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 3rem;
            font-weight: 300;
            color: var(--charcoal);
            margin-bottom: 0.5rem;
        }

        .form-subtitle {
            font-size: 1rem;
            color: var(--charcoal);
            opacity: 0.6;
            font-weight: 300;
        }

        .form-card {
            background: var(--soft-white);
            padding: 3rem;
            border-radius: 4px;
            box-shadow: 0 4px 30px var(--shadow);
        }

        .form-group {
            margin-bottom: 2rem;
        }

        .form-label {
            display: block;
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 1px;
            margin-bottom: 0.75rem;
            color: var(--charcoal);
            text-transform: uppercase;
        }

        .form-input {
            width: 100%;
            padding: 1rem 1.25rem;
            border: 1px solid rgba(42, 42, 42, 0.2);
            background: var(--cream);
            color: var(--charcoal);
            font-size: 1rem;
            font-family: 'Outfit', sans-serif;
            transition: all 0.3s;
            border-radius: 2px;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--gold);
            background: var(--soft-white);
        }

        .form-input::placeholder {
            color: rgba(42, 42, 42, 0.4);
        }

        .error-message {
            color: var(--terracotta);
            font-size: 0.85rem;
            margin-top: 0.5rem;
            font-weight: 400;
        }

        .form-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(42, 42, 42, 0.1);
        }

        .btn {
            padding: 1rem 3rem;
            border: none;
            font-size: 0.95rem;
            letter-spacing: 2px;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            font-family: 'Outfit', sans-serif;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            text-transform: uppercase;
        }

        .btn-primary {
            background: var(--charcoal);
            color: var(--cream);
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--gold);
            transition: left 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: -1;
        }

        .btn-primary:hover::before {
            left: 0;
        }

        .btn-primary:hover {
            color: var(--charcoal);
        }

        .btn-secondary {
            background: transparent;
            color: var(--charcoal);
            border: 1px solid var(--charcoal);
        }

        .btn-secondary:hover {
            background: var(--charcoal);
            color: var(--cream);
        }

        @media (max-width: 768px) {
            .category-form-container {
                padding: 2rem 1rem;
            }

            .form-card {
                padding: 2rem 1.5rem;
            }

            .form-title {
                font-size: 2rem;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">

    <div class="category-form-container">
        <div class="form-header">
            <h1 class="form-title">{{ $categoryId ? 'Edit Category' : 'Create Category' }}</h1>
            <p class="form-subtitle">{{ $categoryId ? 'Update category details' : 'Add a new product category' }}</p>
        </div>

        <div class="form-card">
            <form wire:submit.prevent="save">
                <div class="form-group">
                    <label class="form-label">Category Name</label>
                    <input 
                        type="text" 
                        class="form-input" 
                        wire:model="name" 
                        placeholder="Enter category name"
                    >
                    @error('name') 
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-actions">
                    <a href="/categories" class="btn btn-secondary">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        {{ $categoryId ? 'Update Category' : 'Create Category' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>