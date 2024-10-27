@vite('resources/css/app.css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<!-- nav bar section -->
<nav class="flex flex-wrap items-center justify-between bg-gray-100">
    <div class="text-blue-700 font-medium text-6xl md:text-4xl leading-tight ml-5 mt-5 mb-5">
        BookiFy
        <p class="font-regular text-xl text-gray-500">One Stop Ticket Booking Solution</p>
    </div>

    <!-- Hamburger Menu for Mobile -->
    <div class="flex md:hidden">
        <button id="hamburger">
            <img class="toggle block" src="https://img.icons8.com/fluent-systems-regular/2x/menu-squared-2.png"
                width="40" height="40" />
            <img class="toggle hidden" src="https://img.icons8.com/fluent-systems-regular/2x/close-window.png"
                width="40" height="40" />
        </button>
    </div>

    <!-- Navbar Links -->
    <div class="toggle hidden w-full md:w-auto md:flex gap-6 text-right font-bold mt-5 md:mt-0 md:border-none">
        <a href="/"
            class="flex items-center justify-center w-full px-4 py-4 text-xl font-bold capitalize duration-100 transform border-2 rounded-xl cursor-pointer focus:ring-4 focus:ring-gray-400 focus:ring-opacity-50 focus:outline-none sm:w-auto sm:px-6 border-text hover:shadow-lg hover:-translate-y-1">
            <i class="fas fa-home mr-2"></i> Home
        </a>
        <a href="/booking"
            class="flex items-center justify-center w-full px-4 py-4 text-xl font-bold capitalize duration-100 transform border-2 rounded-xl cursor-pointer focus:ring-4 focus:ring-gray-400 focus:ring-opacity-50 focus:outline-none sm:w-auto sm:px-6 border-text hover:shadow-lg hover:-translate-y-1">
            <i class="fas fa-bus mr-2"></i> Search Buses
        </a>

        <!-- User-Only Links -->
        @if (session('user_type') === 'user')
            <a href="#aboutus"
                class="flex items-center justify-center w-full px-4 py-4 text-xl font-bold capitalize duration-100 transform border-2 rounded-xl cursor-pointer focus:ring-4 focus:ring-gray-400 focus:ring-opacity-50 focus:outline-none sm:w-auto sm:px-6 border-text hover:shadow-lg hover:-translate-y-1">
                <i class="fas fa-info-circle mr-2"></i> About Us
            </a>
            {{-- <a href="#visitUs" class="flex items-center justify-center w-full px-4 py-4 text-xl font-bold capitalize duration-100 transform border-2 cursor-pointer focus:ring-4 focus:ring-gray-400 focus:ring-opacity-50 focus:outline-none sm:w-auto sm:px-6 border-text hover:shadow-lg hover:-translate-y-1 rounded-xl">
                <i class="fas fa-shopping-cart mr-2"></i> My Cart
            </a> --}}
        @endif

        <!-- Admin-Only Links -->
        @if (session('user_type') === 'admin')
            <a href="/add_buses"
                class="flex items-center justify-center w-full px-4 py-4 text-xl font-bold capitalize duration-100 transform border-2 cursor-pointer focus:ring-4 focus:ring-gray-400 focus:ring-opacity-50 focus:outline-none sm:w-auto sm:px-6 border-text hover:shadow-lg hover:-translate-y-1 rounded-xl">
                <i class="fas fa-plus-circle mr-2"></i> Add Buses
            </a>
            <a href="/all-tickets"
                class="flex items-center justify-center w-full px-4 py-4 text-xl font-bold capitalize duration-100 transform border-2 cursor-pointer focus:ring-4 focus:ring-gray-400 focus:ring-opacity-50 focus:outline-none sm:w-auto sm:px-6 border-text hover:shadow-lg hover:-translate-y-1 rounded-xl">
                <i class="fas fa-ticket-alt mr-2"></i> All Tickets
            </a>
        @endif
    </div>

    <!-- Right Section (My Tickets, Profile, Login/Register) -->
    <div class="toggle w-full text-end hidden md:flex md:w-auto px-2 py-2 md:rounded">
        <div class="flex items-center h-10 w-30 rounded-md bg-gray-100 font-medium p-2">
            <div class="flex space-x-4">
                @if (session('user_id'))
                    <a href="/my-tickets"
                        class="flex items-center justify-center w-full px-4 py-4 text-xl font-bold capitalize duration-100 transform border-2 cursor-pointer focus:ring-4 focus:ring-black focus:ring-opacity-50 focus:outline-none sm:w-auto sm:px-6 border-text hover:shadow-lg hover:-translate-y-1 rounded-xl">
                        <i class="fas fa-receipt mr-2"></i> My Tickets
                    </a>
                    @if (session('user_type') === 'admin')
                        <!-- Admin Link -->
                        <a href="/admin"
                            class="px-5 py-5 text-white font-medium rounded-3xl hover:bg-blue-400 transition duration-200 bg-gray-300">
                            <i class="fas fa-user-circle mr-2"></i>
                            ADMIN
                        </a>
                    @else
                        <!-- Regular User Link -->
                        <a href="/profile"
                            class="px-5 py-5 text-white font-medium rounded-3xl hover:bg-blue-400 transition duration-200 bg-gray-300">
                            <i class="fas fa-user-circle mr-2"></i>
                            {{ strtoupper(session('name')) }}
                        </a>
                    @endif

                    <a href="/logout"
                        class="px-5 py-5 bg-red-500 text-white font-medium rounded-3xl hover:bg-red-600 transition duration-200">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </a>
                @else
                    <a href="/register"
                        class="px-6 py-3 bg-blue-500 text-white font-medium rounded-full hover:bg-blue-400 transition duration-200">
                        <i class="fas fa-user-plus mr-2"></i> Register
                    </a>
                    <a href="/login"
                        class="px-6 py-3 bg-blue-500 text-white font-medium rounded-full hover:bg-blue-400 transition duration-200">
                        <i class="fas fa-sign-in-alt mr-2"></i> Sign In
                    </a>
                @endif
            </div>
        </div>
    </div>
</nav>
