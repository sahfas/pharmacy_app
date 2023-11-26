<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6 flex">
        <div class="sm:px-6 lg:px-8" style="max-width: 40%;">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div>
                    <ul id="lightSlider" class="gallery">
                        <li data-thumb="img/plain_tea_sense-of-smell.jpg"> <a href="#"> <img src="img/plain_tea_sense-of-smell.jpg" /> </a> </li>
                        <li data-thumb="img/plain_tea_sense-of-smell.jpg"> <a href="#"> <img src="img/plain_tea_sense-of-smell.jpg" /> </a> </li>
                        <li data-thumb="img/plain_tea_sense-of-smell.jpg"> <a href="#"> <img src="img/plain_tea_sense-of-smell.jpg" /> </a> </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="sm:px-6 lg:px-12" style="width: 100%;">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="w-1/2 flex items-center space-x-4 mt-4">
                    <label for="drug-select" class="flex-shrink-0" style="margin-left: 10px;">Select a Drug:</label>
                    <select id="drug-select" class="w-full border border-gray-300 rounded-md p-2" style="margin-left: 10px;max-width: 70%;">
                        @foreach($drugs as $drug)
                        <option value="{{ $drug->id }}">{{ $drug->name }}</option>
                        @endforeach
                    </select>
                    <button onclick="addDrugToTable()" class="bg-blue-500 text-black px-4 py-2 rounded-md">Add Drug</button>
                </div>
                <table style="width: 100%;margin-top: 20px;">
                    <thead>
                        <tr>
                            <th>Drug</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody id="drug-table-body">
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>Total</td>
                            <td></td>
                            <td></td>
                            <td id="total-amount"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>