<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>
    @php
    $userComplaints = \App\Models\Complain::Where('user_id', Auth::user()->id)->get();
    @endphp
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($userComplaints->isEmpty())
                        <h3 class="text-lg font-semibold mb-4">{{ __("You're logged in, but you haven't submitted any complaints yet.") }}</h3>
                    @else
                    <h3 class="text-lg font-semibold mb-4">Your Complaint</h3>
                                <table class="border-collapse table-auto w-full text-sm">
                                    <thead>
                                        <tr>
                                            <th class="border-b border-gray-300 font-medium p-4 pl-8 pt-0 pb-3 text-gray-700 text-left">ID Complain</th>
                                            <th class="border-b border-gray-300 font-medium p-4 pl-8 pt-0 pb-3 text-gray-700 text-left">Kode Ruangan</th>
                                            <th class="border-b border-gray-300 font-medium p-4 pl-8 pt-0 pb-3 text-gray-700 text-left">Kode Asset</th>
                                            <th class="border-b border-gray-300 font-medium p-4 pl-8 pt-0 pb-3 text-gray-700 text-left">Keterangan</th>
                                            <th class="border-b border-gray-300 font-medium p-4 pl-8 pt-0 pb-3 text-gray-700 text-left">Foto Bukti</th>
                                            <th class="border-b border-gray-300 font-medium p-4 pl-8 pt-0 pb-3 text-gray-700 text-left">Status</th>
                                                                                </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($userComplaints as $complain)
                                            <tr>
                                                <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">{{ $complain->id }}</td>
                                                <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">{{ $complain->ruangan->kode_ruangan }}</td>
                                                <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">{{ $complain->asset->kode_asset }}</td>
                                                <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">{{ $complain->keterangan }}</td>
                                                <td class="border-b border-gray-300 p-4 pl-8 text-gray-600"><img src="{{ $complain->foto }}" height="250px" width="250px"/></td>
                                                <td class="border-b border-gray-300 p-4 pl-8 text-gray-600">{{ $complain->status }}</td>
                                               
                                        @endforeach
                                    </tbody>
                                </table>

                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
