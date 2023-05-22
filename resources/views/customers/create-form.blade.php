<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <form method="POST" action="{{ route('customers.store') }}">
                @csrf
                <!-- Nama -->
                <div class="mt-4">
                    <x-input-label for="nama" :value="__('Nama')"/>
                    <x-text-input id="nama" class="block mt-1 w-full"
                                    type="text"
                                    name="nama"
                                    required/>
                </div>

                <!-- Alamat -->
                <div class="mt-4">
                    <x-input-label for="alamat" :value="__('Alamat')"/>
                    <x-text-input id="alamat" class="block mt-1 w-full"
                                    type="text"
                                    name="alamat"
                                    required/>
                </div>

                <!-- Tipe Member -->
                <div class="mt-4">
                    <label for="tipe_member">Tipe Membership:</label>
                    <select id="tipe_member">
                        @foreach($memberships as $membership)
                          <option value="{{ $membership->nama }}">$membership->nama</option>
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
