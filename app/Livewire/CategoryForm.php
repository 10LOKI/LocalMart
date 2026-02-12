<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CategoryForm extends Component
{
    use AuthorizesRequests;

    public $categoryId;
    public $name;

    public function mount($id = null)
    {
        if ($id) {
            $category = Category::findOrFail($id);
            $this->authorize('update', $category);
            $this->categoryId = $category->id;
            $this->name = $category->name;
        }
    }

    public function save()
    {
        $this->validate(['name' => 'required|string|max:255']);

        if ($this->categoryId) {
            $category = Category::findOrFail($this->categoryId);
            $this->authorize('update', $category);
            $category->update(['name' => $this->name]);
        } else {
            $this->authorize('create', Category::class);
            Category::create(['name' => $this->name]);
        }

        $route = request()->is('backoffice/*')
            ? 'backoffice.categories.index'
            : 'categories.index';

        return redirect()->route($route);
    }

    public function render()
    {
        $layout = request()->is('backoffice/*') ? 'layouts.backoffice' : 'layouts.app';

        return view('livewire.category-form')->layout($layout);
    }
}
