<?php

namespace App\Livewire\Frontoffice;

use Livewire\Component;
use App\Models\Review;
use Livewire\Attributes\Layout;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
#[Layout('layouts.app')]

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
    }

    public function render()
    {
        return view('livewire.frontoffice.review-list', [
            'reviews' => Review::with('product', 'user')->get()
        ]);
    }
}
