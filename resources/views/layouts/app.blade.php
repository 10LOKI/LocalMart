<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>
<body class="bg-gray-50">
    <nav class="bg-white shadow mb-4">
        <div class="max-w-7xl mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <a href="/" class="text-xl font-bold">E-commerce</a>
                
                @auth
                <div class="flex gap-4">
                    <a href="/categories" class="hover:text-blue-500">Categories</a>
                    <a href="/products" class="hover:text-blue-500">Products</a>
                    <a href="/orders" class="hover:text-blue-500">Orders</a>
                    <a href="/reviews" class="hover:text-blue-500">Reviews</a>
                    <a href="/cart" class="hover:text-blue-500">Cart</a>
                    
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-red-500">Logout</button>
                    </form>
                </div>
                @endauth
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto">
        {{ $slot }}
    </main>

    @livewireScripts
</body>
</html>