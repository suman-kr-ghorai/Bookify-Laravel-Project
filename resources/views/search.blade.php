@vite('resources/css/app.css')
<x-header/>

<!-- Blade Template File (e.g., modify-bus.blade.php) -->
<div class="bg-gray-50 py-4 px-6">
    <!-- Breadcrumb -->
    <div class="text-sm text-gray-500 mb-4">
        <a href="#" class="hover:underline">Bus Ticket</a>
        <span class="mx-2">></span>
        <span class="font-semibold">Haldia To Kolkata Bus</span>
    </div>

    <!-- Main Heading -->
    <h1 class="text-2xl font-semibold text-gray-800 mb-4">Haldia to Kolkata Bus</h1>

    <!-- Bus Details -->
    <div class="flex items-center justify-between bg-white p-4 shadow-md rounded-md">
        <!-- Route Info -->
        <div class="flex items-center space-x-4">
            <div class="text-lg font-medium text-gray-700">Haldia</div>

            <!-- Arrow Icon -->
            <div>
                <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </div>

            <div class="text-lg font-medium text-gray-700">Kolkata</div>

            <!-- Date Info -->
            <div class="flex items-center space-x-2">
                {{-- <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v2m4-2v2m4-2v2M3 9h18M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg> --}}
                
            </div>
        </div>
        <span class=" text-lg font-medium text-gray-700">20 Oct</span>
        <span class="text-sm text-gray-500">Sun</span>
        <!-- Modify Button -->
        {{-- <button class="border border-gray-400 text-gray-700 font-semibold py-1 px-4 rounded-md hover:bg-gray-100">
            Modify
        </button> --}}
    </div>
</div>


{{-- CARDS FOR BUS AVAILABLE --}}

{{-- CARD1 --}}
<div class="bg-gray-50 py-4 px-6 mt-24">
    <div class="flex gap-3 bg-white border border-gray-300 rounded-xl overflow-hidden items-center justify-start">

        <div class="relative w-32 h-32 flex-shrink-0">
            <img class="absolute left-0 top-0 w-full h-full object-cover object-center transition duration-50" loading="lazy" src="https://via.placeholder.com/150">
        </div>

        <div class="flex flex-col gap-2 py-2">

            <p class="text-xl font-bold">Post title</p>

            <p class="text-gray-500">
                Description of your post/article,
                Description of your post/article,
            </p>

            <span class="flex items-center justify-start text-gray-500">
                <svg class="w-4 h-4 mr-1 mt-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z" clip-rule="evenodd"></path>
                </svg>
                <a href="amitpachange.com" target="_blank">amitpachange.com</a>
            </span>

        </div>

    </div>

</div>

{{-- CARD2 --}}
<div class="bg-gray-50 py-4 px-6 mt-24">
    <div class="flex gap-3 bg-white border border-gray-300 rounded-xl overflow-hidden items-center justify-start">

        <div class="relative w-32 h-32 flex-shrink-0">
            <img class="absolute left-0 top-0 w-full h-full object-cover object-center transition duration-50" loading="lazy" src="https://via.placeholder.com/150">
        </div>

        <div class="flex flex-col gap-2 py-2">

            <p class="text-xl font-bold">Post title</p>

            <p class="text-gray-500">
                Description of your post/article,
                Description of your post/article,
            </p>

            <span class="flex items-center justify-start text-gray-500">
                <svg class="w-4 h-4 mr-1 mt-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z" clip-rule="evenodd"></path>
                </svg>
                <a href="amitpachange.com" target="_blank">amitpachange.com</a>
            </span>

        </div>

    </div>

</div>

{{-- CARD3 --}}
<div class="bg-gray-50 py-4 px-6 mt-24">
    <div class="flex gap-3 bg-white border border-gray-300 rounded-xl overflow-hidden items-center justify-start">

        <div class="relative w-32 h-32 flex-shrink-0">
            <img class="absolute left-0 top-0 w-full h-full object-cover object-center transition duration-50" loading="lazy" src="https://via.placeholder.com/150">
        </div>

        <div class="flex flex-col gap-2 py-2">

            <p class="text-xl font-bold">Post title</p>

            <p class="text-gray-500">
                Description of your post/article,
                Description of your post/article,
            </p>

            <span class="flex items-center justify-start text-gray-500">
                <svg class="w-4 h-4 mr-1 mt-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z" clip-rule="evenodd"></path>
                </svg>
                <a href="amitpachange.com" target="_blank">amitpachange.com</a>
            </span>

        </div>

    </div>

</div>

<x-footer/>