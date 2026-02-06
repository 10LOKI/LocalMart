<?php

namespace App\Livewire\Frontoffice;

use Livewire\Component;
use App\Models\Review;
use Livewire\Attributes\Layout;
#[Layout('layouts.app')]

class ReviewList extends Component
{
    public function delete($id)
    {
        Review::find($id)->delete();
    }

    public function render()
    {
        return view('livewire.frontoffice.review-list', [
            'reviews' => Review::with('product', 'user')->get()
        ]);
    }
}