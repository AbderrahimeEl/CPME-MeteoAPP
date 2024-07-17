<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl p-6 pb-2 text-gray-800 leading-tight">
                Modifier l'utilisateur
            </h2>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('user.update', $user) }}">
                        @csrf
                        @method('PUT')
                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Nom')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                value="{{ $user->name }}" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <!-- Phone -->
                        <div>
                            <x-input-label for="phone" :value="__('Téléphone')" />
                            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                                value="{{ $user->phone }}" required autofocus autocomplete="phone" />
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>
                        <!-- User Type -->
                        <div class="mt-4">
                            <x-input-label for="user_type" :value="__('Type d\'utilisateur')" />
                            <select id="user_type" name="user_type"
                                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                @if ($user->user_type == 'user')
                                    {
                                    <option value="user">Utilisateur</option>
                                    <option value="technician">Technicien</option>}
                                @else
                                    {
                                    <option value="technician">Technicien</option>
                                    <option value="user">Utilisateur</option>
                                    }
                                @endif
                            </select>
                            <x-input-error :messages="$errors->get('user_type')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Enregistrer') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
