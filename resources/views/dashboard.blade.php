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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#lightSlider').lightSlider({
                item: 1,
                slideMove: 1,
                slideMargin: 10,
                addClass: '',

                mode: "slide", // Type of transition 'slide' and 'fade'.
                useCSS: true, // If true LightSlider will use CSS transitions. if falls jquery animation will be used.
                speed: 1000, // Transition duration (in ms). 
                cssEasing: 'ease', // 'cubic-bezier(0.25, 0, 0.25, 1)'
                easing: 'linear', // The type of "easing". ex: 'linear', 'ease', 'ease-in', 'ease-out', 'ease-in-out', 'cubic-bezier(n,n,n,n)'.
                auto: false, // If true, the Slider will automatically start to play.
                pause: 3000, // The time (in ms) between each auto transition
                loop: true, // If false, will disable the ability to loop back to the beginning of the slide when on the last element.

                controls: true, // if controls:false, controls will not be added
                prevHtml: '', // custom text for prev control
                nextHtml: '', // custom text for next control
                rtl: false,
                keyPress: true, // Enable keyboard navigation
                adaptiveHeight: false,
                vertical: false,
                verticalHeight: 500,
                vThumbWidth: 100,
                thumbItem: 10,
                galleryMargin: 5,
                pager: true, // Enable pager option
                gallery: true, // Enable gallery mode
                thumbMargin: 3, // Spacing between each thumbnails 
                currentPagerPosition: 'left', // 'left' OR 'middle', 'right'

                enableTouch: false,
                enableDrag: false,
                freeMove: false,
                swipeThreshold: 40, // By setting the swipeThreshold you can set how far the user must swipe for the next/prev slide
                responsive: [],

                onBeforeStart: function($el) {},
                onSliderLoad: function($el) {},
                onBeforeSlide: function($el, scene) {},
                onAfterSlide: function($el, scene) {},
                onBeforeNextSlide: function($el, scene) {},
                onBeforePrevSlide: function($el, scene) {}
            });
        });

        function addDrugToTable() {
            const select = document.getElementById('drug-select');
            const selectedDrugId = select.value;

            axios.get(`/drugs/${selectedDrugId}`)
                .then(response => {
                    console.log(response.data);

                    const drug = response.data;

                    drug.price = parseFloat(drug.price);

                    const tableBody = document.getElementById('drug-table-body');
                    const newRow = tableBody.insertRow();

                    createCell(newRow, drug.name);
                    createQuantityCell(newRow);

                    const unitPrice = typeof drug.price === 'number' ? '$' + drug.price.toFixed(2) : 'N/A';
                    createCell(newRow, unitPrice);

                    const totalAmount = typeof drug.price === 'number' ? '$' + (drug.price * 1).toFixed(2) : 'N/A';
                    createCell(newRow, totalAmount);

                    updateTotalAmount();
                })
                .catch(error => {
                    console.error(error);
                });
        }

        function createCell(row, content) {
            const cell = row.insertCell();
            const textNode = document.createTextNode(content);
            cell.appendChild(textNode);
        }

        function createQuantityCell(row) {
            const cell = row.insertCell();
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'quantity[]';
            input.value = '1';
            input.classList.add('quantity-input');
            input.addEventListener('change', function() {
                updateRow(this);
            });
            cell.appendChild(input);
        }

        function updateRow(input) {
            const row = input.parentElement.parentElement;
            const quantity = parseInt(input.value);
            const unitPrice = parseFloat(row.cells[2].innerText.replace('$', ''));
            const price = quantity * unitPrice;

            row.cells[3].innerText = '$' + price.toFixed(2);

            updateTotalAmount();
        }

        function updateTotalAmount() {
            const tableBody = document.getElementById('drug-table-body');
            const rows = tableBody.getElementsByTagName('tr');

            let totalAmount = 0;

            for (let i = 0; i < rows.length; i++) {
                const priceCell = rows[i].cells[3];
                totalAmount += parseFloat(priceCell.innerText.replace('$', ''));
            }

            document.getElementById('total-amount').innerText = '$' + totalAmount.toFixed(2);
        }
    </script>
</x-app-layout>