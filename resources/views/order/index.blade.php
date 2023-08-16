<x-app-layout>
    <x-slot name="header">{{ __('order.index.title') }}</x-slot>

    <div class='py-8'>
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if ($user->orders->count())
                @foreach ($user->orders as $order)
                    <div class="mb-2 bg-white rounded p-4 flex flex-col items-center">
                        <div class="border rounded-md border-blue-500 w-full p-2 mb-4 mt-2">
                            {{ __('constant.orderStatus.' . $order->orderItems[0]->status) }}
                        </div>
                        @foreach ($order->orderItems as $orderItem)
                            @if ($loop->iteration < 3)
                                <div class="flex mb-2 w-full">
                                    <div class="w-1/6 mr-4">
                                        <img class="object-cover" src="{{ $orderItem->product->photo }}"
                                            alt="{{ $orderItem->product->name }}">
                                    </div>
                                    <div class="grow">
                                        <strong class="text-xl">{{ $orderItem->product->name }}</strong>
                                        <div class="flex justify-between mt-4 items-end">
                                            <div class="text-opacity-80 text-sm">{{ __('order.Quantity') }}:
                                                {{ $orderItem->quantity }}
                                            </div>
                                            <div class="text-black text-xl mr-4">
                                                {{ formatCurrency($orderItem->price) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <a class="inline-flex justify-center py-2 hover:bg-slate-100 opacity-70 w-full text-center"
                            href="{{ route('orders.show', $order->id) }}">
                            <span class="h-2 w-2 block bg-slate-500 rounded-full mr-1"></span>
                            <span class="h-2 w-2 block bg-slate-500 rounded-full mr-1"></span>
                            <span class="h-2 w-2 block bg-slate-500 rounded-full"></span>
                        </a>
                        <div class="w-full border-slate-500 h-0 border mt-4"></div>
                        <div class="flex justify-end w-full items-end mt-4">
                            <span
                                class="mr-2">{{ __('order.Total', ['totalQuantity' => $order->orderItems->sum('quantity')]) }}:</span>
                            <span class="block text-2xl text-red-500">
                                {{ formatCurrency($order->orderItems->sum('totalPrice')) }}</span>
                        </div>
                    </div>
                @endforeach
            @else
            @endif
        </div>
    </div>
</x-app-layout>