<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Valas {{ $valas->nama }} Tanggal  {{ $valas->tanggal_rate }}
        </h2>
    </x-slot>

    <div class="py-12">
        @include('valas.form')
    </div>
</x-app-layout>

