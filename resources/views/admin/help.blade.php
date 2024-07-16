<x-app-layout>
    <div class="container mx-auto p-12">
        <h1 class="text-3xl font-bold mb-4">Aide pour l'Administrateur</h1>
        <p class="mb-4">Bienvenue sur la page d'aide pour l'administrateur de MéteoApp. Voici les instructions pour
            utiliser les différentes fonctionnalités de l'application.</p>

        <h2 class="text-2xl font-semibold mb-2">Dashboard</h2>
        <p class="mb-4">Le tableau de bord vous permet de voir un résumé des utilisateurs et des matériels. Utilisez
            les liens pour voir plus de détails sur chaque catégorie.</p>

        <h2 class="text-2xl font-semibold mb-2">Gestion des Utilisateurs</h2>
        <p class="mb-2">Dans la section <strong>Utilisateurs</strong>, vous pouvez :</p>
        <ul class="list-disc list-inside mb-4">
            <li><strong>Ajouter un nouvel utilisateur</strong> en cliquant sur "Ajouter un nouvel utilisateur".</li>
            <li><strong>Rechercher des utilisateurs</strong> par nom à l'aide de la barre de recherche.</li>
            <li><strong>Voir, modifier ou supprimer</strong> des utilisateurs existants en utilisant les actions
                disponibles pour chaque utilisateur.</li>
        </ul>

        <h2 class="text-2xl font-semibold mb-2">Gestion des Matériels</h2>
        <p class="mb-2">Dans la section <strong>Matériels</strong>, vous pouvez :</p>
        <ul class="list-disc list-inside mb-4">
            <li><strong>Ajouter un nouveau matériel</strong> en cliquant sur "Ajouter un nouveau matériel".</li>
            <li><strong>Rechercher des matériels</strong> par titre à l'aide de la barre de recherche.</li>
            <li><strong>Voir plus de détails</strong> sur un matériel en cliquant sur "Voir plus".</li>
            <li><strong>Modifier ou supprimer</strong> des matériels existants en utilisant les actions disponibles pour
                chaque matériel.</li>
        </ul>

        <h2 class="text-2xl font-semibold mb-2">Voir plus de détails sur un matériel</h2>
        <p class="mb-4">Lorsque vous cliquez sur "Voir plus" pour un matériel, vous verrez des informations détaillées
            telles que la localisation, le type, le constructeur, le numéro de série, etc. Vous pouvez également
            modifier ou supprimer ces informations, ou voir les interventions associées au matériel.</p>

        <h2 class="text-2xl font-semibold mb-2">Gestion des Interventions</h2>
        <p class="mb-2">Dans la section <strong>Interventions</strong>, vous pouvez :</p>
        <ul class="list-disc list-inside mb-4">
            <li><strong>Ajouter un nouveau Intervention</strong> en cliquant sur "Ajouter un nouveau Interventions".</li>
            <li><strong>Modifier ou supprimer des Interventions</strong>Modifier la date ou le type de chaque intervention </li>
        </ul>
        <h2 class="text-2xl font-semibold mb-2">Autres fonctionnalités</h2>
        <p class="mb-4">Utilisez le menu de navigation pour accéder aux autres fonctionnalités de l'application telles
            que le profil et les journaux de matériel.</p>

        <a href="{{ route('dashboard') }}" class="text-blue-500 hover:underline">Retour au Dashboard</a>
    </div>

</x-app-layout>
