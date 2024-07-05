<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="mb-4">
                        <x-primary-button class="mb-5"><a href="user/create">add a new user</a></x-primary-button>
                        <input type="text" id="search" placeholder="Search users by name..."
                            class="w-full p-2 border border-gray-300 rounded">
                    </div>
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="py-2">Name</th>
                                <th class="py-2">Phone</th>
                                <th class="py-2">User Type</th>
                                <th class="py-2">Email</th>
                                <th class="py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="user-table">
                            @foreach ($users as $user)
                                <tr>
                                    <td class="border px-4 py-2">{{ $user->name }}</td>
                                    <td class="border px-4 py-2">{{ $user->phone }}</td>
                                    <td class="border px-4 py-2">{{ $user->user_type }}</td>
                                    <td class="border px-4 py-2">{{ $user->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <button
                                            class="px-4 py-2 font-medium text-white bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue active:bg-blue-600 transition duration-150 ease-in-out"><a
                                                href="{{ route('user.edit', $user->id) }}"
                                                class="">Edit</a></button>
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                            onsubmit="return confirmDelete()">
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
