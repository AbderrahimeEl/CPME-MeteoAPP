<x-app-layout>
    <section class="w-full mx-auto py-10 bg-white text-black">
        <div class="w-fit pb-1 px-2 mx-4 rounded-md text-2xl font-semibold border-b-2 border-blue-600 ms-[10%]">Informations sur le matériel</div>
        <div
            class="xl:w-[80%] sm:w-[85%] xs:w-[90%] mx-auto flex md:flex-row xs:flex-col lg:gap-4 xs:gap-2 justify-center lg:items-stretch md:items-center mt-4">
            <div class="lg:w-[50%] xs:w-full">
                @if ($materiel->image)
                    <img class="w-full h-full lg:rounded-t-lg sm:rounded-sm xs:rounded-sm object-cover border border-gray-300"
                        src="data:image/jpeg;base64,{{ base64_encode($materiel->image) }}" alt="Materiel Image">
                @else
                    <div class="w-full h-full flex items-center justify-center">
                        <span class="text-gray-500">Aucune image disponible</span>
                    </div>
                @endif
            </div>
            <div class="lg:w-[50%] sm:w-full xs:w-full bg-gray-100 md:p-4 xs:p-2 rounded-md">
                <h2 class="text-3xl font-semibold text-gray-900">{{ $materiel->titre }} informations</h2>
                <div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">Localisation</p>
                        <p>{{ $materiel->localisation }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">Type</p>
                        <p>{{ $materiel->type }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">Constructeur</p>
                        <p>{{ $materiel->constructeur }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">Numéro de série</p>
                        <p>{{ $materiel->n_serie }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">Numéro d'inventaire</p>
                        <p>{{ $materiel->n_inventaire }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">Numéro de marché</p>
                        <p>{{ $materiel->n_marchee }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">Date de mise en service</p>
                        <p>{{ $materiel->date_mise_service }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">Description</p>
                        <p>{{ $materiel->description }}</p>
                    </div>
                </div>
                <div class="mt-4 flex gap-2">
                    @if (auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'technician')
                        <a href="{{ route('materiels.edit', $materiel->id) }}"
                            class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Modifier</a>
                        <form action="{{ route('materiels.delete', $materiel->id) }}" method="POST"
                            class="inline-block" onsubmit="return confirmDelete()">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">Supprimer</button>
                        </form>
                    @endif
                    <a href="{{ route('materiels.interventions', $materiel->id) }}"
                        class="inline-block bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Voir les interventions
                    </a>
                    <a href="{{ route('materiels') }}"
                        class="inline-block bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full">Retour à la liste</a>
                </div>
            </div>
        </div>
    </section>
    <script>
        function confirmDelete() {
            return confirm('Êtes-vous sûr de vouloir supprimer ce matériel ?');
        }
    </script>
</x-app-layout>
