<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Materiels') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(@Session::has('error'))
                    <div class="succ" role="alert">
                        {{Session::get('error')}}
                    </div>
                    @endif
                    {{-- {{ __('Materiels') }} --}}
                    <x-primary-button><a href="materiels/create">add</a></x-primary-button>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach($materiels as $materiel)
                        <div class="max-w-sm rounded overflow-hidden shadow-lg">
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
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">{{ $materiel->titre }}</div>
                                <p class="text-gray-700 text-base">
                                   <strong>Location :</strong> {{ $materiel->localisation }}<br>
                                    Type: {{ $materiel->type }}<br>
                                    Manufacturer: {{ $materiel->constructeur }}
                                </p>
                            </div>
                            <div class="px-6 pt-4 pb-2">
                                <a href="{{ route('materiels.view', ['id'=>$materiel->id]) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">View</a>
                                <a href="{{ route('materiels.edit', $materiel->id) }}" class="inline-block bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                <form action="{{ route('materiels.edit', $materiel->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
