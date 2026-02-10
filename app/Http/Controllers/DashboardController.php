<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(Request $request): View
    {
        $user = $request->user();

        if (! $user->hasRole(['admin', 'seller', 'moderator'])) {
            return view('dashboard');
        }

        return view('back-office.index', $this->buildBackOfficeDashboard($user));
    }

    private function buildBackOfficeDashboard(User $user): array
    {
        $cacheKey = 'dashboard:backoffice:' . $user->id;

        return Cache::remember($cacheKey, now()->addMinutes(5), function () use ($user) {
            $isSeller = $user->hasRole('seller');

            $now = now();
            $startOfMonth = $now->copy()->startOfMonth();
            $startOfLastMonth = $now->copy()->subMonthNoOverflow()->startOfMonth();
            $endOfLastMonth = $startOfMonth->copy()->subSecond();

            $revenueThisMonth = $this->sumRevenue($user, $isSeller, $startOfMonth, $now);
            $revenueLastMonth = $this->sumRevenue($user, $isSeller, $startOfLastMonth, $endOfLastMonth);

            $ordersThisMonth = $this->countOrders($user, $isSeller, $startOfMonth, $now);
            $ordersLastMonth = $this->countOrders($user, $isSeller, $startOfLastMonth, $endOfLastMonth);
            $paidOrdersThisMonth = $this->countOrdersByStatus(
                $user,
                $isSeller,
                $startOfMonth,
                $now,
                ['paid', 'delivered']
            );

            $avgOrderValue = $ordersThisMonth > 0 ? $revenueThisMonth / $ordersThisMonth : 0;
            $paidRate = $ordersThisMonth > 0 ? ($paidOrdersThisMonth / $ordersThisMonth) * 100 : 0;

            $totalProducts = $this->countProducts($user, $isSeller);
            $totalProductsLastMonth = $this->countProductsBefore($user, $isSeller, $startOfMonth);

            $lowStockThreshold = 10;
            $lowStockCount = $this->countLowStock($user, $isSeller, $lowStockThreshold);
            $lowStockLastMonth = $this->countLowStockBefore($user, $isSeller, $lowStockThreshold, $startOfMonth);

            $reviewsThisMonth = $this->countReviews($user, $isSeller, $startOfMonth, $now);
            $reviewsLastMonth = $this->countReviews($user, $isSeller, $startOfLastMonth, $endOfLastMonth);

            [$revenueChange, $revenueChangeType] = $this->formatDelta($revenueThisMonth, $revenueLastMonth);
            [$ordersChange, $ordersChangeType] = $this->formatDelta($ordersThisMonth, $ordersLastMonth);
            [$productsChange, $productsChangeType] = $this->formatDelta($totalProducts, $totalProductsLastMonth);
            [$lowStockChange, $lowStockChangeType] = $this->formatDelta($lowStockCount, $lowStockLastMonth, true);
            [$reviewsChange, $reviewsChangeType] = $this->formatDelta($reviewsThisMonth, $reviewsLastMonth);

            $kpis = [
                [
                    'title' => 'Revenue (This Month)',
                    'value' => $this->formatMoney($revenueThisMonth),
                    'change' => $revenueChange,
                    'changeType' => $revenueChangeType,
                    'icon' => 'revenue',
                    'note' => $isSeller ? 'Paid items sold' : 'Paid orders',
                ],
                [
                    'title' => 'New Orders',
                    'value' => number_format($ordersThisMonth),
                    'change' => $ordersChange,
                    'changeType' => $ordersChangeType,
                    'icon' => 'orders',
                    'note' => $isSeller ? 'Orders with your items' : 'Across all channels',
                ],
                [
                    'title' => 'Total Products',
                    'value' => number_format($totalProducts),
                    'change' => $productsChange,
                    'changeType' => $productsChangeType,
                    'icon' => 'products',
                    'note' => $isSeller ? 'Your active SKUs' : 'Active SKUs',
                ],
                [
                    'title' => 'Low Stock Items',
                    'value' => number_format($lowStockCount),
                    'change' => $lowStockChange,
                    'changeType' => $lowStockChangeType,
                    'icon' => 'stock',
                    'note' => 'Below ' . $lowStockThreshold . ' units',
                ],
                [
                    'title' => 'New Reviews',
                    'value' => number_format($reviewsThisMonth),
                    'change' => $reviewsChange,
                    'changeType' => $reviewsChangeType,
                    'icon' => 'reviews',
                    'note' => 'This month',
                ],
            ];

            [$chartLabels, $labelDays] = $this->buildChartLabels($startOfMonth);
            $salesSeries = [
                'thisMonth' => $this->buildSalesSeries($user, $isSeller, $startOfMonth, $now, $labelDays),
                'lastMonth' => $this->buildSalesSeries(
                    $user,
                    $isSeller,
                    $startOfLastMonth,
                    $startOfLastMonth->copy()->endOfMonth(),
                    $labelDays
                ),
            ];

            $statusMap = [
                'on_hold' => ['label' => 'On hold', 'color' => '#f59e0b', 'variant' => 'warning'],
                'paid' => ['label' => 'Paid', 'color' => '#38bdf8', 'variant' => 'info'],
                'delivered' => ['label' => 'Delivered', 'color' => '#22c55e', 'variant' => 'success'],
            ];

            $statusCounts = $this->statusCounts($user, $isSeller);
            $statusBreakdown = [];
            $statusVariants = [];
            foreach ($statusMap as $status => $meta) {
                $statusBreakdown[] = [
                    'label' => $meta['label'],
                    'value' => (int) ($statusCounts[$status] ?? 0),
                    'color' => $meta['color'],
                ];
                $statusVariants[$status] = $meta['variant'];
            }
            $statusTotal = array_sum(array_column($statusBreakdown, 'value'));

            $recentOrders = $this->recentOrders($user, $isSeller);

            $stockAlerts = Product::query()
                ->when($isSeller, fn ($query) => $query->where('seller_id', $user->id))
                ->with('category')
                ->orderBy('stock')
                ->take(4)
                ->get()
                ->map(function (Product $product) {
                    return [
                        'product' => $product->name,
                        'stock' => $product->stock,
                        'category' => $product->category?->name ?? 'Uncategorized',
                        'id' => $product->id,
                    ];
                })
                ->all();

            $activities = $this->buildActivities($user, $isSeller);

            return [
                'kpis' => $kpis,
                'revenueSummary' => [
                    'value' => $this->formatMoney($revenueThisMonth),
                    'change' => $revenueChange,
                    'changeType' => $revenueChangeType,
                ],
                'avgOrderValue' => $this->formatMoney($avgOrderValue),
                'paidRate' => number_format($paidRate, 1) . '%',
                'chartLabels' => $chartLabels,
                'recentOrders' => $recentOrders,
                'statusBreakdown' => $statusBreakdown,
                'statusTotal' => $statusTotal,
                'statusVariants' => $statusVariants,
                'stockAlerts' => $stockAlerts,
                'activities' => $activities,
                'salesSeries' => $salesSeries,
            ];
        });
    }

    private function sumRevenue(User $user, bool $isSeller, Carbon $start, Carbon $end): float
    {
        if (! $isSeller) {
            return (float) Order::query()
                ->whereIn('status', ['paid', 'delivered'])
                ->whereBetween('created_at', [$start, $end])
                ->sum('total');
        }

        return (float) OrderItem::query()
            ->join('orders', 'orders.id', '=', 'order_items.order_id')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->where('products.seller_id', $user->id)
            ->whereIn('orders.status', ['paid', 'delivered'])
            ->whereBetween('orders.created_at', [$start, $end])
            ->selectRaw('SUM(order_items.price * order_items.quantity) as total')
            ->value('total') ?? 0.0;
    }

    private function countOrders(User $user, bool $isSeller, Carbon $start, Carbon $end): int
    {
        return (int) $this->scopedOrders($user, $isSeller)
            ->whereBetween('created_at', [$start, $end])
            ->count();
    }

    private function countOrdersByStatus(
        User $user,
        bool $isSeller,
        Carbon $start,
        Carbon $end,
        array $statuses
    ): int {
        return (int) $this->scopedOrders($user, $isSeller)
            ->whereIn('status', $statuses)
            ->whereBetween('created_at', [$start, $end])
            ->count();
    }

    private function countProducts(User $user, bool $isSeller): int
    {
        return (int) Product::query()
            ->when($isSeller, fn ($query) => $query->where('seller_id', $user->id))
            ->count();
    }

    private function countProductsBefore(User $user, bool $isSeller, Carbon $before): int
    {
        return (int) Product::query()
            ->when($isSeller, fn ($query) => $query->where('seller_id', $user->id))
            ->where('created_at', '<', $before)
            ->count();
    }

    private function countLowStock(User $user, bool $isSeller, int $threshold): int
    {
        return (int) Product::query()
            ->when($isSeller, fn ($query) => $query->where('seller_id', $user->id))
            ->where('stock', '<=', $threshold)
            ->count();
    }

    private function countLowStockBefore(User $user, bool $isSeller, int $threshold, Carbon $before): int
    {
        return (int) Product::query()
            ->when($isSeller, fn ($query) => $query->where('seller_id', $user->id))
            ->where('stock', '<=', $threshold)
            ->where('created_at', '<', $before)
            ->count();
    }

    private function countReviews(User $user, bool $isSeller, Carbon $start, Carbon $end): int
    {
        return (int) Review::query()
            ->when(
                $isSeller,
                fn ($query) => $query->whereHas(
                    'product',
                    fn ($productQuery) => $productQuery->where('seller_id', $user->id)
                )
            )
            ->whereBetween('created_at', [$start, $end])
            ->count();
    }

    private function statusCounts(User $user, bool $isSeller): array
    {
        return $this->scopedOrders($user, $isSeller)
            ->selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status')
            ->all();
    }

    private function recentOrders(User $user, bool $isSeller): array
    {
        $orders = $this->scopedOrders($user, $isSeller)
            ->with(['user', 'items.product'])
            ->latest()
            ->take(5)
            ->get();

        return $orders->map(function (Order $order) use ($user, $isSeller) {
            $amount = $order->total;

            if ($isSeller) {
                $amount = $order->items
                    ->filter(fn ($item) => $item->product && $item->product->seller_id === $user->id)
                    ->sum(fn ($item) => $item->price * $item->quantity);
            }

            return [
                'id' => $order->order_number,
                'customer' => $order->user?->name ?? 'Guest',
                'date' => $order->created_at->format('M j, Y'),
                'amount' => $this->formatMoney($amount),
                'status' => $order->status,
            ];
        })->all();
    }

    private function buildActivities(User $user, bool $isSeller): array
    {
        $activities = collect();

        $orders = $this->scopedOrders($user, $isSeller)
            ->with('user')
            ->latest()
            ->take(3)
            ->get();

        foreach ($orders as $order) {
            $activities->push([
                'type' => 'order',
                'title' => 'New order placed',
                'detail' => 'Order ' . $order->order_number . ' by ' . ($order->user?->name ?? 'Guest'),
                'time' => $order->created_at,
            ]);
        }

        $reviews = Review::query()
            ->when(
                $isSeller,
                fn ($query) => $query->whereHas(
                    'product',
                    fn ($productQuery) => $productQuery->where('seller_id', $user->id)
                )
            )
            ->with('product')
            ->latest()
            ->take(3)
            ->get();

        foreach ($reviews as $review) {
            $activities->push([
                'type' => 'review',
                'title' => 'New review added',
                'detail' => ($review->product?->name ?? 'Product') . ' rated ' . $review->rating . '/5',
                'time' => $review->created_at,
            ]);
        }

        $products = Product::query()
            ->when($isSeller, fn ($query) => $query->where('seller_id', $user->id))
            ->latest()
            ->take(3)
            ->get();

        foreach ($products as $product) {
            $activities->push([
                'type' => 'product',
                'title' => 'Product updated',
                'detail' => $product->name . ' added or refreshed',
                'time' => $product->updated_at ?? $product->created_at,
            ]);
        }

        return $activities
            ->sortByDesc('time')
            ->take(4)
            ->values()
            ->map(function (array $activity) {
                return [
                    'type' => $activity['type'],
                    'title' => $activity['title'],
                    'detail' => $activity['detail'],
                    'time' => $activity['time']->diffForHumans(),
                ];
            })
            ->all();
    }

    private function buildChartLabels(Carbon $monthStart): array
    {
        $daysInMonth = $monthStart->daysInMonth;
        $labelDays = [1, 5, 10, 15, 20, 25, $daysInMonth];

        $labels = array_map(
            fn ($day) => str_pad((string) $day, 2, '0', STR_PAD_LEFT),
            $labelDays
        );

        return [$labels, $labelDays];
    }

    private function buildSalesSeries(User $user, bool $isSeller, Carbon $start, Carbon $end, array $labelDays): array
    {
        $daysInMonth = $start->daysInMonth;
        $labels = array_map(fn ($day) => min($day, $daysInMonth), $labelDays);

        if ($isSeller) {
            $dailyTotals = OrderItem::query()
                ->join('orders', 'orders.id', '=', 'order_items.order_id')
                ->join('products', 'products.id', '=', 'order_items.product_id')
                ->where('products.seller_id', $user->id)
                ->whereIn('orders.status', ['paid', 'delivered'])
                ->whereBetween('orders.created_at', [$start, $end])
                ->selectRaw('DATE(orders.created_at) as day, SUM(order_items.price * order_items.quantity) as total')
                ->groupBy('day')
                ->pluck('total', 'day')
                ->all();
        } else {
            $dailyTotals = Order::query()
                ->whereIn('status', ['paid', 'delivered'])
                ->whereBetween('created_at', [$start, $end])
                ->selectRaw('DATE(created_at) as day, SUM(total) as total')
                ->groupBy('day')
                ->pluck('total', 'day')
                ->all();
        }

        return collect($labels)
            ->map(function ($day) use ($start, $dailyTotals) {
                $dateKey = $start->copy()->day($day)->toDateString();
                return round((float) ($dailyTotals[$dateKey] ?? 0), 2);
            })
            ->all();
    }

    private function scopedOrders(User $user, bool $isSeller)
    {
        $query = Order::query();

        if ($isSeller) {
            $query->whereHas('items.product', fn ($itemQuery) => $itemQuery->where('seller_id', $user->id));
        }

        return $query;
    }

    private function formatDelta(float|int $current, float|int $previous, bool $invert = false): array
    {
        $currentValue = (float) $current;
        $previousValue = (float) $previous;

        if ($previousValue == 0.0) {
            $pct = $currentValue == 0.0 ? 0.0 : 100.0;
        } else {
            $pct = (($currentValue - $previousValue) / $previousValue) * 100;
        }

        if ($invert) {
            $pct *= -1;
        }

        $changeType = $pct < 0 ? 'down' : 'up';

        return [sprintf('%+.1f%%', $pct), $changeType];
    }

    private function formatMoney(float $amount): string
    {
        return '$' . number_format($amount, 2);
    }
}
