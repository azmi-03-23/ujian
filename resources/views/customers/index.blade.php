<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Customer
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="bg-gray-800 dark:bg-white overflow-hidden m-9 shadow-sm sm:rounded-lg w-1/12">
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
                    <table class="table table-compact w-full">
                        <thead class="font-medium">
                            <tr>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Tipe Member</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)
                            <tr>
                                <td>{{ $customer->nama }}</td>
                                <td>{{ $customer->alamat }}</td>
                                <td>{{ $customer->tipe_member }}</td>
                                <td>
                                    <a href="{{ route('customers.show', $customer) }}">Show</a>
                                </td>
                            </tr>
                        @endforeach
                            <tr><td>{{  $customers->links()    }}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

