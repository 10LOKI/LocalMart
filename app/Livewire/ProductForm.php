<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use App\Models\Category;
use Livewire\Attributes\Layout;
#[Layout('layouts.app')]

class ProductForm extends Component
{
    use WithFileUploads;

    public $productId;
    public $name, $description, $price, $stock, $category_id, $image;

    public function mount($id = null)
    {
        if ($id) {
            $product = Product::find($id);
            $this->productId = $product->id;
            $this->name = $product->name;
            $this->description = $product->description;
            $this->price = $product->price;
            $this->stock = $product->stock;
            $this->category_id = $product->category_id;
        }
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required',
            'image' => 'nullable|image',
        ]);

        $imagePath = null;
        if ($this->image) {
            $imagePath = $this->image->store('products', 'public');
        }

        if ($this->productId) {
            $product = Product::find($this->productId);
            $product->update([
                'name' => $this->name,
                'description' => $this->description,
                'price' => $this->price,
                'stock' => $this->stock,
                'category_id' => $this->category_id,
                'image' => $imagePath ?? $product->image,
            ]);
        } else {
            Product::create([
                'seller_id' => auth()->id(),
                'name' => $this->name,
                'description' => $this->description,
                'price' => $this->price,
                'stock' => $this->stock,
                'category_id' => $this->category_id,
                'image' => $imagePath,
            ]);
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