<x-app-layout>
    <div class="container mx-auto mt-8">
        <x-slot name="header">{{ __('contact.edit.title', ['id' => $contact->id]) }}</x-slot>

        <div class="py-8">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 bg-white shadow-sm sm:rounded-lg p-6">
                <h2 class="text-lg font-semibold mb-2">{{ $contact->name }}</h2>
                <p class="text-gray-600 mb-2">{{ __('contact.Address') }}: {{ $contact->address }}</p>
                <p class="text-gray-600 mb-2">{{ __('contact.Phone number') }}: {{ $contact->phone_number }}</p>
                <div class="w-full mx-auto border-b-[1px] border-gray-200 my-4"></div>
                <div class="flex space-x-4 justify-end">
                    <a href="{{ route('contacts.edit', $contact->id) }}" class="button edit">{{ __('Edit') }}</a>
                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button delete"
                            data-confirm="{{ __('Confirm Delete') }}">{{ __('Delete') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
