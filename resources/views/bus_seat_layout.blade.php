@vite('resources/css/app.css')
<x-header/>

<div class="container mx-auto flex flex-col items-center min-h-screen">
    {{-- Display Bus Details --}}
    <div class="bus-details bg-gray-100 p-4 rounded-lg shadow-md mb-4 w-full max-w-3xl" id="bus-details">
        <h2 class="text-2xl font-semibold text-gray-800 mb-2">Bus Details</h2>
        <p><strong>Bus Name:</strong> <span>{{ $bus->name ?? 'N/A' }}</span></p>
        <p><strong>From:</strong> <span>{{ $bus->source ?? 'N/A' }}</span></p>
        <p><strong>To:</strong> <span>{{ $bus->destination ?? 'N/A' }}</span></p>
        <p><strong>Departure Time:</strong> <span>{{ $bus->time ?? 'N/A' }}</span></p>
        <p><strong>Price per Seat:</strong> ₹<span>{{ $bus->price ?? 'N/A' }}</span></p>
        <p><strong>Total Seats:</strong> <span>{{ $bus->capacity }}</span></p>
    </div>

    <div class="bus-layout max-w-3xl">
        @foreach($seats->groupBy('row') as $row)
            <div class="seat-row flex">
                @foreach($row as $seat)
                    @if($seat->seat_number == 0 && $seat->is_gap == 1)
                        <div class="seat gap w-12 h-12 mx-2"></div>
                    @else
                        <div class="seat w-12 h-12 mx-2">
                            <input 
                                type="checkbox" 
                                id="seat-{{ $seat->seat_number }}" 
                                value="{{ $seat->seat_number }}" 
                                class="hidden seat-checkbox"
                                {{ in_array($seat->seat_number, $seatNumbers) ? 'disabled' : '' }}
                            >

                            <label for="seat-{{ $seat->seat_number }}" class="seat-label block relative">
                                <svg xmlns="http://www.w3.org/2000/svg" class="seat-icon w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 3v12h14V3m-7 12v5m4-2H7"/>
                                </svg>
                            </label>
                        </div>
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>
</div>

<!-- Book Seats Button -->
<div class="flex justify-center mt-4">
    <button id="book-seats" class="bg-blue-500 text-white px-4 py-2 rounded">
        Book Seats
    </button>
</div>

<!-- Confirmation Modal -->
<div id="confirmation-modal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden flex justify-center items-center z-50">
    <div class="bg-white p-6 rounded shadow-lg max-w-md w-full">
        <h2 class="text-xl font-semibold mb-4">Confirm Your Booking</h2>
        <p>Are you sure you want to book the selected seats?</p>
        <div class="flex justify-end mt-4">
            <button id="cancel-button" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
            <button id="confirm-button" class="bg-blue-500 text-white px-4 py-2 rounded">Yes</button>
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

    if (selectedSeats.length > 0) {
        // Show the confirmation modal
        document.getElementById('confirmation-modal').classList.remove('hidden');
    } else {
        alert('Please select at least one seat.');
    }
});

document.getElementById('cancel-button').addEventListener('click', function() {
    document.getElementById('confirmation-modal').classList.add('hidden');
});

document.getElementById('confirm-button').addEventListener('click', function() {
    const selectedSeats = [];
    const checkboxes = document.querySelectorAll('.seat-checkbox:checked');
    const selectedDate = document.getElementById('selected-date').value; // Get the date from the hidden field

    checkboxes.forEach(checkbox => {
        selectedSeats.push(checkbox.value);
    });

    // Get the busId from the current URL using JavaScript (assuming it's in the URL as /bus/{busId})
    const currentUrl = window.location.href;
    const busId = currentUrl.split('/bus/')[1].split('?')[0]; // Extract the busId from the URL

    // Redirect to the confirm-tickets route with busId, selected seats, and date
    if (selectedSeats.length > 0) {
        const seatsParam = encodeURIComponent(JSON.stringify(selectedSeats));
        const dateParam = encodeURIComponent(selectedDate);
        const busIdParam = encodeURIComponent(busId); // Include the busId

        window.location.href = `/confirm-tickets?busId=${busIdParam}&seats=${seatsParam}&date=${dateParam}`;
    } else {
        alert('Please select at least one seat.');
    }
});
</script>


<x-footer/>
