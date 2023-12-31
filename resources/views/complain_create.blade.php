<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Complain') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('complain_store') }}" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <x-input-label for="asset_id" :value="__('Kode Asset')" />
                            <select id="asset_id" class="block mt-1 w-full" type="text" name="asset_id" :value="old('asset_id')" required autofocus>
                                @foreach($assets as $asset)
                                    <option value="{{ $asset->id }}" class="'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm'">{{ $asset->kode_asset }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('kode_asset')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="keterangan" :value="__('Keterangan')" />
                            <x-text-input id="keterangan" class="block mt-1 w-full" type="text" name="keterangan" :value="old('keterangan')" required/>
                            <x-input-error :messages="$errors->get('keterangan')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="foto" :value="__('Foto Bukti')" />
                            <x-text-input id="foto" class="block mt-1 w-full" type="file" name="foto" :value="old('foto')" required/>
                            <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Submit') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Complaint Added Successfully!',
                    showConfirmButton: false,
                    timer: 1500
                });
            @endif

            @if(session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Failed to Add Complaint',
                    text: '{{ session("error") }}',
                    confirmButtonText: 'OK'
                });
            @endif
        });
    </script>
</x-app-layout>
