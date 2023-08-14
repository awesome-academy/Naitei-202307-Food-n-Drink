<x-app-layout>
    <x-slot name="header">{{ __('contact.create.title') }}</x-slot>
    <div class="py-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 bg-white shadow-sm sm:rounded-lg p-6">
            <form action="{{ route('contacts.store') }}" method="post">
                @csrf
                <input type="hidden" value="{{ Auth::id() }}" name="user_id" />
                <x-label for="name">{{ __('contact.Name') }}</x-label>
                <x-input type="text" id="name" name="name" class="w-full p-2 border rounded-md" />
                <x-label for="address">{{ __('contact.Address') }}</x-label>
                <x-input type="text" id="address" name="address" class="w-full p-2 border rounded-md" />
                <x-label for="phone_number">{{ __('contact.Phone number') }}</x-label>
                <x-input type="number" id="phone_number" name="phone_number" class="w-full p-2 border rounded-md" />
                <button type="submit" class="mt-4 button primary mr-4">
                    {{ __('contact.create.button') }}
                </button>
                <a href="{{ route('users.show', Auth::id()) }}"
                    class="text-gray-500 hover:text-gray-700">{{ __('Cancel') }}</a>
            </form>
        </div>
    </div>
</x-app-layout>
