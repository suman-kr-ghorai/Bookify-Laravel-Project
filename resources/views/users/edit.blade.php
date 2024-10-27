@vite('resources/css/app.css')

<x-header/>

<div class="max-w-lg mx-auto bg-white dark:bg-white rounded-lg shadow-md px-8 py-10 flex flex-col items-center">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-4">Edit User</h1>

    <form action="{{ route('users.update', $user->id) }}" method="POST" class="w-full flex flex-col gap-4">
        @csrf
        @method('POST')
        
        <!-- Full Name -->
        <div class="flex items-start flex-col justify-start">
            <label for="fullName" class="text-sm text-gray-600 mr-2">Full Name:</label>
            <input type="text" id="fullName" name="name" value="{{ old('name', $user->name) }}" class="w-full px-3 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
        </div>

        <!-- Phone Number -->
        <div class="flex items-start flex-col justify-start">
            <label for="phone" class="text-sm text-gray-700 mr-2">Phone No:</label>
            <input type="number" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" class="w-full px-3 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
        </div>

        <!-- Email -->
        <div class="flex items-start flex-col justify-start">
            <label for="email" class="text-sm text-gray-700 mr-2">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="w-full px-3 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
        </div>

        <!-- Date of Birth -->
        <div class="flex items-start flex-col justify-start">
            <label for="dob" class="text-sm text-gray-700 mr-2">Date Of Birth:</label>
            <input type="date" id="dob" name="dob" value="{{ old('DOB', $user->DOB) }}" class="w-full px-3 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
        </div>

        <!-- Password -->
        <div class="flex items-start flex-col justify-start">
            <label for="password" class="text-sm text-gray-700 mr-2">New Password (optional):</label>
            <input type="password" id="password" name="password" class="w-full px-3 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
        </div>

        <!-- Confirm Password -->
        <div class="flex items-start flex-col justify-start">
            <label for="confirmPassword" class="text-sm text-gray-700 mr-2">Confirm Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" class="w-full px-3 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md shadow-sm">Save Changes</button>
    </form>

    <div class="mt-4 text-center">
        <a href='/admin-all-users-show' class="text-blue-500 hover:text-blue-600">Cancel</a>
    </div>
</div>

<x-footer/>
