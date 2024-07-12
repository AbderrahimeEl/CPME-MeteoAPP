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
                    @if (auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'technician')
                        <x-primary-button class="mb-5"><a href="materiels/create">ajouter un nouveau matériel</a></x-primary-button>
                    @endif
                    <form method="GET" action="{{ route('materiels') }}" class="mb-6">
                        <div class="flex items-center">
                            <input type="text" name="title" placeholder=" Rechercher par titre"
                                value="{{ request('title') }}" class="p-2 border border-gray-300 rounded mr-2 w-full">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Rechercher</button>
                        </div>
                    </form>
                    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @if ($materiels->isEmpty())
                            <p class="text-gray-500">Aucun matériel trouvé.</p>
                        @else
                            @foreach ($materiels as $materiel)
                                <div class="max-w-sm rounded overflow-hidden shadow-lg">
                                    {{-- // Assuming the image is stored as a BLOB in the 'image' column --}}
                                    {{-- <img class="min-w-70 max-w-70 max-h-60 min-h-60 object-cover" src="data:image/jpeg;base64,{{ base64_encode($materiel->image) }}" alt="Materiel Image"> --}}
                                    @if ($materiel->image)
                                        <img class="w-full h-[40%] object-cover border border-gray-300"
                                            src="data:image/jpeg;base64,{{ base64_encode($materiel->image) }}"
                                            alt="Materiel Image">
                                    @else
                                        <div class="w-full h-[40%] flex items-center justify-center">
                                            <span class="text-gray-500">Aucune image disponible</span>
                                        </div>
                                    @endif
                                    <div class="w-full h-[60%]">
                                        <div class=" px-6 py-4">
                                            <div class="font-bold text-xl mb-2">{{ $materiel->titre }}</div>
                                            <p class="text-gray-700 text-base">
                                                <strong>Localisation :</strong> {{ $materiel->localisation }}<br>
                                                Type: {{ $materiel->type }}<br>
                                                Constructeur: {{ $materiel->constructeur }}
                                            </p>
                                        </div>
                                        <div class="m-4">
                                            <a href="{{ route('materiels.view', ['id' => $materiel->id]) }}"
                                                class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">Voir plus</a>
                                            @if (auth()->user()->user_type == 'admin')
                                                <a href="{{ route('materiels.edit', $materiel->id) }}"
                                                    class="inline-block bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-2 rounded">Modifier</a>
                                                <form action="{{ route('materiels.delete', $materiel->id) }}"
                                                    method="POST" class="inline-block"
                                                    onsubmit="return confirmDelete()">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 rounded">Supprimer</button>
                                                </form>
                                            
                                            @endif
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
            return confirm('Êtes-vous sûr de vouloir supprimer ce matériel?');
        }
    </script>
</x-app-layout>
