<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Complain') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="border-collapse table-auto w-full text-sm">
                        <thead>
                            <tr>
                                <th class="border-b border-gray-300 font-medium p-4 pl-8 pt-0 pb-3 text-gray-700 text-left">ID Complain</th>
                                <th class="border-b border-gray-300 font-medium p-4 pl-8 pt-0 pb-3 text-gray-700 text-left">Email User</th>
                                <th class="border-b border-gray-300 font-medium p-4 pl-8 pt-0 pb-3 text-gray-700 text-left">Kode Asset</th>
                                <th class="border-b border-gray-300 font-medium p-4 pl-8 pt-0 pb-3 text-gray-700 text-left">Keterangan</th>
                                <th class="border-b border-gray-300 font-medium p-4 pl-8 pt-0 pb-3 text-gray-700 text-left">Foto Bukti</th>
                                <th class="border-b border-gray-300 font-medium p-4 pl-8 pt-0 pb-3 text-gray-700 text-left">Status</th>
                                <th colspan="2" scope="colgroup" class="border-b border-gray-300 font-medium p-4 pl-8 pt-0 pb-3 text-gray-700 text-left"><center>Action</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($complains as $complain)
                                <tr>
                                    <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">{{ $complain->id }}</td>
                                    <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">{{ $complain->user->email }}</td>
                                    <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">{{ $complain->asset->kode_asset }}</td>
                                    <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">{{ $complain->keterangan }}</td>
                                    <td class="border-b border-gray-300 p-4 pl-8 text-gray-600"><img src="{{ $complain->foto }}" height="250px" width="250px"/></td>
                                    <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">{{ $complain->status }}</td>
                                    <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">
                                        <a href="{{ route('complain_edit', $complain->id) }}">
                                            <center>
                                                <x-secondary-button class="ms-3">Edit</x-secondary-button>
                                            </center>
                                        </a>
                                    </td>
                                    <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">
                                        <a href="{{ route('complain_destroy', $complain->id) }}">
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
