<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centre Provincial de Météorologie</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="text-gray-800 antialiased">
    <nav class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3">
        <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
            <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
                <a href="#"
                    class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white">
                    CPM Essaouira
                </a>
            </div>
            <div class="lg:flex flex-grow items-center bg-white lg:bg-transparent lg:shadow-none hidden"
                id="example-collapse-navbar">
                <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
                    <li class="flex items-center">
                        @if (Route::has('login'))
                            @auth
                                <button
                                    class="bg-white text-gray-800 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3"
                                    type="button" style="transition: all 0.15s ease 0s;">
                                    <a href="{{ url('/dashboard') }}">
                                        Dashboard
                                    </a>
                                </button>
                            @else
                                <button
                                    class="bg-white text-gray-800 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3"
                                    type="button" style="transition: all 0.15s ease 0s;">
                                    <a href="{{ route('login') }}">
                                        Log in
                                    </a>
                                </button>

                                @if (Route::has('register'))
                                    <button
                                        class="bg-white text-gray-800 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3"
                                        type="button" style="transition: all 0.15s ease 0s;">
                                        <a href="{{ route('register') }}"> Register
                                        </a>
                                    </button>
                                @endif
                            @endauth
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main>
        <div class="relative pt-16 pb-32 flex content-center items-center justify-center" style="min-height: 75vh;">
            <div class="absolute top-0 w-full h-full bg-center bg-cover"
                style='background-image: url("{{ asset('images/back.jpeg') }}");'>
                <span id="blackOverlay" class="w-full h-full absolute opacity-75 bg-black"></span>
            </div>
            <div class="container relative mx-auto">
                <div class="items-center flex flex-wrap">
                    <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
                        <div class="pr-12">
                            <h1 class="text-white font-semibold text-5xl">
                                Centre Provincial de Météorologie
                            </h1>
                            <p class="mt-4 text-lg text-gray-300">
                                Bienvenue au Centre Provincial de Météorologie d'Essaouira. Nous fournissons des prévisions météorologiques précises et une surveillance climatique pour la région.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
                style="height: 70px;">
                <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                    <polygon class="text-gray-300 fill-current" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
    
        <section class="pb-20 bg-gray-300 -mt-24">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap">
                    <div class="lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                            <div class="px-4 py-5 flex-auto">
                                <div
                                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-red-400">
                                    <i class="fas fa-award"></i>
                                </div>
                                <h6 class="text-xl font-semibold">Agence Primée</h6>
                                <p class="mt-2 mb-4 text-gray-600">
                                    Reconnu pour l'excellence dans les services météorologiques et les prévisions météorologiques précises.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-4/12 px-4 text-center">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                            <div class="px-4 py-5 flex-auto">
                                <div
                                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-blue-400">
                                    <i class="fas fa-retweet"></i>
                                </div>
                                <h6 class="text-xl font-semibold">Données Fiables</h6>
                                <p class="mt-2 mb-4 text-gray-600">
                                    Fournir des données météorologiques cohérentes et fiables pour Essaouira et les environs.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="pt-6 w-full md:w-4/12 px-4 text-center">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                            <div class="px-4 py-5 flex-auto">
                                <div
                                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-green-400">
                                    <i class="fas fa-fingerprint"></i>
                                </div>
                                <h6 class="text-xl font-semibold">Informations Vérifiées</h6>
                                <p class="mt-2 mb-4 text-gray-600">
                                    Toutes nos informations météorologiques sont soigneusement vérifiées et approuvées par les autorités locales.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap items-center mt-32">
                    <div class="w-full md:w-5/12 px-4 mr-auto ml-auto">
                        <div
                            class="text-gray-600 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-gray-100">
                            <i class="fas fa-user-friends text-xl"></i>
                        </div>
                        <h3 class="text-3xl mb-2 font-semibold leading-normal">
                            Notre Mission
                        </h3>
                        <p class="text-lg font-light leading-relaxed mt-4 mb-4 text-gray-700">
                            Fournir des prévisions météorologiques précises et opportunes ainsi que des informations climatiques pour soutenir la sécurité et le bien-être des résidents d'Essaouira.
                        </p>
                        <p class="text-lg font-light leading-relaxed mt-0 mb-4 text-gray-700">
                            Nous visons à améliorer la compréhension et la préparation de la communauté face aux diverses conditions météorologiques.
                        </p>
                        <a href="#" class="font-bold text-gray-800 mt-8">En savoir plus sur nous !</a>
                    </div>
                    <div class="w-full md:w-4/12 px-4 mr-auto ml-auto">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-orange-400 w-full mb-6 shadow-lg rounded-lg bg-orange-400">
                            <img alt="..." src="{{ asset('images/airport.png') }}"
                                class="w-full align-middle rounded-t-lg" />
                            <blockquote class="relative p-8 mb-4">
                                <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 583 95"
                                    class="absolute left-0 w-full block" style="height: 95px; top: -94px;">
                                    <polygon points="-30,95 583,95 583,65" class="text-orange-400 fill-current">
                                    </polygon>
                                </svg>
                                <h4 class="text-xl font-bold text-white">
                                    Services de Première Classe
                                </h4>
                                <p class="text-md font-light mt-2 text-white">
                                    Nos services sont de première classe, garantissant des informations météorologiques précises et fiables.
                                </p>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    

        <section class="relative py-20" id="history">
            <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
                style="height: 80px;">
                <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                    <polygon class="text-white fill-current" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
            <div class="container mx-auto px-4">
                <div class="items-center flex flex-wrap">
                    <div class="w-full md:w-4/12 ml-auto mr-auto px-4">
                        <img alt="..." class="max-w-full rounded-lg shadow-lg"
                            src="{{ asset('images/3owahh.jpeg') }}" />
                    </div>
                    <div class="w-full md:w-5/12 ml-auto mr-auto px-4">
                        <div class="md:pr-12">
                            <div
                                class="text-pink-600 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-pink-300">
                                <i class="fas fa-rocket text-xl"></i>
                            </div>
                            <h3 class="text-3xl font-semibold">
                                Notre Histoire
                            </h3>
                            <p class="text-lg font-light leading-relaxed mt-4 mb-4 text-gray-700">
                                La station météorologique d'Essaouira, créée en 1760 par le Sultan Sidi Mohamed Ben
                                Abdellah, était à l'origine un poste de surveillance contre les Portugais. Elle fait
                                partie du réseau de la Direction de la Météorologie Nationale et possède la plus grande
                                et la plus ancienne base de données météorologiques du Maroc.
                            </p>
                            <p class="text-lg font-light leading-relaxed mt-0 mb-4 text-gray-700">
                                La Direction Nationale de la Météorologie a été établie en 1961 et est aujourd'hui sous
                                le Secrétariat d'État du Ministère de l'Énergie, des Mines, de l'Eau et de
                                l'Environnement, collaborant étroitement avec le Ministère de l'Environnement sur les
                                questions climatiques.
                            </p>

                            <ul class="list-none mt-6">
                                <li class="py-2">
                                    <div class="flex items-center">
                                        <div>
                                            <span
                                                class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-pink-200 mr-3"><i
                                                    class="fas fa-fingerprint"></i></span>
                                        </div>
                                        <div>
                                            <h4 class="text-gray-600">
                                                Précision des prévisions météorologiques
                                            </h4>
                                        </div>
                                    </div>
                                </li>
                                <li class="py-2">
                                    <div class="flex items-center">
                                        <div>
                                            <span
                                                class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-pink-200 mr-3"><i
                                                    class="fab fa-html5"></i></span>
                                        </div>
                                        <div>
                                            <h4 class="text-gray-600">
                                                Engagement communautaire et éducation
                                            </h4>
                                        </div>
                                    </div>
                                </li>
                                <li class="py-2">
                                    <div class="flex items-center">
                                        <div>
                                            <span
                                                class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-pink-200 mr-3"><i
                                                    class="far fa-paper-plane"></i></span>
                                        </div>
                                        <div>
                                            <h4 class="text-gray-600">
                                                Collaboration avec les autorités locales
                                            </h4>
                                        </div>
                                    </div>
                                </li>
                                <li class="py-2">
                                    <div class="flex items-center">
                                        <div>
                                            <span
                                                class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-pink-200 mr-3"><i
                                                    class="fas fa-users"></i></span>
                                        </div>
                                        <div>
                                            <h4 class="text-gray-600">
                                                Impact sur la sécurité et le commerce régionaux
                                            </h4>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
                style="height: 70px;">
                <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                    <polygon class="text-gray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </section>
        <section class="relative" id="services">
            <div class="bg-gray-200 px-2 py-10">
                <div class="mx-auto max-w-6xl">
                    <h2 class="text-center font-display text-3xl font-bold tracking-tight text-slate-900 md:text-4xl">
                        Nos Services
                    </h2>
                    <ul class="mt-16 grid grid-cols-1 gap-10 text-center text-slate-700 md:grid-cols-3">
                        <li class="rounded-xl bg-white px-6 py-8 shadow-sm">
                            <img src="https://www.svgrepo.com/show/530438/ddos-protection.svg" alt=""
                                class="mx-auto h-10 w-10">
                            <h3 class="my-3 font-display font-medium">Service Maritime</h3>
                            <p class="mt-1.5 text-sm leading-6 text-secondary-500">
                                Fournir des prévisions météorologiques détaillées pour les zones de navigation, y compris les cartes du vent, de la pression et de la hauteur des vagues.
                            </p>
                        </li>
                        <li class="rounded-xl bg-white px-6 py-8 shadow-sm">
                            <img src="https://www.svgrepo.com/show/530442/port-detection.svg" alt=""
                                class="mx-auto h-10 w-10">
                            <h3 class="my-3 font-display font-medium">Service Aéronautique</h3>
                            <p class="mt-1.5 text-sm leading-6 text-secondary-500">
                                Offrir des informations météorologiques pour assurer la sécurité, la régularité et l'efficacité des opérations aériennes.
                            </p>
                        </li>
                        <li class="rounded-xl bg-white px-6 py-8 shadow-sm">
                            <img src="https://www.svgrepo.com/show/530444/availability.svg" alt=""
                                class="mx-auto h-10 w-10">
                            <h3 class="my-3 font-display font-medium">Service Informatique</h3>
                            <p class="mt-1.5 text-sm leading-6 text-secondary-500">
                                Maintenir les systèmes informatiques et développer des applications météorologiques.
                            </p>
                        </li>
                        <div class="md:col-span-3 flex justify-center gap-10 mb-24">
                            <li class="rounded-xl bg-white px-6 py-8 shadow-sm w-full md:w-1/3">
                                <img src="https://www.svgrepo.com/show/530438/ddos-protection.svg" alt=""
                                    class="mx-auto h-10 w-10">
                                <h3 class="my-3 font-display font-medium">Service de Climatologie</h3>
                                <p class="mt-1.5 text-sm leading-6 text-secondary-500">
                                    Analyser les tendances climatiques et fournir des prévisions pour les saisons à venir afin de soutenir divers secteurs.
                                </p>
                            </li>
                            <li class="rounded-xl bg-white px-6 py-8 shadow-sm w-full md:w-1/3">
                                <img src="https://www.svgrepo.com/show/530442/port-detection.svg" alt=""
                                    class="mx-auto h-10 w-10">
                                <h3 class="my-3 font-display font-medium">Service de Prévisions</h3>
                                <p class="mt-1.5 text-sm leading-6 text-secondary-500">
                                    Prédire les paramètres météorologiques futurs tels que la pression, la température, le vent, l'humidité et les précipitations.
                                </p>
                            </li>
                        </div>
                    </ul>
                </div>
            </div>
            <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
                style="height: 70px;">
                <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                    <polygon class="text-white fill-current" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </section>
        
        <section class="pt-20 pb-48">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap justify-center text-center mb-24">
                    <div class="w-full lg:w-6/12 px-4">
                        <h2 class="text-4xl font-semibold">Rencontrez Notre Équipe</h2>
                        <p class="text-lg leading-relaxed m-4 text-gray-600">
                            Notre équipe dévouée de météorologistes et de personnel de soutien travaille sans relâche pour fournir des informations météorologiques précises.
                        </p>
                    </div>
                </div>
                <div class="flex flex-wrap">
                    <div class="w-full md:w-4/12 lg:mb-0 mb-12 px-4">
                        <div class="px-6">
                            <img alt="..."
                                src="{{ asset('images/profile.png') }}"
                                class="shadow-lg rounded-full  mx-auto" style="max-width: 120px; " />
                            <div class="pt-6 text-center">
                                <h5 class="text-xl font-bold">Ryan Tompson</h5>
                                <p class="mt-1 text-sm text-gray-500 uppercase font-semibold">
                                    Météorologiste
                                </p>
                                <div class="mt-6">
                                    <button
                                        class="bg-blue-400 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                        type="button">
                                        <i class="fab fa-twitter"></i>
                                    </button>
                                    <button
                                        class="bg-blue-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                        type="button">
                                        <i class="fab fa-facebook-f"></i>
                                    </button>
                                    <button
                                        class="bg-pink-500 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                        type="button">
                                        <i class="fab fa-dribbble"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-4/12 lg:mb-0 mb-12 px-4">
                        <div class="px-6">
                            <img alt="..."
                            src="{{ asset('images/profile.png') }}"
                            class="shadow-lg rounded-full mx-auto max-w-120-px" style="max-width: 120px; " />
                            <div class="pt-6 text-center">
                                <h5 class="text-xl font-bold">Romina Hadid</h5>
                                <p class="mt-1 text-sm text-gray-500 uppercase font-semibold">
                                    Personnel de Soutien
                                </p>
                                <div class="mt-6">
                                    <button
                                        class="bg-red-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                        type="button">
                                        <i class="fab fa-google"></i>
                                    </button>
                                    <button
                                        class="bg-blue-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                        type="button">
                                        <i class="fab fa-facebook-f"></i>
                                    </button>
                                    <button
                                        class="bg-gray-800 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                        type="button">
                                        <i class="fab fa-github"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-4/12 lg:mb-0 mb-12 px-4">
                        <div class="px-6">
                            <img alt="..."
                            src="{{ asset('images/profile.png') }}"
                            class="shadow-lg rounded-full mx-auto max-w-120-px" style="max-width: 120px; " />
                            <div class="pt-6 text-center">
                                <h5 class="text-xl font-bold">Alexa Smith</h5>
                                <p class="mt-1 text-sm text-gray-500 uppercase font-semibold">
                                    Analyste de Données
                                </p>
                                <div class="mt-6">
                                    <button
                                        class="bg-red-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                        type="button">
                                        <i class="fab fa-google"></i>
                                    </button>
                                    <button
                                        class="bg-blue-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                        type="button">
                                        <i class="fab fa-facebook-f"></i>
                                    </button>
                                    <button
                                        class="bg-gray-800 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                        type="button">
                                        <i class="fab fa-github"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="pb-10 relative block bg-gray-900">
            <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
            style="height: 80px;">
            <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg"
                preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                <polygon class="text-gray-900 fill-current" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
            <div class="container mx-auto px-4 lg:pt-24 lg:pb-64">
                <div class="flex flex-wrap text-center justify-center">
                    <div class="w-full lg:w-6/12 px-4">
                        <h2 class="text-4xl font-semibold text-white">Contact Us</h2>
                        <p class="text-lg leading-relaxed mt-4 mb-4 text-gray-400">
                            For any inquiries, feel free to get in touch with us.
                        </p>
                    </div>
                </div>
            </div>
        {{-- </section> --}}
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap justify-center lg:-mt-64 -mt-48">
                    <div class="w-full px-4 mb-24">
                        <div class="flex flex-wrap">
                            <!-- Map Card -->
                            <div class="w-full lg:w-6/12 px-4">
                                <div
                                    class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-300">
                                    <div class="flex-auto p-5 lg:p-10">
                                        <h4 class="text-2xl font-semibold">Our Location</h4>
                                        <p class="leading-relaxed mt-1 mb-4 text-gray-600">
                                            Find us on the map below.
                                        </p>
                                        <div class="relative w-full mb-3">
                                            <iframe
                                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1740.6118229913834!2d-9.774975837462062!3d31.510397999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdad9bf1d8b2d4f9%3A0x352c6b12ef121b72!2sUnion%20Marocaine%20du%20Travail%20UMT!5e1!3m2!1sen!2sma!4v1720773213022!5m2!1sen!2sma"
                                                width="600" height="450" style="border:0;" allowfullscreen=""
                                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Contact  -->
                            <!-- resources/views/contact.blade.php -->
                            <div class="w-full lg:w-6/12 px-4">
                                <div
                                    class="relative flex flex-col min-w-0 break-words w-full shadow-lg rounded-lg bg-gray-300">
                                    <div class="flex-auto p-5 lg:p-10">
                                        <h4 class="text-2xl font-semibold">Want to contact us?</h4>
                                        <p class="leading-relaxed mt-1 text-gray-600">
                                            Complete this form and we will get back to you soon.
                                        </p>
                                        <form action="{{ route('contact.send') }}" method="POST">
                                            @csrf
                                            <div class="relative w-full mb-3 mt-8">
                                                <label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                                    for="full-name">Full Name</label>
                                                <input type="text" name="name"
                                                    class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                                                    placeholder="Full Name" required />
                                            </div>
                                            <div class="relative w-full mb-3">
                                                <label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                                    for="email">Email</label>
                                                <input type="email" name="email"
                                                    class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                                                    placeholder="Email" required />
                                            </div>
                                            <div class="relative w-full mb-3">
                                                <label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                                    for="message">Message</label>
                                                <textarea rows="8" name="message"
                                                    class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                                                    placeholder="Type a message..." required></textarea>
                                            </div>
                                            <div class="text-center mt-6">
                                                <button type="submit"
                                                    class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
                                                    style="transition: all 0.15s ease 0s;">
                                                    Send Message
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="relative bg-gray-300 pt-8 pb-6">
            <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
                style="height: 80px;">
                <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                    <polygon class="text-gray-300 fill-current" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap">
                    <div class="w-full lg:w-6/12 px-4">
                        <h4 class="text-3xl font-semibold">Restons en contact !</h4>
                        <h5 class="text-lg mt-0 mb-2 text-gray-700">
                            Retrouvez-nous sur ces plateformes, nous répondons dans un délai de 1 à 2 jours ouvrables.
                        </h5>
                        <div class="mt-4 text-gray-700">
                            <p>Email: <a href="mailto:your-email@example.com">email@gmail.com</a></p>
                            <p>Tel: +123456789</p>
                            <p>Fax: +123456789</p>
                            <p>Adresse: PORT , ESSAOUIRA, MAROC</p>
                        </div>
                    </div>
                </div>
                <hr class="my-6 border-gray-400" />
                <div class="flex flex-wrap items-center md:justify-between justify-center">
                    <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                        <div class="text-sm text-gray-600 font-semibold py-1">
                            Droits d'auteur © 2024 CPM ESSAOUIRA
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        