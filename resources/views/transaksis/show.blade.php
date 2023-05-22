<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Transaksi {{ $transaksi->id }}
        </h2>
    </x-slot>
    <div class="py-12">
        @if (session('status'))
            <div class="alert alert-success m-10">
                {{ session('status') }}
            </div>
        @endif
        <div class="bg-gray-800 dark:bg-white-100 overflow-hidden mr-4 shadow-sm sm:rounded-lg w-1/12">
            <div class="text-center p-6 text-gray-100 dark:text-gray-900">
                <a href="{{ route('transaksis.edit', $transaksi) }}">Edit</a>
            </div>
        </div>
        <div class="bg-gray-800 dark:bg-white-100 overflow-hidden mr-4 shadow-sm sm:rounded-lg w-1/12">
            <div class="text-center p-6 text-gray-100 dark:text-gray-900">
                <a href="{{ route('transaksis.destroy', $transaksi) }}">Delete</a>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden mx-12.5 shadow-sm sm:rounded-lg">
                <div class="text-left p-6 text-gray-900 dark:text-gray-100 w-1/2">
                    <h6>ID</h6>
                    <h6>Tanggal Transaksi</h6>
                    <h6>Nama Customer</h6>
                    <h6>Diskon</h6>
                    <h6>Detail Transaksi</h6>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100 w-1/2">
                    <p>{{ $transaksi->id }}</p>
                    <p>{{ $transaksi->tgl_transaksi }}</p>
                    <p>{{ $transaksi->customer->nama }}</p>
                    <p>{{ $transaksi->customer->membership->diskon }}</p>
                </div>
                <table class="@cannot('...') hidden @endcannot p-6 text-gray-900 dark:text-gray-100 w-full">
                    <thead class="font-medium">
                        <tr>
                            <!--Mestinya yang pertama no transaksi-->
                            <th>ID</th>
                            <th>Nama Valas</th>
                            <th>Rate</th>
                            <th>Qty</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($transaksi->detailTransaksis as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nama_valas }}</td>
                            <td>{{ $item->rate }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>
                                <a href="{{ route('detail_transaksis.edit', $item) }}">Edit</a>
                                <a href="{{ route('detail_transaksis.destroy', $item) }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

