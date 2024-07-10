<x-app-layout>
    <div class="max-w-[90%] mx-auto sm:px-6 lg:px-8">
        <div class="bg-white min-h-[90%] overflow-hidden shadow-sm sm:rounded-lg p-12">
            <h1 class="text-2xl font-semibold mb-6">Materials Log actions</h1>
            <ul class="divide-y divide-gray-200">
                @foreach ($logs as $log)
                <li class="py-4">
                    <p class="text-gray-800">{{ $log }}</p>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
