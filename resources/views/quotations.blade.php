<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Quotations') }}
        </h2>
    </x-slot>

    <div class="py-6 flex">
        <div class="sm:px-6 lg:px-8" style="max-width: 40%;">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            </div>
        </div>
        <div class="sm:px-6 lg:px-12" style="width: 100%;">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            </div>
        </div>
    </div>

    
</x-app-layout>