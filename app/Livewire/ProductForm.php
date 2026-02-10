<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use App\Models\ProductPhoto;
use App\Models\Category;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProductForm extends Component
{
    use WithFileUploads;
    use AuthorizesRequests;

    public $productId;
    public $name, $description, $price, $stock, $category_id;
    public $images = [];
    public $existingPhotos = [];

    public function mount($id = null)
    {
        if ($id) {
            $product = Product::with('photos')->find($id);
            if (! $product) {
                abort(404);
            }

            $this->authorize('update', $product);
            
            $this->productId = $product->id;
            $this->name = $product->name;
            $this->description = $product->description;
            $this->price = $product->price;
            $this->stock = $product->stock;
            $this->category_id = $product->category_id;
            $this->existingPhotos = $product->photos;
        }
    }

    public function removeImage($index)
    {
        array_splice($this->images, $index, 1);
    }

    public function deletePhoto($photoId)
    {
        $photo = ProductPhoto::find($photoId);
        
        if ($photo && $photo->product->seller_id == auth()->id()) {
            if (Storage::disk('public')->exists($photo->image)) {
                Storage::disk('public')->delete($photo->image);
            }
            
            $photo->delete();
            $this->existingPhotos = ProductPhoto::where('product_id', $this->productId)->get();
            
            session()->flash('message', 'Photo deleted successfully!');
        }
    }

    public function save()
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'images.*' => 'nullable|image|max:2048',
        ]);

        try {
            if ($this->productId) {
                $product = Product::find($this->productId);
                if (! $product) {
                    abort(404);
                }
                $this->authorize('update', $product);
                
                $product->update([
                    'name' => $this->name,
                    'description' => $this->description,
                    'price' => $this->price,
                    'stock' => $this->stock,
                    'category_id' => $this->category_id,
                ]);

                $message = 'Product updated successfully!';
            } else {
                $this->authorize('create', Product::class);
                $product = Product::create([
                    'seller_id' => auth()->id(),
                    'name' => $this->name,
                    'description' => $this->description,
                    'price' => $this->price,
                    'stock' => $this->stock,
                    'category_id' => $this->category_id,
                ]);

                $message = 'Product created successfully!';
            }

            if ($this->images) {
                foreach ($this->images as $image) {
                    $path = $image->store('products', 'public');
                    $product->photos()->create(['image' => $path]);
                }
            }

            session()->flash('message', $message);
            
            $route = request()->is('backoffice/*') ? 'backoffice.products.index' : 'products.index';
            return redirect()->route($route);
        } catch (\Exception $e) {
            logger('Product save error: ' . $e->getMessage());
            session()->flash('error', 'Failed to save product. Please try again.');
        }
    }

    public function render()
    {
        $layout = request()->is('backoffice/*') ? 'layouts.backoffice' : 'layouts.app';
        return view('livewire.product-form', [
            'categories' => Category::all()
        ])->layout($layout);
    }
}
