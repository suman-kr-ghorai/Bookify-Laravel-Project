@vite('resources/css/app.css')
<!-- nav bar section -->
<nav class="flex flex-wrap items-center justify-between p-3 bg-gray-100">
    <div class="text-blue-700 font-medium text-5xl md:text-4xl leading-tight mb-2">
        Bookify
        <p class="font-regular text-xl text-gray-500">One Stop Ticket Booking Solution</p>
    </div>

    <div class="flex md:hidden">
        <button id="hamburger">
            <img class="toggle block" src="https://img.icons8.com/fluent-systems-regular/2x/menu-squared-2.png"
                width="40" height="40" />
            <img class="toggle hidden" src="https://img.icons8.com/fluent-systems-regular/2x/close-window.png"
                width="40" height="40" />
        </button>
    </div>

    <div class="toggle hidden w-full md:w-auto md:flex gap-6 text-right text-bold mt-5 md:mt-0 md:border-none">
        <a href="/"
            class="flex items-center justify-center w-full px-4 py-4 text-xl font-bold leading-6 capitalize duration-100 transform border-2 rounded-xl cursor-pointer border-blue-500 focus:ring-4 focus:ring-blue-400 focus:ring-opacity-50 focus:outline-none sm:w-auto sm:px-6 border-text  hover:shadow-lg hover:-translate-y-1">
            Home
        </a>
        <a href="/booking"
            class="flex items-center justify-center w-full px-4 py-4 text-xl font-bold leading-6 capitalize duration-100 transform border-2 rounded-xl cursor-pointer border-blue-500 focus:ring-4 focus:ring-blue-400 focus:ring-opacity-50 focus:outline-none sm:w-auto sm:px-6 border-text  hover:shadow-lg hover:-translate-y-1">
            Search Buses
        </a>
        @if (session('user_type')==='user')
            <a href="#aboutus"
                class="flex items-center justify-center w-full px-4 py-4 text-xl font-bold leading-6 capitalize duration-100 transform border-2 rounded-xl cursor-pointer border-blue-500 focus:ring-4 focus:ring-blue-400 focus:ring-opacity-50 focus:outline-none sm:w-auto sm:px-6 border-text  hover:shadow-lg hover:-translate-y-1">
                My Tickets
            </a>
            <a href="#visitUs"
                class="flex items-center justify-center w-full px-4 py-4 text-xl font-bold leading-6 capitalize duration-100 transform border-2  cursor-pointer border-blue-500 focus:ring-4 focus:ring-blue-400 focus:ring-opacity-50 focus:outline-none sm:w-auto sm:px-6 border-text  hover:shadow-lg hover:-translate-y-1 rounded-xl">
                My Cart
            </a>
        @endif

        @if (session('user_type') === 'admin')
            <a href="/add_buses"
                class="flex items-center justify-center w-full px-4 py-4 text-xl font-bold leading-6 capitalize duration-100 transform border-2  cursor-pointer border-blue-500 focus:ring-4 focus:ring-blue-400 focus:ring-opacity-50 focus:outline-none sm:w-auto sm:px-6 border-text  hover:shadow-lg hover:-translate-y-1 rounded-xl">
                Add Buses
            </a>
            <a href="/tickets"
                class="flex items-center justify-center w-full px-4 py-4 text-xl font-bold leading-6 capitalize duration-100 transform border-2  cursor-pointer border-blue-500 focus:ring-4 focus:ring-blue-400 focus:ring-opacity-50 focus:outline-none sm:w-auto sm:px-6 border-text  hover:shadow-lg hover:-translate-y-1 rounded-xl">
                All tickets
            </a>
        @endif
    </div>

    <div class="toggle w-full text-end hidden md:flex md:w-auto px-2 py-2 md:rounded">
        <div class="flex items-center h-10 w-30 rounded-md bg-gray-100 font-medium p-2">
            <div class="flex space-x-4">
                <!-- Check if user is logged in by checking the session -->
                @if (session('user_id'))
                    <a href="#profile"
                        class="px-6 py-3 bg-blue-500 text-white font-medium rounded-full hover:bg-blue-400 transition duration-200">
                        @if (session('user_type')==='admin')
                        ADMIN    
                        @else
                        {{ strtoupper(session('name')) }}
                        @endif
                    </a>

                    <a href="/logout"
                        class="px-6 py-3 bg-blue-500 text-white font-medium rounded-full hover:bg-blue-400 transition duration-200">
                        Logout
                    </a>
                @else
                    <a href="/register"
                        class="px-6 py-3 bg-blue-500 text-white font-medium rounded-full hover:bg-blue-400 transition duration-200">
                        Register
                    </a>
                    <a href="/login"
                        class="px-6 py-3 bg-blue-500 text-white font-medium rounded-full hover:bg-blue-400 transition duration-200">
                        Sign In
                    </a>
                @endif
            </div>
        </div>
    </div>
</nav>
