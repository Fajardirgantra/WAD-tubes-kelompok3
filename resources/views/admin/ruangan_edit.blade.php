<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Ruangan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('ruangan_update', $ruangan->id) }}">
                        @csrf

                        <div>
                            <x-input-label for="kode_ruangan" :value="__('Kode Ruangan')" />
                            <x-text-input id="kode_ruangan" class="block mt-1 w-full" type="text" name="kode_ruangan" :value="old('kode_ruangan', $ruangan->kode_ruangan)" required autofocus/>
                            <x-input-error :messages="$errors->get('kode_ruangan')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="nama_ruangan" :value="__('Nama Ruangan')" />
                            <x-text-input id="nama_ruangan" class="block mt-1 w-full" type="text" name="nama_ruangan" :value="old('nama_ruangan', $ruangan->nama_ruangan)" required/>
                            <x-input-error :messages="$errors->get('nama_ruangan')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('ruangan_index') }}">
                                {{ __('Cancel') }}
                            </a>
                            <x-primary-button class="ms-4">
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
