<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('List User') }}
            </h2>
            <a href="{{ route('user_create') }}">
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
                                <th class="border-b border-gray-300 font-medium p-4 pl-8 pt-0 pb-3 text-gray-700 text-left">ID</th>
                                <th class="border-b border-gray-300 font-medium p-4 pl-8 pt-0 pb-3 text-gray-700 text-left">Name</th>
                                <th class="border-b border-gray-300 font-medium p-4 pl-8 pt-0 pb-3 text-gray-700 text-left">Email</th>
                                <th class="border-b border-gray-300 font-medium p-4 pl-8 pt-0 pb-3 text-gray-700 text-left">User Type</th>
                                <th colspan="2" scope="colgroup" class="border-b border-gray-300 font-medium p-4 pl-8 pt-0 pb-3 text-gray-700 text-left"><center>Action</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">{{ $user->id }}</td>
                                    <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">{{ $user->name }}</td>
                                    <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">{{ $user->email }}</td>
                                    <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">{{ $user->usertype }}</td>
                                    <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">
                                        <a href="{{ route('user_edit', $user->id) }}">
                                            <center>
                                                <x-secondary-button class="ms-3">Edit</x-secondary-button>
                                            </center>
                                        </a>
                                    </td>
                                    <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">
                                        <a href="{{ route('user_destroy', $user->id) }}">
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
