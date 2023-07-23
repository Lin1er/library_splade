<x-app-layout>
    <x-slot name='header'>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User List') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-splade-link href="{{ route('users.create') }}" class="p-4 bg-green-500 rounded">Create User</x-splade-link>
            <x-splade-table :for="$users" pagination-scroll="reserve">
                <x-splade-cell actions>
                    <Link href="/users/{{ $item->id }}/edit" class="bg-orange-500 p-2 font-bold text-white rounded"> Edit </Link>
                    <x-splade-form 
                    action="{{ route('users.destroy', $item->id) }}"
                    method="delete"
                    confirm="User"
                    confirm-text="Are you sure you want to delete this User?"
                    confirm-button="Yes delete this User!"
                    cancel-button="No"
                    >
                        <x-splade-button type="submit" class="bg-red-500 p-1 font-bold text-white rounded">Delete</x-splade-button>
                    </x-splade-form>
                </x-splade-cell>
            </x-splade-table>
        </div>
    </div>
</x-app-layout>
