<!-- edit-users.blade.php -->

@vite('resources/css/app.css')
<div class="container mx-auto mt-8">
    <h2 class="text-2xl font-bold mb-6">User List</h2>

    <!-- User Table -->
    <table class="min-w-full bg-white rounded-lg shadow overflow-hidden">
        <thead>
            <tr class="text-left bg-gray-100 border-b border-gray-200">
                <th class="py-3 px-4 font-semibold text-gray-700">ID</th>
                <th class="py-3 px-4 font-semibold text-gray-700">Name</th>
                <th class="py-3 px-4 font-semibold text-gray-700">Email</th>
                <th class="py-3 px-4 font-semibold text-gray-700">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr class="border-b hover:bg-gray-50">
                <td class="py-3 px-4">{{ $user->id }}</td>
                <td class="py-3 px-4">{{ $user->name }}</td>
                <td class="py-3 px-4">{{ $user->email }}</td>
                <td class="py-3 px-4">
                    <!-- Edit Button -->
                    <a href="{{ url('users/edit', $user->id) }}" onclick="return confirm('Are you sure you want to delete this user?')" class="bg-blue-500 text-white px-4 py-1 rounded-md hover:bg-blue-600 transition duration-200">
                        Edit
                    </a>

                    <!-- Delete Button -->
                    <form action="{{ url('users/delete', $user->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this user?')" class="bg-red-500 text-white px-4 py-1 rounded-md hover:bg-red-600 transition duration-200">
                            Delete
                        </button>
                    </form>
                     <!-- Block Button -->
                        @if ($user->auth==0)
                        <a href="{{ url('users/block', $user->id) }}" onclick="return confirm('Are you sure you want to block this user?')" class="bg-red-500 text-white px-4 py-1 rounded-md hover:bg-red-600 transition duration-200">
                            Block
                       
                        </a>
                        @elseif ($user->auth==1)
                        <a href="{{ url('users/unblock', $user->id) }}" onclick="return confirm('Are you sure you want to block this user?')" class="bg-red-500 text-white px-4 py-1 rounded-md hover:bg-red-600 transition duration-200">
                            Un-Block
                       
                        </a>
                        @endif
                        
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

