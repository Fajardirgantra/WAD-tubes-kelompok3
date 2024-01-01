<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Complain') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('complain_update', $complain->id) }}" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <x-input-label for="ruangan_id" :value="__('Kode Ruangan')" />
                            <x-text-input id="ruangan_id" class="block mt-1 w-full" type="text" name="ruangan_id" :value="$complain->ruangan->kode_ruangan" readonly />
                            <input type="hidden" name="ruangan_id" value="{{ $complain->ruangan->id }}" />
                            <x-input-error :messages="$errors->get('ruangan_id')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="asset_id" :value="__('Kode Asset')" />
                            <x-text-input id="asset_id" class="block mt-1 w-full" type="text" name="asset_id" :value="$complain->asset->kode_asset" readonly />
                            <input type="hidden" name="asset_id" value="{{ $complain->asset->id }}" />
                            <x-input-error :messages="$errors->get('asset_id')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="keterangan" :value="__('Keterangan')" />
                            <x-text-input id="keterangan" class="block mt-1 w-full" type="text" name="keterangan" :value="$complain->keterangan" readonly />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="foto" :value="__('Foto Bukti')" />
                            <img src="{{ $complain->foto }}" height="250px" width="250px"/>
                            <!-- Display a message indicating that the field is not editable -->
                            <span class="text-gray-500">This field is not editable</span>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="status" :value="__('Status')" />
                            <x-text-input id="status" class="block mt-1 w-full" type="text" name="status" :value="old('status', $complain->status)" required/>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('complain_index') }}">
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
