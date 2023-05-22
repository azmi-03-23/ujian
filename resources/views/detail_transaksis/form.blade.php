<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 h-1/3">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100 w-1/2">
            <h6>ID</h6>
            <h6>Tanggal Transaksi</h6>
            <h6>Nama Customer</h6>
            <h6>Diskon</h6>
        </div>
        <div class="p-6 text-gray-900 dark:text-gray-100 w-1/2">
            <p>{{ $transaksi->id }}</p>
            <p>{{ $transaksi->tgl_transaksi }}</p>
            <p>{{ $transaksi->customer->nama }}</p>
            <p>{{ $transaksi->customer->membership->diskon }}</p>
        </div>
    </div>
</div>
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <form method="POST" action="@if(!isset($detail_transaksi)) {{ route('detail_transaksis.store') }} @else {{ route('detail_transaksis.update', $detail_transaksi) }} @endif">
                @csrf
                @isset($detail_transaksi)
                    @method('PUT')
                @endisset
                <div class="mt-4">
                    <x-input-label for="transaksi_id" :value="__('ID Transaksi')"/>
                    <x-text-input id="transaksi_id" class="block mt-1 w-full"
                                    type="text"
                                    disabled
                                    name="transaksi_id"
                                    value="{{ $transaksi->id }}"
                                    required/>
                </div>
                <div class="mt-4">
                    <label for="valas_id">Pilih Valas:</label>
                    <select name="valas_id" id="valas_id">
                        @foreach($valas_ as $valas)
                            <option @isset($detail_transaksi) @if($detail_transaksi->valas_id === $valas->id) selected @endif @endisset
                            value="{{ $valas->id }}">{{ $valas->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-4">
                    <x-input-label for="qty" :value="__('Kuantitas')"/>
                    <x-text-input id="qty" class="block mt-1 w-full"
                                    type="number"
                                    name="qty"
                                    min="1"
                                    value="@isset($detail_transaksi)
                                            {{ $detail_transaksi->qty }}
                                        @endisset"
                                    required/>
                </div>
                <div class="mt-4">
                    <x-input-label for="another" :value=@if (!isset($detail_transaksi)) "__('Buat Yang Lain?')" @endif/>
                    <select id="another" name="another">
                        <option value="yes">YES</option>
                        <option value="no">NO</option>
                    </select>
                </div>
                <x-primary-button class="ml-3">
                    {{ $pilihan }}
                </x-primary-button>
            </form>
        </div>
    </div>
</div>
