@vite('resources/css/app.css')


<x-header/>
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
                <input type="text" value="Haldia" id="from" name="from"  class="sm:rounded-lg border-solid  text-lg text-gray-600 font-medium focus:outline-none border-cyan-200">
            </div>
        </div>

        <!-- Swap Icon -->
        <div class="flex items-center">
            <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
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
                <input type="text" id="to" name="to" value="Kolkata" class="border-0 bg-transparent text-lg font-medium text-gray-600 focus:outline-none" >
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


{{-- CARDS FOR OFFER --}}
<section class="py-10" id="services">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Our Services</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://image3.jdomni.in/banner/13062021/42/5C/B1/45AC18B7F8EE562BC3DDB95D34_1623559815667.png?output-format=webp" alt="wheat flour grinding"
                    class="w-full h-64 object-cover">
                <div class="p-6 text-center">
                    <h3 class="text-xl font-medium text-gray-800 mb-2">Wheat Flour Grinding</h3>
                    <p class="text-gray-700 text-base">Our wheat flour grinding service provides fresh, high-quality
                        flour to businesses and individuals in the area. We use state-of-the-art equipment to grind
                        wheat into flour, and we offer a variety of flours to meet the needs of our customers.</p>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://images.unsplash.com/photo-1606854428728-5fe3eea23475?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Z3JhbSUyMGZsb3VyfGVufDB8fDB8fHww" alt="Coffee"
                    class="w-full h-64 object-cover">
                <div class="p-6 text-center">
                    <h3 class="text-xl font-medium text-gray-800 mb-2">Gram Flour Grinding</h3>
                    <p class="text-gray-700 text-base">Our gram flour is perfect for a variety of uses, including
                        baking, cooking, and making snacks. It is also a good source of protein and fiber.Our gram flour
                        grinding service is a convenient and affordable way to get the freshest gram flour possible.</p>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://image2.jdomni.in/banner/13062021/D2/99/0D/48D7F4AFC48C041DC8D80432E9_1623562146900.png?output-format=webp" alt="Coffee"
                    class="w-full h-64 object-cover">
                <div class="p-6 text-center">
                    <h3 class="text-xl font-medium text-gray-800 mb-2">Jowar Flour Grinding</h3>
                    <p class="text-gray-700 text-base">Our jowar grinding service is a convenient and affordable way to
                        get fresh, high-quality jowar flour. We use state-of-the-art equipment to grind jowar into a
                        fine powder, which is perfect for making roti, bread, and other dishes.
                    <details>
                        <summary>Read More</summary>
                        <p>Our jowar flour is also
                            a good source of protein and fiber, making it a healthy choice for your family.</p>
                    </details>
                    </p>

                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://images.unsplash.com/photo-1607672632458-9eb56696346b?q=80&w=1914&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Coffee"
                    class="w-full h-64 object-cover">
                <div class="p-6 text-center">
                    <h3 class="text-xl font-medium text-gray-800 mb-2">Chilli pounding</h3>
                    <p class="text-gray-700 text-base">We specializes in the production of high-quality chili powder.
                        Our chili powder is made from the finest, freshest chilies, and we use traditional pounding
                        methods to ensure that our chili powder retains its full flavor and aroma.
                    <details>
                        <summary>Read More</summary>
                        <p> We offer a variety of chili powder products, including mild, medium, and hot. We also offer
                            custom blends to meet the specific needs of our customers.</p>
                    </details>
                    </p>
                </div>
            </div>
            <!-- special card -->
            <div
                class="bg-white rounded-lg bg-gradient-to-tr from-pink-300 to-blue-300 p-0.5 shadow-lg overflow-hidden min-h-full">
                <div class="text-center text-white font-medium">Special product</div>
                <img src="https://images.unsplash.com/photo-1556910110-a5a63dfd393c?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8cmF3JTIwc3BhZ2hldHRpfGVufDB8fDB8fHww" alt="Coffee"
                    class="w-full h-64 object-cover rounded-t-lg">
                <div class="p-6 bg-white text-center rounded-b-lg md:min-h-full">
                    <h3 class="text-xl font-medium text-gray-800 mb-2">Flavoured Spaghetti</h3>
                    <p class="text-gray-700 text-base"><span class="font-medium underline">Our speciality is</span>
                        Bappa Flour Mill offers a variety of flavored spaghetti dishes that are sure to tantalize your
                        taste
                        buds. We use only the freshest ingredients Our
                        flavors include: Mango, spinach
                    </p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://media.istockphoto.com/id/1265641298/photo/fried-papad.jpg?s=612x612&w=0&k=20&c=e_iEy4CTvU6Thn02zGgKt_TiSYAheCKmgfTF5j52ovU=" alt="papad"
                    class="w-full h-64 object-cover">
                <div class="p-6 text-center">
                    <h3 class="text-xl font-medium text-gray-800 mb-2">Rice Papad</h3>
                    <p class="text-gray-700 text-base">Our company produces high-quality rice papad that is made with
                        the finest ingredients. We use traditional methods to make our papad, which gives it a unique
                        flavor and texture. Our papad is also gluten-free and vegan.
                    <details>
                        <summary>Read More</summary>
                        <p> We offer a variety of rice papad flavors, including plain, salted, spicy, and flavored. We
                            also
                            offer a variety of sizes and shapes to choose from. Our papad is available in bulk or in
                            individual packages.</p>
                    </details>
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>



<x-footer/>