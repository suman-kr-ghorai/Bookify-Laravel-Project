@vite('resources/css/app.css')

<x-header/>

<div class="bg-gray-100 p-10 rounded-md">
    <form id="searchForm" method="POST" class="flex items-center justify-between bg-white p-4 rounded-lg shadow-md">
        @csrf
        <!-- From Input -->
        <div class="flex items-center space-x-2">
            <span class="flex items-center justify-center h-8 w-8 bg-blue-100 rounded-full">
                <img src="https://img.icons8.com/ios-filled/50/000000/marker.png" class="w-5 h-5" alt="From Icon">
            </span>
            <div>
                <label for="from" class="text-xl text-blue-500">From</label>
                <input type="text" id="from" name="from" class="sm:rounded-lg border-solid text-lg text-gray-600 font-medium focus:outline-none border-cyan-200">
            </div>
        </div>

        <!-- Swap Icon -->
        <div class="flex items-center cursor-pointer" onclick="swapInputs()">
            <img src="https://cdn-icons-png.flaticon.com/512/565/565619.png" class="w-6 h-6 text-gray-500" alt="Swap Icon">
        </div>

        <!-- To Input -->
        <div class="flex items-center space-x-2">
            <span class="flex items-center justify-center h-8 w-8 bg-blue-100 rounded-full">
                <img src="https://img.icons8.com/ios-filled/50/000000/marker.png" class="w-5 h-5" alt="To Icon">
            </span>
            <div>
                <label for="to" class="text-xl text-blue-500">To</label>
                <input type="text" id="to" name="to" class="border-0 bg-transparent text-lg font-medium text-gray-600 focus:outline-none">
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

        const from = document.getElementById('from').value.toLowerCase(); // Convert to lowercase
        const to = document.getElementById('to').value.toLowerCase(); // Convert to lowercase

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
                const searchResultsUrl = '/search'; // URL of the search results page
                const queryString = new URLSearchParams({ results: JSON.stringify(filteredBuses) }).toString();
                window.location.href = `${searchResultsUrl}?${queryString}`;
            } else {
                // Both fields are empty, forward the full response
                const searchResultsUrl = '/search'; // URL of the search results page
                const queryString = new URLSearchParams({ results: JSON.stringify(data) }).toString();
                window.location.href = `${searchResultsUrl}?${queryString}`;
            }
        })
        .catch(error => {
            console.error('Error fetching buses:', error);
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
            const searchResultsUrl = '/search'; // URL of the search results page
            const queryString = new URLSearchParams({ results: JSON.stringify(data) }).toString();
            window.location.href = `${searchResultsUrl}?${queryString}`;
        })
        .catch(error => {
            console.error('Error fetching buses:', error);
        });
    });
</script>

{{-- CARDS FOR OFFER --}}
<section class="py-10" id="services">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Offers</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-lg bg-gradient-to-tr from-pink-300 to-blue-300 p-0.5 shadow-lg overflow-hidden min-h-xl">
                <div class="text-center text-white font-medium flex items-center justify-center">
                    <img src="https://img.icons8.com/ios-filled/50/ffffff/cash-in-hand.png" class="mr-2" alt="Cashback Icon">
                    Cashback
                </div>
                <img src="https://png.pngtree.com/png-vector/20220614/ourmid/pngtree-emblem-cash-back-cashback-sign-png-image_5068697.png" alt="Cashback" class="w-full h-64 object-cover rounded-t-lg">
                <div class="p-6 bg-white text-center rounded-b-lg md:min-h-xl">
                    <h3 class="text-xl font-medium text-gray-800 mb-2">USE CODE: BCARD40</h3>
                    <p>**Only applicable for Card payment</p>
                </div>
            </div>

            <div class="bg-white rounded-lg bg-gradient-to-tr from-pink-300 to-blue-300 p-0.5 shadow-lg overflow-hidden min-h-xl">
                <div class="text-center text-white font-medium flex items-center justify-center">
                    <img src="https://img.icons8.com/ios-filled/50/ffffff/discount.png" class="mr-2" alt="Discount Icon">
                    Special DISCOUNT
                </div>
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRsq9CEky9qRVshieJRpsCEtaeZsUZdUq-bmA&s" alt="Special Discount" class="w-full h-64 object-cover rounded-t-lg">
                <div class="p-6 bg-white text-center rounded-b-lg md:min-h-xl">
                    <h3 class="text-xl font-medium text-gray-800 mb-2">USE CODE: B40</h3>
                </div>
            </div>

            <div class="bg-white rounded-lg bg-gradient-to-tr from-pink-300 to-blue-300 p-0.5 shadow-lg overflow-hidden min-h-xl">
                <div class="text-center text-white font-medium flex items-center justify-center">
                    <img src="https://img.icons8.com/ios-filled/50/ffffff/trophy.png" class="mr-2" alt="Prizes Icon">
                    WIN PRIZES
                </div>
                <img src="https://img.freepik.com/free-vector/win-prizes-gifts-promotional-golden-background_1017-40332.jpg?semt=ais_hybrid" alt="Win Prizes" class="w-full h-64 object-cover rounded-t-lg">
                <div class="p-6 bg-white text-center rounded-b-lg md:min-h-xl">
                    <h3 class="text-xl font-medium text-gray-800 mb-2">USE CODE: BPRIZE</h3>
                    <p>**Prizes are subject to availability</p>
                </div>
            </div>
        </div>
    </div>
</section>

<x-footer/>
