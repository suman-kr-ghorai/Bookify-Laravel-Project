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
                                {{ $seat->is_occupied ? 'disabled' : '' }}
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

<!-- JavaScript to handle booking -->
<script>
    document.getElementById('book-seats').addEventListener('click', function() {
        const selectedSeats = [];
        const checkboxes = document.querySelectorAll('.seat-checkbox:checked');

        checkboxes.forEach(checkbox => {
            selectedSeats.push(checkbox.value);
        });

        if (selectedSeats.length > 0) {
            const totalPrice = selectedSeats.length * 10; // Assuming a price of 10 per seat
            const payload = {
                seats: selectedSeats,
                total_price: totalPrice
            };

            // Make an AJAX request to book seats
            fetch('/book-seats', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(payload)
            })
            .then(response => response.json())
            .then(data => {
    console.log(data); // Log the response to see its structure
    if (data.ticket_numbers) {
        alert(`Seats booked successfully! Ticket Numbers: ${data.ticket_numbers.join(', ')}`);
    } else {
        alert('No ticket numbers returned. Please check the server response.');
    }
    location.reload(); // Refresh the page to update seat status
                })

            .catch(error => {
                console.error('Error:', error);
                alert('There was an error booking the seats.');
            });
        } else {
            alert('Please select at least one seat.');
        }
    });
</script>

<x-footer/>
