<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <form method="POST" action="{{ route('transaksis.store') }}">
                @csrf
                <!-- Nama -->
                <div class="mt-4">
                    <label for="customer_id">Pilih Customer:</label>
                    <select name="customer_id" id="customer_id">
                        @foreach($customers as $customer)
                              <option value="{{ $customer->id }}">{{ $customer->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <x-primary-button class="ml-3">
                    {{ $pilihan }}
                </x-primary-button>
            </form>
        </div>
    </div>
</div>
