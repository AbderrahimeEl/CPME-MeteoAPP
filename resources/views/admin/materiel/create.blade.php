<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Material') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (@Session::has('error'))
                        <div class="succ" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    {{-- {{ __('Materiels') }} --}}
                    <form method="POST" action="{{ route('materiels.save') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- titre -->
                        <div>
                            <x-input-label for="titre" :value="__('Désigniation de l\'équipement')" />
                            <x-text-input id="titre" class="block mt-1 w-full" type="text" name="titre"
                                :value="old('titre')" required autofocus autocomplete="titre" />
                            <x-input-error :messages="$errors->get('titre')" class="mt-2" />
                        </div>
                        <!-- localisation -->
                        <div class="mt-4">
                            <x-input-label for="localisation" :value="__('l\'oclisation de l\'équipement')" />
                            <x-text-input id="localisation" class="block mt-1 w-full" type="text" name="localisation"
                                :value="old('localisation')" required autofocus autocomplete="localisation" />
                            <x-input-error :messages="$errors->get('localisation')" class="mt-2" />
                        </div>
                        <!-- constructeur -->
                        <div class="mt-4">
                            <x-input-label for="constructeur" :value="__('Constructeur de l\'équipement')" />
                            <x-text-input id="constructeur" class="block mt-1 w-full" type="text" name="constructeur"
                                :value="old('constructeur')" required autofocus autocomplete="constructeur" />
                            <x-input-error :messages="$errors->get('constructeur')" class="mt-2" />
                        </div>
                        <!-- type -->
                        <div class="mt-4">
                            <x-input-label for="type" :value="__('type de l\'équipement')" />
                            <x-text-input id="type" class="block mt-1 w-full" type="text" name="type"
                                :value="old('type')" required autofocus autocomplete="type" />
                            <x-input-error :messages="$errors->get('type')" class="mt-2" />
                        </div>
                        <!-- n_serie -->
                        <div class="mt-4">
                            <x-input-label for="n_serie" :value="__('n de série de l\'équipement')" />
                            <x-text-input id="n_serie" class="block mt-1 w-full" type="text" name="n_serie"
                                :value="old('n_serie')" required autofocus autocomplete="n_serie" />
                            <x-input-error :messages="$errors->get('n_serie')" class="mt-2" />
                        </div>
                        <!-- n_inventaire -->
                        <div class="mt-4">
                            <x-input-label for="n_inventaire" :value="__('n d\'inventaire de l\'équipement')" />
                            <x-text-input id="n_inventaire" class="block mt-1 w-full" type="text" name="n_inventaire"
                                :value="old('n_inventaire')" required autofocus autocomplete="n_inventaire" />
                            <x-input-error :messages="$errors->get('n_inventaire')" class="mt-2" />
                        </div>
                        <!-- n_marchee -->
                        <div class="mt-4">
                            <x-input-label for="n_marchee" :value="__('n de marchée de l\'équipement')" />
                            <x-text-input id="n_marchee" class="block mt-1 w-full" type="text" name="n_marchee"
                                :value="old('n_marchee')" required autofocus autocomplete="n_marchee" />
                            <x-input-error :messages="$errors->get('n_marchee')" class="mt-2" />
                        </div>
                        <!-- date_mise_service -->
                        <div class="mt-4">
                            <x-input-label for="date_mise_service" :value="__('date de mise en service')" />
                            <x-text-input id="date_mise_service" class="block mt-1 w-full" type="date"
                                name="date_mise_service" :value="old('date_mise_service')" required autofocus
                                autocomplete="date_mise_service" />
                            <x-input-error :messages="$errors->get('date_mise_service')" class="mt-2" />
                        </div>

                        <!-- intervention -->
                        <div class="mt-4">
                            <x-input-label for="intervention" :value="__('intervention')" />
                            <x-text-input id="intervention" class="block mt-1 w-full" type="text" name="intervention"
                                :value="old('intervention')" required autofocus autocomplete="intervention" />
                            <x-input-error :messages="$errors->get('intervention')" class="mt-2" />
                        </div>

                        <!-- image -->
                        <div class="mt-4">
                            <x-input-label for="image" :value="__('Image')" />
                            <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" />
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>



                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Add') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
