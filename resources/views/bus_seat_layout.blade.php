@vite('resources/css/app.css')
<x-header />

<div class="mx-auto flex flex-col items-center min-h-screen">
    {{-- Display Bus Details --}}
    <div class="flex space-y-2 w-full">
        <div
            class="flex items-center justify-between bg-white rounded-lg shadow-sm p-8 hover:shadow-3xl hover:-translate-y-2 transform transition duration-300 w-3/4">
            <!-- Left Section: Bus Details -->
            <div class="flex flex-col flex-grow space-y-2">
                <div class="flex items-center justify-between">
                    <h3 class="text-2xl font-bold text-gray-800">{{ $bus->name }}</h3>
                </div>
                <div class="flex-1">
                    <p class="text-gray-600 text-xl">From <span
                            class="font-semibold text-blue-600">{{ $bus->source }}</span> To <span
                            class="font-semibold text-blue-600">{{ $bus->destination }}</span></p>
                    <p class="text-gray-600 font-bold text-xl">Time of Departure: <span
                            class="font-semibold">{{ $bus->time }}</span></p>
                    <p class="text-gray-600 text-xl">Price: <span
                            class="font-semibold text-green-600">₹{{ $bus->price }}</span></p>
                    <p class="text-gray-600 text-xl">Rating: <span
                            class="font-semibold text-yellow-500">{{ $bus->rating }} ★</span></p>
                    <p class="text-gray-600 text-xl">Capacity: <span class="font-semibold">{{ $bus->capacity }}</span>
                    </p>
                </div>
            </div>
        </div>
        <div>
            {{-- What each color signifies --}}
            <div>

                <ul class="list-disc text-gray-600 mt-10">
                    <li class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="demo-available w-10 h-10" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 3v12h14V3m-7 12v5m4-2H7" />
                        </svg><span>Available seats</span></li>
                    <li class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="demo-booked w-10 h-10" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 3v12h14V3m-7 12v5m4-2H7" />
                        </svg><span>Booked Seats</span></li>
                    <li class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="demo-selected w-10 h-10" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 3v12h14V3m-7 12v5m4-2H7" />
                        </svg><span class="text-xl">Selected Seats</span></li>

                </ul>

                <!-- SVG Icon -->

            </div>


        </div>
    </div>



    <!-- Bus Seat Layout -->
    <div class="bus-layout max-w-3xl mb-4"> <!-- Added margin-bottom for spacing -->

        <div class="flex items-center w-full px-12 mb-4">
            <!-- Steering Wheel SVG -->
            <img class="ml-64 w-14 h-15"
                src="https://icons.veryicon.com/png/o/miscellaneous/icheyong/steering-wheel-14.png" alt="">
        </div>
        @foreach ($seats->groupBy('row') as $row)
            <div class="seat-row flex">
                @foreach ($row as $seat)
                    @if ($seat->seat_number == 0 && $seat->is_gap == 1)
                        <div class="seat gap w-12 h-12 mx-2"></div>
                    @else
                        <div class="seat w-12 h-12 mx-2">
                            <input type="checkbox" id="seat-{{ $seat->seat_number }}" value="{{ $seat->seat_number }}"
                                class="hidden seat-checkbox"
                                {{ in_array($seat->seat_number, $seatNumbers) ? 'disabled' : '' }}>

                            <label for="seat-{{ $seat->seat_number }}" class="seat-label block relative">
                                <svg xmlns="http://www.w3.org/2000/svg" class="seat-icon w-10 h-10" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M5 3v12h14V3m-7 12v5m4-2H7" />
                                </svg>
                            </label>
                        </div>
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>

    <!-- Book Seats Button -->
    <div class="flex justify-center items-start w-full px-12"> <!-- Added flex and spacing -->
        <button id="book-seats" class="bg-blue-500 text-white px-8 py-4 m-4 rounded">
            Book Seats
        </button>
    </div>
</div>

<!-- Confirmation Modal -->
<div id="confirmation-modal"
    class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden flex justify-center items-center z-50">
    <div class="bg-white p-6 rounded shadow-lg max-w-md w-full">
        <h2 class="text-xl font-semibold mb-4">Confirm Your Booking</h2>
        <p>Are you sure you want to book the selected seats?</p>
        <div class="flex justify-end mt-4">
            <button id="cancel-button" class="bg-red-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
            <button id="confirm-button" class="bg-green-600 text-white px-4 py-2 rounded">Yes</button>
        </div>
    </div>
</div>

<!-- Include the date as a hidden input or a JavaScript variable -->
<input type="hidden" id="selected-date" value="{{ $date }}" />

<!-- JavaScript to handle booking -->
<script>
    document.getElementById('book-seats').addEventListener('click', function() {
        const selectedSeats = [];
        const checkboxes = document.querySelectorAll('.seat-checkbox:checked');

        checkboxes.forEach(checkbox => {
            selectedSeats.push(checkbox.value);
        });

        if (selectedSeats.length > 6) {
            alert('You cannot select more than 6 seats.');
        } else if (selectedSeats.length > 0) {
            // Show the confirmation modal
            document.getElementById('confirmation-modal').classList.remove('hidden');
        } else {
            alert('Please select at least one seat.');
        }
    });

    document.querySelectorAll('.seat-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const selectedSeats = document.querySelectorAll('.seat-checkbox:checked');

            if (selectedSeats.length > 6) {
                alert('You cannot select more than 6 seats.');
                this.checked = false; // Uncheck the current checkbox
            }
        });
    });

    document.getElementById('cancel-button').addEventListener('click', function() {
        document.getElementById('confirmation-modal').classList.add('hidden');
    });

    document.getElementById('confirm-button').addEventListener('click', function() {
        const selectedSeats = [];
        const checkboxes = document.querySelectorAll('.seat-checkbox:checked');
        const selectedDate = document.getElementById('selected-date')
        .value; // Get the date from the hidden field

        checkboxes.forEach(checkbox => {
            selectedSeats.push(checkbox.value);
        });

        // Get the busId from the current URL using JavaScript (assuming it's in the URL as /bus/{busId})
        const currentUrl = window.location.href;
        const busId = currentUrl.split('/bus/')[1].split('?')[0]; // Extract the busId from the URL

        // Redirect to the confirm-tickets route with busId, selected seats, and date
        if (selectedSeats.length > 0 && selectedSeats.length <= 6) {
            const seatsParam = encodeURIComponent(JSON.stringify(selectedSeats));
            const dateParam = encodeURIComponent(selectedDate);
            const busIdParam = encodeURIComponent(busId); // Include the busId

            window.location.href = `/ticket-payment?busId=${busIdParam}&seats=${seatsParam}&date=${dateParam}`;
        } else {
            alert('Please select at least one seat.');
        }
    });
</script>
{{-- 
<x-footer /> --}}
