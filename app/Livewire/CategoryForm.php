<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Layout;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Validation\Rule;

class CategoryForm extends Component
{
    use AuthorizesRequests;

    public $categoryId;
    public $name;

    public function mount($id = null)
    {
        if ($id) {
            $category = Category::find($id);
            if (! $category) {
                abort(404);
            }
            $this->authorize('update', $category);
            $this->categoryId = $category->id;
            $this->name = $category->name;
        }
    }

    public function save()
    {
        $this->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories', 'name')->ignore($this->categoryId),
            ],
        ]);

        if ($this->categoryId) {
            $category = Category::find($this->categoryId);
            if (! $category) {
                abort(404);
            }
            $this->authorize('update', $category);
            $category->update(['name' => $this->name]);
            session()->flash('message', 'Category updated successfully!');
        } else {
            $this->authorize('create', Category::class);
            Category::create(['name' => $this->name]);
            session()->flash('message', 'Category created successfully!');
        }

<<<<<<< HEAD
        $route = request()->is('backoffice/*') ? 'backoffice.categories.index' : 'categories.index';
        return redirect()->route($route);
=======
        return redirect('/admin/dashboard?activeTab=categories');
>>>>>>> 88e84881e59668fbfb56a59ae221eb778e98face
    }

    public function render()
    {
        $layout = request()->is('backoffice/*') ? 'layouts.backoffice' : 'layouts.app';
        return view('livewire.category-form')->layout($layout);
    }
}
