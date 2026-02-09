<?php

namespace App\Livewire\Frontoffice;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class CategoryList extends Component
{
    public function render()
    {
        return view('livewire.frontoffice.category-list', [
            'categories' => Category::withCount('products')->with('products')->get()
        ]);
    }
}
