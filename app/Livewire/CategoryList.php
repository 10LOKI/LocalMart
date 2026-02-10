<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Layout;

class CategoryList extends Component
{
    public function delete($id)
    {
        Category::find($id)->delete();
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
