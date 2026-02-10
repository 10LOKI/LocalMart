<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Review;
use Livewire\Attributes\Layout;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
#[Layout('layouts.backoffice')]

class ReviewList extends Component
{
    use AuthorizesRequests;

    public function delete($id)
    {
        $review = Review::find($id);

        if (! $review) {
            return;
        }

        $this->authorize('delete', $review);

        $review->delete();
        session()->flash('message', 'Review deleted successfully!');
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
