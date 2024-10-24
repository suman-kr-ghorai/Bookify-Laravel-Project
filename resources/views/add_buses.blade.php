@vite('resources/css/app.css')

<x-header />
<div class="container mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-6">Add Bus Details</h2>
    <form action="register-buses" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-lg font-medium text-gray-700">Name:</label>
            <input type="text" class="mt-1 p-2 border border-gray-300 rounded w-full" id="name" name="name" required>
        </div>

        <div class="mb-4">
            <label for="phone" class="block text-lg font-medium text-gray-700">Phone:</label>
            <input type="text" class="mt-1 p-2 border border-gray-300 rounded w-full" id="phone" name="phone" required>
        </div>

        <div class="mb-4">
            <label for="source" class="block text-lg font-medium text-gray-700">Source:</label>
            <input type="text" class="mt-1 p-2 border border-gray-300 rounded w-full" id="source" name="source" required>
        </div>

        <div class="mb-4">
            <label for="destination" class="block text-lg font-medium text-gray-700">Destination:</label>
            <input type="text" class="mt-1 p-2 border border-gray-300 rounded w-full" id="destination" name="destination" required>
        </div>

        <div class="mb-4">
            <label for="time" class="block text-lg font-medium text-gray-700">Time:</label>
            <input type="time" class="mt-1 p-2 border border-gray-300 rounded w-full" id="time" name="time" required>
        </div>

        <div class="mb-4">
            <label for="price" class="block text-lg font-medium text-gray-700">Price:</label>
            <input type="number" class="mt-1 p-2 border border-gray-300 rounded w-full" id="price" name="price" required>
        </div>

        <div class="mb-4">
            <label for="category" class="block text-lg font-medium text-gray-700">Category:</label>
            <input type="text" class="mt-1 p-2 border border-gray-300 rounded w-full" id="category" name="category" required>
        </div>

        <div class="mb-4">
            <label for="rating" class="block text-lg font-medium text-gray-700">Rating:</label>
            <input type="number" class="mt-1 p-2 border border-gray-300 rounded w-full" id="rating" name="rating" step="0.1" min="0" max="5" required>
        </div>

        <div class="mb-4">
            <label for="photo" class="block text-lg font-medium text-gray-700">Photo:</label>
            <input type="file" class="mt-1 border border-gray-300 rounded w-full" id="photo" name="photo" required>
        </div>

        <div class="mb-4">
            <label for="to_details" class="block text-lg font-medium text-gray-700">To Details:</label>
            <textarea class="mt-1 p-2 border border-gray-300 rounded w-full" id="to_details" name="to_details" required></textarea>
        </div>

        <div class="mb-4">
            <label for="from_details" class="block text-lg font-medium text-gray-700">From Details:</label>
            <textarea class="mt-1 p-2 border border-gray-300 rounded w-full" id="from_details" name="from_details" required></textarea>
        </div>

        <div class="mb-4">
            <label for="capacity" class="block text-lg font-medium text-gray-700">Capacity:</label>
            <input type="number" class="mt-1 p-2 border border-gray-300 rounded w-full" id="capacity" name="capacity" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 transition duration-200">Add Bus</button>
    </form>
</div>

<x-footer />
