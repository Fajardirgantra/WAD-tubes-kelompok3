<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('List Asset') }}
            </h2>
                <x-primary-button class="ms-3">Add</x-primary-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="border-collapse table-auto w-full text-sm">
                        <thead>
                            <tr>
                                <th class="border-b border-gray-300 font-medium p-4 pl-8 pt-0 pb-3 text-gray-700 text-left">ID Asset</th>
                                <th class="border-b border-gray-300 font-medium p-4 pl-8 pt-0 pb-3 text-gray-700 text-left">Kode Ruangan</th>
                                <th class="border-b border-gray-300 font-medium p-4 pl-8 pt-0 pb-3 text-gray-700 text-left">Kode Asset</th>
                                <th class="border-b border-gray-300 font-medium p-4 pl-8 pt-0 pb-3 text-gray-700 text-left">Nama Asset</th>
                                <th class="border-b border-gray-300 font-medium p-4 pl-8 pt-0 pb-3 text-gray-700 text-left">Kategori</th>
                                <th class="border-b border-gray-300 font-medium p-4 pl-8 pt-0 pb-3 text-gray-700 text-left">Tanggal Masuk</th>
                                <th colspan="2" scope="colgroup" class="border-b border-gray-300 font-medium p-4 pl-8 pt-0 pb-3 text-gray-700 text-left"><center>Action</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assets as $asset)
                                <tr>
                                    <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">{{ $asset->id }}</td>
                                    <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">{{ $asset->ruangan->kode_ruangan }}</td>
                                    <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">{{ $asset->kode_asset }}</td>
                                    <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">{{ $asset->nama_asset }}</td>
                                    <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">{{ $asset->kategori }}</td>
                                    <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">{{ $asset->tanggal_masuk }}</td>
                                    <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">
                                            <center>
                                                <x-secondary-button class="ms-3">Edit</x-secondary-button>
                                            </center>
                                    </td>
                                    <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">
                                            <center>
                                                <x-danger-button class="ms-3">Delete</x-danger-button>
                                            </center>
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
