<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <form method="POST" action="@if(empty($membership)) {{ route('memberships.store') }} @else {{ route('memberships.update', $membership) }} @endif">
                @csrf
                @isset($membership)
                    @method('PUT')
                @endisset
                <!-- Nama -->
                <div class="mt-4">
                    <x-input-label for="nama" :value="__('Nama')"/>
                    <x-text-input id="nama" class="block mt-1 w-full"
                                    type="text"
                                    name="nama"
                                    value="@isset($membership)
                                            {{ $membership->nama }}
                                        @endisset"
                                    required/>
                </div>

                <!-- Diskon -->
                <div class="mt-4">
                    <x-input-label for="diskon" :value="__('Diskon')"/>
                    <x-text-input id="diskon" class="block mt-1 w-full"
                                    type="number"
                                    min="1"
                                    max="99"
                                    name="diskon"
                                    value="@isset($membership)
                                            {{ $membership->diskon }}
                                        @endisset"
                                    required/>
                </div>

                <!-- Minimum Profit -->
                <div class="mt-4">
                    <x-input-label for="minimum_profit" :value="__('Minimum Profit')"/>
                    <x-text-input id="minimum_profit" class="block mt-1 w-full"
                                    type="number"
                                    min="1"
                                    max="20"
                                    name="minimum_profit"
                                    value="@isset($membership)
                                            {{ $membership->minimum_profit }}
                                        @endisset"/>
                </div>
                <x-primary-button class="ml-3">
                    {{ $pilihan }}
                </x-primary-button>
            </form>
        </div>
    </div>
</div>
