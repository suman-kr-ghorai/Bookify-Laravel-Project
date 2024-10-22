@vite('resources/css/app.css')
<!-- nav bar section -->
<nav class="flex flex-wrap items-center justify-between p-3 bg-gray-100">
    <div class="text-blue-700 font-medium text-4xl md:text-3xl leading-tight mb-2">
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
    <div class=" toggle hidden w-full md:w-auto md:flex text-right text-bold mt-5 md:mt-0 md:border-none">
        <a href="/home" class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none">HOME
        </a>
        <a href="#services" class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none">SERVICES
        </a>
        <a href="#aboutus" class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none">ABOUT US
        </a>
        {{-- <a href="#gallery" class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none">GALLERY
        </a> --}}
        <a href="#contactUs" class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none">VISIT US
        </a>
    </div>

    <div class="toggle w-full text-end hidden md:flex md:w-auto px-2 py-2 md:rounded">
        <a href="tel:+123">
            <div class="flex justify-end">
                <div class="flex items-center h-10 w-30 rounded-md bg-blue-500 text-white font-medium p-2">
                    <!-- Heroicon name: phone -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                    </svg>
                    Call now
                </div>
            </div>
        </a>
    </div>

</nav>
<!-- hero seciton -->
