<x-app-layout>
    <x-slot name="header">
        {{ __('user.index.title') }}
    </x-slot>
    <div class="py-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="border-b border-gray-200 bg-white p-6 ">
                    <div class="flex items-center justify-end">
                        <a href="{{ route('users.create') }} " class="mr-2 button primary">
                            {{ __('user.button') }}
                        </a>
                    </div>
                    <div class="mt-4">
                        {{ $users->links('pagination::tailwind') }}
                    </div>
                    <table class="w-full table-auto ">
                        <thead>
                            <tr>
                                <th class="w-1/12 px-4 py-2">
                                    {{ __('user.index.table.id') }}</th>
                                <th class="px-4 py-2">
                                    {{ __('user.index.table.username') }}
                                </th>
                                <th class="px-4 py-2">Email</th>
                                <th class="w-1/4 px-4 py-2">
                                    {{ __('Create At') }}</th>
                                <th class="w-1/4 px-4 py-2">
                                    {{ __('user.index.table.actions') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                @unless ($user->id === Auth::id())
                                    <tr>
                                        <td class="border px-4 py-2">
                                            {{ $user->id }}
                                        </td>
                                        <td class="border px-4 py-2">
                                            {{ $user->username }}
                                        </td>
                                        <td class="border px-4 py-2">
                                            {{ $user->email }}
                                        </td>
                                        <td class="border px-4 py-2">
                                            {{ $user->created_at }}
                                        </td>
                                        <td class="flex justify-evenly border px-4 py-2">
                                            <a href="{{ route('users.show', $user->id) }}" class="button primary">
                                                {{ __('View') }}
                                            </a>
                                            <a href="{{ route('users.edit', $user->id) }}" class="button edit">
                                                {{ __('Edit') }}
                                            </a>
                                            <form method="POST" action="{{ route('users.destroy', $user->id) }}"
                                                class="button delete">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    data-confirm="{{ __('Confirm Delete') }}">{{ __('Delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endunless
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $users->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
