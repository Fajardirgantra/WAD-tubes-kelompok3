<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('List Pemeliharaan') }}
            </h2>
            <a href="{{ route('pemeliharaan_create') }}">
                <x-primary-button class="ms-3">Add</x-primary-button>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="border-collapse table-auto w-full text-sm">
                        <thead>
                            <tr>
                                <th class="border-b border-gray-300 font-medium p-4 pl-8 pt-0 pb-3 text-gray-700 text-left">ID Pemeliharaan</th>
                                <th class="border-b border-gray-300 font-medium p-4 pl-8 pt-0 pb-3 text-gray-700 text-left">Kode Ruangan</th>
                                <th class="border-b border-gray-300 font-medium p-4 pl-8 pt-0 pb-3 text-gray-700 text-left">Kode Asset</th>
                                <th class="border-b border-gray-300 font-medium p-4 pl-8 pt-0 pb-3 text-gray-700 text-left">Jenis Perbaikan</th>
                                <th class="border-b border-gray-300 font-medium p-4 pl-8 pt-0 pb-3 text-gray-700 text-left">Kegiatan</th>
                                <th class="border-b border-gray-300 font-medium p-4 pl-8 pt-0 pb-3 text-gray-700 text-left">Foto Bukti</th>
                                <th class="border-b border-gray-300 font-medium p-4 pl-8 pt-0 pb-3 text-gray-700 text-left">Tanggal Pemeliharaan</th>
                                <th colspan="2" scope="colgroup" class="border-b border-gray-300 font-medium p-4 pl-8 pt-0 pb-3 text-gray-700 text-left"><center>Action</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pemeliharaans as $pemeliharaan)
                                <tr>
                                    <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">{{ $pemeliharaan->id }}</td>
                                    <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">{{ $pemeliharaan->ruangan->kode_ruangan }}</td>
                                    <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">{{ $pemeliharaan->asset->kode_asset }}</td>
                                    <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">{{ $pemeliharaan->jenis_perbaikan }}</td>
                                    <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">{{ $pemeliharaan->kegiatan }}</td>
                                    <td class="border-b border-gray-300 p-4 pl-8 text-gray-600"><img src="{{ $pemeliharaan->foto }}" height="250px" width="250px"</td>
                                    <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">{{ $pemeliharaan->tanggal_pemeliharaan }}</td>
                                    <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">
                                        <a href="{{ route('pemeliharaan_edit', $pemeliharaan->id) }}">
                                            <center>
                                                <x-secondary-button class="ms-3">Edit</x-secondary-button>
                                            </center>
                                        </a>
                                    </td>
                                    <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">
                                        <a href="{{ route('pemeliharaan_destroy', $pemeliharaan->id) }}">
                                            <center>
                                                <x-danger-button class="ms-3">Delete</x-danger-button>
                                            </center>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
