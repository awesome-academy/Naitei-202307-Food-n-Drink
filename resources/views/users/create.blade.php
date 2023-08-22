<x-app-layout>
    <x-slot name="header">
        {{ __('user.create.title') }}
    </x-slot>
    <div class="py-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="flex">
                        <div class="mb-4 mr-8">
                            <label class="mb-2 block text-sm font-bold text-gray-700"
                                for="username">{{ __('user.username') }}</label>
                            <input
                                class="h-10 focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 focus:outline-none"
                                id="username" name="username" type="text">
                        </div>
                        <div class="mb-4">
                            <label class="mb-2 block text-sm font-bold text-gray-700" for="role">Role</label>
                            <select name="role" id="role" class="w-full rounded py-2 h-10">
                                @foreach (App\Enums\UserRole::$types as $role)
                                    <option value="{{ $role }}">{{ $role }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="mb-4 mr-8 flex">
                            <div class="mr-4">
                                <label class="mb-2 block text-sm font-bold text-gray-700"
                                    for="first_name">{{ __('user.firstName') }}</label>
                                <input
                                    class="h-10 focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 focus:outline-none"
                                    id="first_name" name="first_name" type="text">
                            </div>
                            <div class="mr-4">
                                <label class="mb-2 block text-sm font-bold text-gray-700"
                                    for="last_name">{{ __('user.lastName') }}</label>
                                <input
                                    class="h-10 focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 focus:outline-none"
                                    id="last_name" name="last_name" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="mb-2 block text-sm font-bold text-gray-700" for="email">Email:</label>
                        <input
                            class="h-10 focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 focus:outline-none"
                            id="email" name="email" type="email">
                    </div>

                    <div class="mb-4">
                        <label class="mb-2 block text-sm font-bold text-gray-700"
                            for="password">{{ __('user.password') }}:</label>
                        <input
                            class="h-10 focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 focus:outline-none"
                            id="password" name="password" type="password">
                    </div>

                    <!-- Add more input fields here -->
                    <button type="submit"
                        class="h-10 focus:shadow-outline rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700 focus:outline-none">
                        {{ __('Create') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
