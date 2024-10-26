@vite('resources/css/app.css')

<!-- Header Component -->
<x-header />

{{-- Hero Component --}}
<div class="relative w-full h-full" id="">
    <div class="absolute inset-0 opacity-90">
        <img src="https://images.pexels.com/photos/16034168/pexels-photo-16034168/free-photo-of-crowd-of-fans-waiting-in-front-of-a-stall-with-official-merchandise-of-their-favorite-band.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
            alt="Crowd of fans" class="object-cover object-justify w-full h-full" />
    </div>

    <div class="absolute items-center w-full p-5 bg-gradient-to-b from-gray-100 to-gray-300">
        <div class="bg-gradient-to-b from-gray-100 to-gray-300 rounded-md">
            <form id="searchForm" method="POST" class="flex bg-gradient-to-b from-gray-100 to-gray-300 items-center justify-between p-4 rounded-lg shadow-md">
                @csrf
                <!-- From Input -->
                <div class="flex items-center space-x-2 rounded-full">
                    <span class="flex items-center justify-center h-8 w-8 bg-blue-100 rounded-full">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m8 0h.01m4 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </span>
                    <div>
                        <label for="from" class="text-2xl text-blue-500 rounded-full" aria-label="Departure Location">From</label>
                        <input type="text" id="from" name="from" aria-required="true" class="sm:rounded-lg border-solid text-lg text-gray-600 font-medium focus:outline-none border-cyan-200 hover:bg-gray-300 p-5 bg-inherit rounded-full" required>
                    </div>
                </div>

                <!-- Swap Icon -->
                <div class="flex items-center cursor-pointer" onclick="swapInputs()">
                    <img src="https://cdn-icons-png.flaticon.com/512/565/565619.png" class="w-6 h-6 text-gray-500" alt="Swap Icon">
                </div>

                <!-- To Input -->
                <div class="flex items-center space-x-2">
                    <span class="flex items-center justify-center h-8 w-8 bg-blue-100 rounded-full">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m8 0h.01m4 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </span>
                    <div>
                        <label for="to" class="text-2xl text-blue-500">To</label>
                        <input type="text" id="to" name="to" aria-required="true" class="border-0 text-xl font-medium text-gray-600 focus:outline-none bg-inherit p-5 rounded-full hover:bg-gray-300" required>
                    </div>
                </div>

                <!-- Search Button -->
                <button type="submit" class="bg-blue-400 text-white hover:bg-green-500 font-bold py-3 px-9 rounded-full flex items-center">
                    <i class="fas fa-search mr-2"></i> SEARCH BUSES
                </button>
                
                <!-- Show All Button -->
                <button type="button" id="searchAll" class="bg-blue-400 text-white font-bold hover:bg-orange-500 py-3 px-9 rounded-full flex items-center">
                    <i class="fas fa-list mr-2"></i> SHOW ALL AVAILABLE BUSES
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    function swapInputs() {
        const fromInput = document.getElementById('from');
        const toInput = document.getElementById('to');

        // Swap values
        const temp = fromInput.value;
        fromInput.value = toInput.value;
        toInput.value = temp;
    }

    document.getElementById('searchForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        const from = document.getElementById('from').value.toLowerCase();
        const to = document.getElementById('to').value.toLowerCase();

        // Make the API call
        fetch('http://127.0.0.1:8000/buses', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                // Check if either 'from' or 'to' has a value
                if (from || to) {
                    // Filter the data based on the inputs
                    const filteredBuses = data.filter(bus => {
                        const matchesFrom = from ? bus.source.toLowerCase() === from : true;
                        const matchesTo = to ? bus.destination.toLowerCase() === to : true;
                        return matchesFrom && matchesTo;
                    });

                    // Redirect to the search results page with the filtered data
                    const searchResultsUrl = '/search';
                    const queryString = new URLSearchParams({
                        results: JSON.stringify(filteredBuses)
                    }).toString();
                    window.location.href = `${searchResultsUrl}?${queryString}`;
                } else {
                    // Both fields are empty, forward the full response
                    const searchResultsUrl = '/search';
                    const queryString = new URLSearchParams({
                        results: JSON.stringify(data)
                    }).toString();
                    window.location.href = `${searchResultsUrl}?${queryString}`;
                }
            })
            .catch(error => {
                console.error('Error fetching buses:', error);
                alert('Failed to fetch bus data. Please try again later.');
            });
    });

    document.getElementById('searchAll').addEventListener('click', function(event) {
        // Make the API call
        fetch('http://127.0.0.1:8000/buses', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                // Forward the full response
                const searchResultsUrl = '/search';
                const queryString = new URLSearchParams({
                    results: JSON.stringify(data)
                }).toString();
                window.location.href = `${searchResultsUrl}?${queryString}`;
            })
            .catch(error => {
                console.error('Error fetching buses:', error);
                alert('Failed to fetch bus data. Please try again later.');
            });
    });
</script>

<!-- Services Component -->
{{-- <x-services /> --}}

<!-- About Us Component -->
<x-about />

<!-- Why Us Component -->
<x-why_us />

{{-- <!-- Gallery Component -->
<x-gallery /> --}}

<!-- Visit Us Section Component -->
<x-visit_us />

<!-- Footer Component -->
<x-footer />
