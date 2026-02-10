<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Layout;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CategoryList extends Component
{
    use AuthorizesRequests;

    public function delete($id)
    {
        $category = Category::withCount('products')->find($id);

        if (! $category) {
            return;
        }

        $this->authorize('delete', $category);

        if ($category->products_count > 0) {
            session()->flash('error', 'Cannot delete a category with products. Reassign or remove products first.');
            return;
        }

        $category->delete();
        session()->flash('message', 'Category deleted successfully!');
    }

    public function render()
    {
        $layout = request()->is('backoffice/*') ? 'layouts.backoffice' : 'layouts.app';
        return view('livewire.category-list', [
            'categories' => Category::all()
        ])->layout($layout);
    }
}
