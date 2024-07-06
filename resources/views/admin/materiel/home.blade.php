<x-app-layout>

    <div class="py-4">
        <div class="max-w-[90%] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white min-h-[90%] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (@Session::has('error'))
                        <div class="succ" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    {{-- {{ __('Materiels') }} --}}
                    <x-primary-button class="mb-5"><a href="materiels/create">add a new material</a></x-primary-button>
                    <form method="GET" action="{{ route('materiels') }}" class="mb-6">
                        <div class="flex items-center">
                            <input type="text" name="title" placeholder="Search by title"
                                value="{{ request('title') }}" class="p-2 border border-gray-300 rounded mr-2 w-full">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Search</button>
                        </div>
                    </form>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @if ($materiels->isEmpty())
                            <p class="text-gray-500">No materials found.</p>
                        @else
                            @foreach ($materiels as $materiel)
                                <div class="max-w-sm  rounded overflow-hidden shadow-lg">
                                    {{-- // Assuming the image is stored as a BLOB in the 'image' column --}}
                                    {{-- <img class="min-w-70 max-w-70 max-h-60 min-h-60 object-cover" src="data:image/jpeg;base64,{{ base64_encode($materiel->image) }}" alt="Materiel Image"> --}}
                                    @if ($materiel->image)
                                        <img class="w-full h-[50%] object-cover border border-gray-300"
                                            src="data:image/jpeg;base64,{{ base64_encode($materiel->image) }}"
                                            alt="Materiel Image">
                                    @else
                                        <div class="w-full h-[50%] flex items-center justify-center">
                                            <span class="text-gray-500">No Image Available</span>
                                        </div>
                                    @endif
                                    <div class="w-full h-[50%]">
                                        <div class=" px-6 py-4">
                                            <div class="font-bold text-xl mb-2">{{ $materiel->titre }}</div>
                                            <p class="text-gray-700 text-base">
                                                <strong>Location :</strong> {{ $materiel->localisation }}<br>
                                                Type: {{ $materiel->type }}<br>
                                                Manufacturer: {{ $materiel->constructeur }}
                                            </p>
                                        </div>
                                        <div class="px-6 pt-4 pb-2">
                                            <a href="{{ route('materiels.view', ['id' => $materiel->id]) }}"
                                                class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">View</a>
                                            <a href="{{ route('materiels.edit', $materiel->id) }}"
                                                class="inline-block bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                            <form action="{{ route('materiels.delete', $materiel->id) }}"
                                                method="POST" class="inline-block" onsubmit="return confirmDelete()">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this Material?');
        }
    </script>
</x-app-layout>
