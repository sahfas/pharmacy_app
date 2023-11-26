<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Drugs') }}
        </h2>
    </x-slot>

    <div class="py-6 flex">
        <div class="sm:px-6 lg:px-8" style="width:100%">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="padding: 20px;">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div style="display:flex">
                        <!-- Name -->
                        <div style="width: 50%;">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Quantity -->
                        <div style="margin-left: 30px;width: 50%;">
                            <x-input-label for="quantity" :value="__('Quantity')" />
                            <x-text-input id="quantity" class="block mt-1 w-full" type="text" name="quantity" :value="old('quantity')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                        </div>
                    </div>

                    <div style="display:flex" class="mt-4">
                        <!-- Price -->
                        <div style="width: 50%;">
                            <x-input-label for="price" :value="__('Price')" />
                            <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" required autofocus autocomplete="price" />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>

                        <!-- Date of Birth -->
                        <div style="margin-left: 30px;width: 50%;">
                            <!-- <x-input-label for="dob" :value="__('Date of Birth')" />
                            <x-text-input id="dob" class="block mt-1 w-full" type="date" name="dob" :value="old('dob')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('dob')" class="mt-2" /> -->
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-6">

                        <x-primary-button class="ms-4">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>