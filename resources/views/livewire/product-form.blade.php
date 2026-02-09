<div>
    <style>
        .product-form-container {
            max-width: 900px;
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

        .form-label .required {
            color: var(--terracotta);
        }

        .form-input,
        .form-select,
        .form-textarea {
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

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            outline: none;
            border-color: var(--gold);
            background: var(--soft-white);
        }

        .form-textarea {
            min-height: 120px;
            resize: vertical;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
        }

        .error-message {
            color: var(--terracotta);
            font-size: 0.85rem;
            margin-top: 0.5rem;
            font-weight: 400;
        }

        /* Image Upload Section */
        .image-upload-section {
            margin-bottom: 2rem;
        }

        .image-upload-label {
            display: block;
            width: 100%;
            padding: 3rem;
            border: 2px dashed rgba(42, 42, 42, 0.3);
            background: var(--cream);
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            border-radius: 2px;
        }

        .image-upload-label:hover {
            border-color: var(--gold);
            background: var(--soft-white);
        }

        .upload-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--charcoal);
            opacity: 0.4;
        }

        .upload-text {
            font-size: 1rem;
            color: var(--charcoal);
            opacity: 0.7;
            margin-bottom: 0.5rem;
        }

        .upload-hint {
            font-size: 0.85rem;
            color: var(--charcoal);
            opacity: 0.5;
        }

        .image-upload-input {
            display: none;
        }

        /* Image Preview Grid */
        .image-preview-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .image-preview-item {
            position: relative;
            aspect-ratio: 1;
            border-radius: 4px;
            overflow: hidden;
            background: var(--cream);
            border: 1px solid rgba(42, 42, 42, 0.1);
        }

        .image-preview-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .remove-image-btn {
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
            background: var(--charcoal);
            color: var(--cream);
            border: none;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: all 0.3s;
            font-size: 0.85rem;
        }

        .image-preview-item:hover .remove-image-btn {
            opacity: 1;
        }

        .remove-image-btn:hover {
            background: var(--terracotta);
            transform: scale(1.1);
        }

        /* Existing Images */
        .existing-images {
            margin-top: 2rem;
        }

        .existing-images-title {
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 1px;
            margin-bottom: 1rem;
            color: var(--charcoal);
            text-transform: uppercase;
        }

        /* Form Actions */
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

        /* Loading State */
        .btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .product-form-container {
                padding: 2rem 1rem;
            }
            .form-card {
                padding: 2rem 1.5rem;
            }
            .form-row {
                grid-template-columns: 1fr;
                gap: 1.5rem;
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

    <div class="product-form-container">
        <div class="form-header">
            <h1 class="form-title">{{ $productId ? 'Edit Product' : 'Create Product' }}</h1>
            <p class="form-subtitle">{{ $productId ? 'Update your product details' : 'Add a new product to your collection' }}</p>
        </div>

        <div class="form-card">
            <form wire:submit.prevent="save">
                <!-- Product Name -->
                <div class="form-group">
                    <label class="form-label">
                        Product Name <span class="required">*</span>
                    </label>
                    <input 
                        type="text" 
                        class="form-input" 
                        wire:model="name"
                        placeholder="Enter product name"
                    >
                    @error('name') 
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Category and Price Row -->
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">
                            Category <span class="required">*</span>
                        </label>
                        <select class="form-select" wire:model="category_id">
                            <option value="">Select a category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') 
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            Price <span class="required">*</span>
                        </label>
                        <input 
                            type="number" 
                            step="0.01" 
                            class="form-input" 
                            wire:model="price"
                            placeholder="0.00"
                        >
                        @error('price') 
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Stock -->
                <div class="form-group">
                    <label class="form-label">
                        Stock Quantity <span class="required">*</span>
                    </label>
                    <input 
                        type="number" 
                        class="form-input" 
                        wire:model="stock"
                        placeholder="0"
                    >
                    @error('stock') 
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label class="form-label">
                        Description <span class="required">*</span>
                    </label>
                    <textarea 
                        class="form-textarea" 
                        wire:model="description"
                        placeholder="Describe your product in detail..."
                    ></textarea>
                    @error('description') 
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Image Upload -->
                <div class="image-upload-section">
                    <label class="form-label">
                        Product Images <span class="required">*</span>
                    </label>
                    <label class="image-upload-label" for="image-upload">
                        <div class="upload-icon">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>
                        <div class="upload-text">Click to upload images</div>
                        <div class="upload-hint">PNG, JPG up to 2MB each (Multiple files allowed)</div>
                    </label>
                    <input 
                        type="file" 
                        id="image-upload"
                        class="image-upload-input" 
                        wire:model="images"
                        multiple
                        accept="image/*"
                    >
                    @error('images.*') 
                        <div class="error-message">{{ $message }}</div>
                    @enderror

                    <!-- Image Previews -->
                    @if ($images)
                        <div class="image-preview-grid">
                            @foreach($images as $index => $image)
                                <div class="image-preview-item" wire:key="image-{{ $index }}">
                                    <img src="{{ $image->temporaryUrl() }}" alt="Preview">
                                    <button 
                                        type="button" 
                                        class="remove-image-btn"
                                        wire:click="removeImage({{ $index }})"
                                    >
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <!-- Loading Indicator -->
                    <div wire:loading wire:target="images" style="margin-top: 1rem; color: var(--gold); font-size: 0.9rem;">
                        <i class="fas fa-spinner fa-spin"></i> Uploading images...
                    </div>
                </div>

                <!-- Existing Images (for edit mode) -->
                @if($productId && isset($existingPhotos) && count($existingPhotos) > 0)
                    <div class="existing-images">
                        <div class="existing-images-title">Current Images</div>
                        <div class="image-preview-grid">
                            @foreach($existingPhotos as $photo)
                                <div class="image-preview-item" wire:key="existing-{{ $photo->id }}">
                                    <img src="{{ Storage::url($photo->image) }}" alt="Product image">
                                    <button 
                                        type="button" 
                                        class="remove-image-btn"
                                        wire:click="deletePhoto({{ $photo->id }})"
                                    >
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Form Actions -->
                <div class="form-actions">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">
                        CANCEL
                    </a>
                    <button 
                        type="submit" 
                        class="btn btn-primary"
                        wire:loading.attr="disabled"
                    >
                        <span wire:loading.remove wire:target="save">
                            {{ $productId ? 'UPDATE PRODUCT' : 'CREATE PRODUCT' }}
                        </span>
                        <span wire:loading wire:target="save">
                            <i class="fas fa-spinner fa-spin"></i> SAVING...
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>