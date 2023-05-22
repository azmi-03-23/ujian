<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detail Customer {{ $customer->nama }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="bg-gray-800 dark:bg-white-100 overflow-hidden mr-4 shadow-sm sm:rounded-lg w-1/12">
            <div class="text-center p-6 text-gray-100 dark:text-gray-900">
                <a href="{{ route('customers.edit', $customer) }}">Edit</a>
            </div>
        </div>
        <div class="bg-gray-800 dark:bg-white-100 overflow-hidden mr-4 shadow-sm sm:rounded-lg w-1/12">
            <div class="text-center p-6 text-gray-100 dark:text-gray-900">
                <a href="{{ route('customers.destroy', $customer) }}">Delete</a>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden mx-12.5 shadow-sm sm:rounded-lg">
                <div class="text-left p-6 text-gray-900 dark:text-gray-100 w-1/2">
                    @if (session('status'))
                        <div class="alert alert-success m-10 w-1/2">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h6>Nama</h6>
                    <h6>Alamat</h6>
                    <h6>Tipe Member</h6>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100 w-1/2">
                    <p>{{ $customer->nama }}</p>
                    <p>{{ $customer->alamat }}</p>
                    <p>{{ $customer->tipe_member }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

