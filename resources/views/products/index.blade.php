<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full">
                <div class="grid grid-cols-4 gap-4">
                    @foreach ($products as $index => $product)
                    <div class="w-full h-1/3 bg-white shadow-lg flex flex-col justify-between">

                        <div class="flex justify-center">
                            <div class="w-full h-full rounded overflow-hidden">
                                <img class="w-full" src="{{ $product->photo }}" alt="Card image">
                                <div class="px-6 py-4">
                                    <div class="flex justify-between items-center">
                                        <div class="font-bold text-xl mb-4">{{ $product->name }}</div>
                                        <div class="font-bold text-sm text-gray-400 mb-4">{{__('Đã bán: ')}}{{ $product->number_of_purchase }}</div>
                                    </div>
                                    <div class="text-gray-700 text-base">
                                        @php
                                            $limitedDescription = Str::limit($product->description, 100);
                                        @endphp
                                        {{ $limitedDescription }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-between">
                            <div class="px-6 font-bold text-xl text-red-600 mb-4">{{ $product->price }} $</div>
                            <button class="px-6 mb-4">
                                <i class="fa fa-cart-plus"></i>
                            </button>
                        </div>

                    </div>
                    @endforeach
                </div>

                <div class="mt-4">
                    {{ $products->links('pagination::tailwind') }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
