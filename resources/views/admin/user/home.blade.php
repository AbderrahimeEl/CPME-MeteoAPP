<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <x-primary-button class="mb-5">
                            <a href="user/create">add a new user</a>
                        </x-primary-button>
                        <input type="text" id="search" placeholder="Search users by name..."
                            class="w-full p-2 border border-gray-300 rounded">
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="text-left py-2 px-4 border-b">Name</th>
                                    <th class="text-left py-2 px-4 border-b">Phone</th>
                                    <th class="text-left py-2 px-4 border-b">User Type</th>
                                    <th class="text-left py-2 px-4 border-b">Email</th>
                                    <th class="text-left py-2 px-4 border-b">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="user-table">
                                @foreach ($users as $user)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                                        <td class="py-2 px-4 border-b">{{ $user->phone }}</td>
                                        <td class="py-2 px-4 border-b">{{ $user->user_type }}</td>
                                        <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <button
                                                class="px-4 py-2 font-medium text-white bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue active:bg-blue-600 transition duration-150 ease-in-out">
                                                <a href="{{ route('user.edit', $user->id) }}">Edit</a>
                                            </button>
                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                                onsubmit="return confirmDelete()" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="ml-2 px-4 py-2 font-medium text-white bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:shadow-outline-red active:bg-red-600 transition duration-150 ease-in-out">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>    
        document.getElementById('search').addEventListener('input', function() {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll('#user-table tr');

            rows.forEach(row => {
                let name = row.querySelector('td:first-child').textContent.toLowerCase();
                if (name.includes(filter)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        function confirmDelete() {
            return confirm('Are you sure you want to delete this user?');
        }
    </script>
</x-app-layout>