<x-app-layout>
    <section class="w-full mx-auto py-10 bg-white text-black">
        <div class="w-fit pb-1 px-2 mx-4 rounded-md text-2xl font-semibold border-b-2 border-blue-600 ms-[10%]">Materials informations</div>
        <div class="xl:w-[80%] sm:w-[85%] xs:w-[90%] mx-auto flex md:flex-row xs:flex-col lg:gap-4 xs:gap-2 justify-center lg:items-stretch md:items-center mt-4">
            <div class="lg:w-[50%] xs:w-full">
                @if ($materiel->image)
                    <img class="w-full h-full lg:rounded-t-lg sm:rounded-sm xs:rounded-sm object-cover border border-gray-300"
                         src="data:image/jpeg;base64,{{ base64_encode($materiel->image) }}"
                         alt="Materiel Image">
                @else
                    <div class="w-full h-full flex items-center justify-center">
                        <span class="text-gray-500">No Image Available</span>
                    </div>
                @endif
            </div>
            <div class="lg:w-[50%] sm:w-full xs:w-full bg-gray-100 md:p-4 xs:p-2 rounded-md">
                <h2 class="text-3xl font-semibold text-gray-900">{{ $materiel->titre }} informations</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="py-2 px-4 border-b border-gray-300">Attribute</th>
                                <th class="py-2 px-4 border-b border-gray-300">Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-300">Location</td>
                                <td class="py-2 px-4 border-b border-gray-300">{{ $materiel->localisation }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-300">Type</td>
                                <td class="py-2 px-4 border-b border-gray-300">{{ $materiel->type }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-300">Manufacturer</td>
                                <td class="py-2 px-4 border-b border-gray-300">{{ $materiel->constructeur }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-300">Serial Number</td>
                                <td class="py-2 px-4 border-b border-gray-300">{{ $materiel->n_serie }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-300">Inventory Number</td>
                                <td class="py-2 px-4 border-b border-gray-300">{{ $materiel->n_inventaire }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-300">Market Number</td>
                                <td class="py-2 px-4 border-b border-gray-300">{{ $materiel->n_marchee }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-300">Date of Service</td>
                                <td class="py-2 px-4 border-b border-gray-300">{{ $materiel->date_mise_service }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-300">Intervention</td>
                                <td class="py-2 px-4 border-b border-gray-300">{{ $materiel->intervention }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-300">Description</td>
                                <td class="py-2 px-4 border-b border-gray-300">{{ $materiel->description }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div class="mt-4 flex gap-2">
                    <a href="{{ route('materiels.edit', $materiel->id) }}"
                        class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Edit</a>
                    <form action="" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">Delete</button>
                    </form>
                    <a href=""
                        class="inline-block bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full">Back
                        to List</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Photo by '@candjstudios' & '@framesforyourheart' on Unsplash -->
</x-app-layout>
