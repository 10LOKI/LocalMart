<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Review;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ReviewList extends Component
{
    use AuthorizesRequests;

    public function delete($id)
    {
        $review = Review::with('product')->find($id);

        if (! $review) {
            return;
        }

        $this->authorize('delete', $review);
        $review->delete();
        session()->flash('message', 'Review deleted successfully!');
    }

    public function render()
    {
        $user = auth()->user();

        $query = Review::with(['product', 'user'])->latest();

        if ($user->hasRole('seller')) {
            $query->whereHas('product', function ($productQuery) use ($user) {
                $productQuery->where('seller_id', $user->id);
            });
        } elseif (! $user->hasAnyRole(['admin', 'moderator'])) {
            $query->where('user_id', $user->id);
        }

        $layout = request()->is('backoffice/*') ? 'layouts.backoffice' : 'layouts.app';

        return view('livewire.review-list', [
            'reviews' => $query->get(),
        ])->layout($layout);
    }
}
