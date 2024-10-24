@vite('resources/css/app.css')
<!-- nav bar section -->
<nav class="flex flex-wrap items-center justify-between p-3 bg-gray-100">
    <div class="text-blue-700 font-medium text-4xl md:text-3xl leading-tight mb-2">
        Bookify
        <p class="font-regular text-xl text-gray-500">One Stop Ticket Booking Solution</p>
    </div>
    
    <div class="flex md:hidden">
        <button id="hamburger">
            <img class="toggle block" src="https://img.icons8.com/fluent-systems-regular/2x/menu-squared-2.png" width="40" height="40" />
            <img class="toggle hidden" src="https://img.icons8.com/fluent-systems-regular/2x/close-window.png" width="40" height="40" />
        </button>
    </div>

    <div class="toggle hidden w-full md:w-auto md:flex text-right text-bold mt-5 md:mt-0 md:border-none">
        <a href="/" class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none text-xl">HOME</a>
        <a href="#services" class="block md:inline-block hover:text-blue-500 px-3 py-3 text-xl md:border-none">SERVICES</a>
        <a href="#aboutus" class="block md:inline-block hover:text-blue-500 px-3 py-3 text-xl md:border-none">ABOUT US</a>
        <a href="#contactUs" class="block md:inline-block hover:text-blue-500 px-3 py-3 text-xl md:border-none">VISIT US</a>
    </div>

    <div class="toggle w-full text-end hidden md:flex md:w-auto px-2 py-2 md:rounded">
        <div class="flex items-center h-10 w-30 rounded-md bg-gray-100 font-medium p-2">
            <div class="flex space-x-4">
                <!-- Check if user is logged in by checking the session -->
                @if(session('user_id'))
                    <a href="#profile" class="px-6 py-3 bg-blue-500 text-white font-medium rounded-full hover:bg-blue-400 transition duration-200">
                        My Profile
                    </a>
                    <a href="/logout" class="px-6 py-3 bg-blue-500 text-white font-medium rounded-full hover:bg-blue-400 transition duration-200">
                        Logout
                    </a>
                @else
                    <a href="/register" class="px-6 py-3 bg-blue-500 text-white font-medium rounded-full hover:bg-blue-400 transition duration-200">
                        Register
                    </a>
                    <a href="/login" class="px-6 py-3 bg-blue-500 text-white font-medium rounded-full hover:bg-blue-400 transition duration-200">
                        Sign In
                    </a>
                @endif
            </div>
        </div>
    </div>
</nav>
