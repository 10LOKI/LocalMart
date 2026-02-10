<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Review;
use Livewire\Attributes\Layout;
#[Layout('layouts.backoffice')]

class ReviewList extends Component
{
    public function delete($id)
    {
        $review = Review::find($id);

        if (auth()->user()->hasRole('admin') ||
            (auth()->user()->hasRole('seller') && $review->product->seller_id == auth()->id()) ||
            $review->user_id == auth()->id()) {
            $review->delete();
            session()->flash('message', 'Review deleted successfully!');
        }
    }

    public function render()
    {
        $query = Review::with('product', 'user');

        if (auth()->user()->hasRole('seller')) {
            $query->whereHas('product', function($q) {
                $q->where('seller_id', auth()->id());
            });
        }

        return view('livewire.review-list', [
            'reviews' => $query->get()
        ]);
    }
}
