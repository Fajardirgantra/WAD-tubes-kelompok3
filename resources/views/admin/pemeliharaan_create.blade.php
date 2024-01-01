    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add Pemeliharaan') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form method="POST" action="{{ route('pemeliharaan_store') }}" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <x-input-label for="ruangan_id" :value="__('Kode Ruangan')" />
                                <select id="ruangan_id" class="block mt-1 w-full" type="text" name="ruangan_id" :value="old('ruangan_id')" required autofocus>
                                    @foreach($ruangans as $ruangan)
                                        <option value="{{ $ruangan->id }}" class="'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm'">{{ $ruangan->kode_ruangan }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('ruangan_id')" class="mt-2" />
                            </div>

                            <div class="mt-4">
                                <x-input-label for="asset_id" :value="__('Kode Asset')" />
                                <select id="asset_id" class="block mt-1 w-full" type="text" name="asset_id" :value="old('asset_id')" required autofocus>
                                    {{-- @foreach($assets as $asset)
                                        <option value="{{ $asset->id }}" class="'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm'">{{ $asset->kode_asset }}</option>
                                    @endforeach --}}
                                </select>
                                <x-input-error :messages="$errors->get('asset_id')" class="mt-2" />
                            </div>

                            <div class="mt-4">
                                <x-input-label for="jenis_perbaikan" :value="__('Jenis Perbaikan')" />
                                <x-text-input id="jenis_perbaikan" class="block mt-1 w-full" type="text" name="jenis_perbaikan" :value="old('jenis_perbaikan')" required/>
                                <x-input-error :messages="$errors->get('jenis_perbaikan')" class="mt-2" />
                            </div>

                            <div class="mt-4">
                                <x-input-label for="kegiatan" :value="__('Kegiatan')" />
                                <x-text-input id="kegiatan" class="block mt-1 w-full" type="text" name="kegiatan" :value="old('kegiatan')" required/>
                                <x-input-error :messages="$errors->get('kegiatan')" class="mt-2" />
                            </div>

                            <div class="mt-4">
                                <x-input-label for="foto" :value="__('Foto Bukti')" />
                                <x-text-input id="foto" class="block mt-1 w-full" type="file" name="foto" :value="old('foto')" required/>
                                <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                            </div>

                            <div class="mt-4">
                                <x-input-label for="tanggal_pemeliharaan" :value="__('Tanggal Pemeliharaan')" />
                                <x-text-input id="tanggal_pemeliharaan" class="block mt-1 w-full" type="date" name="tanggal_pemeliharaan" :value="old('tanggal_pemeliharaan')" required/>
                                <x-input-error :messages="$errors->get('tanggal_pemeliharaan')" class="mt-2" />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('pemeliharaan_index') }}">
                                    {{ __('Cancel') }}
                                </a>
                                <x-primary-button class="ms-4">
                                    {{ __('Add') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

    <script>
        // Function to fetch data based on the selected category
        function fetchData(categoryId) {
            // Assuming a PHP backend endpoint, adjust the URL accordingly in your Laravel app
            var selectElement = document.getElementById('asset_id');

            // Clear all existing options
            selectElement.innerHTML = "";
            var url = '/api/assets_by_ruanganid/' + categoryId;
    
            // Make an AJAX request
            var xhr = new XMLHttpRequest();
            xhr.open('GET', url, true);

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    JSON.parse(xhr.responseText).forEach(function(option) {
                        var optionHTML = '<option value="'+option.kode_asset+'" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">'+option.kode_asset+'</option>';
                        selectElement.insertAdjacentHTML('beforeend', optionHTML);
                    });
                }
            };
    
            xhr.send();
        }
    
        // Event listener for the change event on the category dropdown
        document.getElementById('ruangan_id').addEventListener('change', function() {
            var selectedCategoryId = this.value;
            fetchData(selectedCategoryId);
        });
    
        // Initial fetch based on the default selected category
        fetchData(document.getElementById('ruangan_id').value);
    </script>
