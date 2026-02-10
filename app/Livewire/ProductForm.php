<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use App\Models\ProductPhoto;
use App\Models\Category;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;

#[Layout('layouts.app')]
class ProductForm extends Component
{
    use WithFileUploads;

    public $productId;
    public $name, $description, $price, $stock, $category_id;
    public $images = [];
    public $existingPhotos = [];

    public function mount($id = null)
    {
        if ($id) {
            $product = Product::with('photos')->find($id);
            
 
            if (auth()->user()->hasRole('seller') && $product->seller_id != auth()->id()) {
                abort(403, 'Unauthorized');
            }
            
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
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'images.*' => 'nullable|image|max:2048',
        ]);

        if ($this->productId) {

            $product = Product::find($this->productId);
            

            if (auth()->user()->hasRole('seller') && $product->seller_id != auth()->id()) {
                abort(403, 'Unauthorized');
            }
            
            $product->update([
                'name' => $this->name,
                'description' => $this->description,
                'price' => $this->price,
                'stock' => $this->stock,
                'category_id' => $this->category_id,
            ]);

            session()->flash('message', 'Product updated successfully!');
        } else {

            $product = Product::create([
                'seller_id' => auth()->id(),
                'name' => $this->name,
                'description' => $this->description,
                'price' => $this->price,
                'stock' => $this->stock,
                'category_id' => $this->category_id,
            ]);

            session()->flash('message', 'Product created successfully!');
        }


        if ($this->images) {
            foreach ($this->images as $image) {
                $path = $image->store('products', 'public');
                $product->photos()->create(['image' => $path]);
            }
        }

        return redirect('/products');
    }

    public function render()
    {
        return view('livewire.product-form', [
            'categories' => Category::all()
        ]);
    }
}