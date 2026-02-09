<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Layout;
#[Layout('layouts.app')]

class CategoryList extends Component
{
    public function delete($id)
    {
        Category::find($id)->delete();
    }

    public function render()
    {
        return view('livewire.category-list', [
            'categories' => Category::all()
        ]);
    }
}
