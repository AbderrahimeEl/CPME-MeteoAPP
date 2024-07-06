<!-- resources/views/interventions/create.blade.php -->

<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <button type=""
            class=" flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
            <svg class="w-5 h-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
            </svg>
        <a href="{{ route('materiels.interventions', $materiel->id) }}">Go back</a>
        </button>
        <h1 class="text-2xl font-bold mb-6">Add Intervention for Material: {{ $materiel->name }}</h1>

        @if ($errors->any())
            <div class="mb-4">
                <ul class="list-disc list-inside text-red-500">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('materiels.interventions.store', $materiel->id) }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="intervention_date" class="block text-sm font-medium text-gray-700">Intervention Date</label>
                <input type="date" name="intervention_date" id="intervention_date"
                    value="{{ old('intervention_date') }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div class="mb-4">
                <label for="intervention_type" class="block text-sm font-medium text-gray-700">Intervention Type</label>
                <input type="text" name="intervention_type" id="intervention_type"
                    value="{{ old('intervention_type') }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div class="mt-6 flex justify-end">
                <a href="{{ route('materiels.interventions', $materiel->id) }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">Cancel</a>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
            </div>
        </form>
    </div>
</x-app-layout>
