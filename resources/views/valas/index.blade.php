<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Valas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="bg-gray-800 dark:bg-white overflow-hidden m-4 shadow-sm sm:rounded-lg w-1/12">
            <div class="text-center p-6 text-gray-100 dark:text-gray-900">
                <a href="{{ route('customers.create') }}">Create</a>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden mx-12.5 shadow-sm sm:rounded-lg">
                <div  class="text-center p-6 text-gray-900 dark:text-gray-100">
                    @if (session('status'))
                    <div class="overflow-x-auto">
                        <div class="alert alert-success m-10 w-1/2">
                            {{ session('status') }}
                        </div>
                    </div>
                    @endif
                    <div>
                        <p class="p-2">{{ $tgl_rate }}</p>
                    </div>
                    <div class="dark:bg-black w-full">
                        <div class="overflow-x-auto">
                            <table class="table table-compact w-full">
                                <thead class="font-medium">
                                    <tr>
                                        <!--Mestinya yang pertama no transaksi-->
                                        <th class="m-1">ID</th>
                                        <th class="m-1">Nama Valas</th>
                                        <th class="m-1">Nilai Jual</th>
                                        <th class="m-1">Nilai Beli</th>
                                        <th class="m-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if (empty($valas_))
                                    <div class="overflow-x-auto">
                                        <div class="alert alert-info m-10">
                                            Tidak ada data
                                        </div>
                                    </div>
                                @else
                                    @foreach($valas_ as $valas)
                                        <tr>
                                            <td class="m-1">{{ $valas->id }}</td>
                                            <td class="m-1">{{ $valas->nama }}</td>
                                            <td class="m-1">{{ $valas->nilai_jual }}</td>
                                            <td class="m-1">{{ $valas->nilai_beli }}</td>
                                            <td class="m-1">
                                                <a href="{{ route('valas.show', $valas) }}">Show</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

