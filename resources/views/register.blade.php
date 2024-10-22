@vite('resources/css/app.css')

<x-header/>


<div class="max-w-lg mx-auto  bg-white light:bg-white rounded-lg shadow-md px-8 py-10 flex flex-col items-center">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-4">Welcome</h1>

    <form action="new-user/register" method="POST" class="w-full flex flex-col gap-4">
      @csrf
      <div class="flex items-start flex-col justify-start">
        <label for="fullName" class="text-sm text-gray-600 mr-2">Full Name:</label>
        <input type="text" id="fullName" name="fullName" class="w-full px-3   py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
      </div>

      <div class="flex items-start flex-col justify-start">
        <label for="phone" class="text-sm text-gray-700  mr-2">Phone No :</label>
        <input type="number" id="phone" name="phone" class="w-full px-3   py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
      </div>


      <div class="flex items-start flex-col justify-start">
        <label for="email" class="text-sm text-gray-700  mr-2">Email:</label>
        <input type="email" id="email" name="email" class="w-full px-3   py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
      </div>

      <div class="flex items-start flex-col justify-start">
        <label for="dob" class="text-sm text-gray-700  mr-2">Date Of Birth:</label>
        <input type="date" id="dob" name="dob" class="w-full px-3 dark:text-gray-600  py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
      </div>

     

      <div class="flex items-start flex-col justify-start">
        <label for="password" class="text-sm text-gray-700  mr-2">Password:</label>
        <input type="password" id="password" name="password" class="w-full px-3  py-2 dark:text-gray-600  rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
      </div>

      <div class="flex items-start flex-col justify-start">
        <label for="confirmPassword" class="text-sm text-gray-700  mr-2">Confirm Password:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" class="w-full px-3 dark:text-gray-600  py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
      </div>

      <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md shadow-sm">Register</button>
    </form>

    <div class="mt-4 text-center">
      <span class="text-sm text-gray-500 ">Already have an account? </span>
      <a href="/login" class="text-blue-500 hover:text-blue-600">Login</a>
    </div>
    </form>
  </div>

  <x-footer/>
