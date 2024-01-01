<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Asset') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('asset_update', $asset->id) }}">
                        @csrf

                        <div>
                            <x-input-label for="ruangan_id" :value="__('Kode Ruangan')" />
                            <x-text-input id="ruangan_id" class="block mt-1 w-full" type="text" name="ruangan_id" :value="$asset->ruangan->kode_ruangan" readonly />
                            <input type="hidden" name="ruangan_id" value="{{ $asset->ruangan->id }}" />
                            <x-input-error :messages="$errors->get('ruangan_id')" class="mt-2" />
                        </div>
                        

                        <div class="mt-4">
                            <x-input-label for="kode_asset" :value="__('Kode Asset')" />
                            <x-text-input id="kode_asset" class="block mt-1 w-full" type="text" name="kode_asset" :value="old('kode_asset', $asset->kode_asset)" required autofocus/>
                            <x-input-error :messages="$errors->get('kode_asset')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="nama_asset" :value="__('Nama Asset')" />
                            <x-text-input id="nama_asset" class="block mt-1 w-full" type="text" name="nama_asset" :value="old('nama_asset', $asset->nama_asset)" required/>
                            <x-input-error :messages="$errors->get('nama_asset')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="kategori" :value="__('Kategori')" />
                            <x-text-input id="kategori" class="block mt-1 w-full" type="text" name="kategori" :value="old('kategori', $asset->kategori)" required/>
                            <x-input-error :messages="$errors->get('kategori')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="tanggal_masuk" :value="__('Tanggal Masuk')" />
                            <x-text-input id="tanggal_masuk" class="block mt-1 w-full" type="date" name="tanggal_masuk" :value="old('tanggal_masuk', $asset->tanggal_masuk)" required/>
                            <x-input-error :messages="$errors->get('tanggal_masuk')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('asset_index') }}">
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
