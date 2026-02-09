<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">{{ __("Welcome to LocalMart!") }}</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
                        <a href="{{ route('products.index') }}" class="block p-6 bg-blue-50 dark:bg-blue-900 rounded-lg hover:bg-blue-100 dark:hover:bg-blue-800">
                            <h4 class="font-bold text-lg mb-2">{{ __('Browse Products') }}</h4>
                            <p class="text-sm">{{ __('Explore our product catalog') }}</p>
                        </a>
                        
                        <a href="{{ route('cart') }}" class="block p-6 bg-green-50 dark:bg-green-900 rounded-lg hover:bg-green-100 dark:hover:bg-green-800">
                            <h4 class="font-bold text-lg mb-2">{{ __('My Cart') }}</h4>
                            <p class="text-sm">{{ __('View your shopping cart') }}</p>
                        </a>
                        
                        <a href="{{ route('reviews.index') }}" class="block p-6 bg-purple-50 dark:bg-purple-900 rounded-lg hover:bg-purple-100 dark:hover:bg-purple-800">
                            <h4 class="font-bold text-lg mb-2">{{ __('Reviews') }}</h4>
                            <p class="text-sm">{{ __('Read and write reviews') }}</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
