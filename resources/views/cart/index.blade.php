<x-app-layout>
    <div class='py-8'>
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <x-slot name='header' class="text-2xl font-semibold mb-4">{{ __('cart.show.title') }}</x-slot>

                <div class="bg-white p-4 shadow-md rounded-md mb-4">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="py-2">{{ __('cart.Product') }}</th>
                                <th class="py-2">{{ __('cart.Price') }}</th>
                                <th class="py-2">{{ __('cart.Quantity') }}</th>
                                <th class="py-2">{{ __('cart.Total') }}</th>
                                <th class="py-2">{{ __('cart.Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Loop through cart items -->
                            @foreach ($user->cartItems as $item)
                                <tr>
                                    <td class="py-2 text-center"><a
                                            href="{{ route('products.show', $item['product']['id']) }}">{{ $item['product']['name'] }}</a>
                                    </td>
                                    <td class="py-2 text-center">
                                        {{ formatCurrency($item['product']['price'], __('currency')) }}</td>
                                    <td class="py-2 text-center">
                                        <input type="number" class="w-16 p-1 border rounded-md"
                                            value="{{ $item['quantity'] }}" min="1">
                                    </td>
                                    <td class="py-2 text-center">
                                        {{ formatCurrency($item['total_price'], __('currency')) }}
                                    </td>
                                    <td class="py-2 text-center">
                                        <button class="text-red-500 hover:text-red-700">{{ __('Remove') }}</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class='p-4 pt-0 rounded-md'>
                    <div class="text-right"><strong>{{ __('Total') }}:
                            {{ formatCurrency($user->cartItems->sum('total_price')) }}
                        </strong></div>
                    <div class="text-right">
                        <button class="button edit">
                            {{ __('Checkout') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
