<x-header/>

<div class="w-full mt-5 mx-auto px-4">
    <h2 class="text-3xl font-bold mb-4"><i class="fas fa-bus mr-2"></i>Bus Search Results</h2>

    <!-- Date Picker Section -->
    <div class="flex items-center space-x-4 mb-2 p-3 bg-gray-100 rounded-lg shadow w-full">
        <span class="flex items-center justify-center h-10 w-10 bg-blue-100 rounded-full">
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v2m4-2v2m4-2v2M3 9h18M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
        </span>
        <div class="flex flex-col">
            <label for="date" class="text-sm text-gray-500">Select Date</label>
            <input type="date" id="date" name="date" class="border border-gray-300 rounded-lg py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white text-lg font-medium">
        </div>
    </div>

    @if(request()->has('results'))
        @php
            $results = json_decode(request()->get('results'), true);
        @endphp

        @if(count($results) > 0)
            <!-- Bus Results Section -->
            <div class="space-y-4 w-full">
                @foreach($results as $bus)
                <div class="flex items-center justify-between bg-white rounded-lg shadow-lg p-8 mb-4 w-full hover:shadow-3xl hover:-translate-y-2 transform transition duration-300">
                    <!-- Left Section: Bus Details -->
                    <div class="flex flex-col flex-grow space-y-2">
                        <div class="flex items-center justify-between">
                            <h3 class="text-2xl font-bold text-gray-800"><i class="fas fa-bus mr-2"></i>{{ $bus['name'] }}</h3>
                            </div>


                        <div class="flex-1">
                            
                            <p class="text-gray-600 text-xl">From <span class="font-semibold text-blue-600">{{ $bus['source'] }}</span> To <span class="font-semibold text-blue-600">{{ $bus['destination'] }}</span></p>
                            {{-- <p class="text-gray-600 text-xl">Time: <span class="font-semibold">{{ $bus['time'] }}</span></p> --}}
                            <p class="text-gray-600 font-bold  text-xl">Time of Departure: <span class="font-semibold">{{ $bus['time'] }}</span></p>
                        
                            <p class="text-gray-600 text-xl">Price: <span class="font-semibold text-green-600">₹{{ $bus['price'] }}</span></p>
                            <p class="text-gray-600 text-xl">Rating: <span class="font-semibold text-yellow-500">{{ $bus['rating'] }} ★</span></p>
                            <p class="text-gray-600 text-xl">Capacity: <span class="font-semibold">{{ $bus['capacity'] }}</span></p>
                        </div>






                       

                        <!-- Amenities Section -->
                        <div class="flex space-x-3 text-gray-400">
                            {{-- <span class="flex items-center space-x-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h18M9 3v3m6-3v3M4 8h16v13H4z" />
                                </svg> --}}
                            </span>
                        </div>
                    </div>

                    <!-- Right Section: Price & Button -->
                    <div class="flex flex-col space-y-2 p-10">
                       
                        <span class="text-3xl m-7 font-bold text-blue-900">₹{{ $bus['price'] }}</span>
                        <a href="#" class="bg-blue-600 text-white font-semibold py-4 px-8 rounded-lg hover:bg-green-700 transition duration-200" onclick="bookNow('{{ $bus['bus_id'] }}')">
                            <i class="fa-solid fa-plus"></i> View Seats
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500">No buses found for your search.</p>
        @endif
    @else
        <p class="text-gray-500">Please perform a search to see the results.</p>
    @endif
</div>



<script>
    // Set the min date to tomorrow's date
    const dateInput = document.getElementById('date');
    const today = new Date();
    const tomorrow = new Date(today);
    tomorrow.setDate(today.getDate() + 1);
    const formattedDate = tomorrow.toISOString().split('T')[0];
    dateInput.min = formattedDate;

    // Function to handle the "Book Now" button click
    function bookNow(busId) {
        const selectedDate = dateInput.value;
        if (selectedDate) {
            // Redirect to the booking page with the selected date as a query parameter
            window.location.href = `/bus/${busId}?date=${selectedDate}`;
        } else {
            alert('Please select a date before proceeding.');
        }
    }
</script>

