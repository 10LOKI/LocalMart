<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Layout;
#[Layout('layouts.app')]
class CategoryForm extends Component
{
    public $categoryId;
    public $name;

    public function mount($id = null)
    {
        if ($id) {
            $category = Category::find($id);
            $this->categoryId = $category->id;
            $this->name = $category->name;
        }
    }

    public function save()
    {
        $this->validate(['name' => 'required']);

        if ($this->categoryId) {
            Category::find($this->categoryId)->update(['name' => $this->name]);
        } else {
            Category::create(['name' => $this->name]);
        }

        return redirect()->route('categories.manage');
    }

    public function render()
    {
        return view('livewire.category-form');
    }
}