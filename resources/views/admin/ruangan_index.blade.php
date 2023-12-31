<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('List Ruangan') }}
            </h2>
            <a href="{{ route('ruangan_create') }}">
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
                                <th class="border-b border-gray-300 font-medium p-4 pl-8 pt-0 pb-3 text-gray-700 text-left">ID Ruangan</th>
                                <th class="border-b border-gray-300 font-medium p-4 pl-8 pt-0 pb-3 text-gray-700 text-left">Kode Ruangan</th>
                                <th class="border-b border-gray-300 font-medium p-4 pl-8 pt-0 pb-3 text-gray-700 text-left">Nama Ruangan</th>
                                <th colspan="3" scope="colgroup" class="border-b border-gray-300 font-medium p-4 pl-8 pt-0 pb-3 text-gray-700 text-left"><center>Action</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ruangans as $ruangan)
                                <tr>
                                    <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">{{ $ruangan->id }}</td>
                                    <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">{{ $ruangan->kode_ruangan }}</td>
                                    <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">{{ $ruangan->nama_ruangan }}</td>
                                    <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">
                                        <a href="{{ route('ruangan_edit', $ruangan->id) }}">
                                            <center>
                                                <x-secondary-button class="ms-3">Edit</x-secondary-button>
                                            </center>
                                        </a>
                                    </td>
                                    <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">
                                        <a href="{{ route('ruangan_destroy', $ruangan->id) }}">
                                            <center>
                                                <x-danger-button class="ms-3">Delete</x-danger-button>
                                            </center>
                                        </a>
                                    </td>
                                    <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">
                                        <a href="{{ route('ruangan_show', $ruangan->id) }}">
                                            <center>
                                                <x-primary-button class="ms-3">Check</x-primary-button>
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
