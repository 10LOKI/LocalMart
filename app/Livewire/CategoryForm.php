<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Layout;

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
        $this->validate(['name' => 'required|string|max:255']);

        if ($this->categoryId) {
            Category::find($this->categoryId)->update(['name' => $this->name]);
            session()->flash('message', 'Category updated successfully!');
        } else {
            Category::create(['name' => $this->name]);
            session()->flash('message', 'Category created successfully!');
        }

        $route = request()->is('backoffice/*') ? 'backoffice.categories.index' : 'categories.manage';
        return redirect()->route($route);
    }

    public function render()
    {
        $layout = request()->is('backoffice/*') ? 'layouts.backoffice' : 'layouts.app';
        return view('livewire.category-form')->layout($layout);
    }
}