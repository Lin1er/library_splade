<x-app-layout>
    <x-slot name='header'>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create User') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-splade-form :default="$user" class="space-y-4" action="{{ route('users.update', $user) }}" method="put" unguarded>
                        <x-splade-input name="name" placeholder="name" label="Name" />
                        <x-splade-input name="username" placeholder="username" label="Username" />
                        <x-splade-select :label="__('Kelas')" name="kelas_id">
                            @foreach ($kelases as $kelas)
                                <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                            @endforeach
                         </x-splade-select>
                        <x-splade-input name="email" type="email" placeholder="Your Email Address" label="Email" />
                        <x-splade-input name="password" type="password" placeholder="********" label="Password" />

                        <x-splade-submit label="Save" :spinner="false" />
                    </x-splade-form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>