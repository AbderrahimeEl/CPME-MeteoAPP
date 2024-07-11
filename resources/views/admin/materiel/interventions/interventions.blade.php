<x-app-layout>
    <div class="py-4">
        <div class="max-w-[90%] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white min-h-[90%] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'technician')
                        <x-primary-button class="mb-5">
                            <a href="{{ route('materiels.interventions.create', $materiel->id) }}">Ajouter une
                                intervention</a>
                        </x-primary-button>
                    @endif
                    <h1 class="text-2xl font-bold mb-6">Interventions pour le matériel : {{ $materiel->name }}</h1>

                    @if ($materiel->interventions->isEmpty())
                        <p class="text-gray-600"> Aucune intervention trouvée pour ce matériel.</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white border border-gray-200">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="text-left py-2 px-4 border-b">Date</th>
                                        <th class="text-left py-2 px-4 border-b">Type</th>
                                        <th class="text-left py-2 px-4 border-b">Utilisateur</th>
                                        @if (auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'technician')
                                            <th class="text-left py-2 px-4 border-b">Actions</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($materiel->interventions as $intervention)
                                        <tr class="hover:bg-gray-50">
                                            <td class="py-2 px-4 border-b">{{ $intervention->intervention_date }}</td>
                                            <td class="py-2 px-4 border-b">{{ $intervention->intervention_type }}</td>
                                            <td class="py-2 px-4 border-b">{{ $intervention->user->name }}</td>
                                            @if (auth()->user()->user_type == 'admin' ||
                                                    (auth()->user()->user_type == 'technician' && auth()->user()->id == $intervention->user->id))
                                                <td class="py-2 px-4 border-b">
                                                    <button> <a
                                                            href="{{ route('materiels.interventions.edit', $intervention->id) }}"
                                                            class="inline-block bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-2 rounded">Modifier</a>
                                                    </button>
                                                    <form
                                                        action="{{ route('materiels.interventions.delete', $intervention->id) }}"
                                                        method="POST" onsubmit="return confirmDelete()" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="ml-2 px-4 py-2 font-medium text-white bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:shadow-outline-red active:bg-red-600 transition duration-150 ease-in-out">Supprimer</button>
                                                    </form>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                    <button type="button"
                        class="mt-4 flex items-center justify-center w-1/2 px-5 py-2 text-sm text-white transition-colors duration-200 border rounded-lg gap-x-2 sm:w-auto bg-blue-600 hover:bg-blue-500">
                        <svg class="w-5 h-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                        </svg>
                        <a href="{{ route('materiels') }}">Retourner aux matériels</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete() {
            return confirm('Êtes-vous sûr de vouloir supprimer cette intervention?');
        }
    </script>
</x-app-layout>
