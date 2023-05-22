<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Transaksi
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="bg-gray-800 dark:bg-white-100 overflow-hidden mr-4 shadow-sm sm:rounded-lg w-1/12">
            <div class="text-center p-6 text-gray-100 dark:text-gray-900">
                <a href="{{ route('transaksis.create') }}">Create</a>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden mx-12.5 shadow-sm sm:rounded-lg">
                <div  class="dark:bg-black text-center p-6 text-gray-900 dark:text-gray-100 w-full">
                    @if (session('status'))
                        <div class="alert alert-success m-10 w-1/2">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table>
                        <thead class="font-medium">
                            <tr>
                                <!--Mestinya yang pertama no transaksi-->
                                <th>ID</th>
                                <th>Tanggal Transaksi</th>
                                <th>Nama Customer</th>
                                <th>Diskon</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($transaksis as $transaksi)
                            <tr>
                                <td>{{ $transaksi->id }}</td>
                                <td>{{ $transaksi->tgl_transaksi }}</td>
                                <td>{{ $transaksi->nama_customer }}</td>
                                <td>{{ $transaksi->diskon }}</td>
                                <td>
                                    <a href="{{ route('transaksis.show', $transaksi) }}">Show</a>
                                </td>
                            </tr>
                        @endforeach
                            <tr><td>{{  $transaksis->links()    }}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

