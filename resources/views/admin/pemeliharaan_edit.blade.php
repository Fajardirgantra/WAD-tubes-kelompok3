<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Pemeliharaan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('pemeliharaan_update', $pemeliharaan->id) }}" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <x-input-label for="asset_id" :value="__('Kode Asset')" />
                            <select id="asset_id" class="block mt-1 w-full" type="text" name="asset_id" :value="old('asset_id')" required>
                                @foreach($assets as $asset)
                                    <option value="{{ $asset->id }}" class="'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm'">{{ $asset->kode_asset }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('asset_id')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="jenis_perbaikan" :value="__('Jenis Perbaikan')" />
                            <x-text-input id="jenis_perbaikan" class="block mt-1 w-full" type="text" name="jenis_perbaikan" :value="old('jenis_perbaikan', $pemeliharaan->jenis_perbaikan)" required autofocus/>
                            <x-input-error :messages="$errors->get('jenis_perbaikan')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="kegiatan" :value="__('Kegiatan')" />
                            <x-text-input id="kegiatan" class="block mt-1 w-full" type="text" name="kegiatan" :value="old('kegiatan', $pemeliharaan->kegiatan)" required/>
                            <x-input-error :messages="$errors->get('kegiatan')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="foto" :value="__('Foto Bukti')" />
                            <img src="{{ $pemeliharaan->foto }}" height="250px" width="250px"/>
                            <x-text-input id="foto" class="block mt-1 w-full" type="file" name="foto" :value="old('foto')" required/>
                            <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="tanggal_pemeliharaan" :value="__('Tanggal Pemeliharaan')" />
                            <x-text-input id="tanggal_pemeliharaan" class="block mt-1 w-full" type="date" name="tanggal_pemeliharaan" :value="old('tanggal_pemeliharaan', $pemeliharaan->tanggal_pemeliharaan)" required/>
                            <x-input-error :messages="$errors->get('tanggal_pemeliharaan')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('pemeliharaan_index') }}">
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
