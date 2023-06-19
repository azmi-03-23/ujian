<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Buat Transaksi Baru
        </h2>
    </x-slot>

    <div class="py-12">
        @include('transaksis.create-form')
    </div>
</x-app-layout>

