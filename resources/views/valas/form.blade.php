<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <form method="POST" action="{{ route('valas.update', $valas) }}">
                @csrf
                @method('PUT')
                <!-- Nama -->
                <div class="mt-4">
                    <x-input-label for="nama" :value="__('Nama')"/>
                    <x-text-input id="nama" class="block mt-1 w-full"
                                    type="text"
                                    name="nama"
                                    value="{{ $valas->nama }}"
                                    required/>
                </div>

                <!-- Nilai Jual -->
                <div class="mt-4">
                    <x-input-label for="nilai_jual" :value="__('Nilai Jual')"/>
                    <x-text-input id="nilai_jual" class="block mt-1 w-full"
                                    type="number"
                                    min="100"
                                    max="200"
                                    value="{{ $valas->nilai_jual }}"
                                    required/>
                </div>

                <!-- Nilai Beli -->
                <div class="mt-4">
                    <x-input-label for="nilai_beli" :value="__('Nilai Beli')"/>
                    <x-text-input id="nilai_beli" class="block mt-1 w-full"
                                    type="number"
                                    min="1"
                                    max="100"
                                    value="{{ $valas->nilai_beli }}"
                                    required/>
                </div>

                <!-- Tanggal -->
                <div class="mt-4">
                    <x-input-label for="tanggal_rate" :value="__('Tanggal Rate')"/>
                    <x-text-input id="tanggal_rate" class="block mt-1 w-full"
                                    type="date"
                                    value="{{ $valas->tanggal_rate }}"
                                    required/>
                </div>

                <x-primary-button class="ml-3">
                    {{ $pilihan }}
                </x-primary-button>
            </form>
        </div>
    </div>
</div>
