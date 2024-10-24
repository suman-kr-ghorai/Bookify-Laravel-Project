<!-- Blade Template File (e.g., search-bus.blade.php) -->
<div class="bg-blue-400 p-20 rounded-md">
    <form action="/search-buses" method="POST" class="flex items-center justify-between bg-white p-4 rounded-lg shadow-md">
        <!-- From Input -->
        <div class="flex items-center space-x-2">
            <span class="flex items-center justify-center h-8 w-8 bg-blue-100 rounded-full">
                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m8 0h.01m4 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </span>
            <div>
                <label for="from" class="text-sm text-blue-500">From</label>
                <input type="text" value="Haldia" id="from" name="from" class="sm:rounded-lg border-solid text-lg text-gray-600 font-medium focus:outline-none border-cyan-200">
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
                <label for="to" class="text-sm text-blue-500">To</label>
                <input type="text" id="to" name="to" value="Kolkata" class="border-0 bg-transparent text-lg font-medium text-gray-600 focus:outline-none">
            </div>
        </div>

        <!-- Date Input -->
        <div class="flex items-center space-x-2">
            <span class="flex items-center justify-center h-8 w-8 bg-blue-100 rounded-full">
                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v2m4-2v2m4-2v2M3 9h18M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </span>
            <div>
                <label for="date" class="text-sm text-gray-500">Date</label>
                <input type="date" id="date" name="date" value="2024-10-20" class="border-0 bg-transparent text-lg font-medium focus:outline-none">
            </div>
        </div>

        <!-- Search Button -->
        <button type="submit" class="bg-green-500 text-white font-bold py-2 px-6 rounded-full">
            SEARCH BUSES
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
</script>
