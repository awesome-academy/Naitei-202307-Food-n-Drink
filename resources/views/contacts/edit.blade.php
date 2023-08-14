<x-app-layout>
    <div class="container mx-auto mt-8">
        <x-slot name="header">{{ __('contact.edit.title', ['id' => $contact->id]) }}</x-slot>

        <div class="py-8">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('contacts.update', $contact->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <label for="name" class="block mb-2">{{ __('contact.Name') }}:</label>
                    <input type="text" id="name" name="name" class="w-full p-2 border rounded-md"
                        value="{{ $contact->name }}" required>

                    <label for="address" class="block mb-2 mt-4">{{ __('contact.Address') }}:</label>
                    <input type="text" id="address" name="address" class="w-full p-2 border rounded-md"
                        value="{{ $contact->address }}" required>

                    <label for="phone_number" class="block mb-2 mt-4">{{ __('contact.Phone number') }}:</label>
                    <input type="text" id="phone_number" name="phone_number" class="w-full p-2 border rounded-md"
                        value="{{ $contact->phone_number }}" required>
                    <div class="mt-4 flex space-x-4 items-center ">
                        <button type="submit" class="button edit">{{ __('Save changes') }}</button>
                        <a href="{{ route('contacts.show', $contact) }}"
                            class="text-gray-500 hover:text-gray-700">{{ __('Cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
